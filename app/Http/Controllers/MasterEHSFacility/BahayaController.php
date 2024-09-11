<?php

namespace App\Http\Controllers\MasterEHSFacility;

use Illuminate\Http\Request;
use App\Models\DataEhsBahayaModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\DataEhsCategoryModel;
use App\Models\DataEhsAktivitasModel;

class BahayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $ec_name)
    {
        $perPage = $request->input('perPage', 5);
        $category = DataEhsCategoryModel::where('ec_name', $ec_name)->firstOrFail();
        $query = DataEhsBahayaModel::where('ec_id', $category->ec_id);

        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('ea_id', 'like', "%$search%")
                    ->orWhere('eb_type', 'like', "%$search%")
                    ->orWhere('eb_bahaya', 'like', "%$search%")
                    ->orWhere('eb_dampak_karyawan', 'like', "%$search%")
                    ->orWhere('eb_dampak_timbulkan', 'like', "%$search%")
                    ->orWhere('eb_legal', 'like', "%$search%")
                    ->orWhere('eb_kontrol', 'like', "%$search%")
                    ->orWhere('eb_konsekuensi', 'like', "%$search%")
                    ->orWhere('eb_probabilitas', 'like', "%$search%")
                    ->orWhere('eb_nilai_bahaya', 'like', "%$search%")
                    ->orWhere('eb_kontrol', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $bahayas = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($bahayaChunk) use ($bahayas, &$currentPage) {
                foreach ($bahayaChunk as $bahaya) {
                    $bahaya->setAttribute('i', ($currentPage - 1) * $bahayaChunk->perPage() + 1);
                    $bahayas->push($bahaya);
                    $currentPage++;
                }
            });
        } else {
            $bahayas = $query->paginate($perPage);
        }

        $data = [
            'category' => $category,
            'bahayas' => $bahayas,
            'no' => ($bahayas->currentPage() - 1) * $bahayas->perPage() + 1,
            'search' => $search,
            'activitas' => DataEhsAktivitasModel::where('ec_id', $category->ec_id)->get(),
        ];
        // $bahayas = DataEhsBahayaModel::where('ec_id', 1)->get();

        return view('pages.admin.MasterEHSFacility.bahaya', $data);
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
            'ec_id' => '',
            'ea_id' => 'required|integer',
            'eb_type' => 'required|in:R,NR',
            'eb_bahaya' => 'required|string',
            'eb_dampak_karyawan' => 'required|string',
            'eb_dampak_timbulkan' => 'required|string',
            'eb_legal' => 'required|string',
            'eb_kontrol' => 'required|string',
            'eb_konsekuensi' => 'required|integer',
            'eb_probabilitas' => 'required|integer',
            'eb_action' => 'required|string',
        ], [
            'ea_id.required' => 'Aktivitas wajib diisi',
            'ea_id.integer' => 'Aktivitas harus berupa angka',
            'eb_type.required' => 'Tipe bahaya wajib diisi',
            'eb_type.in' => 'Tipe bahaya harus berupa R atau NR',
            'eb_bahaya.required' => 'Bahaya wajib diisi',
            'eb_bahaya.string' => 'Bahaya harus berupa teks',
            'eb_dampak_karyawan.required' => 'Dampak karyawan wajib diisi',
            'eb_dampak_karyawan.string' => 'Dampak karyawan harus berupa teks',
            'eb_dampak_timbulkan.required' => 'Dampak yang timbulkan wajib diisi',
            'eb_dampak_timbulkan.string' => 'Dampak yang timbulkan harus berupa teks',
            'eb_legal.required' => 'Legal wajib diisi',
            'eb_legal.string' => 'Legal harus berupa teks',
            'eb_kontrol.required' => 'Kontrol wajib diisi',
            'eb_kontrol.string' => 'Kontrol harus berupa teks',
            'eb_konsekuensi.required' => 'Konsekuensi wajib diisi',
            'eb_konsekuensi.integer' => 'Konsekuensi harus berupa angka',
            'eb_probabilitas.required' => 'Probabilitas wajib diisi',
            'eb_probabilitas.integer' => 'Probabilitas harus berupa angka',
            'eb_action.required' => 'Action wajib diisi',
            'eb_action.string' => 'Action harus berupa teks',
        ]);

        try {
            $eb_nilai_bahaya = $request->eb_konsekuensi * $request->eb_probabilitas;
            DataEhsBahayaModel::create([
                'ec_id' => $request->ec_id,
                'ea_id' => $request->ea_id,
                'eb_type' => $request->eb_type,
                'eb_bahaya' => $request->eb_bahaya,
                'eb_dampak_karyawan' => $request->eb_dampak_karyawan,
                'eb_dampak_timbulkan' => $request->eb_dampak_timbulkan,
                'eb_legal' => $request->eb_legal,
                'eb_kontrol' => $request->eb_kontrol,
                'eb_konsekuensi' => $request->eb_konsekuensi,
                'eb_probabilitas' => $request->eb_probabilitas,
                'eb_action' => $request->eb_action,
                'eb_nilai_bahaya' => $eb_nilai_bahaya,
            ]);



            return redirect()->back()->with('success', 'Data bahaya berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data bahaya gagal ditambahkan');
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
            'ec_id' => '',
            'ea_id' => 'required|integer',
            'eb_type' => 'required|in:R,NR',
            'eb_bahaya' => 'required|string',
            'eb_dampak_karyawan' => 'required|string',
            'eb_dampak_timbulkan' => 'required|string',
            'eb_legal' => 'required|string',
            'eb_kontrol' => 'required|string',
            'eb_konsekuensi' => 'required|integer',
            'eb_probabilitas' => 'required|integer',
            'eb_action' => 'required|string',
        ], [
            'ea_id.required' => 'Aktivitas wajib diisi',
            'ea_id.integer' => 'Aktivitas harus berupa angka',
            'eb_type.required' => 'Tipe bahaya wajib diisi',
            'eb_type.in' => 'Tipe bahaya harus berupa R atau NR',
            'eb_bahaya.required' => 'Bahaya wajib diisi',
            'eb_bahaya.string' => 'Bahaya harus berupa teks',
            'eb_dampak_karyawan.required' => 'Dampak karyawan wajib diisi',
            'eb_dampak_karyawan.string' => 'Dampak karyawan harus berupa teks',
            'eb_dampak_timbulkan.required' => 'Dampak yang timbulkan wajib diisi',
            'eb_dampak_timbulkan.string' => 'Dampak yang timbulkan harus berupa teks',
            'eb_legal.required' => 'Legal wajib diisi',
            'eb_legal.string' => 'Legal harus berupa teks',
            'eb_kontrol.required' => 'Kontrol wajib diisi',
            'eb_kontrol.string' => 'Kontrol harus berupa teks',
            'eb_konsekuensi.required' => 'Konsekuensi wajib diisi',
            'eb_konsekuensi.integer' => 'Konsekuensi harus berupa angka',
            'eb_probabilitas.required' => 'Probabilitas wajib diisi',
            'eb_probabilitas.integer' => 'Probabilitas harus berupa angka',
            'eb_action.required' => 'Action wajib diisi',
            'eb_action.string' => 'Action harus berupa teks',
        ]);

        try {
            $eb_nilai_bahaya = $request->eb_konsekuensi * $request->eb_probabilitas;
            DataEhsBahayaModel::where('ea_id', $id)->update([
                'ec_id' => $request->ec_id,
                'ea_id' => $request->ea_id,
                'eb_type' => $request->eb_type,
                'eb_bahaya' => $request->eb_bahaya,
                'eb_dampak_karyawan' => $request->eb_dampak_karyawan,
                'eb_dampak_timbulkan' => $request->eb_dampak_timbulkan,
                'eb_legal' => $request->eb_legal,
                'eb_kontrol' => $request->eb_kontrol,
                'eb_konsekuensi' => $request->eb_konsekuensi,
                'eb_probabilitas' => $request->eb_probabilitas,
                'eb_action' => $request->eb_action,
                'eb_nilai_bahaya' => $eb_nilai_bahaya,
            ]);

            return redirect()->back()->with('success', 'Data bahaya berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data bahaya gagal diubah');
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