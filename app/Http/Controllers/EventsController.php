<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Organization;
use App\Booking;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    //
    public function index()
    {
    	$events = Event::where('organization_id',Auth::user()->organization_id)->get();
    	$organization = Organization::find(Auth::user()->organization_id);
        
        return view('events.index',compact('events','organization'));
    }

    public function showrecord()
    {
        $display = "";
        $events = Event::where('organization_id',Auth::user()->organization_id)->get();
        $i=1;

        foreach($events as $event){
        $display .="
        <tr class='del$event->id'>

          <td> $i </td>
          <td>
          <img src=".url('/public/uploads/logo/'.$event->image)." width='100' height='100' alt='no logo' />
          </td>
          <td>$event->name</td>
          <td>$event->description</td>
          <td>$event->slots</td>
          <td>$event->contact</td>
          <td>$event->address</td>
          <td>".number_format($event->vip,2)."</td>
          <td>".number_format($event->normal,2)."</td>
          <td>".number_format($event->children,2)."</td>
          <td>$event->date</td>";
          
          $display .="<td>

                  <div class='btn-group'>
                  <button type='button' class='btn btn-info btn-sm dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
                    Action <span class='caret'></span>
                  </button>
          
                  <ul class='dropdown-menu' role='menu'>
                  <li><a data-toggle='modal' href='#modal-view' data-id='$event->id' data-name='$event->name' data-slots='$event->slots' data-logo='$event->image' data-contact='$event->contact' data-date='$event->date' data-address='$event->address' data-description='$event->description' data-vip='".number_format($event->vip,2)."' data-economic='".number_format($event->normal,2)."' data-children='".number_format($event->children,2)."' class='view'>View</a></li>

                    <li><a data-toggle='modal' href='#modal-form' data-id='$event->id' data-name='$event->name' data-slots='$event->slots' data-logo='$event->image' data-contact='$event->contact' data-date='$event->date' data-address='$event->address' data-description='$event->description' data-vip='".number_format($event->vip,2)."' data-economic='".number_format($event->normal,2)."' data-children='".number_format($event->children,2)."' class='edit'>Update</a></li>

                    <li><a id='$event->id' class='delete'>
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
        $event = new Event;

        if ( $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logo'), $imageName);
            $event->image = $imageName;
        }else{
            $event->image = 'default_photo.png';
        }

        $event->name = $request->name;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->slots = $request->slots;
        $event->contact = $request->contact;
        $event->address = $request->location;
        $event->vip = str_replace(',', '', $request->vip);
        $event->normal = str_replace(',', '', $request->economic);
        $event->children = str_replace(',', '', $request->children);
        $event->organization_id = Auth::user()->organization_id;

        $event->save();
        return 1;
    }

    public function update(Request $request)
    {
        $event = Event::find($request->id);
        
        if ( $request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/logo'), $imageName);
            $event->image = $imageName;
        }

        $event->name = $request->name;
        $event->date = $request->date;
        $event->description = $request->description;
        $event->slots = $request->slots;
        $event->contact = $request->contact;
        $event->address = $request->location;
        $event->vip = str_replace(',', '', $request->vip);
        $event->normal = str_replace(',', '', $request->economic);
        $event->children = str_replace(',', '', $request->children);
        $event->organization_id = Auth::user()->organization_id;

        $event->update();
        return 1;
    }

    public function delete(Request $request)
    {
      //dd($request->id);
        $count = Booking::where('event_id',$request->id)->count();
        if($count > 0){
        return 1;
        }else{
        $event = Event::find($request->id);
        $event->delete();
        } 
       
    }
}
