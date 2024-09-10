<?php

namespace App\Http\Controllers\ASM\EHSFacility;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NonRoutineController extends Controller
{
    //
    public function index()
    {
        return view('pages.asm.EHSFacility.NonRoutine.index');
    }

}