<?php

namespace App\Http\Controllers\ASM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WeeklyMeetingController extends Controller
{
    //
    public function index()
    {
        return view('pages.asm.WeeklyMeeting.index');
       
    }

}