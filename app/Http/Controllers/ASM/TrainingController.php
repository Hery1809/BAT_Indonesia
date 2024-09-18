<?php

namespace App\Http\Controllers\ASM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataTrainingModel;
use App\Models\DataMonthModel;
use App\Models\DataStatusModel;

class TrainingController extends Controller
{
    public function index(Request $request)
    {
        // Ambil nilai untuk pagination, default 5
        $perPage = $request->input('perPage', 5);

        // Query utama untuk mengambil data
        $query = DataTrainingModel::with(['distributor', 'depo', 'month', 'status'])
            ->orderBy('t_date', 'asc'); // Urutkan berdasarkan tanggal

        // Filter pencarian
        $search = $request->input('search', '');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('distributor', function ($q) use ($search) {
                    $q->where('distributor_name', 'like', "%$search%");
                })
                ->orWhereHas('depo', function ($q) use ($search) {
                    $q->where('depo_name', 'like', "%$search%");
                })
                ->orWhereHas('status', function ($q) use ($search) {
                    $q->where('status_name', 'like', "%$search%");
                });
            });
        }

        

        // Filter berdasarkan status, bulan, dan tahun
        $status = $request->input('status');
        $month = $request->input('month');
        $year = $request->input('year');

        if ($status && $status != 4) {
            $query->whereHas('status', function ($q) use ($status) {
                $q->where('status_id', $status);
            });
        }

        if ($month) {
            $query->where('t_month', $month);
        }

        if ($year) {
            $query->where('t_year', $year);
        }

        // Ambil data dengan pagination atau tanpa pagination
        if ($perPage == 'Semua') {
            $dataTrainings = $query->get(); // Ambil semua data tanpa pagination
        } else {
            $dataTrainings = $query->paginate($perPage); // Paginate data
        }

        // Ambil data dengan pagination
        // $dataTrainings = $query->paginate($perPage);

        // Ambil data bulan dan status dari tabel terkait
        $months = DataMonthModel::all();
        $statuses = DataStatusModel::all();

        // Bulan sekarang
        $monthnow = now()->month;

        return view('pages.asm.Training.index', compact('dataTrainings', 'months', 'statuses', 'monthnow', 'search'));
    }
} 
