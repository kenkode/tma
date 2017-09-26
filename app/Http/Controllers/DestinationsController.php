<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Schedule;
use Illuminate\Support\Facades\Auth;

class DestinationsController extends Controller
{
    //
    public function index()
    {
    	$destinations = Route::where('organization_id',Auth::user()->organization_id)->get();
        return view('airlines.destinations.index',compact('destinations'));
    }

    public function showrecord()
    {
        $display = "";
        $destinations = Route::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($destinations as $destination){
        $display .="
        <tr class='del$destination->id'>

          <td> $i </td>
          <td>$destination->name</td>";
          
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>
          
                  <ul class='dropdown-menu' role='menu'>
                  <li><a data-toggle='modal' href='#modal-view' data-id='$destination->id' data-name='$destination->name' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-id='$destination->id' data-name='$destination->name' class='edit'>Update</a></li>

                    <li><a id='$destination->id' class='delete'>
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
        $destination = new Route;

        $destination->name = $request->name;
        $destination->type = Auth::user()->type;
        $destination->organization_id = Auth::user()->organization_id;

        $destination->save();
        return 1;
    }

    public function update(Request $request)
    {
        $destination = Route::find($request->id);
        
        $destination->name = $request->name;
        $destination->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        $count = Schedule::where('destination_id',$request->id)->orWhere('origin_id',$request->id)->count();
        if($count > 0){
        return 1;
        }else{
        $destination = Route::find($request->id);
        $destination->delete();
        } 
       
    }
}
