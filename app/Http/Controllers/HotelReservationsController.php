<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelReservationsController extends Controller
{
    //
    public function index()
    {
        return view('hotels.reservations.index');
    }
}
