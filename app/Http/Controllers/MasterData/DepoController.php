<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\DataDepoModel;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DepoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $query = DataDepoModel::orderBy('created_date', 'asc');

        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('depo_name', 'like', "%$search%")
                    ->orWhere('depo_region', 'like', "%$search%")
                    ->orWhere('depo_retail', 'like', "%$search%")
                    ->orWhere('created_date', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $depos = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($depoChunk) use ($depos, &$currentPage) {
                foreach ($depoChunk as $depo) {
                    $depo->setAttribute('i', ($currentPage - 1) * $depoChunk->perPage() + 1);
                    $depos->push($depo);
                    $currentPage++;
                }
            });
        } else {
            $depos = $query->paginate($perPage);
        }

        $data = [
            'depos' => $depos,
            'i' => ($depos->currentPage() - 1) * $depos->perPage() + 1,
            'search' => $search,
        ];
        return view('pages.admin.MasterData.depo', $data);
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
            'depo_name' => 'required|string|max:50',
            'depo_region' => 'required|string|max:50',
            'depo_retail' => 'required|integer',
        ], [
            'depo_name.required' => 'Nama depo wajib diisi',
            'depo_name.string' => 'Nama depo harus berupa string',
            'depo_name.max' => 'Nama depo maksimal 50 karakter',
            'depo_region.required' => 'Wilayah depo wajib diisi',
            'depo_region.string' => 'Wilayah depo harus berupa string',
            'depo_region.max' => 'Wilayah depo maksimal 50 karakter',
            'depo_retail.required' => 'Retail depo wajib diisi',
            'depo_retail.integer' => 'Retail depo harus berupa angka',
        ]);
        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataDepoModel::create([
                'depo_name' => $request->depo_name,
                'depo_region' => $request->depo_region,
                'depo_retail' => $request->depo_retail,
                'created_date' => $created_date,
                // 'created_date' => now(),
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data depo berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data depo gagal ditambahkan');
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
        $request->validate([
            'depo_name' => 'required|string|max:50',
            'depo_region' => 'required|string|max:50',
            'depo_retail' => 'required|integer',
        ], [
            'depo_name.required' => 'Nama depo wajib diisi',
            'depo_name.string' => 'Nama depo harus berupa string',
            'depo_name.max' => 'Nama depo maksimal 50 karakter',
            'depo_region.required' => 'Wilayah depo wajib diisi',
            'depo_region.string' => 'Wilayah depo harus berupa string',
            'depo_region.max' => 'Wilayah depo maksimal 50 karakter',
            'depo_retail.required' => 'Retail depo wajib diisi',
            'depo_retail.integer' => 'Retail depo harus berupa angka',
        ]);
        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataDepoModel::where('depo_id', $id)->update([
                'depo_name' => $request->depo_name,
                'depo_region' => $request->depo_region,
                'depo_retail' => $request->depo_retail,
                'created_date' => $created_date,
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data depo berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data depo gagal diubah');
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
