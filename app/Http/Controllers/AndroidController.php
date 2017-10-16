<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\Book;

use App\Carhire;

use App\Vehicle;

use App\Schedule;

use App\Vehiclename;

use App\Payment;

use App\Booking;

use App\Organization;

use App\Event;

use App\Route;

use DateTime;

use DB;

class AndroidController extends Controller
{
    //
    public function getCars(Request $request)
    {
    	$carhires = Carhire::where('location',$request->location)->get();
        
        return json_encode($carhires);
    }

    public function getVehicles(Request $request)
    {
        $flag = array();
        $vehicles = Schedule::join("vehicles","schedules.vehicle_id","=","vehicles.id")
                            ->join("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->join(DB::raw('(select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id) as origin'), function($join){
                                $join->on('schedules.origin_id', '=', 'origin.oid');
                            })
                            ->join(DB::raw('(select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id) as des'), function($join){
                                 $join->on('schedules.destination_id', '=', 'des.did');
                            })
                            ->where('origin.oname',$request->origin)
                            ->where('des.dname',$request->destination)
                            ->where('vehiclenames.type','Travel')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.type', 'vehicles.capacity', 'schedules.vehicle_id as vehicleid', 'schedules.organization_id as organization', 'firstclass_apply as firstclassapply', 'economic_apply', 'origin.oname', 'origin.oid', 'des.did', 'des.dname', 'arrival', 'departure')
                            ->get();

        if(count($vehicles)){
        foreach ($vehicles as $vehicle) {
            $flag = $vehicle;
            $payments = Payment::join('vehicles','payments.vehicle_id','=','vehicles.id')
                                   ->where('origin_id',$vehicle->oid)
                                   ->where('destination_id',$vehicle->did)
                                   ->select('firstclass as vipprice', 'economic as economicfare')
                                   ->get();
           
        foreach ($payments as $payment) {
            $flag['10'] = $payment->vipprice;
            $flag['vipprice'] = $payment->vipprice;
            $flag['11'] = $payment->economicfare;
            $flag['economicfare'] = $payment->economicfare;
        }
    }
    $flag = array($flag);
    //array_push($flag, $payflag);
        print(json_encode($flag));
    }
        
