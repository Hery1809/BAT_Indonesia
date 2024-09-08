<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\DataDepoModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataDistributorModel;
use Illuminate\Support\Facades\Auth;
use App\Models\DataDistributorDepoModel;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $query = DataDistributorModel::orderBy('created_date', 'asc');

        // Add search logic similar to the Transfer index controller
        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('distributor_name', 'like', "%$search%")
                    ->orWhere('created_date', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $distributors = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($distributorChunk) use ($distributors, &$currentPage) {
                foreach ($distributorChunk as $distributor) {
                    $distributor->setAttribute('i', ($currentPage - 1) * $distributorChunk->perPage() + 1);
                    $distributors->push($distributor);
                    $currentPage++;
                }
            });
        } else {
            $distributors = $query->paginate($perPage);
        }

        $data = [
            'distributorDepo' => DataDistributorModel::with(['distributorDepos.depo'])->get(),
            'distributors' => $distributors,
            'i' => ($distributors->currentPage() - 1) * $distributors->perPage() + 1,
            'search' => $search,
        ];
        return view('pages.admin.MasterData.Distributor.distributor', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'depo' => DataDepoModel::all(),
        ];
        return view('pages.admin.MasterData.Distributor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'distributor_name' => 'required|string|max:50',
            'depo_id' => 'required|array',
        ], [
            'distributor_name.required' => 'Nama distributor wajib diisi',
            'distributor_name.string' => 'Nama distributor harus berupa string',
            'distributor_name.max' => 'Nama distributor maksimal 50 karakter',
            'depo_id.required' => 'Depo wajib diisi',
            'depo_id.array' => 'Depo harus berupa array',
        ]);
        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        // Gunakan transaksi
        DB::beginTransaction();
        try {
            $distributor = DataDistributorModel::create([
                'distributor_name' => $request->distributor_name,
                'created_date' => $created_date,
                'created_by' => Auth::id(),
            ]);

            $distributorid = $distributor->distributor_id;
            foreach ($request->depo_id as $depo_id) {
                DataDistributorDepoModel::create([
                    'distributor_id' => $distributorid,
                    'depo_id' => $depo_id,
                ]);
            }

            // Jika semua operasi berhasil, commit transaksi
            DB::commit();

            return redirect()->route('distributor.index')->with('success', 'Data distributor berhasil ditambahkan');
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();
            return redirect()->back()->with('error', 'Data distributor gagal ditambahkan' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Ambil data distributor berdasarkan ID
        $distributor = DataDistributorModel::findOrFail($id);
        $allDepo = DataDepoModel::all();

        $associatedDepoIds = DataDistributorDepoModel::where('distributor_id', $id)->pluck('depo_id')->toArray();

        $data = [
            'distributor' => $distributor,
            'depo' => $allDepo,
            'associatedDepoIds' => $associatedDepoIds, // Tambahkan data depo yang terkait
        ];

        return view('pages.admin.MasterData.Distributor.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'distributor_name' => 'required|string|max:50',
            'depo_id' => 'required|array',
        ], [
            'distributor_name.required' => 'Nama distributor wajib diisi',
            'distributor_name.string' => 'Nama distributor harus berupa string',
            'distributor_name.max' => 'Nama distributor maksimal 50 karakter',
            'depo_id.required' => 'Depo wajib diisi',
            'depo_id.array' => 'Depo harus berupa array',
        ]);

        // Gunakan transaksi untuk keamanan data
        DB::beginTransaction();
        try {
            // Update distributor
            $distributor = DataDistributorModel::findOrFail($id);
            $distributor->update([
                'distributor_name' => $request->distributor_name,
            ]);

            // Hapus semua hubungan distributor_depo lama
            DataDistributorDepoModel::where('distributor_id', $id)->delete();

            // Insert hubungan distributor_depo baru
            foreach ($request->depo_id as $depo_id) {
                DataDistributorDepoModel::create([
                    'distributor_id' => $id,
                    'depo_id' => $depo_id,
                ]);
            }

            // Jika semua operasi berhasil, commit transaksi
            DB::commit();

            return redirect()->route('distributor.index')->with('success', 'Data distributor berhasil diperbarui');
        } catch (\Exception $e) {
            // Jika ada kesalahan, rollback transaksi
            DB::rollBack();
            return redirect()->back()->with('error', 'Data distributor gagal diperbarui: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
