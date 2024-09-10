<?php

namespace App\Http\Controllers\ASM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HeadCountController extends Controller
{
    //
    public function index()
    {
        return view('pages.asm.HeadCount.index');
    }

}