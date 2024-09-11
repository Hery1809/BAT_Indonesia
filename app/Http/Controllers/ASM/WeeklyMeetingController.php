<?php

namespace App\Http\Controllers\ASM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DataMeetingWeeklyASMModel;
use App\Models\DataMonthModel;
use App\Models\DataStatusModel;

class WeeklyMeetingController extends Controller
{
    public function index()
    {
        // Mengambil data 
        $meetings = DataMeetingWeeklyASMModel::with(['distributor', 'depo', 'month', 'week', 'status'])->get();

         // Mengambil data bulan dari tabel 'data_month'
        $months = DataMonthModel::all();

         // Mengambil data status dari tabel 'data_status'
         $statuses = DataStatusModel::all();

        // Bulan sekarang
        $monthnow = now()->month;

        return view('pages.asm.WeeklyMeeting.index', compact('meetings', 'months', 'statuses', 'monthnow'));
       
    }

}