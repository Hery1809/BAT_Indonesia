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

        // Ambil nilai dari input filter bulan dan tahun
        $month = $request->input('month');
        $year = $request->input('year');

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

        $data = [
            'columnCount' => $columnCount,
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
        // dd($request->all());
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
            // dd($data);

            return redirect()->back()->with('success', 'Data HeadCount Target berhasil ditambahkan. Total Headcount Value: ' . $total_hth_value);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data HeadCount Target gagal ditambahkan', $e->getMessage());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
