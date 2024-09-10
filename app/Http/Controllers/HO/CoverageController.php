<?php

namespace App\Http\Controllers\HO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoverageController extends Controller
{
    public function index()
    {
        // Mengarahkan ke view coverage/index.blade.php
        return view('pages.ho.Coverage.index');
    }
}
