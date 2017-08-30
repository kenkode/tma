<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehiclename;
use App\Vehicle;
use Illuminate\Support\Facades\Auth;

class VehiclenamesController extends Controller
{
    //
    public function index()
    {
    	$vehiclenames = Vehiclename::where('organization_id',Auth::user()->organization_id)->get();
        if(Auth::user()->type == 'Travel'){
        return view('travel.vehiclenames.index',compact('vehiclenames'));  
        }else if(Auth::user()->type == 'Taxi'){
        return view('taxi.vehiclenames.index',compact('vehiclenames'));  
        }else if(Auth::user()->type == 'SGR'){
        return view('sgr.trainnames.index',compact('vehiclenames')); 
        }else if(Auth::user()->type == 'Airline'){
        return view('airlines.planenames.index',compact('vehiclenames')); 
        }
        
    }

    public function showrecord()
    {
        $display = "";
        $vehiclenames = Vehiclename::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($vehiclenames as $vehiclename){
        $display .="
        <tr class='del$vehiclename->id'>

          <td> $i </td>
          <td>
          <img src=".url('/public/uploads/logo/'.$vehiclename->logo)." width='100' height='100' alt='no logo' />
          </td>
          <td>$vehiclename->name</td>";
          
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>
          
                  <ul class='dropdown-menu' role='menu'>
                    <li><a data-toggle='modal' href='#modal-view' data-id='$vehiclename->id' data-name='$vehiclename->name' data-logo='$vehiclename->logo' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-id='$vehiclename->id' data-name='$vehiclename->name' data-logo='$vehiclename->logo' class='edit'>Update</a></li>

                    <li><a id='$vehiclename->id' class='delete'>
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
        $vehiclename = new Vehiclename;

        if ( $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logo'), $imageName);
            $vehiclename->logo = $imageName;
        }else{
            $vehiclename->logo = 'default_photo.png';
        }

        if(Auth::user()->type == 'Travel'){
        $vehiclename->type = 'Travel';  
        }else if(Auth::user()->type == 'Taxi'){
        $vehiclename->type = 'Taxi'; 
        }else if(Auth::user()->type == 'SGR'){
        $vehiclename->type = 'SGR';
        }else if(Auth::user()->type == 'Airline'){
        $vehiclename->type = 'Airline'; 
        }

        $vehiclename->name = $request->name;
        $vehiclename->organization_id = Auth::user()->organization_id;

        $vehiclename->save();
        return 1;
    }

    public function update(Request $request)
    {
        $vehiclename = Vehiclename::find($request->vid);
        if ( $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logo'), $imageName);
            $vehiclename->logo = $imageName;
        }
        if(Auth::user()->type == 'Travel'){
        $vehiclename->type = 'Travel';  
        }else if(Auth::user()->type == 'Taxi'){
        $vehiclename->type = 'Taxi'; 
        }else if(Auth::user()->type == 'SGR'){
        $vehiclename->type = 'SGR';
        }else if(Auth::user()->type == 'Airline'){
        $vehiclename->type = 'Airline'; 
        }
        $vehiclename->name = $request->name;
        $vehiclename->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        $count = Vehicle::where('vehiclename_id',$request->id)->count();
        if($count > 0){
        return 1;
        }else{
        $vehiclename = Vehiclename::find($request->id);
        unlink(public_path('/uploads/logo/'.$vehiclename->logo));
        $vehiclename->delete();
        } 
       
    }
}
