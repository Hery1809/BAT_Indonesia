<?php

namespace App\Http\Controllers\ho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('pages.ho.Dashboard.index');
    }

}