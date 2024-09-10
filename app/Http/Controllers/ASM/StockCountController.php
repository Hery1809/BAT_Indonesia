<?php

namespace App\Http\Controllers\ASM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StockCountController extends Controller
{
    //
    public function index()
    {
        return view('pages.asm.StockCount.index');
       
    }

}