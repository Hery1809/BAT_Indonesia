<?php

namespace App\Http\Controllers\HO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DailyOperationsController extends Controller
{
    public function index()
    {
        return view('pages.ho.DailyOperations.index');
    }
}
