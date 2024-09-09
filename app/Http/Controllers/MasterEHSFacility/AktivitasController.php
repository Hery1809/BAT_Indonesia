<?php

namespace App\Http\Controllers\MasterEHSFacility;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataEhsAktivitasModel;
use App\Models\DataEhsCategoryModel;

class AktivitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($ec_name)
    {
        $category = DataEhsCategoryModel::where('ec_name', $ec_name)->firstOrFail();
        $aktivitas = DataEhsAktivitasModel::where('ec_id', $category->ec_id)->get();

        $data = [
            'category' => $category,
            'aktivitas' => $aktivitas,
            'no' => 1,
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