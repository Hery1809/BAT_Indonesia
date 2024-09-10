<?php

namespace App\Http\Controllers\MasterEHSFacility;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\DataEhsCategoryModel;
use App\Models\DataEhsAktivitasModel;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $ec_name)
    {
        $perPage = $request->input('perPage', 5);
        $category = DataEhsCategoryModel::where('ec_name', $ec_name)->firstOrFail();
        $query = DataEhsAktivitasModel::where('ec_id', $category->ec_id);

        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ea_name', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $aktivitas = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($activityChunk) use ($aktivitas, &$currentPage) {
                foreach ($activityChunk as $activity) {
                    $activity->setAttribute('i', ($currentPage - 1) * $activityChunk->perPage() + 1);
                    $aktivitas->push($activity);
                    $currentPage++;
                }
            });
        } else {
            $aktivitas = $query->paginate($perPage);
        }

        $data = [
            'category' => $category,
            'aktivitas' => $aktivitas,
            // 'no' => 1,
            'no' => ($aktivitas->currentPage() - 1) * $aktivitas->perPage() + 1,
            'search' => $search,
        ];

        return view('pages.admin.MasterEHSFacility.aktivitas', $data);
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
    public function store(Request $request, $ec_name)
    {
        $request->validate([
            'ea_name' => 'required|string',
            'ec_id' => '',
        ], [
            'ea_name.required' => 'Nama aktivitas wajib diisi',
        ]);

        try {
            DataEhsAktivitasModel::create([
                'ea_name' => $request->ea_name,
                'ec_id' => $request->ec_id,  // Pastikan ec_id benar-benar tersimpan
            ]);

            return redirect()->back()->with('success', 'Data aktivitas berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data aktivitas gagal ditambahkan');
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
            'ea_name' => 'required|string',
        ], [
            'ea_name.required' => 'Nama aktivitas wajib diisi',
        ]);
        try {
            DataEhsAktivitasModel::where('ea_id', $id)->update([
                'ea_name' => $request->ea_name,
            ]);

            return redirect()->back()->with('success', 'Data aktivitas berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data aktivitas gagal diubah');
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
