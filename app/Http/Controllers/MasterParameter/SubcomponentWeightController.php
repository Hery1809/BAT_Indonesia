<?php

namespace App\Http\Controllers\MasterParameter;

use Illuminate\Http\Request;
use App\Models\DataMonthModel;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DataSubcomponentWeightModel;

class SubcomponentWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $query = DataSubcomponentWeightModel::orderBy('created_date', 'asc');

        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('sw_month', 'like', "%$search%")
                    ->orWhere('sw_year', 'like', "%$search%")
                    ->orWhere('sw_coverage', 'like', "%$search%")
                    ->orWhere('sw_hc', 'like', "%$search%")
                    ->orWhere('sw_payment', 'like', "%$search%")
                    ->orWhere('sw_ffis', 'like', "%$search%")
                    ->orWhere('sw_mom', 'like', "%$search%")
                    ->orWhere('sw_daily_ops', 'like', "%$search%")
                    ->orWhere('sw_ehs', 'like', "%$search%")
                    ->orWhere('sw_training', 'like', "%$search%")
                    ->orWhere('sw_stock_level', 'like', "%$search%")
                    ->orWhere('sw_stock_count', 'like', "%$search%")
                    ->orWhere('sw_product_handling', 'like', "%$search%")
                    ->orWhere('sw_stock_rotation', 'like', "%$search%")
                    ->orWhere('sw_sell_out', 'like', "%$search%")
                    ->orWhere('created_date', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $sWeights = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($sWeightChunk) use ($sWeights, &$currentPage) {
                foreach ($sWeightChunk as $sWeight) {
                    $sWeight->setAttribute('i', ($currentPage - 1) * $sWeightChunk->perPage() + 1);
                    $sWeights->push($sWeight);
                    $currentPage++;
                }
            });
        } else {
            $sWeights = $query->paginate($perPage);
        }

        $data = [
            'sWeights' => $sWeights,
            'i' => ($sWeights->currentPage() - 1) * $sWeights->perPage() + 1,
            'search' => $search,
            'month' => DataMonthModel::all(),
        ];
        return view('pages.admin.MasterParameter.subcomponent_weight', $data);
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
            'sw_month' => 'required|string|max:2',
            'sw_year' => 'required|string|max:5',
            'sw_coverage' => 'required|integer',
            'sw_hc' => 'required|integer',
            'sw_payment' => 'required|integer',
            'sw_ffis' => 'required|integer',
            'sw_mom' => 'required|integer',
            'sw_daily_ops' => 'required|integer',
            'sw_ehs' => 'required|integer',
            'sw_training' => 'required|integer',
            'sw_stock_level' => 'required|integer',
            'sw_stock_count' => 'required|integer',
            'sw_product_handling' => 'required|integer',
            'sw_stock_rotation' => 'required|integer',
            'sw_sell_out' => 'required|integer',
        ], [
            'sw_month.required' => 'Bulan wajib diisi',
            'sw_month.max' => 'Bulan maksimal 2 karakter',
            'sw_year.required' => 'Tahun wajib diisi',
            'sw_year.max' => 'Tahun maksimal 5 karakter',
            'sw_coverage.required' => 'Coverage wajib diisi',
            'sw_hc.required' => 'HC wajib diisi',
            'sw_payment.required' => 'Payment wajib diisi',
            'sw_ffis.required' => 'FFIS wajib diisi',
            'sw_mom.required' => 'MOM wajib diisi',
            'sw_daily_ops.required' => 'Daily Ops wajib diisi',
            'sw_ehs.required' => 'EHS wajib diisi',
            'sw_training.required' => 'Training wajib diisi',
            'sw_stock_level.required' => 'Stock Level wajib diisi',
            'sw_stock_count.required' => 'Stock Count wajib diisi',
            'sw_product_handling.required' => 'Product Handling wajib diisi',
            'sw_stock_rotation.required' => 'Stock Rotation wajib diisi',
            'sw_sell_out.required' => 'Sell Out wajib diisi',
        ]);

        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataSubcomponentWeightModel::create([
                'sw_month' => $request->sw_month,
                'sw_year' => $request->sw_year,
                'sw_coverage' => $request->sw_coverage,
                'sw_hc' => $request->sw_hc,
                'sw_payment' => $request->sw_payment,
                'sw_ffis' => $request->sw_ffis,
                'sw_mom' => $request->sw_mom,
                'sw_daily_ops' => $request->sw_daily_ops,
                'sw_ehs' => $request->sw_ehs,
                'sw_training' => $request->sw_training,
                'sw_stock_level' => $request->sw_stock_level,
                'sw_stock_count' => $request->sw_stock_count,
                'sw_product_handling' => $request->sw_product_handling,
                'sw_stock_rotation' => $request->sw_stock_rotation,
                'sw_sell_out' => $request->sw_sell_out,
                'created_date' => $created_date,
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data SubComponent Weight berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data SubComponent Weight gagal ditambahkan');
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
            'sw_month' => 'required|string|max:2',
            'sw_year' => 'required|string|max:5',
            'sw_coverage' => 'required|integer',
            'sw_hc' => 'required|integer',
            'sw_payment' => 'required|integer',
            'sw_ffis' => 'required|integer',
            'sw_mom' => 'required|integer',
            'sw_daily_ops' => 'required|integer',
            'sw_ehs' => 'required|integer',
            'sw_training' => 'required|integer',
            'sw_stock_level' => 'required|integer',
            'sw_stock_count' => 'required|integer',
            'sw_product_handling' => 'required|integer',
            'sw_stock_rotation' => 'required|integer',
            'sw_sell_out' => 'required|integer',
        ], [
            'sw_month.required' => 'Bulan wajib diisi',
            'sw_month.max' => 'Bulan maksimal 2 karakter',
            'sw_year.required' => 'Tahun wajib diisi',
            'sw_year.max' => 'Tahun maksimal 5 karakter',
            'sw_coverage.required' => 'Coverage wajib diisi',
            'sw_hc.required' => 'HC wajib diisi',
            'sw_payment.required' => 'Payment wajib diisi',
            'sw_ffis.required' => 'FFIS wajib diisi',
            'sw_mom.required' => 'MOM wajib diisi',
            'sw_daily_ops.required' => 'Daily Ops wajib diisi',
            'sw_ehs.required' => 'EHS wajib diisi',
            'sw_training.required' => 'Training wajib diisi',
            'sw_stock_level.required' => 'Stock Level wajib diisi',
            'sw_stock_count.required' => 'Stock Count wajib diisi',
            'sw_product_handling.required' => 'Product Handling wajib diisi',
            'sw_stock_rotation.required' => 'Stock Rotation wajib diisi',
            'sw_sell_out.required' => 'Sell Out wajib diisi',
        ]);

        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataSubcomponentWeightModel::where('sw_id', $id)->update([
                'sw_month' => $request->sw_month,
                'sw_year' => $request->sw_year,
                'sw_coverage' => $request->sw_coverage,
                'sw_hc' => $request->sw_hc,
                'sw_payment' => $request->sw_payment,
                'sw_ffis' => $request->sw_ffis,
                'sw_mom' => $request->sw_mom,
                'sw_daily_ops' => $request->sw_daily_ops,
                'sw_ehs' => $request->sw_ehs,
                'sw_training' => $request->sw_training,
                'sw_stock_level' => $request->sw_stock_level,
                'sw_stock_count' => $request->sw_stock_count,
                'sw_product_handling' => $request->sw_product_handling,
                'sw_stock_rotation' => $request->sw_stock_rotation,
                'sw_sell_out' => $request->sw_sell_out,
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
        try {
            $subComponent = DataSubcomponentWeightModel::where('sw_id', $id);
            $subComponent->delete();
            return redirect()->back()->with('success', 'Data SubComponent berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data SubComponent gagal dihapus');
        }
    }
}