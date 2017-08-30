@extends('layouts.travel')

<style type="text/css">

   .checkboxes label {
    display: block !important;
    float: left !important;
    padding-right: 10px !important;
    width: 60px !important;
    margin-bottom: 5px !important;
    white-space: nowrap !important;
    }

   .checkboxes input {
    vertical-align: middle !important;
    width:20px !important;
    }

   .checkboxes label span {
    vertical-align: middle !important;
    margin-bottom: -50px !important;
    }

    .modal { overflow: auto !important; }
   </style>

@section('content')
<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Payments</h2>
        </div>

        <?php $currency = ''; ?>
       @if($organization->currency_shortname == null || $organization->currency_shortname == '')
       <?php $currency = 'KES'; ?>
       @else
       <?php $currency = $organization->currency_shortname; ?>
       @endif

      <div style="margin-bottom:20px;margin-left:10px;">
      <a data-toggle="modal" id="report" href="#modal-report" class="btn btn-warning">Payment Report</a>&emsp;<a data-toggle="modal" id="graph" href="#modal-graph" class="btn btn-primary">Graph</a><span style="color: #18a689;float: right;font-size: 16px">Total Amount : {{$currency.' '.number_format($total,2)}}</span>
      </div>

      
          

                        <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="{{url('report/payments')}}" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             {{ csrf_field() }}
                                             <div class="form-group">
                                                <label for="username">From <span style="color:red">*</span></label>
                                                <div class="right-inner-addon ">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                                <input class="form-control datepicker" readonly="readonly" placeholder="" type="text" required="" name="from" id="from">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="username">To <span style="color:red">*</span></label>
                                                <div class="right-inner-addon ">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                                <input class="form-control datepicker" readonly="readonly" placeholder="" required="" type="text" name="to" id="to">
                                                </div>
                                              </div>

                                             <div class="form-group"><label>Report Type <span style="color:red">*</span></label> 
                                            <select required="" id="type" name="type" class="form-control">
                                             <option value="">Select Report Type</option>
                                             <option value="pdf"> PDF</option>
                                             <option value="excel"> Excel</option>
                                             </select>
                                             <p id="destination" style="color:red"></p>
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                            <input type="submit" class="btn btn-primary sub-form" value="Select" />
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                       <div class="modal fade" id="modal-singlereport" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="{{url('report/single/payment')}}" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             {{ csrf_field() }}
                                            <input type="hidden" name="id" id="id">
                                            <div class="form-group"><label>Report Type <span style="color:red">*</span></label> 
                                            <select required="" id="type" name="type" class="form-control">
                                             <option value="">Select Report Type</option>
                                             <option value="pdf"> PDF</option>
                                             <option value="excel"> Excel</option>
                                             </select>
                                             <p id="destination" style="color:red"></p>
                                             </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                            <input type="submit" class="btn btn-primary sub-form" value="Select" />
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="modal-graph" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form action="{{url('report/graph/booking')}}" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             {{ csrf_field() }}

                                            <div class="form-group"><label>Period <span style="color:red">*</span></label> 
                                             <select required="" id="period" name="period" class="form-control">
                                             <option value="">Select Period</option>
                                             <option value="range"> Year Range</option>
                                             <option value="specific"> Specific Year</option>
                                             </select>
                                             <p id="destination" style="color:red"></p>
                                             </div>

                                             <div id="rangeyears">

                                             <div class="form-group">
                                                <label for="username">From <span style="color:red">*</span></label>
                                                <div class="right-inner-addon ">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                                <input class="form-control year" readonly="readonly" placeholder="" type="text" required="" name="from" id="from">
                                                </div>
                                              </div>

                                              <div class="form-group">
                                                <label for="username">To <span style="color:red">*</span></label>
                                                <div class="right-inner-addon ">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                                <input class="form-control year" readonly="readonly" placeholder="" type="text" required="" name="to" id="to">
                                                </div>
                                              </div>

                                             </div>

                                              <div id="specificyear">

                                             <div class="form-group">
                                                <label for="username">Year <span style="color:red">*</span></label>
                                                <div class="right-inner-addon ">
                                                <i class="glyphicon glyphicon-calendar"></i>
                                                <input class="form-control year" readonly="readonly" placeholder="" type="text" required="" name="year" id="year">
                                                </div>
                                              </div>

                                             </div>

                                             <div class="form-group"><label>Graph Type <span style="color:red">*</span></label> 
                                            <select required="" id="type" name="type" class="form-control">
                                             <option value="">Select Graph Type</option>
                                             <option value="bar"> Bar Chart</option>
                                             <option value="line"> Line Chart</option>
                                             <option value="pie"> Pie Chart</option>
                                             </select>
                                             <p id="destination" style="color:red"></p>
                                             </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                            <input type="submit" class="btn btn-primary sub-form" value="Select" />
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        <div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                            
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Payment</h3>
                                        <table class="table table-bordered table-hover">

                                            <tr>
                                               <td><strong>Ticket No : </strong></td><td class="tdticket"></td>
                                            </tr>

                                            @if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel')
                                            <tr>
                                               <td><strong>Vehicle : </strong></td><td class="tdvehicle"></td>
                                            </tr>
                                            @elseif(Auth::user()->type == 'Events')
                                            <tr>
                                               <td><strong>Event : </strong></td><td class="tdevent"></td>
                                            </tr>
                                            @endif

                                            <tr>
                                               <td><strong>Customer : </strong></td><td class="tdcustomer"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Date Booked : </strong></td><td class="tddate"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Payment Option : </strong></td><td class="tdmode"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Amount : </strong></td><td class="tdamount"></td>
                                            </tr>

                                        </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
       

        <div class="table-responsive" style="border: none; min-height: 1000px !important">
        <table id="users" class="table table-condensed table-responsive table-hover">


      <thead style="background:#263949">

        <th style="color:#FFF">#</th>
        <th style="color:#FFF">Ticket No.</th>
        @if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel')
        <th style="color:#FFF">Vehicle</th>
        @elseif(Auth::user()->type == 'Events')
        <th style="color:#FFF">Event</th>
        @endif
        <th style="color:#FFF">Customer</th>
        <th style="color:#FFF">Date Booked</th>
        <th style="color:#FFF">Payment Option</th>
        <th style="color:#FFF">Amount ({{$currency}})</th>
        <th style="color:#FFF">Action</th>

      </thead>
      <tbody class="displayrecord">
      <?php $i=1;?>
      @foreach($payments as $payment)
        <tr class="{{'del'.$payment->id}}">
          <td>{{$i}}</td>
          <td>{{$payment->ticketno}}</td>
           @if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel')
          <td>{{App\Booking::getVehicle($payment->vehicle_id)->regno.' '.App\Booking::getVehicle($payment->vehicle_id)->vehiclename->name}}</td>
          @elseif(Auth::user()->type == 'Events')
          <td>{{App\Booking::getEvent($payment->event_id)->name}}</td>
          @endif
          <td>{{$payment->firstname.' '.$payment->lastname}}</td>
          <td>{{$payment->date}}</td>
          <td>{{$payment->mode_of_payment}}</td>
          <td>{{number_format($payment->amount,2)}}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    @if(Auth::user()->type != 'Events' && Auth::user()->type != 'Hotel')
                    <li><a class="view" data-toggle="modal" data-ticket="{{$payment->ticketno}}" data-vehicle="{{App\Booking::getVehicle($payment->vehicle_id)->regno.' '.App\Booking::getVehicle($payment->vehicle_id)->vehiclename->name}}" data-customer="{{$payment->firstname.' '.$payment->lastname}}" data-date="{{$payment->date}}" data-mode="{{$payment->mode_of_payment}}" data-amount="{{number_format($payment->amount,2)}}"  data-id="{{$payment->id}}" href="#modal-view">View</a></li>
                    @elseif(Auth::user()->type == 'Hotel')
                    <li><a class="view" data-toggle="modal" data-ticket="{{$payment->ticketno}}" data-customer="{{$payment->firstname.' '.$payment->lastname}}" data-date="{{$payment->date}}" data-mode="{{$payment->mode_of_payment}}" data-amount="{{number_format($payment->amount,2)}}"  data-id="{{$payment->id}}" href="#modal-view">View</a></li>
                    @else
                    <li><a class="view" data-toggle="modal" data-ticket="{{$payment->ticketno}}" data-event="{{App\Booking::getEvent($payment->event_id)->name}}" data-customer="{{$payment->firstname.' '.$payment->lastname}}" data-date="{{$payment->date}}" data-mode="{{$payment->mode_of_payment}}" data-amount="{{number_format($payment->amount,2)}}"  data-id="{{$payment->id}}" href="#modal-view">View</a></li>
                    @endif
                    <li><a class="sreport" data-toggle="modal" data-id="{{$payment->id}}" href="#modal-singlereport">Report</a></li>
                
                  </ul>
              </div>

                    </td>
        </tr>
        <?php $i++; ?>
      @endforeach
      </tbody>


    </table>
    </div>
    </div>

