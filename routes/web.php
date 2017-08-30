<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login/{success}', function ($success) {
	$success = "Successfully registered organization! Please wait for confirmation from the admin";
    return view('auth.login',compact('success'));
});

Route::post('/create','Auth\RegisterController@create');

Auth::routes();

Route::get('/', function () {
	if(Auth::user() && Auth::user()->status == 1){
	if(Auth::user()->type == 'Travel'){
	$bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
	$schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
	$vehicles = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
	$destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
	$customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->sum('amount');

    return view('travel.dashboard',compact('bookings','organization','schedules','vehicles','destinations','customers','payments'));
	}else if(Auth::user()->type == 'Taxi'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $vehicles = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
    $destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('taxi.dashboard',compact('bookings','organization','vehicles','destinations','customers','payments'));
    }else if(Auth::user()->type == 'SGR'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $trains = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
    $destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('sgr.dashboard',compact('bookings','organization','schedules','trains','destinations','customers','payments'));
    }else if(Auth::user()->type == 'Airline'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $vehicles = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
    $destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('airlines.dashboard',compact('bookings','schedules','organization','vehicles','destinations','customers','payments'));
    }else if(Auth::user()->type == 'Events'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $events = App\Event::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('events.dashboard',compact('bookings','schedules','organization','events','destinations','customers','payments'));
    }else if(Auth::user()->type == 'Hotel'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $rooms = App\Room::where('organization_id',Auth::user()->organization_id)->count();
    $foods = App\Food::where('organization_id',Auth::user()->organization_id)->count();
    $branches = App\Branch::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('hotels.dashboard',compact('bookings','schedules','organization','rooms','foods','branches','destinations','customers','payments'));
    }
    }else{
    return view('auth.login');
    }
});

Route::get('/userconfirmation/{name}', 'Auth\RegisterController@confirmation');

