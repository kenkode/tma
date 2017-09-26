<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Route;
use App\Organization;
use App\Currency;
use App\Vehicle;
use App\Schedule;
use App\Paymentschedule;
use Illuminate\Support\Facades\Auth;

class PaymentsController extends Controller
{
    //
    public function index()
    {
    	$payments = Payment::where('organization_id',Auth::user()->organization_id)->get();
        $vehicles = Vehicle::where('organization_id',Auth::user()->organization_id)->get();
        $organization = Organization::find(Auth::user()->organization_id);
        $destinations = Route::where('organization_id',Auth::user()->organization_id)->get();
        if(Auth::user()->type == 'Travel'){
        return view('travel.payments.index',compact('payments','destinations','vehicles','organization'));
        }else if(Auth::user()->type == 'Taxi'){
        return view('taxi.payments.index',compact('payments','destinations','vehicles','organization'));
        }else if(Auth::user()->type == 'SGR'){
        return view('sgr.payments.index',compact('payments','destinations','vehicles','organization'));
        }else if(Auth::user()->type == 'Airline'){
        return view('airlines.payments.index',compact('payments','destinations','vehicles','organization'));
        }
    }

    public function showrecord()
    {
        $display = "";
        $payments = Payment::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($payments as $payment){
        $display .="
        <tr class='del$payment->id'>

          <td> $i </td>
          <td>".Payment::getVehicle($payment->vehicle_id)."</td>";
          if(Auth::user()->type != 'Taxi'){
          $display .="<td>".Schedule::getDestination($payment->origin_id)->name."</td>
          <td>".Schedule::getDestination($payment->destination_id)->name."</td>
          <td>".number_format($payment->firstclass,2)."</td>";
          }
          
          if(Auth::user()->type == 'Airline'){
          $display .="<td>".number_format($payment->business,2)."</td>";
          $display .="<td>".$payment->children."</td>";
          }
          $display .="<td>".number_format($payment->economic,2)."</td>";  
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>";

          if(Auth::user()->type == 'Airline'){
          
          $display .="<ul class='dropdown-menu' role='menu'>
                    <li><a data-toggle='modal' href='#modal-view' data-name='".Payment::getVehicle($payment->vehicle_id)."' data-id='$payment->id' data-vip='".number_format($payment->firstclass,2)."' data-business='".number_format($payment->business,2)."' data-children='$payment->children' data-economic='".number_format($payment->economic,2)."' data-origin='".Schedule::getDestination($payment->origin_id)->name."' data-destination='".Schedule::getDestination($payment->destination_id)->name."' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-name='$payment->vehicle_id' data-id='$payment->id' data-business='".number_format($payment->business,2)."' data-children='$payment->children' data-origin='$payment->origin_id' data-destination='$payment->destination_id' data-vip='".number_format($payment->firstclass,2)."' data-economic='".number_format($payment->economic,2)."' class='edit'>Update</a></li>";
         }else if(Auth::user()->type == 'Taxi'){
          $display .="<ul class='dropdown-menu' role='menu'>
                    <li><a data-toggle='modal' href='#modal-view' data-name='".Payment::getVehicle($payment->vehicle_id)."' data-id='$payment->id' data-economic='".number_format($payment->economic,2)."' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-name='$payment->vehicle_id' data-id='$payment->id' data-economic='".number_format($payment->economic,2)."' class='edit'>Update</a></li>";
         }else{
          $display .="<ul class='dropdown-menu' role='menu'>
                    <li><a data-toggle='modal' href='#modal-view' data-name='".Payment::getVehicle($payment->vehicle_id)."' data-id='$payment->id' data-vip='".number_format($payment->firstclass,2)."' data-economic='".number_format($payment->economic,2)."' data-origin='".Schedule::getDestination($payment->origin_id)->name."' data-destination='".Schedule::getDestination($payment->destination_id)->name."' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-name='$payment->vehicle_id' data-id='$payment->id' data-origin='$payment->origin_id' data-destination='$payment->destination_id' data-vip='".number_format($payment->firstclass,2)."' data-economic='".number_format($payment->economic,2)."' class='edit'>Update</a></li>";
         }

          $display .="<li><a id='$payment->id' class='delete'>
                    <form id='delform'>".
                    csrf_field()."
                    Delete
                    </form>
                    </a>
                    </li>
                    
                  </ul>
              </div>

                    </td>
        </tr>
        ";
        $i++;
         
          } 
         
        return $display;
        exit();
    }

    public function store(Request $request)
    {
        $payment = new Payment;
        $payment->vehicle_id = $request->vid;
        $payment->origin_id = $request->origin;
        $payment->destination_id = $request->destination;
        if(Auth::user()->type != 'Taxi'){
        if($request->vip == null || $request->vip == ''){
        $payment->firstclass = 0.00;
        }else{
        $payment->firstclass = str_replace(',', '', $request->vip);
        }
        }

        if(Auth::user()->type == 'Airline'){
        $payment->business = str_replace(',', '', $request->business);
        $payment->children = $request->children;
        }

        $payment->economic = str_replace(',', '', $request->economic);
        $payment->type = Auth::user()->type;
        $payment->organization_id = Auth::user()->organization_id;

        $payment->save();
        return 1;
    }

    public function update(Request $request)
    {
        $payment = Payment::find($request->id);
        $payment->vehicle_id = $request->vid;
        if(Auth::user()->type != 'Taxi'){
        $payment->firstclass = str_replace(',', '', $request->vip);
        }
        if(Auth::user()->type == 'Airline'){
        $payment->business = str_replace(',', '', $request->business);
        $payment->children = $request->children;
        }
        $payment->economic = str_replace(',', '', $request->economic);
        $payment->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        
        $payment = Payment::find($request->id);
        $payment->delete();
        
       
    }
}
