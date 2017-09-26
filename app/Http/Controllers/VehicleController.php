<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiclename;
use App\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    //
    public function index()
    {
    	$vehiclenames = Vehiclename::where('organization_id',Auth::user()->organization_id)->get();
    	$vehicles = Vehicle::where('organization_id',Auth::user()->organization_id)->where('active',1)->get();
      if(Auth::user()->type == 'Travel'){
        return view('travel.vehicles.index',compact('vehiclenames','vehicles'));
      }else if(Auth::user()->type == 'Taxi'){
        return view('taxi.vehicles.index',compact('vehiclenames','vehicles'));
      }else if(Auth::user()->type == 'SGR'){
        return view('sgr.trains.index',compact('vehiclenames','vehicles'));
      }else if(Auth::user()->type == 'Airline'){
        return view('airlines.planes.index',compact('vehiclenames','vehicles'));
      }
    }

    public function showrecord()
    {
        $display = "";
        $vehicles = Vehicle::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($vehicles as $vehicle){
        $display .="
        <tr class='del$vehicle->id'>

          <td> $i </td>
          <td>
          <img src=".url('/public/uploads/logo/'.$vehicle->vehiclename->logo)." width='100' height='100' alt='no logo' />
          </td>
          <td>$vehicle->regno</td>
          <td>".$vehicle->vehiclename->name."</td>
          <td>$vehicle->capacity</td>";
          if(Auth::user()->type == 'Travel'){
          $display .="<td>$vehicle->type</td>";
          if($vehicle->has_conductor == 1){
          $display .="<td>Yes</td>";
          }else{
          $display .="<td>No</td>";
          }
          if($vehicle->has_chair == 1){
          $display .="<td>Yes</td>";
          }else{
          $display .="<td>No</td>";
          }
          }
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>
          
                  <ul class='dropdown-menu' role='menu'>
                  <li><a data-toggle='modal' href='#modal-view' data-name='".$vehicle->vehiclename->name."' data-logo='".$vehicle->vehiclename->logo."' data-regno='$vehicle->regno' data-id='$vehicle->id' data-capacity='$vehicle->capacity' data-type='$vehicle->type' data-type='$vehicle->type' data-conductor='$vehicle->has_conductor' data-chair='$vehicle->has_chair' data-status='$vehicle->active' enabled class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-name='$vehicle->vehiclename_id' data-regno='$vehicle->regno' data-id='$vehicle->id' data-capacity='$vehicle->capacity' data-type='$vehicle->type' data-type='$vehicle->type' data-conductor='$vehicle->has_conductor' data-chair='$vehicle->has_chair' enabled class='edit'>Update</a></li>

                    <li><a id='$vehicle->id' class='deactivate'>
                    <form id='deactiveform'>".
                    csrf_field();
                    $display .="Deactivate";
                    $display .="</form>
                    </a>
                    </li>

                    <li><a id='$vehicle->id' class='delete'>
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
        $vehicle = new Vehicle;
        $vehicle->vehiclename_id = $request->vid;
        $vehicle->regno = $request->regno;
        $vehicle->capacity = $request->capacity;
        $vehicle->type = $request->type;
        $vehicle->has_conductor = $request->conductor;
        $vehicle->has_chair = $request->chair;
        $vehicle->active = 1;
        $vehicle->organization_id = Auth::user()->organization_id;

        $vehicle->save();
        return 1;
    }

    public function update(Request $request)
    {
        $vehicle = Vehicle::find($request->id);
        $vehicle->vehiclename_id = $request->vid;
        $vehicle->regno = $request->regno;
        $vehicle->capacity = $request->capacity;
        $vehicle->type = $request->type;
        $vehicle->has_conductor = $request->conductor;
        $vehicle->has_chair = $request->chair;
        $vehicle->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        $count = Schedule::where('vehicle_id',$request->id)->count();
        if($count > 0){
        return 1;
        }else{
        $vehicle = Vehicle::find($request->id);
        $vehicle->delete();
    }
       
    }

    public function deactivate(Request $request)
    {
      //dd($request->id);
        $vehicle = Vehicle::find($request->id);
        $vehicle->active = 0;
        $vehicle->update();
    }

    public function activate()
    {
        $vehicles = Vehicle::where('organization_id',Auth::user()->organization_id)->where('active',0)->get();
        if(Auth::user()->type == 'Travel'){
        return view('travel.vehicles.activate',compact('vehicles'));
        }else if(Auth::user()->type == 'Taxi'){
        return view('taxi.vehicles.activate',compact('vehicles'));
        }else if(Auth::user()->type == 'SGR'){
        return view('sgr.trains.activate',compact('vehicles'));
        }else if(Auth::user()->type == 'Airline'){
        return view('airlines.planes.activate',compact('vehicles'));
        }

    }

    public function doactivate(Request $request)
    {
      //dd($request->id);
        $vehicle = Vehicle::find($request->id);
        $vehicle->active = 1;
        $vehicle->update();
       
    }
}
