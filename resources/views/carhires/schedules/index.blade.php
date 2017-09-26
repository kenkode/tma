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
            <h2>Schedules</h2>
        </div>

      <div style="margin-bottom:20px;margin-left:10px;">
      <a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">Add Schedule</a>&emsp;<a href="#modal-report" data-toggle="modal" id="report" class="btn btn-warning">Schedule Report</a>
      </div>

      
           <form id="form" action="" enctype="multipart/form-data">
           {{ csrf_field() }}
            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                            
                                        <div class="modal-body">
                                        <div id="loading" style="display:none;">
                                         <div style="margin-top:5%;"><p id="sucessmessage">Saving data</p>
                                         <img src="{{url('/assets/images/ellipsis.svg')}}" alt="...." />
                                         </div>
                                         </div>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Create Schedule</h3>
                                             <input type="hidden" id="id" placeholder="Enter name" class="form-control">
                                             
                                             <div class="form-group"><label>Name <span style="color:red">*</span></label> 
                                             <select id="vid" class="form-control">
                                             <option value="">Select Vehicle</option>
                                             @foreach($vehicles as $vehicle)
                                             <option value="{{ $vehicle->id }}"> {{ $vehicle->regno.'-'.$vehicle->vehiclename->name }}</option>
                                             @endforeach
                                             </select>
                                             <p id="selname" style="color:red"></p>
                                             </div>
                                             
                                             <div class="form-group"><label>Origin <span style="color:red">*</span></label> 
                                             <select id="oid" class="form-control">
                                             <option value="">Select Origin</option>
                                             @foreach($destinations as $destination)
                                             <option value="{{ $destination->id }}"> {{ $destination->name }}</option>
                                             @endforeach
                                             </select>
                                             <p id="origin" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Destination <span style="color:red">*</span></label> 
                                            <select id="did" class="form-control">
                                             <option value="">Select Destination</option>
                                             @foreach($destinations as $destination)
                                             <option value="{{ $destination->id }}"> {{ $destination->name }}</option>
                                             @endforeach
                                             </select>
                                             <p id="destination" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Arrival Time <span style="color:red">*</span></label> 
                                             <div class="right-inner-addon">
                                             <i class="glyphicon glyphicon-calendar"></i>
                                             <input type="text" class="form-control" name='arrival' id='datetimepicker' placeholder="Arrival Date">
                    
                                             </div>
                                             <p id="arrerror" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Departure Time <span style="color:red">*</span></label> 

                                             <div class="right-inner-addon">
                                             <i class="glyphicon glyphicon-calendar"></i>
                                             <input type="text" class="form-control" name='departure' id='dp' placeholder="Departure Date">
                                             </div>
                                             <p id="deperror" style="color:red"></p>
                                             </div>
                                             
                                            <div class="form-group">
                                            <label>Applicable Payments<span style="color:red">*</span> 
                                            <input class="vip" value="1" name="vip" type="checkbox">VIP Fare 
                                            <input class="economic" name="economic" type="checkbox">Economic Fare 
                                            </label>
                                            <p id="paymenterror" style="color:red"></p>
                                      </div>
           
           
                                   </div>
                                        <div class="modal-footer" style="margin-top: 10px !important">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                            <button type="button" id="submit" class="btn btn-primary sub-form">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>   

                        </form>   

        <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="{{url('report/schedules')}}" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             {{ csrf_field() }}
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

                  <div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                            
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Schedule</h3>
                                        <table class="table table-bordered table-hover">

                                            <tr>
                                               <td><strong>Vehicle : </strong></td><td class="tdvehicle"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Origin : </strong></td><td class="tdorigin"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Destination : </strong></td><td class="tddestination"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Arrival : </strong></td><td class="tdarrival"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Departure : </strong></td><td class="tddeparture"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Applicable Fares : </strong></td><td class="tdfare"></td>
                                            </tr>

                                        </table>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

        <div class="check-error alert alert-danger"></div>
        <div class="table-responsive" style="border: none; min-height: 1000px !important">
        <table id="users" class="table table-condensed table-responsive table-hover">


      <thead style="background:#263949">

        <th style="color:#FFF">#</th>
        <th style="color:#FFF">Vehicle</th>
        <th style="color:#FFF">Origin</th>
        <th style="color:#FFF">Destination</th>
        <th style="color:#FFF">Arrival</th>
        <th style="color:#FFF">Departure</th>
        <th style="color:#FFF">Action</th>

      </thead>
      <tbody class="displayrecord">
      <?php $i=1;?>
      @foreach($schedules as $schedule)
        <tr class="{{'del'.$schedule->id}}">
          <td>{{$i}}</td>
          <td>{{App\Schedule::getVehicle($schedule->vehicle_id)->regno.' '.App\Schedule::getVehicle($schedule->vehicle_id)->vehiclename->name}}</td>
          <td>{{App\Schedule::getDestination($schedule->origin_id)->name}}</td>
          <td>{{App\Schedule::getDestination($schedule->destination_id)->name}}</td>
          <td>{{$schedule->arrival}}</td>
          <td>{{$schedule->departure}}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a class="view" data-toggle="modal" data-name="{{App\Schedule::getVehicle($schedule->vehicle_id)->regno.' '.App\Schedule::getVehicle($schedule->vehicle_id)->vehiclename->name}}" data-origin="{{App\Schedule::getDestination($schedule->origin_id)->name}}" data-id="{{$schedule->id}}" data-destination="{{App\Schedule::getDestination($schedule->destination_id)->name}}" data-arrival="{{$schedule->arrival}}" data-departure="{{$schedule->departure}}" data-vip="{{$schedule->firstclass_apply}}" data-economic="{{$schedule->economic_apply}}" href="#modal-view">View</a></li>

                    <li><a class="edit" data-toggle="modal" data-name="{{$schedule->vehicle_id}}" data-origin="{{$schedule ->origin_id}}" data-id="{{$schedule->id}}" data-destination="{{$schedule->destination_id}}" data-arrival="{{$schedule->arrival}}" data-departure="{{$schedule->departure}}" data-vip="{{$schedule->firstclass_apply}}" data-economic="{{$schedule->economic_apply}}" href="#modal-form">Update</a></li>
                    
                    <li><a id="{{$schedule->id}}" class="delete">
                    <form id="delform">
                    {{ csrf_field() }}
                    Delete
                    </form>
                    </a></li>
                    
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

  var submit_url;
  var vid;

  $(document).ready(function() {    
    $('.check-error').hide();
    $('#submit').removeAttr('disabled');
     $('#update').removeAttr('disabled');
     $('#title').html('Create Schedule');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');
     $("#update").attr("id", "submit");
     $('#errors').html("");

     function displaydata(){
       $.ajax({
                      url     : "{{URL::to('schedules/showrecord')}}",
                      type    : "GET",
                      async   : false,
                     
                      success : function(s){
                      $('.displayrecord').html(s)
                      }        
       });
       }

      

   $('#add').on("click", function() {
    $("#update").attr("id", "submit");
     $('#submit').removeAttr('disabled');
     $('#title').html('Create Schedule');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');     
     $('#vid').val('');
     $('#id').val('');
     $('#oid').val('');
     $('#did').val('');
     $('#datetimepicker').val('');
     $('#dp').val('');
     $('.vip').removeAttr('checked');
     $('.economic').removeAttr('checked');
     $('#selname').html("");
     $('#origin').html("");
     $('#destination').html("");
     $('#arrerror').html("");
     $('#deperror').html("");
     $('#paymenterror').html("");
     $("#form").attr("action", "schedules/store");
   });

    $("#users").on("click",".edit", function(){
     var id = $(this).data('id');
     var vid = $(this).data('name');
     var origin = $(this).data('origin');
     var destination = $(this).data('destination');
     var arrival = $(this).data('arrival');
     var departure = $(this).data('departure');
     var vip = $(this).data('vip');
     var economic = $(this).data('economic');

     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     $('#update').removeAttr('disabled');
     $(".modal-body #vid").val(vid);
     $(".modal-body #id").val( id );
     $(".modal-body #oid").val( origin );
     $(".modal-body #did").val( destination );
     $(".modal-body #datetimepicker").val( arrival );
     $(".modal-body #dp").val( departure );

     if(vip == 1){
       $(".modal-body .vip").prop('checked','checked');
     }else{
       $(".modal-body .vip").prop('checked',false);
     }
     if(economic == 1){
       $(".modal-body .economic").prop('checked','checked');
     }else{
       $(".modal-body .economic").prop('checked',false);
     }

     $('#title').html('Update Schedule');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     //$("#submit").attr("id", "update");
     $('.sub-form').remove();
     var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
        $("#modal-form .modal-footer").append(r);
      $("#form").attr("action", "schedules/update");
   });

    $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var vid = $(this).data('name');
     var origin = $(this).data('origin');
     var destination = $(this).data('destination');
     var arrival = $(this).data('arrival');
     var departure = $(this).data('departure');
     var vip = $(this).data('vip');
     var economic = $(this).data('economic');
     var fares = '';

     if(vip == 1 && economic== 1){
     fares = '<ul><li>VIP Fare</li><li>Economic Fare</li></ul>';
     }else if(vip == 0 && economic== 1){
     fares = '<ul><li>Economic Fare</li></ul>'
     }

     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     $('#update').removeAttr('disabled');
     $(".modal-body .tdvehicle").html(vid);
     $(".modal-body .tdorigin").html( origin );
     $(".modal-body .tddestination").html( destination );
     $(".modal-body .tdarrival").html( arrival );
     $(".modal-body .tddeparture").html( departure );
     $(".modal-body .tdfare").html( fares );

     if(vip == 1){
       $(".modal-body .vip").prop('checked','checked');
     }else{
       $(".modal-body .vip").prop('checked',false);
     }
     if(economic == 1){
       $(".modal-body .economic").prop('checked','checked');
     }else{
       $(".modal-body .economic").prop('checked',false);
     }

     $('#title').html('Update Schedule');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     //$("#submit").attr("id", "update");
     $('#selname').html("");
     $('#origin').html("");
     $('#destination').html("");
     $('#arrerror').html("");
     $('#deperror').html("");
     $('#paymenterror').html("");
     $('.sub-form').remove();
     var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
        $("#modal-form .modal-footer").append(r);
      $("#form").attr("action", "schedules/update");
   });

  
       $('body').on("click","#submit", function() {
    
     if($('#vid').val() == ""){
        $('#selname').html("Please select vehicle!");
        return false;
     }else if($('#oid').val() == ""){
        $('#origin').html("Please select origin!");
        return false;
     }else if($('#did').val() == ""){
        $('#destination').html("Please select destination!");
        return false;
     }else if($('#datetimepicker').val() == ""){
        $('#arrerror').html("Please insert vehicle arrival date and time!");
        return false;
     }else if($('#dp').val() == ""){
        $('#deperror').html("Please insert vehicle departure date and time!");
        return false;
     }else if(!($('.economic').is(':checked'))){
        $('#paymenterror').html("Please select economic fare!");
        return false;
     }else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var v = 0;
        if(!($('.vip').is(':checked'))){
        v = 0;
        }else{
        v = 1;
        }
        var vid = $('#vid').val();
        var origin = $("#oid").val();
        var destination = $('#did').val();
        var arrival = $('#datetimepicker').val();
        var departure = $('#dp').val();
        var vip = v;
        var economic = $('.economic').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("vid", vid);
        data.append("origin",origin);
        data.append("_token",token);
        data.append("destination",destination);
        data.append("arrival",arrival);
        data.append("departure",departure);
        data.append("vip",vip);
        data.append("economic",economic);
        //alert($('input[type=file]')[0].files[0]);

        $.ajax({
                      type: "POST",
                      url: urL,
                      data: data,
                      processData: false,
                      contentType: false,
                      beforeSend: function() { $('#loading').show(); },
                      success: function(response) {
                      //alert(response);return;
                      
                      if(response != 1){
                      $('#errors').html(response);
                      }else if(response == 1){
                      $('#submit').removeAttr('disabled');
                      $('#vid').val('');
                      $('#oid').val('');
                      $('#did').val('');
                      $('#datetimepicker').val('');
                      $('#dp').val('');
                      $('.vip').removeAttr('checked');
                      $('.economic').removeAttr('checked');

                      displaydata(); 
                      /*$.alert("Registration Successfully! <br/>A confirmation link has been sent to your email!", {autoClose: true,closeTime: 5000,withTime: false,type: 'success',position: ['center', [-0.25, 0]], title: false,icon:'glyphicon glyphicon-ok',close: '',speed: 'normal',isOnly: true,minTop: 10,animation: false,animShow: 'fadeIn',animHide: 'fadeOut'});*/
                      $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Schedule',
    message: ' successfully created....',
    url: '',
    target: '_blank'
},{
    // settings
    element: 'body',
    position: null,
    allow_duplicates:false,
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
    delay: 3000,
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
                      $('#modal-form').fadeOut();
                      $('body').removeClass('modal-open');
                      $('#loading').hide();
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
     }
   });

       $('body').on("click","#update",function() {
    //alert($('#name').val());
     if($('#vid').val() == ""){
        $('#selname').html("Please select vehicle!");
        return false;
     }else if($('#oid').val() == ""){
        $('#origin').html("Please select origin!");
        return false;
     }else if($('#did').val() == ""){
        $('#destination').html("Please select destination!");
        return false;
     }else if($('#datetimepicker').val() == ""){
        $('#arrerror').html("Please insert vehicle arrival date and time!");
        return false;
     }else if($('#dp').val() == ""){
        $('#deperror').html("Please insert vehicle departure date and time!");
        return false;
     }else if(!($('.economic').is(':checked'))){
        $('#paymenterror').html("Please select economic fare!");
        return false;
     }else{
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var v = 0;
        if(!($('.vip').is(':checked'))){
        v = 0;
        }else{
        v = 1;
        }
        var vid = $('#vid').val();
        var id = $('#id').val();
        var origin = $("#oid").val();
        var destination = $('#did').val();
        var arrival = $('#datetimepicker').val();
        var departure = $('#dp').val();
        var vip = v;
        var economic = $('.economic').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        //alert(chair);

        data.append("vid", vid);
        data.append("id", id);
        data.append("origin",origin);
        data.append("_token",token);
        data.append("destination",destination);
        data.append("arrival",arrival);
        data.append("departure",departure);
        data.append("vip",vip);
        data.append("economic",economic);
        //data.append("logo",$('input[type=file]')[0].files[0].name);

        //alert($('input[type=file]')[0].files[0].name);

        $.ajax({
                      type: "POST",
                      url: urL,
                      data: data,
                      processData: false,
                      contentType: false,
                      beforeSend: function() { $('#loading').show(); },
                      success: function(response) {
                      //alert(response);return;
                      
                      if(response != 1){
                      $('#errors').html(response);
                      }else if(response == 1){
                      $('#update').removeAttr('disabled');
                      displaydata(); 
                      /*$.alert("Registration Successfully! <br/>A confirmation link has been sent to your email!", {autoClose: true,closeTime: 5000,withTime: false,type: 'success',position: ['center', [-0.25, 0]], title: false,icon:'glyphicon glyphicon-ok',close: '',speed: 'normal',isOnly: true,minTop: 10,animation: false,animShow: 'fadeIn',animHide: 'fadeOut'});*/
                      $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Schedule',
    message: ' successfully updated....',
    url: '',
    target: '_blank'
},{
    // settings
    element: 'body',
    allow_duplicates:false,
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
                      $('#modal-form').fadeOut();
                      $('body').removeClass('modal-open');
                      $('#loading').hide();
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
                     }
                     });
     }
   });

   $('#vid').on('change', function() {
     if($('#vid').val() == ""){
        $('#selname').html("Please select vehicle!");
        return false;
     }else{
      $('#selname').html("");
     }
   });
  
   $('#datetimepicker').on('change',function(){
    if($(this).val() == ""){
        $('#arrerror').html("Please insert arrival date and time!");
        return false;
     }else{
      $('#arrerror').html("");
     }
   });

   $('#dp').on('change',function(){
    if($(this).val() == ""){
        $('#deperror').html("Please insert departure date and time!");
        return false;
     }else{
      $('#deperror').html("");
     }
   });

   $('#oid').on('change', function() {
     if($(this).val() == ""){
        $('#origin').html("Please insert origin!");
        return false;
     }else{
      $('#origin').html("");
     }
   });

   $('#did').on('change', function() {
     if($(this).val() == ""){
        $('#destination').html("Please insert destination!");
        return false;
     }else{
      $('#destination').html("");
     }
   });

   $('.economic').on('click', function() {
   if(!($('.economic').is(':checked'))){
        $('#paymenterror').html("Please select economic fare!");
        //return false;
     }else{
        $('#paymenterror').html("");
     }
   });

  });
</script>

<script type="text/javascript">
   $(document).ready(function() {
   $("#users").on("click",".delete", function(){
    
                var id = $(this).attr("id");
                var token = $("#delform input[name=_token]").val();
                //alert(id);
         
                if(confirm("Are you sure you want to delete this schedule?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('schedules/delete')}}",
                        data: {id:id,_token:token},
                        success: function(){
                           //alert(response);
                           
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Schedule',
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