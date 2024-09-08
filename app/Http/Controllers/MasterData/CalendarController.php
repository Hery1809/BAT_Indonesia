<?php

namespace App\Http\Controllers\MasterData;

use Illuminate\Http\Request;
use App\Models\DataMonthModel;
use App\Models\DataCalendarModel;
use App\Http\Controllers\Controller;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil tahun yang unik dari tabel data_calendar
        $years = DataCalendarModel::select('c_year')->distinct()->orderBy('c_year', 'asc')->get();

        // Ambil tahun dari request (untuk filter)
        $selectedYear = $request->input('year', date('Y'));

        $months = DataMonthModel::all();

        // Mengambil data kalender dengan join dan urutkan berdasarkan month_int
        $calendar = DataCalendarModel::join('data_month', 'data_calendar.c_month', '=', 'data_month.month_int')
            ->select('data_calendar.*', 'data_month.month_var')
            ->where('data_calendar.c_year', $selectedYear)
            ->orderBy('data_month.month_int')
            ->get();

        $selectedYear = $request->input('year', date('Y'));

        $data = [
            'no' => 1,
            'months' => $months,
            'calendar' => $calendar,
            'years' => $years,
            'selectedYear' => $selectedYear,
        ];
        return view('pages.admin.MasterData.calendar', $data);
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
    public function updatedata(Request $request)
    {
        // Validasi input
        $request->validate([
            'calendar_id.*' => 'required',
            'c_start_week.*' => 'required|integer',
            'c_end_week.*' => 'required|integer',
            'c_number_week.*' => 'required|integer',
            'c_start_date.*' => 'required|date',
            'c_end_date.*' => 'required|date',
        ]);

        // Ambil data dari request
        $calendarIds = $request->input('calendar_id');
        $startWeeks = $request->input('c_start_week');
        $endWeeks = $request->input('c_end_week');
        $numberWeeks = $request->input('c_number_week');
        $startDates = $request->input('c_start_date');
        $endDates = $request->input('c_end_date');

        // Loop melalui data untuk update
        foreach ($calendarIds as $index => $calendarId) {
            $calendar = DataCalendarModel::find($calendarId);

            if ($calendar) {
                $calendar->c_start_week = $startWeeks[$index];
                $calendar->c_end_week = $endWeeks[$index];
                $calendar->c_number_week = $numberWeeks[$index];
                $calendar->c_start_date = $startDates[$index];
                $calendar->c_end_date = $endDates[$index];
                $calendar->save();
            }
        }

        return redirect()->route('calendar.index')->with('success', 'Calendar data updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
