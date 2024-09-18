<?php

namespace App\Http\Controllers\HeadCount;

use Illuminate\Http\Request;
use App\Models\DataDepoModel;
use App\Models\DataPositionModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\DataDistributorModel;
use Illuminate\Support\Facades\Auth;
use App\Models\DataDistributorDepoModel;
use App\Models\DataHeadcountTargetModel;

class TargetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $query = DataDistributorDepoModel::query();

        // Ambil nilai dari input filter bulan dan tahun, atau gunakan bulan dan tahun saat ini jika tidak ada
        $month = $request->input('month', now()->format('m'));
        $year = $request->input('year', now()->format('Y'));

        // Mendapatkan data dari DataHeadcountTargetModel
        $headcountTargetsQuery = DataHeadcountTargetModel::query();
        if ($month && $year) {
            $headcountTargetsQuery->where('hth_month', $month)
                ->where('hth_year', $year);
        }
        $headcountTargets = $headcountTargetsQuery->get();

        // Mengambil ID distribusi dan depo yang relevan
        $relevantDistributorIds = $headcountTargets->pluck('distributor_id')->unique();
        $relevantDepoIds = $headcountTargets->pluck('depo_id')->unique();

        // Mengambil semua data dari DataDistributorDepoModel
        $distributorDepos = $query->when($month && $year, function ($q) use ($relevantDistributorIds, $relevantDepoIds) {
            $q->whereIn('distributor_id', $relevantDistributorIds)
                ->whereIn('depo_id', $relevantDepoIds);
        })->paginate($perPage);

        // Menyiapkan data untuk view
        $positions = DataPositionModel::all()->keyBy('position_id');
        $headcountTargetsGrouped = $headcountTargets->groupBy(function ($item) {
            return $item->distributor_id . '-' . $item->depo_id;
        });

        // menghitung jumlah colom table
        $countpositions = DataPositionModel::all();
        $columnCount = 3 + $countpositions->count() + 2;

        $dataDistributorDepo = DataDistributorDepoModel::all();

        $data = [
            'columnCount' => $columnCount,
            'dataDistributorDepo' => $dataDistributorDepo,
            'positions' => $positions,
            'distributorDepos' => $distributorDepos,
            'headcountTargets' => $headcountTargetsGrouped,
            'i' => ($distributorDepos->currentPage() - 1) * $distributorDepos->perPage() + 1,
            'search' => $request->input('search', ''),
            'month' => $month,
            'year' => $year,
            'distributor' => DataDistributorModel::all(),
            'depo' => DataDepoModel::all(),
        ];

        return view('pages.admin.HeadCount.target', $data);
    }

    // ajax request create and update
    public function getDeposByDistributor($distributor_id)
    {
        $depos = DataDistributorDepoModel::where('distributor_id', $distributor_id)
            ->with('depo') // pastikan relasi 'depo' sudah diatur di model DataDistributorDepoModel
            ->get();

        return response()->json($depos);
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
        $request->validate(
            [
                'distributor_id' => 'required',
                'depo_id' => 'required',
            ],
            [
                'distributor_id.required' => 'Distributor harus diisi',
                'depo_id.required' => 'Depo harus diisi',
            ]
        );

        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        try {
            $distributor_id = $request->distributor_id;
            $depo_id = $request->depo_id;
            $hth_month = $request->hth_month;
            $hth_year = $request->hth_year;

            // Pengecekan apakah data sudah ada
            $existingData = DataHeadcountTargetModel::where('distributor_id', $distributor_id)
                ->where('depo_id', $depo_id)
                ->where('hth_month', $hth_month)
                ->where('hth_year', $hth_year)
                ->exists();

            if ($existingData) {
                return redirect()->back()->with('error', 'Data yang anda inputkan sudah ada. Silakan edit data jika ingin merubahnya.');
            }

            // Inisialisasi variabel untuk total hth_value
            $total_hth_value = 0;

            // Iterasi melalui setiap field yang berkaitan dengan position_id
            foreach ($request->except(['_token', 'distributor_id', 'depo_id', 'hth_month', 'hth_year']) as $position_id => $value) {
                if (!empty($value)) {
                    // Menambah nilai hth_value ke dalam total
                    $total_hth_value += $value;

                    // Simpan data ke dalam database
                    DataHeadcountTargetModel::create([
                        'distributor_id' => $distributor_id,
                        'hth_month' => $hth_month,
                        'hth_year' => $hth_year,
                        'depo_id' => $depo_id,
                        'position_id' => $position_id,
                        'hth_value' => $value,
                        'created_date' => $created_date,
                        'created_by' => Auth::id(),
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Data HeadCount Target berhasil ditambahkan. Total Headcount Value: ' . $total_hth_value);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data HeadCount Target gagal ditambahkan. ' . $e->getMessage());
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
    // public function updateData(Request $request, $id)
    // {
    //     $request->validate(
    //         [
    //             'distributor_id' => 'required',
    //             'depo_id' => 'required',
    //         ],
    //         [
    //             'distributor_id.required' => 'Distributor harus diisi',
    //             'depo_id.required' => 'Depo harus diisi',
    //         ]
    //     );

    //     $updated_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

    //     try {
    //         $distributor_id = $request->distributor_id;
    //         $depo_id = $request->depo_id;
    //         $hth_month = $request->hth_month;
    //         $hth_year = $request->hth_year;

    //         // Cek apakah data yang akan diupdate ada
    //         $existingData = DataHeadcountTargetModel::where('id', $id)->first();

    //         if (!$existingData) {
    //             return redirect()->back()->with('error', 'Data yang ingin diupdate tidak ditemukan.');
    //         }

    //         // Hapus data lama terkait dengan kombinasi distributor_id, depo_id, hth_month, dan hth_year
    //         DataHeadcountTargetModel::where('distributor_id', $distributor_id)
    //             ->where('depo_id', $depo_id)
    //             ->where('hth_month', $hth_month)
    //             ->where('hth_year', $hth_year)
    //             ->delete();

    //         // Inisialisasi variabel untuk total hth_value
    //         $total_hth_value = 0;

    //         // Iterasi melalui setiap field yang berkaitan dengan position_id
    //         foreach ($request->except(['_token', 'distributor_id', 'depo_id', 'hth_month', 'hth_year']) as $position_id => $value) {
    //             if (!empty($value)) {
    //                 // Menambah nilai hth_value ke dalam total
    //                 $total_hth_value += $value;

    //                 // Simpan data yang telah diperbarui ke dalam database
    //                 DataHeadcountTargetModel::create([
    //                     'distributor_id' => $distributor_id,
    //                     'hth_month' => $hth_month,
    //                     'hth_year' => $hth_year,
    //                     'depo_id' => $depo_id,
    //                     'position_id' => $position_id,
    //                     'hth_value' => $value,
    //                     'created_date' => $updated_date,
    //                     'created_by' => Auth::id(),
    //                 ]);
    //             }
    //         }

    //         return redirect()->back()->with('success', 'Data HeadCount Target berhasil diperbarui. Total Headcount Value: ' . $total_hth_value);
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Data HeadCount Target gagal diperbarui. ' . $e->getMessage());
    //     }
    // }
    public function update(Request $request)
    {
        // Validasi input form
        $request->validate(
            [
                'distributor_id' => 'required',
                'depo_id' => 'required',
            ],
            [
                'distributor_id.required' => 'Distributor harus diisi',
                'depo_id.required' => 'Depo harus diisi',
            ]
        );

        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');

        try {
            $distributor_id = $request->distributor_id;
            $depo_id = $request->depo_id;
            $hth_month = $request->hth_month;
            $hth_year = $request->hth_year;

            // Hapus data lama berdasarkan distributor_id, depo_id, hth_month, dan hth_year
            DataHeadcountTargetModel::where('distributor_id', $distributor_id)
                ->where('depo_id', $depo_id)
                ->where('hth_month', $hth_month)
                ->where('hth_year', $hth_year)
                ->delete();

            // Inisialisasi variabel untuk total hth_value
            $total_hth_value = 0;

            // Iterasi melalui setiap field yang berkaitan dengan position_id untuk menyimpan data baru
            foreach ($request->except(['_token', '_method', 'distributor_id', 'depo_id', 'hth_month', 'hth_year']) as $position_id => $value) {
                if (!empty($value)) {
                    // Menambah nilai hth_value ke dalam total
                    $total_hth_value += $value;

                    // Simpan data baru ke dalam database
                    DataHeadcountTargetModel::create([
                        'distributor_id' => $distributor_id,
                        'hth_month' => $hth_month,
                        'hth_year' => $hth_year,
                        'depo_id' => $depo_id,
                        'position_id' => $position_id,
                        'hth_value' => $value,
                        'created_date' => $created_date,
                        'created_by' => Auth::id(),
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Data berhasil diperbarui. Total Headcount Value: ' . $total_hth_value);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($distributor_id, $depo_id, $hth_month, $hth_year)
    {
        $targets = DataHeadcountTargetModel::where('distributor_id', $distributor_id)
            ->where('depo_id', $depo_id)
            ->where('hth_month', $hth_month)
            ->where('hth_year', $hth_year);

        if ($targets->exists()) {
            $targets->delete();

            return redirect()->back()->with('success', 'Semua data yang sesuai berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan.');
    }
}
