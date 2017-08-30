@extends('layouts.travel')

@section('content')
<?php $currency = ''; ?>
        @if($organization->currency_shortname == null || $organization->currency_shortname == '')
        <?php $currency = 'KES'; ?>
        @else
        <?php $currency = $organization->currency_shortname; ?>
        @endif

        <style type="text/css">
            .modal { overflow: auto !important; }
        </style>

<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Payment Options</h2>
        </div>

      <div style="margin-bottom:20px;margin-left:10px;">
      <span class="addhide"><a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">Add Payment Option</a>&emsp;</span>
      <a href="#modal-report" data-toggle="modal" id="report" class="btn btn-warning">Payment Option Report</a>
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
                                        <h3 id="title" class="m-t-none m-b">Create Payment Option</h3>
                                             <input type="hidden" id="id" placeholder="Enter name" class="form-control" required data-error="Please insert vehicle name">

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

                                             <div class="form-group"><label>VIP Fare</label> 
                                             <input type="text" id="vip" placeholder="Enter VIP Fare" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#vip').priceFormat();
                                             });
                                             </script>
                                             </div>

                                             <div class="form-group"><label>Economic Fare<span style="color:red">*</span></label> 
                                             <input type="text" id="economic" placeholder="Enter Economic Fare" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#economic').priceFormat();
                                             });
                                             </script>
                                             <p id="errors" style="color:red"></p>
                                             </div>

                                    
                                        </div>
                                        <div class="modal-footer">
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
                                        <form target="_blank" action="{{url('report/paymentoptions')}}" method="post">     
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
                                        <h3 id="title" class="m-t-none m-b">Payment Options</h3>
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
                                               <td><strong>VIP Fare : </strong></td><td class="tdvip"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Economic Fare : </strong></td><td class="tdeconomic"></td>
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
        <th style="color:#FFF">VIP Fare ({{$currency}})</th>
        <th style="color:#FFF">Economic Fare ({{$currency}})</th>
        <th style="color:#FFF">Action</th>

      </thead>
      <tbody class="displayrecord">
      <?php $i=1;?>
      @foreach($payments as $payment)
        <tr class="{{'del'.$payment->id}}">
          <td>{{$i}}</td>
          <td>{{App\Payment::getVehicle($payment->vehicle_id)}}</td>
          <td>{{App\Schedule::getDestination($payment->origin_id)->name}}</td>
          <td>{{App\Schedule::getDestination($payment->destination_id)->name}}</td>
          <td>{{number_format($payment->firstclass,2)}}</td>
          <td>{{number_format($payment->economic,2)}}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a class="view" data-toggle="modal" data-vip="{{number_format($payment->firstclass,2)}}" data-economic="{{number_format($payment->economic,2)}}" data-id="{{$payment->id}}" data-name="{{App\Payment::getVehicle($payment->vehicle_id)}}" data-origin="{{App\Schedule::getDestination($payment->origin_id)->name}}" data-destination="{{App\Schedule::getDestination($payment->destination_id)->name}}" href="#modal-view">View</a></li>

                    <li><a class="edit" data-toggle="modal" data-vip="{{number_format($payment->firstclass,2)}}" data-economic="{{number_format($payment->economic,2)}}" data-origin="{{$payment ->origin_id}}" data-destination="{{$payment->destination_id}}" data-id="{{$payment->id}}" data-name="{{$payment->vehicle_id}}"  href="#modal-form">Update</a></li>
                   
                    <li><a id="{{$payment->id}}" class="delete">
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
  var id;

  $(document).ready(function() {    
    $('.check-error').hide();
    $('#submit').removeAttr('disabled');
     $('#update').removeAttr('disabled');
     $('#title').html('Create Payment Option');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');
     $("#update").attr("id", "submit");
     $('#errors').html("");
     $('#selname').html("");

     function displaydata(){
       $.ajax({
                      url     : "{{URL::to('paymentoptions/showrecord')}}",
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
     $('#title').html('Create Payment Option');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');     
     $('#vip').val('');
     $('#vid').val('');
     $('#oid').val('');
     $('#did').val('');
     $('#economic').val('');
     $('#id').val('');
     $('#errors').html("");
     $('#selname').html("");
     $('#origin').html("");
     $('#destination').html("");
     $("#form").attr("action", "paymentoptions/store");
   });

    $("#users").on("click",".edit", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');
     var vip = $(this).data('vip');
     var origin = $(this).data('origin');
     var destination = $(this).data('destination');
     var economic = $(this).data('economic');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

     $('#update').removeAttr('disabled');
     $(".modal-body #vid").val( name );
     $(".modal-body #id").val( id );
     $(".modal-body #vip").val( vip );
     $(".modal-body #oid").val( origin );
     $(".modal-body #did").val( destination );
     $(".modal-body #economic").val( economic );
     $('#title').html('Update Payment Option');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     //$("#submit").attr("id", "update");
     $('#errors').html("");
     $('#selname').html("");
     $('#origin').html("");
     $('#destination').html("");
     $('.sub-form').remove();
     var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
        $("#modal-form .modal-footer").append(r);
     $("#form").attr("action", "paymentoptions/update");
   });

    $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');
     var vip = $(this).data('vip');
     var origin = $(this).data('origin');
     var destination = $(this).data('destination');
     var economic = $(this).data('economic');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

     $('#update').removeAttr('disabled');
     $(".modal-body .tdvehicle").html( name );
     $(".modal-body .tdvip").html( '{{$currency}} '+vip );
     $(".modal-body .tdorigin").html( origin );
     $(".modal-body .tddestination").html( destination );
     $(".modal-body .tdeconomic").html( '{{$currency}} '+economic );
   });

  
     $('body').on("click","#submit", function() {
    
     if($('#economic').val() == ""){
        $('#errors').html("Please insert economic fare!");
        return false;
     }else if($('#vid').val() == ""){
        $('#selname').html("Please select vehicle!");
        return false;
     }else if($('#oid').val() == ""){
        $('#origin').html("Please select origin!");
        return false;
     }else if($('#did').val() == ""){
        $('#destination').html("Please select destination!");
        return false;
     }else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var id = $('#id').val();
        var vid = $('#vid').val();
        var vip = $('#vip').val();
        var origin = $("#oid").val();
        var destination = $('#did').val();
        var economic = $('#economic').val();

        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("vip",vip);
        data.append("vid",vid);
        data.append("origin",origin);
        data.append("destination",destination);
        data.append("economic",economic);
        data.append("_token",token);

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
                      $('#vip').val('');
                      $('#vid').val('');
                      $('#oid').val('');
                      $('#did').val('');
                      $('#economic').val('');
                      displaydata(); 
                      /*$.alert("Registration Successfully! <br/>A confirmation link has been sent to your email!", {autoClose: true,closeTime: 5000,withTime: false,type: 'success',position: ['center', [-0.25, 0]], title: false,icon:'glyphicon glyphicon-ok',close: '',speed: 'normal',isOnly: true,minTop: 10,animation: false,animShow: 'fadeIn',animHide: 'fadeOut'});*/
                      $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Payment Option',
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

       $('body').on("click","#update", function() {
    //alert($('#name').val());
     if($('#economic').val() == ""){
        $('#errors').html("Please insert Economic Fare!");
        return false;
     }else if($('#vid').val() == ""){
        $('#selname').html("Please select vehicle!");
        return false;
     }else if($('#oid').val() == ""){
        $('#origin').html("Please select origin!");
        return false;
     }else if($('#did').val() == ""){
        $('#destination').html("Please select destination!");
        return false;
     }else{
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var vip = $('#vip').val();
        var vid = $('#vid').val();
        var origin = $("#oid").val();
        var destination = $('#did').val();
        var economic = $('#economic').val();
        var id = $('#id').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("vip",vip);
        data.append("vid",vid);
        data.append("origin",origin);
        data.append("destination",destination);
        data.append("economic",economic);
        data.append("_token",token);
        data.append("id",id);
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
    title: 'Payment Option',
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

  
   $('#economic').keyup(function(){
    if($('#economic').val() == ""){
        $('#errors').html("Please insert name!");
        return false;
     }else{
      $('#errors').html("");
     }
   });

   $('#vid').on('change', function() {
     if($(this).val() == ""){
        $('#selname').html("Please select vehicle!");
        return false;
     }else{
      $('#selname').html("");
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

  });
</script>

<script type="text/javascript">
   $(document).ready(function() {
   $("#users").on("click",".delete", function(){
    
                var id = $(this).attr("id");
                var token = $("#delform input[name=_token]").val();
                //alert(id);
         
                if(confirm("Are you sure you want to delete this payment option?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('paymentoptions/delete')}}",
                        data: {id:id,_token:token},
                        success: function(response){
                          if(response == 1){
                            $('.check-error').show();
                            $('.check-error').html("That Payment Option can`t be deleted because its assigned to a schedule!");
                            setTimeout(function() {
                            $(".check-error").hide('blind', {}, 500)
                            }, 5000);
                          }else{
                           //alert(response);
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Payment Option',
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
  });
   </script>

@endsection