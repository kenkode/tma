<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    //
    public function index()
    {
    	$bookings = Booking::where('organization_id',Auth::user()->organization_id)->get();
        $organization = Organization::find(Auth::user()->organization_id);
        $total = Booking::where('organization_id',Auth::user()->organization_id)->sum('amount');
        return view('travel.bookings.index',compact('bookings','organization','total'));
    }

    public function customers()
    {
    	$customers = Booking::where('organization_id',Auth::user()->organization_id)->get();
        return view('travel.bookings.customers',compact('customers'));
    }

    public function payments()
    {
    	$payments = Booking::where('organization_id',Auth::user()->organization_id)->get();
        $organization = Organization::find(Auth::user()->organization_id);
        $total = Booking::where('organization_id',Auth::user()->organization_id)->sum('amount');
        return view('travel.bookings.payments',compact('payments','organization','total'));
    }
}
