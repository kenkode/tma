<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\Book;

use App\Mail\BookVehicle;

use App\Carhire;

use App\Vehicle;

use App\Schedule;

use App\Seatnaming;

use App\Vehiclename;

use App\Payment;

use App\Booking;

use App\Organization;

use App\Event;

use App\Route;

use App\Branch;

use App\Room;

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
        $vehicles = Schedule::leftJoin("vehicles","schedules.vehicle_id","=","vehicles.id")
                            ->leftJoin("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->leftJoin(DB::raw('(select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id) as origin'), function($join){
                                $join->on('schedules.origin_id', '=', 'origin.oid');
                            })
                            ->leftJoin(DB::raw('(select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id) as des'), function($join){
                                 $join->on('schedules.destination_id', '=', 'des.did');
                            })
                            ->leftJoin('payments','vehicles.id','=','payments.vehicle_id')
                            ->where(function ($query) use ($request) {
                             $query->where('origin.oname',$request->origin)
                              ->orWhere('origin.oname',$request->destination);
                            })
                            ->where(function ($query) use ($request) {
                                $query->where('des.dname',$request->destination)
                                      ->orWhere('des.dname',$request->origin);
                            })
                            ->where('vehiclenames.type','Travel')
                            ->distinct('vehiclenames.name')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.type', 'vehicles.capacity', 'schedules.vehicle_id as vehicleid', 'schedules.organization_id as organization', 'firstclass_apply as firstclassapply', 'economic_apply', 'origin.oname', 'origin.oid', 'des.did', 'des.dname', 'arrival', 'departure','firstclass as vipprice', 'economic as economicfare')
                            ->get();

        print(json_encode($vehicles));
    }

    public function getTrains(Request $request)
    {
        $vehicles = Schedule::leftJoin("vehicles","schedules.vehicle_id","=","vehicles.id")
                            ->leftJoin("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->leftJoin(DB::raw('(select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id) as origin'), function($join){
                                $join->on('schedules.origin_id', '=', 'origin.oid');
                            })
                            ->leftJoin(DB::raw('(select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id) as des'), function($join){
                                 $join->on('schedules.destination_id', '=', 'des.did');
                            })
                            ->leftJoin('payments','vehicles.id','=','payments.vehicle_id')
                            ->where(function ($query) use ($request) {
                            $query->where('origin.oname',$request->origin)
                              ->orWhere('origin.oname',$request->destination);
                            })
                            ->where(function ($query) use ($request) {
                                $query->where('des.dname',$request->destination)
                                      ->orWhere('des.dname',$request->origin);
                            })
                            ->where('vehiclenames.type','SGR')
                            ->distinct('vehiclenames.name')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.type', 'vehicles.capacity', 'schedules.vehicle_id as vehicleid', 'schedules.organization_id as organization', 'firstclass_apply as firstclassapply', 'economic_apply', 'origin.oname', 'origin.oid', 'des.did', 'des.dname', 'arrival', 'departure','firstclass as vipprice', 'economic as economicfare')
                            ->get();

            
        print(json_encode($vehicles));
    
    }


    public function getAirplanes(Request $request)
    {
        $vehicles = Schedule::leftJoin("vehicles","schedules.vehicle_id","=","vehicles.id")
                            ->leftJoin("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->leftJoin(DB::raw('(select routes.name as oname,routes.id as oid from schedules left join routes on schedules.origin_id=routes.id) as origin'), function($join){
                                $join->on('schedules.origin_id', '=', 'origin.oid');
                            })
                            ->leftJoin(DB::raw('(select routes.name as dname,routes.id as did from schedules left join routes on schedules.destination_id=routes.id) as des'), function($join){
                                 $join->on('schedules.destination_id', '=', 'des.did');
                            })
                            ->leftJoin('payments','vehicles.id','=','payments.vehicle_id')
                            ->where(function ($query) use ($request) {
                            $query->where('origin.oname',$request->origin)
                              ->orWhere('origin.oname',$request->destination);
                            })
                            ->where(function ($query) use ($request) {
                                $query->where('des.dname',$request->destination)
                                      ->orWhere('des.dname',$request->origin);
                            })
                            ->where('vehiclenames.type','Airline')
                            ->distinct('vehiclenames.name')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.type', 'vehicles.capacity', 'schedules.vehicle_id as vehicleid', 'schedules.organization_id as organization', 'firstclass_apply as firstclassapply', 'economic_apply', 'origin.oname', 'origin.oid', 'des.did', 'des.dname', 'arrival', 'departure','firstclass as vipprice', 'economic as economicfare', 'children as childrenfare', 'business as businessfare')
                            ->get();

        
        print(json_encode($vehicles));
    }

    public function getSeats(Request $request)
    {
        $date = $request->date;
        $time = $request->time;
        $newdate = strtotime($date.' '.$time);
        $datetime = date('Y-m-d H:i:s', $newdate);

        $booked = array();

        $seatnamings = Seatnaming::where('organization_id',$request->organization_id)->get();

        foreach ($seatnamings as $seatnaming) {
            $bookedseats = Booking::where('origin',$request->origin)
                         ->where('destination',$request->destination)
                         ->where('travel_date',$datetime)
                         ->where('type',$request->type)
                         ->where('vehicle_id',$request->vehicle)
                         ->where('seatno',$seatnaming->seatno)
                         ->select('seatno')
                         ->first();

            if(count($bookedseats) > 0){
            //$booked[0+$i] = $row['seatno'];
            $booked['seatno'] = $seatnaming->seatno;
            //$booked[1+$i] = $row['vip'];
            $booked['vip'] = $seatnaming->vip;
            //$booked[2+$i] = $row['business'];
            $booked['business'] = $seatnaming->business;
            //$booked[3+$i] = $row['economy'];
            $booked['economy'] = $seatnaming->economy;
            //$booked[4+$i] = "booked";
            $booked['status'] = "booked";
            $flag[] = $booked;
            }else{
            //$booked[0+$i] = $row['seatno'];
            $booked['seatno'] = $seatnaming->seatno;
            //$booked[1+$i] = $row['vip'];
            $booked['vip'] = $seatnaming->vip;
            //$booked[2+$i] = $row['business'];
            $booked['business'] = $seatnaming->business;
            //$booked[3+$i] = $row['economy'];
            $booked['economy'] = $seatnaming->economy;
            //$booked[4+$i] = "available";
            $booked['status'] = "available";
            $flag[] = $booked; 
            }
        }

        
        print(json_encode($flag));
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

    public function getHotels(Request $request)
    {
        //echo date('Y-m-d H:i:s');
        $hotels = Branch::leftJoin('organizations','branches.organization_id','=','organizations.id')
                ->where('branches.name',$request->area)
                            ->select('organizations.name', 'organizations.logo as imageUrl', 'branches.organization_id as organization', 'branches.id as branchid','branches.name as branch')
                            ->get();
        
        return json_encode($hotels);
    }


    public function getHotelRooms(Request $request)
    {
        //echo date('Y-m-d H:i:s');

        $date = $request->date;
        $time = $request->time;
        $date1 = $request->checkoutdate;
        $time1 = $request->checkouttime;
        $newdate = strtotime($date.' '.$time);
        $datetime = date('Y-m-d H:i:s', $newdate);

        $flag = array();

        $newdate1  = strtotime($date1.' '.$time1);
        $datetime1 = date('Y-m-d H:i:s', $newdate1);

        $branch = Branch::where('name',$request->area)->first();

        $bookedrooms = Booking::where('bookings.branch_id',$branch->id)
                         ->leftJoin('rooms','bookings.room_id','=','rooms.id')
                         ->where('check_out',$datetime1)
                         ->where('travel_date',$datetime)
                         ->groupBy('roomtype_id')
                         ->count();

        //$flag['bookedrooms'] = $bookedrooms;

        if(($request->adults == "" || $request->adults == null) && ($request->children != "" || $request->children != null)){
          $rooms = Room::leftJoin("roomtypes","rooms.roomtype_id","=","roomtypes.id")
                            ->leftJoin('branches','rooms.branch_id','=','branches.id')
                            ->leftJoin("organizations","rooms.organization_id","=","organizations.id")
                            ->leftJoin(DB::raw('(select COALESCE(mon,0) as mon,COALESCE(tue,0) as tue,COALESCE(wen,0) as wen,COALESCE(thur,0) as thur,COALESCE(fri,0) as fri,COALESCE(sat,0) as sat,COALESCE(sun,0) as sun,branch_id,roomtype_id from pricings where branch_id='.$branch->id.') as pricings'), function($join){
                                $join->on('roomtypes.id', '=', 'pricings.roomtype_id');
                            })
                            ->leftJoin(DB::raw('(select count(*) as booked, room_id from bookings left join rooms on bookings.room_id = rooms.id where bookings.branch_id='.$branch->id.' and check_out<="'.$datetime1.'" and travel_date>="'.$datetime.'" group by roomtype_id, room_id) as bookings'), function($join){
                                $join->on('rooms.id', '=', 'bookings.room_id');
                            })
                            ->where('rooms.branch_id',$branch->id)
                            ->where('rooms.children',$request->children)
                            ->select('rooms.id as id', 'rooms.roomtype_id', 'roomtypes.name as name', 'rooms.organization_id as organization', 'rooms.image as imageUrl', 'rooms.adults', 'rooms.children','rooms.room_count as availability','pricings.mon','pricings.tue','pricings.wen','pricings.thur','pricings.fri','pricings.sat','pricings.sun','pricings.children as childamount','bookings.booked','organizations.name as hotel')
                            ->get();

          $flag['rooms'] = $rooms;
        }else if(($request->adults != "" || $request->adults != null) && ($request->children == "" || $request->children == null)){
          $rooms = Room::leftJoin("roomtypes","rooms.roomtype_id","=","roomtypes.id")
                            ->leftJoin('branches','rooms.branch_id','=','branches.id')
                            ->leftJoin("organizations","rooms.organization_id","=","organizations.id")
                            ->leftJoin(DB::raw('(select COALESCE(mon,0) as mon,COALESCE(tue,0) as tue,COALESCE(wen,0) as wen,COALESCE(thur,0) as thur,COALESCE(fri,0) as fri,COALESCE(sat,0) as sat,COALESCE(sun,0) as sun,branch_id,roomtype_id from pricings where branch_id='.$branch->id.') as pricings'), function($join){
                                $join->on('roomtypes.id', '=', 'pricings.roomtype_id');
                            })
                            ->leftJoin(DB::raw('(select count(*) as booked, room_id from bookings left join rooms on bookings.room_id = rooms.id where bookings.branch_id='.$branch->id.' and check_out<="'.$datetime1.'" and travel_date>="'.$datetime.'" group by roomtype_id, room_id) as bookings'), function($join){
                                $join->on('rooms.id', '=', 'bookings.room_id');
                            })
                            ->where('rooms.branch_id',$branch->id)
                            ->where('rooms.adults',$request->adults)
                            ->select('rooms.id as id', 'rooms.roomtype_id', 'roomtypes.name as name', 'rooms.organization_id as organization', 'rooms.image as imageUrl', 'rooms.adults', 'rooms.children','rooms.room_count as availability','pricings.mon','pricings.tue','pricings.wen','pricings.thur','pricings.fri','pricings.sat','pricings.sun','pricings.children as childamount','bookings.booked','organizations.name as hotel')
                            ->get();

          $flag['rooms'] = $rooms;
        }else if(($request->adults == "" || $request->adults == null) && ($request->children == "" || $request->children == null)){
          $rooms = Room::leftJoin("roomtypes","rooms.roomtype_id","=","roomtypes.id")
                            ->leftJoin('branches','rooms.branch_id','=','branches.id')
                            ->leftJoin("organizations","rooms.organization_id","=","organizations.id")
                            ->leftJoin(DB::raw('(select COALESCE(mon,0) as mon,COALESCE(tue,0) as tue,COALESCE(wen,0) as wen,COALESCE(thur,0) as thur,COALESCE(fri,0) as fri,COALESCE(sat,0) as sat,COALESCE(sun,0) as sun,branch_id,roomtype_id from pricings where branch_id='.$branch->id.') as pricings'), function($join){
                                $join->on('roomtypes.id', '=', 'pricings.roomtype_id');
                            })
                            ->leftJoin(DB::raw('(select count(*) as booked, room_id from bookings left join rooms on bookings.room_id = rooms.id where bookings.branch_id='.$branch->id.' and check_out<="'.$datetime1.'" and travel_date>="'.$datetime.'" group by roomtype_id, room_id) as bookings'), function($join){
                                $join->on('rooms.id', '=', 'bookings.room_id');
                            })
                            ->where('rooms.branch_id',$branch->id)
                            ->select('rooms.id as id', 'rooms.roomtype_id', 'roomtypes.name as name', 'rooms.organization_id as organization', 'rooms.image as imageUrl', 'rooms.adults', 'rooms.children','rooms.room_count as availability','pricings.mon','pricings.tue','pricings.wen','pricings.thur','pricings.fri','pricings.sat','pricings.sun','pricings.children as childamount','bookings.booked','organizations.name as hotel')
                            ->get();

          $flag['rooms'] = $rooms;
        }else if(($request->adults != "" || $request->adults != null) && ($request->children != "" || $request->children != null)){

        $rooms = Room::leftJoin("roomtypes","rooms.roomtype_id","=","roomtypes.id")
                            ->leftJoin('branches','rooms.branch_id','=','branches.id')
                            ->leftJoin("organizations","rooms.organization_id","=","organizations.id")
                            ->leftJoin(DB::raw('(select COALESCE(mon,0) as mon,COALESCE(tue,0) as tue,COALESCE(wen,0) as wen,COALESCE(thur,0) as thur,COALESCE(fri,0) as fri,COALESCE(sat,0) as sat,COALESCE(sun,0) as sun,branch_id,roomtype_id from pricings where branch_id='.$branch->id.') as pricings'), function($join){
                                $join->on('roomtypes.id', '=', 'pricings.roomtype_id');
                            })
                            ->leftJoin(DB::raw('(select count(*) as booked, room_id from bookings left join rooms on bookings.room_id = rooms.id where bookings.branch_id='.$branch->id.' and check_out<="'.$datetime1.'" and travel_date>="'.$datetime.'" group by roomtype_id, room_id) as bookings'), function($join){
                                $join->on('rooms.id', '=', 'bookings.room_id');
                            })
                            ->where('rooms.branch_id',$branch->id)
                            ->where('rooms.children',$request->children)
                            ->where('rooms.adults',$request->adults)
                            ->select('rooms.id as id', 'rooms.roomtype_id', 'roomtypes.name as name', 'rooms.organization_id as organization', 'rooms.image as imageUrl', 'rooms.adults', 'rooms.children','rooms.room_count as availability','pricings.mon','pricings.tue','pricings.wen','pricings.thur','pricings.fri','pricings.sat','pricings.sun','pricings.children as childamount','bookings.booked','organizations.name as hotel')
                            ->get();

        $flag['rooms'] = $rooms;
    }
        
        return json_encode($rooms);
    }

    public function getRooms(Request $request)
    {
        $rooms = Room::leftJoin("roomtypes","rooms.roomtype_id","=","roomtypes.id")
                            ->leftJoin("organizations","rooms.organization_id","=","organizations.id")
                            ->leftJoin(DB::raw('(select COALESCE(mon,0) as mon,COALESCE(tue,0) as tue,COALESCE(wen,0) as wen,COALESCE(thur,0) as thur,COALESCE(fri,0) as fri,COALESCE(sat,0) as sat,COALESCE(sun,0) as sun,branch_id,roomtype_id from pricings where branch_id='.$request->branchid.') as pricings'), function($join){
                                $join->on('roomtypes.id', '=', 'pricings.roomtype_id');
                            })
                            ->where('rooms.branch_id',$request->branchid)
                            ->select('rooms.id as roomid', 'rooms.roomtype_id', 'roomtypes.name as name', 'rooms.organization_id as organization', 'rooms.image as imageUrl', 'rooms.adults', 'rooms.children','rooms.room_count as availability','pricings.mon','pricings.tue','pricings.wen','pricings.thur','pricings.fri','pricings.sat','pricings.sun')
                            ->get();

        
        return json_encode($rooms);
    }

    public function getTaxis()
    {
        $vehicles = Vehicle::leftJoin("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                            ->leftJoin('payments','vehicles.id','=','payments.vehicle_id')
                            ->where('vehiclenames.type','Taxi')
                            ->select('vehiclenames.name', 'vehiclenames.logo as imageUrl', 'vehicles.capacity', 'vehicles.id as vehicleid', 'vehicles.organization_id as organization','economic as economicfare')
                            ->get();
        
        
        print(json_encode($vehicles));
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

    public function getBranches(Request $request)
    {
        $branches = Branch::select("name")->distinct()->get();
        
        return json_encode($branches);
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

        public function bookvehicle(Request $request)
        {
        $data = array();

        $organization = Organization::find($request->organization);
        $vehicle = Vehicle::leftJoin("vehiclenames","vehicles.vehiclename_id","=","vehiclenames.id")
                          ->where("vehicles.id",$request->vehicle)
                          ->select("vehiclenames.name","regno")
                          ->first();

        $booking = Booking::orderBy('id','DESC')->first();

        $firstname = explode(', ', str_replace(array('[',']'),'',$request->firstname));
        $lastname = explode(', ', str_replace(array('[',']'),'',$request->lastname));
        $email = explode(', ', str_replace(array('[',']'),'',$request->email));
        $phone = explode(', ', str_replace(array('[',']'),'',$request->phone));
        $idno = explode(', ', str_replace(array('[',']'),'',$request->idno));
        $paymentmode = $request->paymentmode;
        $seat = explode(', ', str_replace(array('[',']'),'',$request->seat));
        /*$amount = preg_replace("/[^0-9.]/", "", explode(',', str_replace(array('[',']'),'',$request->amount)));  */ 

        //return $email[1];

        $newdate = strtotime($request->date.' '.$request->time);
        $datetime = date('Y-m-d H:i:s', $newdate);
    

        $ret = '';
        $bid = $booking->id+1;
        foreach (explode(' ', $organization->name) as $word){
        if($word == null){
        $ret .= strtoupper($str[0]); 
        }else{
        $ret .= strtoupper($word[0]);
        }
        }

        for($i=0; $i<count($seat); $i++){

        $ticketnumber = '#' . $ret . date('ydm'). str_pad(($bid+$i), 4, '0', STR_PAD_LEFT);

        $amount = 0.00;

        $query = Seatnaming::join('payments','seatnamings.vehicle_id','=','payments.vehicle_id')->where('seatno',$seat[$i])->where('seatnamings.vehicle_id',$request->vehicle)->select('firstclass','vip','payments.economic as economic','seatnamings.economy as is_economic','payments.business as business','seatnamings.business as is_business')->first();

        if($query->vip == 1){
           $amount = $query->firstclass;
        }else if($query->is_business == 1){
           $amount = $query->business;
        }else if($query->is_economic == 1){
           $amount = $query->economic;
        }

        Mail::to($email[$i])->send(new BookVehicle($request->date,$request->time,$paymentmode,$amount,$seat[$i],$vehicle,$firstname[$i],$lastname[$i],$idno[$i],$phone[$i],$ticketnumber));

        if( count(Mail::failures()) == 0 ) {

        $booking = new Booking;
        $booking->firstname = $firstname[$i];
        $booking->lastname = $lastname[$i];
        $booking->email = $email[$i];
        $booking->phone = $phone[$i];
        $booking->id_number = $idno[$i];
        $booking->ticketno = $ticketnumber;
        $booking->organization_id = $organization->id;
        $booking->amount = str_replace(',','',$amount);
        $booking->seatno = $seat[$i];
        $booking->mode_of_payment = $paymentmode;
        $booking->type = $request->type;
        $booking->travel_date = $datetime;
        $booking->origin = $request->origin;
        $booking->destination = $request->destination;
        $booking->status = 'approved';
        $booking->date = date('Y-m-d');
        $booking->vehicle_id = $request->vehicle;
        $booking->created_at = date('Y-m-d H:i:s');
        $booking->updated_at = date('Y-m-d H:i:s');
        $booking->save();
        
        $data['success'] = "Book Successful";
        echo json_encode($data);
        }else{
        $data['success'] = "error";
        echo json_encode($data);
        }
        }
}
}
