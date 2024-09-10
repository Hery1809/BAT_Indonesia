<?php

namespace App\Http\Controllers\HOD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('pages.hod.index');
    }

}