<?php

namespace App\Http\Controllers\HOD;

use Illuminate\Http\Request;
use App\Models\DataMonthModel;
use App\Http\Controllers\Controller;
use App\Models\DataDistributorDepoModel;

class StockLevelController extends Controller
{
    //
    public function index(Request $request)
    {
        $month = DataMonthModel::all();
        $monthnow = date('m');

        $perPage = $request->input('perPage', 10);
        $query = DataDistributorDepoModel::query();

        // Lakukan join dengan tabel depo untuk mendapatkan depo_name
        $query->join('data_depo', 'data_distributor_depo.depo_id', '=', 'data_depo.depo_id')
              ->join('data_distributor', 'data_distributor_depo.distributor_id', '=', 'data_distributor.distributor_id')                     
            ->select('data_distributor_depo.*', 'data_depo.depo_name'); // Pilih field yang diperlukan

        // Pencarian berdasarkan nama depo atau distributor
        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('data_depo.depo_name', 'like', "%$search%")
                ->orWhere('data_distributor.distributor_name', 'like', "%$search%");
            });
        }

        // Tambahkan orderBy untuk mengurutkan berdasarkan depo_name
        $query->orderBy('data_depo.depo_name', 'asc');

        // Paginate hasil
        $depos = $query->paginate($perPage);

        // Kirim data ke view
        $data = [
            'depos' => $depos,
            'i' => ($depos->currentPage() - 1) * $depos->perPage() + 1,
            'search' => $search,
            'month' => $month,
            'monthnow' => $monthnow
        ];

        return view('pages.hod.stocklevel.index', $data);
    }


    public function report(Request $request)
    {
        $month = DataMonthModel::all();
        $monthnow = date('m');

        $perPage = $request->input('perPage', 10);
        $query = DataDistributorDepoModel::query();

        // Lakukan join dengan tabel depo untuk mendapatkan depo_name
        $query->join('data_depo', 'data_distributor_depo.depo_id', '=', 'data_depo.depo_id')
              ->join('data_distributor', 'data_distributor_depo.distributor_id', '=', 'data_distributor.distributor_id')                     
            ->select('data_distributor_depo.*', 'data_depo.depo_name'); // Pilih field yang diperlukan

        // Pencarian berdasarkan nama depo atau distributor
        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('data_depo.depo_name', 'like', "%$search%")
                ->orWhere('data_distributor.distributor_name', 'like', "%$search%");
            });
        }

        // Tambahkan orderBy untuk mengurutkan berdasarkan depo_name
        $query->orderBy('data_depo.depo_name', 'asc');

        // Paginate hasil
        $depos = $query->paginate($perPage);

        // Kirim data ke view
        $data = [
            'depos' => $depos,
            'i' => ($depos->currentPage() - 1) * $depos->perPage() + 1,
            'search' => $search,
            'month' => $month,
            'monthnow' => $monthnow
        ];

        return view('pages.hod.stocklevel.report', $data);
    }
}