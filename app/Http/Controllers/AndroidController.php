<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;

use App\Mail\Book;

use App\Carhire;

use App\Booking;

use App\Organization;

use DateTime;

class AndroidController extends Controller
{
    //
    public function getCars(Request $request)
    {
    	$carhires = Carhire::where('location',$request->location)->get();
        
        return json_encode($carhires);
    }

    public function getLocations()
    {
    	$carhires = Carhire::select("location")->distinct()->get();
        
        return json_encode($carhires);
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
