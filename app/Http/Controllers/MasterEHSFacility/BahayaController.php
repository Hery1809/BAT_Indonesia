<?php

namespace App\Http\Controllers\MasterEHSFacility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BahayaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($menu)
    {
        dd('Bahaya' . '->' . $menu);
        $data = [];

        switch ($menu) {
            case 'warehouse':
                $data = [
                    'title' => 'Warehouse',
                    'content' => 'Data warehouse yang ingin ditampilkan',
                    // Bisa fetch dari database juga
                ];
                break;

            case 'inventory':
                $data = [
                    'title' => 'Inventory',
                    'content' => 'Data inventory yang ingin ditampilkan',
                ];
                break;

                // Tambahkan case lain sesuai kebutuhan
            default:
                $data = [
                    'title' => 'Dashboard',
                    'content' => 'Selamat datang di dashboard',
                ];
                break;
        }

        return view('pages.admin.MasterEHSFacility.bahaya', compact('data'));
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