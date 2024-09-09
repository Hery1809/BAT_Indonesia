<?php

namespace App\Http\Controllers\MasterParameter;

use Illuminate\Http\Request;
use App\Models\DataMonthModel;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\DataMaincomponentWeightModel;

class MaincomponentWeightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('perPage', 5);

        $query = DataMaincomponentWeightModel::orderBy('created_date', 'asc');

        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('mw_month', 'like', "%$search%")
                    ->orWhere('mw_year', 'like', "%$search%")
                    ->orWhere('mw_coverage', 'like', "%$search%")
                    ->orWhere('mw_hc', 'like', "%$search%")
                    ->orWhere('mw_payment', 'like', "%$search%")
                    ->orWhere('mw_ffis', 'like', "%$search%")
                    ->orWhere('mw_operation', 'like', "%$search%")
                    ->orWhere('mw_stock', 'like', "%$search%")
                    ->orWhere('created_date', 'like', "%$search%");
            });
        }

        if ($perPage == 'Semua') {
            $chunkSize = 100;
            $maincomponents = new Collection();
            $currentPage = 1;

            $query->chunk($chunkSize, function ($maincomponentChunk) use ($maincomponents, &$currentPage) {
                foreach ($maincomponentChunk as $maincomponent) {
                    $maincomponent->setAttribute('i', ($currentPage - 1) * $maincomponentChunk->perPage() + 1);
                    $maincomponents->push($maincomponent);
                    $currentPage++;
                }
            });
        } else {
            $maincomponents = $query->paginate($perPage);
        }

        $data = [
            'maincomponents' => $maincomponents,
            'month' => DataMonthModel::all(),
            'i' => ($maincomponents->currentPage() - 1) * $maincomponents->perPage() + 1,
            'search' => $search,
        ];
        return view('pages.admin.MasterParameter.maincomponent_weight', $data);
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
            'mw_month' => 'required|string|max:2',
            'mw_year' => 'required|string|max:5',
            'mw_coverage' => 'required|integer',
            'mw_hc' => 'required|integer',
            'mw_payment' => 'required|integer',
            'mw_ffis' => 'required|integer',
            'mw_operation' => 'required|integer',
            'mw_stock' => 'required|integer',
        ], [
            'mw_month.required' => 'Bulan wajib diisi',
            'mw_month.max' => 'Bulan maksimal 2 karakter',
            'mw_year.required' => 'Tahun wajib diisi',
            'mw_year.max' => 'Tahun maksimal 5 karakter',
            'mw_coverage.required' => 'Coverage wajib diisi',
            'mw_coverage.integer' => 'Coverage harus berupa angka',
            'mw_hc.required' => 'HC wajib diisi',
            'mw_hc.integer' => 'HC harus berupa angka',
            'mw_payment.required' => 'Payment wajib diisi',
            'mw_payment.integer' => 'Payment harus berupa angka',
            'mw_ffis.required' => 'FFIS wajib diisi',
            'mw_ffis.integer' => 'FFIS harus berupa angka',
            'mw_operation.required' => 'Operation wajib diisi',
            'mw_operation.integer' => 'Operation harus berupa angka',
            'mw_stock.required' => 'Stock wajib diisi',
            'mw_stock.integer' => 'Stock harus berupa angka',
        ]);

        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataMaincomponentWeightModel::create([
                'mw_month' => $request->mw_month,
                'mw_year' => $request->mw_year,
                'mw_coverage' => $request->mw_coverage,
                'mw_hc' => $request->mw_hc,
                'mw_payment' => $request->mw_payment,
                'mw_ffis' => $request->mw_ffis,
                'mw_operation' => $request->mw_operation,
                'mw_stock' => $request->mw_stock,
                'created_date' => $created_date,
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data mainComponent Weight berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data mainComponent Weight gagal ditambahkan');
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
            'mw_month' => 'required|string|max:2',
            'mw_year' => 'required|string|max:5',
            'mw_coverage' => 'required|integer',
            'mw_hc' => 'required|integer',
            'mw_payment' => 'required|integer',
            'mw_ffis' => 'required|integer',
            'mw_operation' => 'required|integer',
            'mw_stock' => 'required|integer',
        ], [
            'mw_month.required' => 'Bulan wajib diisi',
            'mw_month.max' => 'Bulan maksimal 2 karakter',
            'mw_year.required' => 'Tahun wajib diisi',
            'mw_year.max' => 'Tahun maksimal 5 karakter',
            'mw_coverage.required' => 'Coverage wajib diisi',
            'mw_coverage.integer' => 'Coverage harus berupa angka',
            'mw_hc.required' => 'HC wajib diisi',
            'mw_hc.integer' => 'HC harus berupa angka',
            'mw_payment.required' => 'Payment wajib diisi',
            'mw_payment.integer' => 'Payment harus berupa angka',
            'mw_ffis.required' => 'FFIS wajib diisi',
            'mw_ffis.integer' => 'FFIS harus berupa angka',
            'mw_operation.required' => 'Operation wajib diisi',
            'mw_operation.integer' => 'Operation harus berupa angka',
            'mw_stock.required' => 'Stock wajib diisi',
            'mw_stock.integer' => 'Stock harus berupa angka',
        ]);

        $created_date = \Carbon\Carbon::now()->format('Y-m-d H:i:s');
        try {
            DataMaincomponentWeightModel::where('mw_id', $id)->update([
                'mw_month' => $request->mw_month,
                'mw_year' => $request->mw_year,
                'mw_coverage' => $request->mw_coverage,
                'mw_hc' => $request->mw_hc,
                'mw_payment' => $request->mw_payment,
                'mw_ffis' => $request->mw_ffis,
                'mw_operation' => $request->mw_operation,
                'mw_stock' => $request->mw_stock,
                'created_date' => $created_date,
                'created_by' => Auth::id(),
            ]);

            return redirect()->back()->with('success', 'Data mainComponent Weight berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data mainComponent Weight gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $mainComponent = DataMaincomponentWeightModel::where('mw_id', $id);
            $mainComponent->delete();
            return redirect()->back()->with('success', 'Data mainComponent Weight berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Data mainComponent Weight gagal dihapus');
        }
    }
}