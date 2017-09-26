<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelBranchesController extends Controller
{
	/*
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /*Hotel Branches Dashboard*/
    public function index()
    {
    	$organization=Organization::where('id','=',Auth::User()->organization_id)->first();
    	$branches=Branch::where('organization_id','=',Auth::User()->organization_id)->get();
        return view('hotels.branches.index',compact('branches','organization'));
    }
    /*Inserting a hotel branch into the database*/
    public function store(Request $request){    
    	$branch=new Branch;
    	$branch->name=$request->name;
    	$branch->organization_id=Auth::user()->organization_id;
    	$branch->save(); 
    	return 1;   	
    }
    /*Showing records*/
    public function showrecord()
    {
        $display = "";
        $hotelbranches = Branch::where('organization_id',Auth::user()->organization_id)
        ->get();
        $i=1;
        foreach($hotelbranches as $branch){
        $date_c=date('d-M-Y', strtotime($branch->created_at));
        $display .="
        <tr class='del$branch->id'>
          <td> $i </td>          
          <td>$branch->name</td>
          <td>$date_c</td>";
          $display .="<td>
		                <div class='btn-group'>
		                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
		                    Action <span class='caret'></span>
		                  </button>		          
		                  <ul class='dropdown-menu' role='menu'>
		                    <li>
		                    	<a data-toggle='modal' href='#modal-form' data-id='$branch->id' data-name='$branch->name' enabled class='edit'>Update
		                    	</a>
		                    </li>
		                    <li>
		                    <a id='$branch->id' class='delete'>
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
    	$branch=Branch::find($request->branch_id);    	
    	$branch->name=$request->name;
    	$branch->organization_id=Auth::user()->organization_id;
    	$branch->save(); 
    	return 1;
    }
	/*Deleting a hotel branch*/
	public function delete(Request $request){      
        $branch = Branch::find($request->id);      
        $branch->delete();       
    }    
}
