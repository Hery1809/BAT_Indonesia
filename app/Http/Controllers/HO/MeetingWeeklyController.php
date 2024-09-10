<?php

namespace App\Http\Controllers\HO;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MeetingWeeklyController extends Controller
{
    public function index()
    {
        return view('pages.ho.WeeklyMeeting.index');

    }
}