Route::group(['middleware'=>'auth'],function(){
Route::get('/dashboard', function () {
	if(Auth::user()->type == 'Travel'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
	$schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
	$vehicles = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
	$destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
	$customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('travel.dashboard',compact('bookings','organization','schedules','vehicles','destinations','customers','payments'));
	}else if(Auth::user()->type == 'Taxi'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $vehicles = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
    $destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('taxi.dashboard',compact('bookings','organization','vehicles','destinations','customers','payments'));
    }else if(Auth::user()->type == 'SGR'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $trains = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
    $destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('sgr.dashboard',compact('bookings','schedules','organization','trains','destinations','customers','payments'));
    }else if(Auth::user()->type == 'Airline'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $vehicles = App\Vehicle::where('organization_id',Auth::user()->organization_id)->count();
    $destinations = App\Route::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('airlines.dashboard',compact('bookings','schedules','organization','vehicles','destinations','customers','payments'));
    }else if(Auth::user()->type == 'Events'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $events = App\Event::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('events.dashboard',compact('bookings','schedules','organization','events','destinations','customers','payments'));
    }else if(Auth::user()->type == 'Hotel'){
    $bookings = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->count();
    $organization = App\Organization::find(Auth::user()->organization_id);
    $rooms = App\Room::where('organization_id',Auth::user()->organization_id)->count();
    $branches = App\Branch::where('organization_id',Auth::user()->organization_id)->count();
    $foods = App\Food::where('organization_id',Auth::user()->organization_id)->count();
    $schedules = App\Schedule::where('organization_id',Auth::user()->organization_id)->count();
    $customers = DB::table('bookings')
                     ->select(DB::raw('DISTINCT(CONCAT(firstname, id_number))'))
                     ->where('organization_id',Auth::user()->organization_id)
                     ->count();
    $payments = DB::table('bookings')
                     ->where('organization_id',Auth::user()->organization_id)
                     ->where('status','approved')
                     ->sum('amount');

    return view('hotels.dashboard',compact('bookings','schedules','organization','rooms','foods','branches','destinations','customers','payments'));
    }    
});

/*Travel Routes*/

Route::get('vehiclenames', 'VehiclenamesController@index');
Route::get('vehiclenames/showrecord', 'VehiclenamesController@showrecord');
Route::post('vehiclenames/store', 'VehiclenamesController@store');
Route::post('vehiclenames/update', 'VehiclenamesController@update');
Route::post('vehiclenames/delete', 'VehiclenamesController@delete');
Route::post('report/vehiclenames', 'ReportsController@vehiclenames');

Route::get('destinations', 'DestinationsController@index');
Route::get('destinations/showrecord', 'DestinationsController@showrecord');
Route::post('destinations/store', 'DestinationsController@store');
Route::post('destinations/update', 'DestinationsController@update');
Route::post('destinations/delete', 'DestinationsController@delete');
Route::post('report/destinations', 'ReportsController@destinations');

Route::get('vehicles', 'VehicleController@index');
Route::get('vehicles/showrecord', 'VehicleController@showrecord');
Route::post('vehicles/store', 'VehicleController@store');
Route::post('vehicles/update', 'VehicleController@update');
Route::post('vehicles/delete', 'VehicleController@delete');
Route::post('vehicles/deactivate', 'VehicleController@deactivate');
Route::post('vehicles/activate', 'VehicleController@doactivate');
Route::get('vehicles/activate', 'VehicleController@activate');
Route::post('report/vehicles', 'ReportsController@vehicles');

Route::get('schedules', 'SchedulesController@index');
Route::get('schedules/showrecord', 'SchedulesController@showrecord');
Route::post('schedules/store', 'SchedulesController@store');
Route::post('schedules/update', 'SchedulesController@update');
Route::post('schedules/delete', 'SchedulesController@delete');
Route::post('report/schedules', 'ReportsController@schedules');

Route::get('seatassignments', 'SeatNamingsController@index');
Route::get('seatassignments/showrecord', 'SeatNamingsController@showrecord');
Route::post('seatassignments/store', 'SeatNamingsController@store');
Route::post('seatassignments/update', 'SeatNamingsController@update');
Route::post('seatassignments/delete', 'SeatNamingsController@delete');
Route::post('report/seatassignments', 'ReportsController@seatassignments');

Route::get('paymentoptions', 'PaymentsController@index');
Route::get('paymentoptions/showrecord', 'PaymentsController@showrecord');
Route::post('paymentoptions/store', 'PaymentsController@store');
Route::post('paymentoptions/update', 'PaymentsController@update');
Route::post('paymentoptions/delete', 'PaymentsController@delete');
Route::post('report/paymentoptions', 'ReportsController@paymentoptions');

Route::get('events', 'EventsController@index');
Route::get('events/showrecord', 'EventsController@showrecord');
Route::post('events/store', 'EventsController@store');
Route::post('events/update', 'EventsController@update');
Route::post('events/delete', 'EventsController@delete');
Route::post('report/events', 'ReportsController@events');

Route::get('currencies', 'CurrenciesController@index');
Route::get('currencies/showrecord', 'CurrenciesController@showrecord');
Route::post('currencies/store', 'CurrenciesController@store');
Route::post('currencies/update', 'CurrenciesController@update');
Route::post('currencies/delete', 'CurrenciesController@delete');
Route::post('report/currencies', 'ReportsController@currencies');

Route::get('organizations', 'OrganizationsController@index');
Route::get('organizations/showrecord', 'OrganizationsController@showrecord');
Route::post('organizations/update', 'OrganizationsController@update');
Route::get('report/organization', 'ReportsController@organization');
Route::post('report/payments', 'ReportsController@payments');
Route::get('mails', 'OrganizationsController@mails');
Route::post('mails/update', 'OrganizationsController@mailupdate');
Route::get('mails/showrecord', 'OrganizationsController@mailsettings');

Route::get('profile', 'UsersController@profile');
Route::post('user/update', 'UsersController@update');
Route::post('user/password', 'UsersController@password');
Route::post('user/checkpassword', 'UsersController@checkpassword');

Route::get('bookings', 'BookingsController@index');
Route::post('report/bookings', 'ReportsController@bookings');
Route::post('report/single/booking', 'ReportsController@singlebooking');
Route::post('report/graph/booking', 'ReportsController@graphbooking');
Route::get('customers', 'BookingsController@customers');
Route::post('report/customers', 'ReportsController@customers');
Route::post('report/single/customer', 'ReportsController@singlecustomer');
Route::post('report/graph/customer', 'ReportsController@graphcustomer');
Route::get('payments', 'BookingsController@payments');
Route::post('report/payments', 'ReportsController@payments');
Route::post('report/single/payment', 'ReportsController@singlepayment');
Route::post('report/graph/payment', 'ReportsController@graphbooking');

Route::get('hotelbranches','HotelBranchesController@index');
Route::get('hotelbranches/showrecord', 'HotelBranchesController@showrecord');
Route::post('hotelbranches/store', 'HotelBranchesController@store');
Route::post('hotelbranches/update', 'HotelBranchesController@update');
Route::post('hotelbranches/delete', 'HotelBranchesController@delete');
Route::post('report/branches', 'ReportsController@branches');
//Hotel Calendar Routes
Route::get('hotelcalendar','HotelCalendarController@index');
Route::post('hotelcalendar/store', 'HotelCalendarController@store');
Route::post('hotelcalendar/update', 'HotelCalendarController@update');
Route::post('hotelcalendar/delete', 'HotelCalendarController@delete');
//Hotel Rooms Routes
Route::get('hotelrooms','HotelRoomsController@index');
Route::post('hotelrooms/store', 'HotelRoomsController@store');
Route::get('hotelrooms/showrecord', 'HotelRoomsController@showrecord');
Route::post('hotelrooms/update', 'HotelRoomsController@update');
Route::post('hotelrooms/delete', 'HotelRoomsController@delete');
Route::post('report/rooms', 'ReportsController@rooms');
//Hotel Room Types
Route::get('roomtype','RoomTypesController@index');
Route::post('roomtype/store', 'RoomTypesController@store');
Route::post('roomtype/update', 'RoomTypesController@update');
Route::post('roomtype/delete', 'RoomTypesController@delete');
Route::get('roomtype/showrecord', 'RoomTypesController@showrecord');
Route::post('report/roomtypes', 'ReportsController@roomtypes');
//Room Pricing
Route::get('pricing','PricingController@index');
Route::post('pricing/store', 'PricingController@store');
Route::post('pricing/update', 'PricingController@update');
Route::post('pricing/delete', 'PricingController@delete');
Route::get('pricing/showrecord', 'PricingController@showrecord');
Route::post('report/pricing', 'ReportsController@pricing');
//Room Deposits
Route::get('deposits','DepositsController@index');
Route::post('deposits/store', 'DepositsController@store');
Route::post('deposits/update', 'DepositsController@update');
Route::post('deposits/delete', 'DepositsController@delete');
Route::get('deposits/showrecord', 'DepositsController@showrecord');
Route::post('report/deposits', 'ReportsController@deposits');
//Hotel Reservations Routes
Route::get('hotelreservations','HotelReservationsController@index');
Route::post('hotelreservations/store', 'HotelReservationsController@store');
Route::post('hotelreservations/update', 'HotelReservationsController@update');
Route::post('hotelreservations/delete', 'HotelReservationsController@delete');

Route::get('api/getCapcity', function(Illuminate\Http\Request $request){
    $id = $request->option;
    $vehicle = App\Vehicle::find($id);
    $capacity = $vehicle->capacity;

    $seats = App\Seatnaming::where('vehicle_id',$id)->get();

    $display = "";

    if(count($seats) == 0){
    if(Auth::user()->type == 'Travel'){
    $display .="
        <div class='form-group'>
           <label>Apply to all vehicles
           <input class='apply' name='apply' id='apply' type='checkbox'>
           </label>
        <p id='paymenterror' style='color:red'></p>
        </div>";
    }else if(Auth::user()->type == 'Airline'){
    $display .="
        <div class='form-group'>
           <label>Apply to all planes
           <input class='apply' name='apply' id='apply' type='checkbox'>
           </label>
        <p id='paymenterror' style='color:red'></p>
        </div>";
    }else{
    $display .="
        <div class='form-group'>
           <label>Apply to all trains
           <input class='apply' name='apply' id='apply' type='checkbox'>
           </label>
        <p id='paymenterror' style='color:red'></p>
        </div>";
    }  
    }else{
    if(Auth::user()->type == 'Travel'){
    $display .="
        <div class='form-group'>
           <label>Apply to all vehicles
           <input class='apply' name='apply' id='apply' type='checkbox' checked>
           </label>
        <p id='paymenterror' style='color:red'></p>
        </div>";
    }else if(Auth::user()->type == 'Airline'){
    $display .="
        <div class='form-group'>
           <label>Apply to all planes
           <input class='apply' name='apply' id='apply' type='checkbox' checked>
           </label>
        <p id='paymenterror' style='color:red'></p>
        </div>";
    }else{
    $display .="
        <div class='form-group'>
           <label>Apply to all trains
           <input class='apply' name='apply' id='apply' type='checkbox' checked>
           </label>
        <p id='paymenterror' style='color:red'></p>
        </div>";
    } 
    }  

    if(Auth::user()->type == 'Airline'){
    $display .="   
        <input name='capacity' type='hidden' id='capacity' value='$capacity'  />
        <tr>
            <th width='100'>Seat #</th>
            <th width='50'><span style='margin-right:20px; '>VIP</span><span style='margin-right:20px; '>Business</span>Economy</th>
        </tr>";
    }else{
    $display .="   
        <input name='capacity' type='hidden' id='capacity' value='$capacity'  />
        <tr>
            <th width='100'>Seat #</th>
            <th width='50'><span style='margin-right:20px; '>VIP</span>Normal</th>
        </tr>"; 
    }
        if(count($seats) == 0){
        
        for($i=0;$i<$capacity;$i++){
        $x = $i+1;
        if(Auth::user()->type == 'Airline'){
        $display .="
        <tr>
            <td><span>Seat $x:</span></td>
            <td>
              <div>
                 <input style='margin-right: 28px;' name='vip[]' type='checkbox' id='vip$x' class='group$x inputVip'  />
                 <input style='margin-right: 74px;' name='business[]' type='checkbox' id='business$x' class='group$x inputBusiness'  />
                 <input type='checkbox' name='normal[]' id='normal$x' class='group$x inputNormal' />
              </div>
            </td>
            </tr>";
          }else{
          $display .="
          <tr>
            <td><span>Seat $x:</span></td>
            <td>
              <div>
                 <input style='margin-right: 28px;' name='vip[]' type='checkbox' id='vip$x' class='group$x inputVip'  />
                 <input type='checkbox' name='normal[]' id='normal$x' class='group$x inputNormal' />
              </div>
            </td>
            </tr>"; 
          }
          } 

          $display .="<button type='button' id='update' class='btn btn-primary'>Save changes</button>";

        }else{
        $x=1;
        foreach ($seats as $seat) {
        $display .="
        <tr>
            <td><span>Seat $x:</span></td>
            <td>
              <div>";

        if(Auth::user()->type == 'Airline'){
              if($seat->vip == 1){
                $display .="
                 <input style='margin-right: 28px;' name='vip[]' type='checkbox' id='vip$x' class='group$x inputVip' checked />";
              }else{
                $display .="
                 <input style='margin-right: 28px;' name='vip[]' type='checkbox' id='vip$x' class='group$x inputVip'  />";
              }

              if($seat->business == 1){
                $display .="
                 <input style='margin-right: 74px;' name='business[]' type='checkbox' id='business$x' class='group$x inputBusiness' checked />";
              }else{
                $display .="
                 <input style='margin-right: 74px;' name='business[]' type='checkbox' id='business$x' class='group$x inputBusiness'  />";
              }

              if($seat->economy == 1){
                $display .="
                 <input type='checkbox' name='normal[]' id='normal$x' class='group$x inputNormal' checked/>";
              }else{
                $display .="
                 <input type='checkbox' name='normal[]' id='normal$x' class='group$x inputNormal' />";
              }

        }else{
            if($seat->vip == 1){
                $display .="
                 <input style='margin-right: 28px;' name='vip[]' type='checkbox' id='vip$x' class='group$x inputVip' checked />";
              }else{
                $display .="
                 <input style='margin-right: 28px;' name='vip[]' type='checkbox' id='vip$x' class='group$x inputVip'  />";
              }

              if($seat->economy == 1){
                $display .="
                 <input type='checkbox' name='normal[]' id='normal$x' class='group$x inputNormal' checked/>";
              }else{
                $display .="
                 <input type='checkbox' name='normal[]' id='normal$x' class='group$x inputNormal' />";
              }
        }

            $display .="
              </div>
            </td>
            </tr>";
            $x++;
          } 

          $display .="<button type='button' id='update' class='btn btn-primary'>Save changes</button>";
        }
        return $display;
        
});

Route::get('graphdata', function () {
   $arr = array();
    for ($i=1; $i <= 12; $i++) {   
    $amount = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->whereMonth('date', '=', $i)->whereYear('date', '=', date('Y'))->sum('amount');
    array_push($arr, $amount);
    }

    echo json_encode($arr);
});

Route::get('bookgraph', function (Illuminate\Http\Request $request) {
   $arr = array();
   $year = $request->year;
    for ($i=1; $i <= 12; $i++) {   
    $amount = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->whereMonth('date', '=', $i)->whereYear('date', '=', $year)->sum('amount');
    array_push($arr, $amount);
    }

    echo json_encode($arr);
});

Route::get('rangebookgraph', function (Illuminate\Http\Request $request) {
   $arr = array();
   $from = $request->from;
   $to = $request->to;  
   for ($i=$from; $i <= $to; $i++) {   
   $amount = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->whereYear('date', '=', $i)->sum('amount');
    array_push($arr, $amount);
    }

    echo json_encode($arr);
});

Route::get('labelbookgraph', function (Illuminate\Http\Request $request) {
   $arr = array();
   $from = $request->from;
   $to = $request->to;  
    for ($i=$from; $i <= $to; $i++) {   
    array_push($arr, $i);
    }

    echo json_encode($arr);
});

Route::get('custgraph', function (Illuminate\Http\Request $request) {
   $arr = array();
   $year = $request->year;
    for ($i=1; $i <= 12; $i++) {   
    $customers = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->whereMonth('date', '=', $i)->whereYear('date', '=', $year)->count();
    array_push($arr, $customers);
    }

    echo json_encode($arr);
});

Route::get('rangecustgraph', function (Illuminate\Http\Request $request) {
   $arr = array();
   $from = $request->from;
   $to = $request->to;
    for ($i=$from; $i <= $to; $i++) {   
    $customers = App\Booking::where('organization_id',Auth::user()->organization_id)->where('status','approved')->whereYear('date', '=', $i)->count();
    array_push($arr, $customers);
    }

    echo json_encode($arr);
});

Route::get('apk', function () {
        $file= public_path(). "/uploads/apk/tmapp.apk";
        
        return Response::download($file, "TmApp.apk");
});

Route::get('reports/test', 'ReportsController@test');
Route::get('reports/excel', 'ReportsController@excel');
});

Route::get('/login/{success}', function ($success) {
    $success = "Successfully registered organization! Please wait for confirmation from the admin";
    return view('auth.login',compact('success'));
});
Auth::routes();

Route::get('/home', 'HomeController@index');
