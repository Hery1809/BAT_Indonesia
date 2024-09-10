<?php

namespace App\Http\Controllers\ASM\EHSFacility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('pages.asm.EHSFacility.Admin.index');
    }

}