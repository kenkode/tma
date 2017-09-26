<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Deposit;
use App\Organization;
use Illuminate\Support\Facades\Auth;

class DepositsController extends Controller
{
    //

    public function index()
    {
    	$organization=Organization::where('id','=',Auth::User()->organization_id)->first();
    	$deposit=Deposit::where('organization_id','=',Auth::User()->organization_id)->first();
        return view('hotels.deposits.index',compact('deposit','organization'));
    }
    /*Inserting a hotel branch into the database*/
    public function store(Request $request){    
    	$deposit=new Deposit;
    	$deposit->jan=$request->jan;
    	$deposit->feb=$request->feb;
    	$deposit->mar=$request->mar;
    	$deposit->apr=$request->apr;
    	$deposit->may=$request->may;
    	$deposit->jun=$request->jun;
    	$deposit->jul=$request->jul;
    	$deposit->aug=$request->aug;
    	$deposit->sep=$request->sep;
    	$deposit->oct=$request->oct;
    	$deposit->nov=$request->nov;
    	$deposit->dec=$request->dec;
    	$deposit->organization_id=Auth::user()->organization_id;
    	$deposit->save(); 
    	return 1;   	
    }
    /*Showing records*/
    public function showrecord()
    {
        $display = "";
        $deposits = Deposit::where('organization_id',Auth::user()->organization_id)->first();
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
        
        return $display;
        exit();
    }
    /*Updating the hotel branch details*/
    public function update(Request $request){
    	$count=Deposit::where('organization_id',Auth::user()->organization_id)->count();
    	if($count == 0){
        $deposit=new Deposit;
    	$deposit->jan=$request->jan;
    	$deposit->feb=$request->feb;
    	$deposit->mar=$request->mar;
    	$deposit->apr=$request->apr;
    	$deposit->may=$request->may;
    	$deposit->jun=$request->jun;
    	$deposit->jul=$request->jul;
    	$deposit->aug=$request->aug;
    	$deposit->sep=$request->sep;
    	$deposit->oct=$request->oct;
    	$deposit->nov=$request->nov;
    	$deposit->dec=$request->dec;
    	$deposit->is_enabled=1;
    	$deposit->organization_id=Auth::user()->organization_id;
    	$deposit->save(); 
    	}else{   
    	$deposit=Deposit::where('organization_id',Auth::user()->organization_id)->first();    	
    	$deposit->jan=$request->jan;
    	$deposit->feb=$request->feb;
    	$deposit->mar=$request->mar;
    	$deposit->apr=$request->apr;
    	$deposit->may=$request->may;
    	$deposit->jun=$request->jun;
    	$deposit->jul=$request->jul;
    	$deposit->aug=$request->aug;
    	$deposit->sep=$request->sep;
    	$deposit->oct=$request->oct;
    	$deposit->nov=$request->nov;
    	$deposit->dec=$request->dec;
    	$deposit->is_enabled=1;
    	$deposit->organization_id=Auth::user()->organization_id;
    	$deposit->save(); 
        }
    	return 1;
    }
	/*Deleting a hotel branch*/
	public function delete(Request $request){      
        $type = Roomtype::find($request->id);      
        $type->delete();       
    }
}
