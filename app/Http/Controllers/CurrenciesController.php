<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Currency;
use Illuminate\Support\Facades\Auth;

class CurrenciesController extends Controller
{
    //
    public function index()
    {
    	$currencies = Currency::where('organization_id',Auth::user()->organization_id)->get();
        return view('travel.currencies.index',compact('currencies'));
    }

    public function showrecord()
    {
        $display = "";
        $currencies = Currency::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($currencies as $currency){
        $display .="
        <tr class='del$currency->id'>

          <td> $i </td>
          <td>$currency->shortname</td>
          <td>$currency->name</td>";
          
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>
          
                  <ul class='dropdown-menu' role='menu'>
                  <li><a data-toggle='modal' href='#modal-view' data-id='$currency->id' data-shortname='$currency->shortname' data-name='$currency->name' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-id='$currency->id' data-shortname='$currency->shortname' data-name='$currency->name' class='edit'>Update</a></li>

                    <li><a id='$currency->id' class='delete'>
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
        $currency = new Currency;

        $currency->name = $request->name;
        $currency->shortname = $request->shortname;
        $currency->organization_id = Auth::user()->organization_id;

        $currency->save();
        return 1;
    }

    public function update(Request $request)
    {
        $currency = Currency::find($request->id);
        $currency->name = $request->name;
        $currency->shortname = $request->shortname;
        $currency->organization_id = Auth::user()->organization_id;
        $currency->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        $count = Payment::where('currency_id',$request->id)->count();
        if($count > 0){
        return 1;
        }else{
        $currency = Currency::find($request->id);
        $currency->delete();
        } 
       
    }
}
