@extends('layouts.travel')

<style type="text/css">

    #imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    background-image:url("{{url('/public/uploads/logo/default_photo.png')}}");
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
    }
     .modal-body {
    max-height: calc(100vh - 100px);
    overflow-y: auto;
    }   

    .modal { overflow: auto !important; }  
   </style>

@section('content')
<?php $currency = ''; ?>
        @if($organization->currency_shortname == null || $organization->currency_shortname == '')
        <?php $currency = 'KES'; ?>
        @else
        <?php $currency = $organization->currency_shortname; ?>
        @endif
<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Events</h2>
        </div>

      <div style="margin-bottom:20px;margin-left:10px;">
      <a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">Add Event</a>&emsp;<a data-toggle="modal" id="report" class="btn btn-warning" href="#modal-report">Events Report</a>
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
                                        <h3 id="title" class="m-t-none m-b">Create Event</h3>
                                             <input type="hidden" id="id" placeholder="Enter name" class="form-control" required data-error="Please insert vehicle name">
                                             <div class="form-group">
                                             <label>Event Image :</label>
                                             <input id="image" type="file" name="logo">
                                             <br>
                                             <div id="imagePreview"></div>
                                             </div>
                                             <div class="form-group"><label>Name</label> 
                                             <input type="text" id="name" placeholder="Enter name" class="form-control" required data-error="Please insert vehicle name">
                                             <p id="errors" style="color:red"></p>
                                             </div>
                                             <div class="form-group"><label>Description</label> 
                                             <textarea id="description" placeholder="Enter Description" class="form-control"></textarea>
                                             <p id="deserrors" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Date <span style="color:red">*</span></label> 
                                             <div class="right-inner-addon">
                                             <i class="glyphicon glyphicon-calendar"></i>
                                             <input type="text" class="form-control" name='date' id='datetimepicker' placeholder="Arrival Date">
                    
                                             </div>
                                             <p id="dateerror" style="color:red"></p>
                                             </div>
                                             <div class="form-group"><label>Booking Slots</label> 
                                             <input type="text" id="slots" placeholder="Enter Booking Slots Available" class="form-control"></textarea>
                                             <p id="slotserrors" style="color:red"></p>
                                             </div>
                                             <div class="form-group"><label>Contact</label> 
                                             <textarea id="contact" placeholder="Enter Contact" class="form-control"></textarea>
                                             <p id="contacterrors" style="color:red"></p>
                                             </div>
                                             <div class="form-group"><label>Location</label> 
                                             <textarea id="location" placeholder="Enter Location" class="form-control"></textarea>
                                             <p id="locerrors" style="color:red"></p>
                                             </div>
                                             <div class="form-group"><label>VIP Entrance Fee</label> 
                                             <input type="text" id="vip" placeholder="Enter VIP Fare" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#vip').priceFormat();
                                             });
                                             </script>
                                             </div>

                                             <div class="form-group"><label>Normal Entrance Fee<span style="color:red">*</span></label> 
                                             <input type="text" id="economic" placeholder="Enter Economic Fare" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#economic').priceFormat();
                                             });
                                             </script>
                                             <p id="econerrors" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Children Entrance Fee</label> 
                                             <input type="text" id="children" placeholder="Enter Children Fee" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#children').priceFormat();
                                             });
                                             </script>
                                             <p id="childerrors" style="color:red"></p>
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
                                        <form target="_blank" action="{{url('report/events')}}" method="post">     
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
                                             <p id="events" style="color:red"></p>
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
                                        <h3 id="title" class="m-t-none m-b">Event</h3>
                                        <table class="table table-bordered table-hover">

                                            <tr>
                                               <td><strong>Logo : </strong></td><td class="tdlogo"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Name : </strong></td><td class="tdname"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Description : </strong></td><td class="tddescription"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Booking Slots : </strong></td><td class="tdslots"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Contact : </strong></td><td class="tdcontact"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Address : </strong></td><td class="tdaddress"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>VIP Entrance Fee : </strong></td><td class="tdvip"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Normal Entrance Fee : </strong></td><td class="tdeconomic"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Children Entrance Fee : </strong></td><td class="tdchildren"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Date : </strong></td><td class="tddate"></td>
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
        <th style="color:#FFF">Logo</th>
        <th style="color:#FFF">Name</th>
        <th style="color:#FFF">Description</th>
        <th style="color:#FFF">Slots</th>
        <th style="color:#FFF">Contact</th>
        <th style="color:#FFF">Address</th>
        <th style="color:#FFF">Vip Entrance Fee</th>
        <th style="color:#FFF">Normal Entrance Fee</th>
        <th style="color:#FFF">Children Entrance Fee</th>
        <th style="color:#FFF">Date</th>
        <th style="color:#FFF">Action</th>

      </thead>
      <tbody class="displayrecord">
      <?php $i=1;?>
      @foreach($events as $event)
        <tr class="{{'del'.$event->id}}">
          <td>{{$i}}</td>
          <td><img src="{{url('/public/uploads/logo/'.$event->image)}}" width="100" height="100" alt="no logo" /></td>
          <td>{{$event->name}}</td>
          <td>{{$event->description}}</td>
          <td>{{$event->slots}}</td>
          <td>{{$event->contact}}</td>
          <td>{{$event->address}}</td>
          <td>{{number_format($event->vip,2)}}</td>
          <td>{{number_format($event->normal,2)}}</td>
          <td>{{number_format($event->children,2)}}</td>
          <td>{{$event->date}}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a class="view" data-toggle="modal" data-name="{{$event->name}}" data-logo="{{$event->image}}" data-description="{{$event->description}}" data-slots="{{$event->slots}}" data-contact="{{$event->contact}}" data-address="{{$event->address}}" data-vip="{{number_format($event->vip,2)}}" data-economic="{{number_format($event->normal,2)}}" data-id="{{$event->id}}" data-children="{{number_format($event->children,2)}}" data-date="{{$event->date}}" href="#modal-view">View</a></li>

                    <li><a class="edit" data-toggle="modal" data-name="{{$event->name}}" data-logo="{{$event->image}}" data-description="{{$event->description}}" data-slots="{{$event->slots}}" data-contact="{{$event->contact}}" data-address="{{$event->address}}" data-vip="{{number_format($event->vip,2)}}" data-economic="{{number_format($event->normal,2)}}" data-id="{{$event->id}}" data-children="{{number_format($event->children,2)}}" data-date="{{$event->date}}" href="#modal-form">Update</a></li>
                   
                    <li><a id="{{$event->id}}" class="delete">
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
$(document).ready(function() {
    $("#image").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
        
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
            
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
        }
    });
});
</script>

