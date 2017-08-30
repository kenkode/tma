<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Vehicle;
use App\Schedule;
use App\Route;
use Illuminate\Support\Facades\Auth;

class SchedulesController extends Controller
{
    //
    public function index()
    {
    	$schedules = Schedule::where('organization_id',Auth::user()->organization_id)->get();
        $payments = Payment::where('organization_id',Auth::user()->organization_id)->get();
        $vehicles = Vehicle::where('organization_id',Auth::user()->organization_id)->get();
        $destinations = Route::where('organization_id',Auth::user()->organization_id)->get();
        if(Auth::user()->type == 'Travel'){
        return view('travel.schedules.index',compact('schedules','payments','vehicles','destinations'));
        }else if(Auth::user()->type == 'SGR'){
        return view('sgr.schedules.index',compact('schedules','payments','vehicles','destinations'));
        }else if(Auth::user()->type == 'Airline'){
        return view('airlines.schedules.index',compact('schedules','payments','vehicles','destinations'));
        }
    }

    public function showrecord()
    {
        $display = "";
        $schedules = Schedule::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($schedules as $schedule){
        $display .="
        <tr class='del$schedule->id'>

          <td> $i </td>
          <td>".Schedule::getVehicle($schedule->vehicle_id)->regno.' '.Schedule::getVehicle($schedule->vehicle_id)->name."</td>
          <td>".Schedule::getDestination($schedule->origin_id)->name."</td>
          <td>".Schedule::getDestination($schedule->destination_id)->name."</td>";
          
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>";

           if(Auth::user()->type == 'Airline'){       
          
           $display .="<ul class='dropdown-menu' role='menu'>
                    <li><a data-toggle='modal' href='#modal-view' data-id='$schedule->id' data-arrival='$schedule->arrival' data-name='".Schedule::getVehicle($schedule->vehicle_id)->regno.' '.Schedule::getVehicle($schedule->vehicle_id)->vehiclename->name."' data-departure='$schedule->departure' data-origin='".Schedule::getDestination($schedule->origin_id)->name."' data-destination='".Schedule::getDestination($schedule->destination_id)->name."' data-vip='$schedule->firstclass_apply' data-business='$schedule->business_apply' data-children='$schedule->children_apply' data-economic='$schedule->economic_apply' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-id='$schedule->id' data-arrival='$schedule->arrival' data-name='$schedule->vehicle_id' data-departure='$schedule->departure' data-origin='$schedule->origin_id' data-destination='$schedule->destination_id' data-vip='$schedule->firstclass_apply' data-business='$schedule->business_apply' data-children='$schedule->children_apply' data-economic='$schedule->economic_apply' class='edit'>Update</a></li>";

           }else{
            $display .="<ul class='dropdown-menu' role='menu'>
                    <li><a data-toggle='modal' href='#modal-view' data-id='$schedule->id' data-arrival='$schedule->arrival' data-name='".Schedule::getVehicle($schedule->vehicle_id)->regno.' '.Schedule::getVehicle($schedule->vehicle_id)->vehiclename->name."' data-departure='$schedule->departure' data-origin='".Schedule::getDestination($schedule->origin_id)->name."' data-destination='".Schedule::getDestination($schedule->destination_id)->name."' data-vip='$schedule->firstclass_apply' data-economic='$schedule->economic_apply' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-id='$schedule->id' data-arrival='$schedule->arrival' data-name='$schedule->vehicle_id' data-departure='$schedule->departure' data-origin='$schedule->origin_id' data-destination='$schedule->destination_id' data-vip='$schedule->firstclass_apply' data-economic='$schedule->economic_apply' class='edit'>Update</a></li>";
           }

           $display .="<li><a id='$schedule->id' class='delete'>
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
        $schedule = new Schedule;
        $schedule->vehicle_id = $request->vid;
        $schedule->origin_id = $request->origin;
        $schedule->destination_id = $request->destination;
        //$schedule->arrival = $request->arrival;
        //$schedule->departure = $request->departure;
        $schedule->firstclass_apply = $request->vip;
        $schedule->economic_apply = 1;
        if(Auth::user()->type == 'Airline'){
        $schedule->business_apply = $request->business;
        $schedule->children_apply = $request->children;
        }
        $schedule->organization_id = Auth::user()->organization_id;

        $schedule->save();
        return 1;
    }

    public function update(Request $request)
    {
        $schedule = Schedule::find($request->id);
        $schedule->vehicle_id = $request->vid;
        $schedule->origin_id = $request->origin;
        $schedule->destination_id = $request->destination;
        //$schedule->arrival = $request->arrival;
        //$schedule->departure = $request->departure;
        $schedule->firstclass_apply = $request->vip;
        if(Auth::user()->type == 'Airline'){
        $schedule->business_apply = $request->business;
        $schedule->children_apply = $request->children;
        }
        $schedule->economic_apply = 1;
        $schedule->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        $schedule = Schedule::find($request->id);
        
        $schedule->delete();
        
       
    }
}
