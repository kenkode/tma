<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelCalendarController extends Controller
{
    //
    public function index()
    {
        return view('hotels.calendar.index');
    }
}