        //return json_encode($vehicles);
    }

    public function getTrains(Request $request)
    {
        $flag = array();
        $vehicles = Schedule::join("vehicles","schedules.vehicle_id","=","vehicles.id")
                            ->join("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->join(DB::raw('(select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id) as origin'), function($join){
                                $join->on('schedules.origin_id', '=', 'origin.oid');
                            })
                            ->join(DB::raw('(select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id) as des'), function($join){
                                 $join->on('schedules.destination_id', '=', 'des.did');
                            })
                            ->where('origin.oname',$request->origin)
                            ->where('des.dname',$request->destination)
                            ->where('vehiclenames.type','SGR')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.type', 'vehicles.capacity', 'schedules.vehicle_id as vehicleid', 'schedules.organization_id as organization', 'firstclass_apply as firstclassapply', 'economic_apply', 'origin.oname', 'origin.oid', 'des.did', 'des.dname', 'arrival', 'departure')
                            ->get();

        if(count($vehicles)){
        foreach ($vehicles as $vehicle) {
            $flag = $vehicle;
            $payments = Payment::join('vehicles','payments.vehicle_id','=','vehicles.id')
                                   ->where('origin_id',$vehicle->oid)
                                   ->where('destination_id',$vehicle->did)
                                   ->select('firstclass as vipprice', 'economic as economicfare')
                                   ->get();
           
        foreach ($payments as $payment) {
            $flag['10'] = $payment->vipprice;
            $flag['vipprice'] = $payment->vipprice;
            $flag['11'] = $payment->economicfare;
            $flag['economicfare'] = $payment->economicfare;
        }
    }
    $flag = array($flag);
    //array_push($flag, $payflag);
        print(json_encode($flag));
    }
        
        //return json_encode($vehicles);
    }


    public function getAirplanes(Request $request)
    {
        $flag = array();
        $vehicles = Schedule::join("vehicles","schedules.vehicle_id","=","vehicles.id")
                            ->join("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->join(DB::raw('(select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id) as origin'), function($join){
                                $join->on('schedules.origin_id', '=', 'origin.oid');
                            })
                            ->join(DB::raw('(select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id) as des'), function($join){
                                 $join->on('schedules.destination_id', '=', 'des.did');
                            })
                            ->where('origin.oname',$request->origin)
                            ->where('des.dname',$request->destination)
                            ->where('vehiclenames.type','Airline')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.type', 'vehicles.capacity', 'schedules.vehicle_id as vehicleid', 'schedules.organization_id as organization', 'firstclass_apply as firstclassapply', 'economic_apply', 'origin.oname', 'origin.oid', 'des.did', 'des.dname', 'arrival', 'departure')
                            ->get();

        if(count($vehicles)){
        foreach ($vehicles as $vehicle) {
            $flag = $vehicle;
            $payments = Payment::join('vehicles','payments.vehicle_id','=','vehicles.id')
                                   ->where('origin_id',$vehicle->oid)
                                   ->where('destination_id',$vehicle->did)
                                   ->select('firstclass as vipprice', 'economic as economicfare', 'children as childrenfare', 'business as businessfare')
                                   ->get();
           
        foreach ($payments as $payment) {
            $flag['10'] = $payment->vipprice;
            $flag['vipprice'] = $payment->vipprice;
            $flag['11'] = $payment->economicfare;
            $flag['economicfare'] = $payment->economicfare;
            $flag['12'] = $payment->childrenfare;
            $flag['childrenfare'] = $payment->childrenfare;
            $flag['13'] = $payment->businessfare;
            $flag['businessfare'] = $payment->businessfare;
        }
    }
    $flag = array($flag);
    //array_push($flag, $payflag);
        print(json_encode($flag));
    }
        
        //return json_encode($vehicles);
    }

    public function getEvents()
    {
        date_default_timezone_set("Africa/Nairobi");
        //echo date('Y-m-d H:i:s');
        $events = Event::where('date','>=',date('Y-m-d H:i:s'))
                            ->select('events.name', 'events.image as imageUrl', 'description', 'slots', 'address', 'organization_id as organizationId', 'contact', 'vip as vipprice', 'normal as economic', 'children','id as eventid','date')
                            ->get();
        
        return json_encode($events);
    }

    public function getTaxis()
    {
        $vehicles = Vehicle::join("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->where('vehiclenames.type','Taxi')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.capacity', 'vehicles.id as vehicleid', 'vehicles.organization_id as organization')
                            ->get();
        
        if(count($vehicles)){
        foreach ($vehicles as $vehicle) {
            $flag = $vehicle;
            $payments = Payment::join('vehicles','payments.vehicle_id','=','vehicles.id')
                                   ->select('economic as economicfare')
                                   ->get();
           
        foreach ($payments as $payment) {
            $flag['5'] = $payment->economicfare;
            $flag['economicfare'] = $payment->economicfare;
        }
    }
    $flag = array($flag);
    //array_push($flag, $payflag);
        print(json_encode($flag));
    }
    }

    public function getLocations()
    {
    	$carhires = Carhire::select("location")->distinct()->get();
        
        return json_encode($carhires);
    }

    public function getRoutes(Request $request)
    {
        $routes = Route::select("name")->where('type',$request->type)->distinct()->get();
        
        return json_encode($routes);
    }

    public function initials($str,$id) {
    $ret = '';
    $bid = $id + 1;
    foreach (explode(' ', $str) as $word){
      if($word == null){
        $ret .= strtoupper($str[0]); 
      }else{
        $ret .= strtoupper($word[0]);
      }
      }
      $ticketnumber = '#' . $ret . date('ydm'). str_pad(($bid), 4, '0', STR_PAD_LEFT);
   
    return $ticketnumber;
    }

    public function hireCar(Request $request)
    {
        $data = array();

        $organization = Organization::find($request->organization);
        $booking = Booking::orderBy('id','DESC')->first();

        $types = explode(', ', str_replace(array('[',']','"'),'',$request->types));
        $nums  = explode(', ', str_replace(array('[',']'),'',$request->nums));
        $amounts  = explode(', ', str_replace(array('[',']'),'',$request->amounts));

        /*$carhire = Carhire::where('type',$types[1])->first();
       

        $data['success'] =  $carhire;
        return $data;*/

        $sdate = strtotime($request->sdate.' '.$request->stime);
        $edate = strtotime($request->edate.' '.$request->etime);
        $startdate = date('Y-m-d H:i:s', $sdate);
        $enddate = date('Y-m-d H:i:s', $edate);

        $ret = '';
        $bid = $booking->id+1;
        foreach (explode(' ', $organization->name) as $word){
        if($word == null){
        $ret .= strtoupper($str[0]); 
        }else{
        $ret .= strtoupper($word[0]);
        }
        }
        $ticketnumber = '#' . $ret . date('ydm'). str_pad(($bid), 4, '0', STR_PAD_LEFT);

        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $idno = $request->idno;
        $phone = $request->phone;
        $ticketno = $ticketnumber;
        $mode = $request->mode;
        $diffDays = $request->diffDays;
        $total = $request->amount;


        Mail::to($email)->send(new Book($types,$nums,$amounts,$startdate,$enddate,$firstname,$lastname,$idno,$phone,$ticketno,$total,$mode,$diffDays));


        /*$sdate = strtotime($request->sdate.' '.$request->stime);
        $edate = strtotime($request->edate.' '.$request->etime);
        $startdate = date('Y-m-d H:i:s', $sdate);
        $enddate = date('Y-m-d H:i:s', $edate);

        $booking = new Booking;
        $booking->firstname = $request->firstname;
        $booking->lastname = $request->lastname;
        $booking->email = $request->email;
        $booking->phone = $request->phone;
        $booking->id_number = $request->idno;
        $booking->ticketno = $request->firstname;
        $booking->organization_id = $request->organization;
        $booking->amount = $request->amount;
        $booking->mode_of_payment = $request->mode;
        $booking->type = 'Car Hire';
        $booking->status = 'approved';
        $booking->date = date('Y-m-d');

        for($i=0; $i<$request->types; $i++){
        $carhire = Carhire::where('type',$request->types[$i])->first();
        $booking->vehicle_id = $carhire->id;
        $booking->cars_hired = $request->nums[$i];
        }
        */

        if( count(Mail::failures()) == 0 ) {

        for($i=0; $i<count($types); $i++){

        $booking = new Booking;
        $booking->firstname = $firstname;
        $booking->lastname = $lastname;
        $booking->email = $email;
        $booking->phone = $phone;
        $booking->id_number = $idno;
        $booking->ticketno = $ticketno;
        $booking->organization_id = $organization->id;
        $booking->amount = $diffDays * $amounts[$i] * $nums[$i];
        $booking->days = $diffDays;
        $booking->mode_of_payment = $mode;
        $booking->type = 'Car Hire';
        $booking->status = 'approved';
        $booking->date = date('Y-m-d');

        
        $carhire = Carhire::where('type',$types[$i])->first();
        $booking->vehicle_id = $carhire->id;
        $booking->cars_hired = $nums[$i];
        
        $booking->save();
        
        }
        $data['success'] = "Book Successful";
        return json_encode($data);
        }else{
        $data['success'] = "error";
        return json_encode($data);
        }
        }
}
