<?php

namespace App\Http\Controllers\MasterParameter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\dataStockLevelPolicyModel;

class StockLevelPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'no' => 1,
            'slp' => dataStockLevelPolicyModel::all(),
        ];
        return view('pages.admin.MasterParameter.stock_level_policy', $data);
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
            'slp_policy' => 'required|integer',
        ], [
            'slp_policy.required' => 'Kebijakan Stok Level wajib diisi',
            'slp_policy.integer' => 'Kebijakan Stok Level harus berupa angka',
        ]);
        try {
            dataStockLevelPolicyModel::where('slp_id', $id)->update([
                'slp_policy' => $request->slp_policy,
            ]);

            return redirect()->back()->with('success', 'Data kebijakan stok level berhasil diubah');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data kebijakan stok level gagal diubah');
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
