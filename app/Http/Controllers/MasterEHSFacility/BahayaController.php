<?php

namespace App\Http\Controllers\MasterEHSFacility;

use Illuminate\Http\Request;
use App\Models\DataEhsBahayaModel;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use App\Models\DataEhsCategoryModel;

class BahayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request, $ec_name)
    // {
    //     $data = [
    //         'category' => DataEhsCategoryModel::where('ec_name', $ec_name)->firstOrFail(),
    //         'bahayas' => DataEhsBahayaModel::where('ec_id', 1)->get(),
    //         // 'no' => 1,
    //         'no' => 1,
    //     ];

    //     return view('pages.admin.MasterEHSFacility.bahaya', compact('data'));
    // }
    public function index(Request $request, $ec_name)
    {
        $category = DataEhsCategoryModel::where('ec_name', $ec_name)->firstOrFail();
        $bahayas = DataEhsBahayaModel::where('ec_id', 1)->get();

        return view('pages.admin.MasterEHSFacility.bahaya', compact('category', 'bahayas'));
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