<script type="text/javascript">

  var submit_url;
  var vid;

  $(document).ready(function() {    
    $('.check-error').hide();
    $('#submit').removeAttr('disabled');
     $('#update').removeAttr('disabled');
     $('#title').html('Create Event');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');
     $("#update").attr("id", "submit");
     $('#errors').html("");

     function displaydata(){
       $.ajax({
                      url     : "{{URL::to('events/showrecord')}}",
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
     $('#title').html('Create Event');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');     
     $('#name').val('');
     $('#description').val('');
     $('#slots').val('');
     $('#contact').val('');
     $('#location').val('');
     $('#vip').val('');
     $('#economic').val('');
     $('#children').val('');
     $('#datetimepicker').val('');
     $('#id').val('');
     $('#errors').html("");
     $("#form").attr("action", "events/store");
   });

    $("#users").on("click",".edit", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');
     var description = $(this).data('description');
     var slots = $(this).data('slots');
     var contact = $(this).data('contact');
     var location = $(this).data('address');
     var vip = $(this).data('vip');
     var economic = $(this).data('economic');
     var children = $(this).data('children');
     var date = $(this).data('date');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     var logo = base_url+'/public/uploads/logo/'+$(this).data('logo');
     $('#update').removeAttr('disabled');
     $(".modal-body #name").val( name );
     $(".modal-body #description").val( description );
     $(".modal-body #slots").val( slots );
     $(".modal-body #contact").val( contact );
     $(".modal-body #location").val( location );
     $(".modal-body #vip").val( vip );
     $(".modal-body #economic").val( economic );
     $(".modal-body #children").val( children );
     $(".modal-body #datetimepicker").val( date );
     $(".modal-body #id").val( id );
     $(".modal-body #imagePreview").css('background-image', 'url('+logo+')');
     $('#title').html('Update Vehicle Name');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     //$("#submit").attr("id", "update");
     $('#errors').html("");
     $('.sub-form').remove();
     var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
        $("#modal-form .modal-footer").append(r);
      $("#form").attr("action", "events/update");
   });

    $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');
     var description = $(this).data('description');
     var slots = $(this).data('slots');
     var contact = $(this).data('contact');
     var location = $(this).data('address');
     var vip = $(this).data('vip');
     var economic = $(this).data('economic');
     var children = $(this).data('children');
     var date = $(this).data('date');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     var logo = base_url+'/public/uploads/logo/'+$(this).data('logo');
     $('#update').removeAttr('disabled');
     $(".modal-body .tdname").html( name );
     $(".modal-body .tdlogo").html('<img src="'+logo+'" width="100" height="100" alt="no logo" />');
     $(".modal-body .tddescription").html( description );
     $(".modal-body .tdslots").html( slots );
     $(".modal-body .tdcontact").html( contact );
     $(".modal-body .tdaddress").html( location );
     $(".modal-body .tdvip").html('{{$currency}} '+ vip );
     $(".modal-body .tdeconomic").html('{{$currency}} '+ economic );
     $(".modal-body .tdchildren").html('{{$currency}} '+ children );
     $(".modal-body .tddate").html( date );
   });


       $('body').on("click","#submit", function() {
    
     if($('#name').val() == ""){
        $('#errors').html("Please insert event name!");
        return false;
     }else if($('#slots').val() == ""){
        $('#slotserrors').html("Please insert booking slots!");
        return false;
     }else if($('#economic').val() == ""){
        $('#econerrors').html("Please insert normal entrance fee!");
        return false;
     }else if($('#datetimepicker').val() == ""){
        $('#dateerror').html("Please insert event date!");
        return false;
     }else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var name = $('#name').val();
        var description = $('#description').val();
        var slots = $('#slots').val();
        var location = $('#location').val();
        var contact = $('#contact').val();
        var vip = $('#vip').val();
        var economic = $('#economic').val();
        var children = $('#children').val();
        var date = $('#datetimepicker').val();
        var image = $("#form input[name=logo]").val();
        var id = $('#vid').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("image", $('input[type=file]')[0].files[0]);
        data.append("name",name);
        data.append("description",description);
        data.append("slots",slots);
        data.append("location",location);
        data.append("contact",contact);
        data.append("vip",vip);
        data.append("economic",economic);
        data.append("children",children);
        data.append("date",date);
        data.append("_token",token);
        data.append("logo",$('input[type=file]')[0].files[0].name);

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
                      $('#name').val('');
                      $('#description').val('');
                      $('#slots').val('');
                      $('#location').val('');
                      $('#contact').val('');
                      $('#vip').val('');
                      $('#economic').val('');
                      $('#children').val('');
                      $('#datetimepicker').val('');
                      displaydata(); 
                      /*$.alert("Registration Successfully! <br/>A confirmation link has been sent to your email!", {autoClose: true,closeTime: 5000,withTime: false,type: 'success',position: ['center', [-0.25, 0]], title: false,icon:'glyphicon glyphicon-ok',close: '',speed: 'normal',isOnly: true,minTop: 10,animation: false,animShow: 'fadeIn',animHide: 'fadeOut'});*/
                      $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Event',
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
     if($('#name').val() == ""){
        $('#errors').html("Please insert event name!");
        return false;
     }else if($('#slots').val() == ""){
        $('#slotserrors').html("Please insert booking slots!");
        return false;
     }else if($('#economic').val() == ""){
        $('#econerrors').html("Please insert normal entrance fee!");
        return false;
     }else if($('#datetimepicker').val() == ""){
        $('#dateerror').html("Please insert event date!");
        return false;
     }else{
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var name = $('#name').val();
        var image = $("#form input[name=logo]").val();
        var id = $('#id').val();
        var description = $('#description').val();
        var slots = $('#slots').val();
        var location = $('#location').val();
        var contact = $('#contact').val();
        var vip = $('#vip').val();
        var economic = $('#economic').val();
        var children = $('#children').val();
        var date = $('#datetimepicker').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("image", $('input[type=file]')[0].files[0]);
        data.append("name",name);
        data.append("description",description);
        data.append("slots",slots);
        data.append("location",location);
        data.append("contact",contact);
        data.append("vip",vip);
        data.append("economic",economic);
        data.append("children",children);
        data.append("date",date);
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
    title: 'Event',
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

  
   $('#name').keyup(function(){
    if($('#name').val() == ""){
        $('#errors').html("Please insert event name!");
        return false;
     }else{
      $('#errors').html("");
     }
   });

   $('#slots').keyup(function(){
    if($('#slots').val() == ""){
        $('#slotserrors').html("Please insert booking slots!");
        return false;
     }else{
      $('#slotserrors').html("");
     }
   });

   $('#datetimepicker').on('change',function(){
    if($(this).val() == ""){
        $('#dateerror').html("Please insert event date!");
        return false;
     }else{
      $('#dateerror').html("");
     }
   });

   $('#economic').keyup(function(){
    if($('#economic').val() == ""){
        $('#econerrors').html("Please insert normal entrance fee!");
        return false;
     }else{
      $('#econerrors').html("");
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
         
                if(confirm("Are you sure you want to delete this event?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('events/delete')}}",
                        data: {id:id,_token:token},
                        success: function(response){
                          if(response == 1){
                            $('.check-error').show();
                            $('.check-error').html("That Event can`t be deleted because its booked!");
                            setTimeout(function() {
                            $(".check-error").hide('blind', {}, 500)
                            }, 5000);
                          }else{
                           //alert(response);
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Event',
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