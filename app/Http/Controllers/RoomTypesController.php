<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roomtype;
use App\Organization;
use Illuminate\Support\Facades\Auth;

class RoomTypesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*Hotel Branches Dashboard*/
    public function index()
    {
    	$organization=Organization::where('id','=',Auth::User()->organization_id)->first();
    	$types=Roomtype::where('organization_id','=',Auth::User()->organization_id)->get();
        return view('hotels.roomtypes.index',compact('types','organization'));
    }
    /*Inserting a hotel branch into the database*/
    public function store(Request $request){    
    	$type=new Roomtype;
    	$type->name=$request->name;
    	$type->organization_id=Auth::user()->organization_id;
    	$type->save(); 
    	return 1;   	
    }
    /*Showing records*/
    public function showrecord()
    {
        $display = "";
        $types = Roomtype::where('organization_id',Auth::user()->organization_id)
        ->get();
        $i=1;
        foreach($types as $type){
        $date_c=date('d-M-Y', strtotime($type->created_at));
        $display .="
        <tr class='del$type->id'>
          <td> $i </td>          
          <td>$type->name</td>";
          $display .="<td>
		                <div class='btn-group'>
		                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
		                    Action <span class='caret'></span>
		                  </button>		          
		                  <ul class='dropdown-menu' role='menu'>
		                  <li>
                              <a class='view' data-toggle='modal' data-name='$type->name' data-id='$type->id' href='#modal-view'>
                                                                    View
                                                                </a>
                            </li>
		                    <li>
		                    	<a data-toggle='modal' href='#modal-form' data-id='$type->id' data-name='$type->name' enabled class='edit'>Update
		                    	</a>
		                    </li>
		                    <li>
		                    <a id='$type->id' class='delete'>
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
    /*Updating the hotel branch details*/
    public function update(Request $request){
    	$type=Roomtype::find($request->type_id);    	
    	$type->name=$request->name;
    	$type->organization_id=Auth::user()->organization_id;
    	$type->save(); 
    	return 1;
    }
	/*Deleting a hotel branch*/
	public function delete(Request $request){      
        $type = Roomtype::find($request->id);      
        $type->delete();       
    }
}
