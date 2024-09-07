<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DataCigaretteModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CigaretteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $query = DataCigaretteModel::orderBy('created_date', 'asc');

        // Add search logic similar to the Transfer index controller
        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('cigarette_name', 'like', "%$search%")
                    ->orWhere('cigarette_value', 'like', "%$search%")
                    ->orWhere('cigarette_bonus', 'like', "%$search%")
                    ->orWhere('created_date', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $cigarets = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($cigaretChunk) use ($cigarets, &$currentPage) {
                foreach ($cigaretChunk as $cigaret) {
                    $cigaret->setAttribute('i', ($currentPage - 1) * $cigaretChunk->perPage() + 1);
                    $cigarets->push($cigaret);
                    $currentPage++;
                }
            });
        } else {
            $cigarets = $query->paginate($perPage);
        }

        $data = [
            'cigarets' => $cigarets,
            'i' => ($cigarets->currentPage() - 1) * $cigarets->perPage() + 1,
            'search' => $search,
        ];
        return view('pages.admin.MasterData.cigarette', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cigarette_name' => 'required|string|max:100',
            'cigarette_value' => 'required|integer',
            'cigarette_bonus' => 'required|integer',
        ], [
            'cigarette_name.required' => 'Nama rokok wajib diisi',
            'cigarette_name.string' => 'Nama rokok harus berupa string',
            'cigarette_name.max' => 'Nama rokok maksimal 100 karakter',
            'cigarette_value.required' => 'Nilai rokok wajib diisi',
            'cigarette_value.integer' => 'Nilai rokok harus berupa angka',
            'cigarette_bonus.required' => 'Bonus rokok wajib diisi',
            'cigarette_bonus.integer' => 'Bonus rokok harus berupa angka',
            'created_date.required' => 'Tanggal dibuat wajib diisi',
            'created_date.date' => 'Tanggal dibuat harus berupa tanggal',
        ]);
        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataCigaretteModel::create([
                'cigarette_name' => $request->cigarette_name,
                'cigarette_value' => $request->cigarette_value,
                'cigarette_bonus' => $request->cigarette_bonus,
                'created_date' => $created_date,
                // 'created_date' => now(),
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data rokok berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data rokok gagal ditambahkan');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'cigarette_name' => 'required|string|max:100',
            'cigarette_value' => 'required|integer',
            'cigarette_bonus' => 'required|integer',
        ], [
            'cigarette_name.required' => 'Nama rokok wajib diisi',
            'cigarette_name.string' => 'Nama rokok harus berupa string',
            'cigarette_name.max' => 'Nama rokok maksimal 100 karakter',
            'cigarette_value.required' => 'Nilai rokok wajib diisi',
            'cigarette_value.integer' => 'Nilai rokok harus berupa angka',
            'cigarette_bonus.required' => 'Bonus rokok wajib diisi',
            'cigarette_bonus.integer' => 'Bonus rokok harus berupa angka',
            'created_date.required' => 'Tanggal dibuat wajib diisi',
            'created_date.date' => 'Tanggal dibuat harus berupa tanggal',
        ]);
        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataCigaretteModel::where('cigarette_id', $id)->update([
                'cigarette_name' => $request->cigarette_name,
                'cigarette_value' => $request->cigarette_value,
                'cigarette_bonus' => $request->cigarette_bonus,
                'created_date' => $created_date,
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data rokok berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data rokok gagal diubah');
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
