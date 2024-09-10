<?php

namespace App\Http\Controllers\ASM\EHSFacility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    //
    public function index()
    {
        return view('pages.asm.EHSFacility.Sales.index');
    }

}