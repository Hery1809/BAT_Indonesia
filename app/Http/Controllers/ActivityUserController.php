<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataMonthModel;
use App\Http\Controllers\Controller;
use App\Models\DataActivityUserModel;

class ActivityUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    
    {
        
        $monthnow = date('m');
        $yearnow = date('Y');       

        
        $perPage = $request->input('perPage', 10);
        $query = DataActivityUserModel::query();

        // Lakukan join dengan tabel depo untuk mendapatkan depo_name
        $query->join('data_user', 'data_logs.user_id', '=', 'data_user.user_id')
            ->select('data_logs.*', 'data_user.user_name'); // Pilih field yang diperlukan

        

        // Pencarian berdasarkan nama depo atau distributor
        $search = $request->input('search') ?? '';
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('data_user.user_name', 'like', "%$search%");
                $q->orWhere('data_user.user_email', 'like', "%$search%"); 
            
            });
        }

        if ($request->month) {
            $query->whereMonth('data_logs.created_date', $request->month)
                ->whereYear('data_logs.created_date', $request->year);
        } else {
            $query->whereMonth('data_logs.created_date', $monthnow)
                ->whereYear('data_logs.created_date', $yearnow);
        }

        
        // Tambahkan orderBy untuk mengurutkan berdasarkan depo_name
        $query->orderBy('data_logs.created_date', 'asc');

        // Paginate hasil
        $activity = $query->paginate($perPage);
        $month = DataMonthModel::all();

        // Kirim data ke view
        $data = [
            'activity' => $activity,
            'search' => $search,
            'month' => $month,
            'monthnow' => $monthnow
        ];

        return view('pages.admin.ActivityUser.index', $data);
   
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