<?php

namespace App\Http\Controllers\HO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DataWeeklyMeetingHOModel;
use App\Models\DataMonthModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\MeetingWeeklyExport;


class MeetingWeeklyController extends Controller
{
    public function index(Request $request)
    {
        
        $month = DataMonthModel::all();
        $monthnow = date('m');
        $yearnow = date('Y');

        
        $selectedMonth = $request->input('month', $monthnow);
        $selectedYear = $request->input('year', $yearnow);

        
        $search = $request->input('search', '');
        $perPage = $request->input('perPage', 5); 


        $data = DataWeeklyMeetingHOModel::with('distributor', 'depo')
            ->where('mw_month', $selectedMonth)
            ->where('mw_year', $selectedYear)
            ->when($search, function ($query) use ($search) {
                $query->whereHas('distributor', function ($q) use ($search) {
                    $q->where('distributor_name', 'like', "%$search%");
                })->orWhereHas('depo', function ($q) use ($search) {
                    $q->where('depo_name', 'like', "%$search%");
                });
            })
            ->paginate($perPage)
            ->appends(request()->except('page'));

        
        return view('pages.ho.WeeklyMeeting.index', compact('data', 'month', 'monthnow', 'yearnow', 'selectedMonth', 'selectedYear', 'search'));
    }



    public function exportExcel(Request $request)
    {
    
        $month = $request->input('month');
        $year = $request->input('year');
        $search = $request->input('search');
        $perPage = $request->input('perPage', 10); 

        $data = DataWeeklyMeetingHOModel::with('distributor', 'depo')
            ->when($month, function ($query) use ($month) {
                return $query->where('mw_month', $month);
            })
            ->when($year, function ($query) use ($year) {
                return $query->where('mw_year', $year);
            })
            ->when($search, function ($query) use ($search) {
                return $query->whereHas('distributor', function ($q) use ($search) {
                    $q->where('distributor_name', 'like', '%' . $search . '%');
                })->orWhereHas('depo', function ($q) use ($search) {
                    $q->where('depo_name', 'like', '%' . $search . '%');
                });
            })
            ->limit($perPage) 
            ->get(); 

        return Excel::download(new MeetingWeeklyExport($data), 'ActivityRegularMeeting.xlsx');
    }
}
