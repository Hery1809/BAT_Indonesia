<?php

namespace App\Http\Controllers\HO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ARPaymentController extends Controller
{
    public function index()
    {
        return view('pages.ho.ARPayment.index');
    }
}
