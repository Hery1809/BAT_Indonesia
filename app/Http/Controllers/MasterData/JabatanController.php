<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\DataJabatanModel;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $query = DataJabatanModel::orderBy('created_date', 'asc');

        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('jabatan_name', 'like', "%$search%")
                    ->orWhere('jabatan_target_join_call', 'like', "%$search%")
                    ->orWhere('created_date', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $jabatans = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($jabatanChunk) use ($jabatans, &$currentPage) {
                foreach ($jabatanChunk as $jabatan) {
                    $jabatan->setAttribute('i', ($currentPage - 1) * $jabatanChunk->perPage() + 1);
                    $jabatans->push($jabatan);
                    $currentPage++;
                }
            });
        } else {
            $jabatans = $query->paginate($perPage);
        }

        $data = [
            'jabatans' => $jabatans,
            'i' => ($jabatans->currentPage() - 1) * $jabatans->perPage() + 1,
            'search' => $search,
        ];
        return view('pages.admin.MasterData.jabatan', $data);
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
        //
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
            'jabatan_name' => 'required|string|max:50',
            'jabatan_target_join_call' => 'required|integer',
        ], [
            'jabatan_name.required' => 'Nama jabatan wajib diisi',
            'jabatan_name.string' => 'Nama jabatan harus berupa string',
            'jabatan_name.max' => 'Nama jabatan maksimal 50 karakter',
            'jabatan_target_join_call.required' => 'Target join call wajib diisi',
            'jabatan_target_join_call.integer' => 'Target join call harus berupa angka',
        ]);
        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataJabatanModel::where('jabatan_id', $id)->update([
                'jabatan_name' => $request->jabatan_name,
                'jabatan_target_join_call' => $request->jabatan_target_join_call,
                'created_date' => $created_date,
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data jabatan berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data jabatan gagal diubah');
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
