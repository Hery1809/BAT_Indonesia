<?php

namespace App\Http\Controllers\ASM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataMeetingWeeklyModel;
use App\Models\DataMonthModel;
use App\Models\DataStatusModel;
use Illuminate\Support\Collection;

class WeeklyMeetingController extends Controller
{
    public function index(Request $request)
    {
        // jumlah entri per halaman
        $perPage = $request->input('perPage', 10);

        // Ambil data dari request
        $status = $request->input('status');
        $month = $request->input('month', now()->month);
        $year = $request->input('year', now()->year);

        $query = DataMeetingWeeklyModel::with(['distributor', 'depo', 'month', 'week', 'status']);

        if ($status != 4) {
            $query->whereHas('status', function ($q) use ($status) {
                $q->where('status_id', $status);
            });
        }

        // Filter berdasarkan mw_month dan mw_year
        if ($month) {
            $query->where('mw_month', $month);
        }

        if ($year) {
            $query->where('mw_year', $year);
        }

        // Pencarian
        $search = $request->input('search', '');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereHas('distributor', function ($q) use ($search) {
                    $q->where('distributor_name', 'like', "%$search%");
                })
                    ->orWhereHas('depo', function ($q) use ($search) {
                        $q->where('depo_name', 'like', "%$search%");
                    })
                    ->orWhereHas('week', function ($q) use ($search) {
                        $q->where('week_var', 'like', "%$search%");
                    })
                    ->orWhereHas('status', function ($q) use ($search) {
                        $q->where('status_name', 'like', "%$search%");
                    });
            });
        }

        // pagination
        if ($perPage == 'Semua') {
            $meetings = $query->get();
        } else {
            $meetings = $query->paginate($perPage);
        }

        $months = DataMonthModel::all();
        $statuses = DataStatusModel::all();
        $monthnow = now()->month;

        return view('pages.asm.WeeklyMeeting.index', compact('meetings', 'months', 'statuses', 'monthnow', 'search'));
    }

}