@include('includes.footer')

<script type="text/javascript">
   $(document).ready(function() {

    $('#rangeyears').hide();
    $('#specificyear').hide();
    $('#period').change(function(){
    if($(this).val() == "range"){
    $('#rangeyears').show();
    $('#specificyear').hide();
    }else{
    $('#specificyear').show();
    $('#rangeyears').hide();
    }
    });

   $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var vehicle = $(this).data('vehicle');
     var customer = $(this).data('customer');
     var date = $(this).data('date');
     var mode = $(this).data('mode');
     var amount = $(this).data('amount');
     var ticket = $(this).data('ticket');
     var event = $(this).data('event');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

     //$('#update').removeAttr('disabled');
     $(".modal-body .tdticket").html( ticket );
     $(".modal-body .tdvehicle").html( vehicle );
     $(".modal-body .tdcustomer").html( customer );
     $(".modal-body .tddate").html( date );
     $(".modal-body .tdmode").html( mode );
     $(".modal-body .tdamount").html("{{$currency}} "+ amount );
     $(".modal-body .tdevent").html( event );
     /*$(".modal-body #id").val( id );
     $('#title').html('Update Currency');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     $("#submit").attr("id", "update");
      $("#form").attr("action", "currencies/update");*/
   });

   $("#users").on("click",".sreport", function(){
     var id = $(this).data('id');
     
     $(".modal-body #id").val( id );
    
   });

   $("#users").on("click",".delete", function(){
    
                var id = $(this).attr("id");
                var token = $("#delform input[name=_token]").val();
                //alert(id);
         
                if(confirm("Are you sure you want to delete this vehicle?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('vehicles/delete')}}",
                        data: {id:id,_token:token},
                        success: function(response){
                           //alert(response);
                           if(response == 1){
                            $('.check-error').show();
                            $('.check-error').html("That Vehicle can`t be deleted because its assigned to a registration number!");
                            setTimeout(function() {
                            $(".check-error").hide('blind', {}, 500)
                            }, 5000);
                          }else{
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Vehicle',
    message: ' successfully deleted....',
    url: '',
    target: '_blank'
},{
    // settings
    element: 'body',
    position: null,
    type: "info",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "top",
        align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 2000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>' 
});
                        }
                      },
                        error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                       setTimeout(function(){ 
                       alert("An error occured....Please reload page and try again!!!"); 
                       $('#loading').hide();
                       location.reload();
                       }, 10000);
                        //return false;
                     } 

                    });
                }else{
                    //return false;
        }
            });   


  $("#users").on("click",".deactivate", function(){
    
                var id = $(this).attr("id");
                var token = $("#deactiveform input[name=_token]").val();
                //alert(id);
         
                if(confirm("Are you sure you want to deactivate this vehicle?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('vehicles/deactivate')}}",
                        data: {id:id,_token:token},
                        success: function(){
                           //alert(response);
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Vehicle',
    message: ' successfully deactivated....',
    url: '',
    target: '_blank'
},{
    // settings
    element: 'body',
    position: null,
    type: "info",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "top",
        align: "right"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 2000,
    timer: 1000,
    url_target: '_blank',
    mouse_over: null,
    animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>' 
});
                        },
                        error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                       setTimeout(function(){ 
                       alert("An error occured....Please reload page and try again!!!"); 
                       $('#loading').hide();
                       location.reload();
                       }, 10000);
                        //return false;
                     } 

                    });
                }else{
                    //return false;
        }
            });      
  });
   </script>

@endsection