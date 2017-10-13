<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carhire;
use App\Organization;
use App\Booking;
use Illuminate\Support\Facades\Auth;

class CarHireController extends Controller
{
    //
    public function index()
    {
    	$carhires = Carhire::where('organization_id',Auth::user()->organization_id)->get();
    	$organization = Organization::find(Auth::user()->organization_id);
        
        return view('carhires.index',compact('carhires','organization'));
    }

    public function showrecord()
    {
        $display = "";
        $carhires = Carhire::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($carhires as $carhire){
        $display .="
        <tr class='del$carhire->id'>

          <td> $i </td>
          <td>
          <img src=".url('/public/uploads/logo/'.$carhire->image)." width='100' height='100' alt='no logo' />
          </td>
          <td>$carhire->regno</td>
          <td>$carhire->type</td>
          <td>$carhire->capacity</td>
          <td>$carhire->location</td>
          <td>$carhire->price</td>
          ";
          
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>
          
                  <ul class='dropdown-menu' role='menu'>
                  <li><a data-toggle='modal' href='#modal-view' data-id='$carhire->id' data-regno='$carhire->regno' data-type='$carhire->type' data-capacity='$carhire->capacity' data-image='$carhire->image' data-location='$carhire->location' data-price='".number_format($carhire->price,2)."' class='view'>View</a></li>

                  <li><a data-toggle='modal' href='#modal-form' data-id='$carhire->id' data-regno='$carhire->regno' data-type='$carhire->type' data-capacity='$carhire->capacity' data-image='$carhire->image' data-location='$carhire->location' data-price='".number_format($carhire->price,2)."' class='edit'>Update</a></li>

                    <li><a id='$carhire->id' class='delete'>
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
        $carhire = new Carhire;

        if ( $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logo'), $imageName);
            $carhire->image = $imageName;
        }else{
            $carhire->image = 'default_photo.png';
        }
        $carhire->regno = $request->regno;
        $carhire->type = $request->type;
        $carhire->capacity = $request->capacity;
        $carhire->location = $request->location;
        $carhire->price = str_replace(',', '', $request->price);
        $carhire->organization_id = Auth::user()->organization_id;

        $carhire->save();
        return 1;
    }

    public function update(Request $request)
    {
        $carhire = Carhire::find($request->id);
        
        if ( $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logo'), $imageName);
            $carhire->image = $imageName;
        }
        $carhire->regno = $request->regno;
        $carhire->type = $request->type;
        $carhire->capacity = $request->capacity;
        $carhire->location = $request->location;
        $carhire->price = str_replace(',', '', $request->price);
        $carhire->organization_id = Auth::user()->organization_id;

        $carhire->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        $count = Booking::where('vehicle_id',$request->id)->count();
        if($count > 0){
        return 1;
        }else{
        $carhire = Carhire::find($request->id);
        $carhire->delete();
        } 
       
    }
}
