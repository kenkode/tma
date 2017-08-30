<?php

namespace App\Http\Controllers;

use App\Pricing;
use App\Roomtype;
use App\Branch;
use App\Food;
use App\Roomnumber;
use App\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PricingController extends Controller
{
    //
    public function index()
    {	
    	$organization=Organization::find(Auth::User()->organization_id);
    	$branches=Branch::where('organization_id','=',Auth::User()->organization_id)
    	->get();  
        $types=Roomtype::where('organization_id','=',Auth::User()->organization_id)
        ->get();     	   
    	$pricings=Pricing::where('organization_id','=',Auth::User()->organization_id)
    	->get();   	    
        return view('hotels.pricings.index',compact('pricings','organization','branches','types'));
    }
    /*Storing room details in the database*/
    public function store(Request $request){
    	$pricing = new Pricing;
        
        $pricing->branch_id = $request->branch;
        $pricing->roomtype_id = $request->room_type;
        $pricing->start_date = $request->start_date;
        $pricing->end_date = $request->end_date;
        $pricing->mon = str_replace(",", "", $request->mon);
        $pricing->tue = str_replace(",", "", $request->tue);
        $pricing->wen = str_replace(",", "", $request->wen);
        $pricing->thur= str_replace(",", "", $request->thur);
        $pricing->fri= str_replace(",", "", $request->fri);
        $pricing->sat= str_replace(",", "", $request->sat);
        $pricing->sun= str_replace(",", "", $request->sun);
        $pricing->children= $request->children;
        $pricing->organization_id = Auth::user()->organization_id;
        $pricing->save();        

        return 1;
    }
    /*Displaying Room Details*/
    public function showrecord()
    {
        $display = "";
        $pricings = Pricing::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;
        foreach($pricings as $pricing){        
        $display .="
        <tr class='del$pricing->id'>
          <td> $i </td>
          <td>".$pricing->roomtype->name."</td>
          <td>".$pricing->branch->name."</td>
          <td>".number_format($pricing->mon,2)."</td>
          <td>".number_format($pricing->tue,2)."</td>
          <td>".number_format($pricing->wen,2)."</td>
          <td>".number_format($pricing->thur,2)."</td>
          <td>".number_format($pricing->fri,2)."</td>
          <td>".number_format($pricing->sat,2)."</td>
          <td>".number_format($pricing->sun,2)."</td>
          <td>".$pricing->children."</td>";
          $display .="<td>
                  <div class='btn-group'>
                  	<button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    	Action 
                    	<span class='caret'></span>
                  	</button>          
                  	<ul class='dropdown-menu' role='menu'>
                        <li>
                            <a data-toggle='modal' href='#modal-view' data-id='$pricing->id' data-roomtype='".$pricing->roomtype->name."' data-mon='".number_format($pricing->mon,2)."' data-tue='".number_format($pricing->tue,2)."' data-wen='".number_format($pricing->wen,2)."' data-thu='".number_format($pricing->thur,2)."' data-fri='".number_format($pricing->fri,2)."' data-sat='".number_format($pricing->sat,2)."' data-sun='".number_format($pricing->sun,2)."' data-children='".$pricing->children."' data-branch='".$pricing->branch->name."' enabled class='view'>
                            View
                            </a>

	                    <li>
	                    	<a data-toggle='modal' href='#modal-form' data-id='$pricing->id' data-roomtype='$pricing->roomtype_id' data-mon='".number_format($pricing->mon,2)."' data-tue='".number_format($pricing->tue,2)."' data-wen='".number_format($pricing->wen,2)."' data-thu='".number_format($pricing->thur,2)."' data-fri='".number_format($pricing->fri,2)."' data-sat='".number_format($pricing->sat,2)."' data-sun='".number_format($pricing->sun,2)."' data-branch='$pricing->branch_id' data-children='".$pricing->children."' enabled class='edit'>
	                    	Update
	                    	</a>
	                    </li>
	                    <li>
		                    <a id='$pricing->id' class='delete'>
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
    /*Updating the room details*/
    public function update(Request $request){
        $pricing = Pricing::find($request->id);
        $pricing->branch_id = $request->branch;
        $pricing->roomtype_id = $request->room_type;
        $pricing->start_date = $request->start_date;
        $pricing->end_date = $request->end_date;
        $pricing->mon = str_replace(",", "", $request->mon);
        $pricing->tue = str_replace(",", "", $request->tue);
        $pricing->wen = str_replace(",", "", $request->wen);
        $pricing->thur= str_replace(",", "", $request->thur);
        $pricing->fri= str_replace(",", "", $request->fri);
        $pricing->sat= str_replace(",", "", $request->sat);
        $pricing->sun= str_replace(",", "", $request->sun);
        $pricing->children= $request->children;
        $pricing->organization_id = Auth::user()->organization_id;
        $pricing->update();        
        return 1;
    }
    /*Deleting and unlinking the room details*/
    public function delete(Request $request)
    {      
        $pricing = Pricing::find($request->id);
        $pricing->delete();       
    }

}
