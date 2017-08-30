@extends('layouts.travel')

<style type="text/css">
  .modal { overflow: auto !important; }
</style>

@section('content')
<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Currencies</h2>
        </div>

      <div style="margin-bottom:20px;margin-left:10px;">
      <a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">Add Currency</a>&emsp;<a href="#modal-report" data-toggle="modal" id="report" class="btn btn-warning">Currency Report</a>
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
                                        <h3 id="title" class="m-t-none m-b">Create Currency</h3>
                                             <input type="hidden" id="id" placeholder="Enter name" class="form-control" required data-error="Please insert vehicle name">
                                             
                                             <div class="form-group"><label>Name</label> 
                                             <input type="text" id="name" placeholder="Enter name" class="form-control" required data-error="Please insert vehicle name">
                                             <p id="errors" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Shortname</label> 
                                             <input type="text" id="shortname" placeholder="Enter name" class="form-control" required data-error="Please insert vehicle name">
                                             <p id="shortnameerrors" style="color:red"></p>
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
                                        <form target="_blank" action="{{url('report/currencies')}}" method="post">     
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
                                        <h3 id="title" class="m-t-none m-b">Currency</h3>
                                        <table class="table table-bordered table-hover">
                                            <tr>
                                              <td><strong>Shortname : </strong></td><td class="tdshortname"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Name : </strong></td><td class="tdname"></td>
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
        <th style="color:#FFF">Shortname</th>
        <th style="color:#FFF">Name</th>
        <th style="color:#FFF">Action</th>

      </thead>
      <tbody class="displayrecord">
      <?php $i=1;?>
      @foreach($currencies as $currency)
        <tr class="{{'del'.$currency->id}}">
          <td>{{$i}}</td>
          <td>{{$currency->shortname}}</td>
          <td>{{$currency->name}}</td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a class="view" data-toggle="modal" data-name="{{$currency->name}}" data-shortname="{{$currency->shortname}}" data-id="{{$currency->id}}" href="#modal-view">View</a></li>

                    <li><a class="edit" data-toggle="modal" data-name="{{$currency->name}}" data-shortname="{{$currency->shortname}}" data-id="{{$currency->id}}" href="#modal-form">Update</a></li>
                   
                    <li><a id="{{$currency->id}}" class="delete">
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
     $('#title').html('Create Currency');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');
     $("#update").attr("id", "submit");
     $('#errors').html("");

     function displaydata(){
       $.ajax({
                      url     : "{{URL::to('currencies/showrecord')}}",
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
     $('#title').html('Create Currency');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');     
     $('#name').val('');
     $('#shortname').val('');
     $('#id').val('');
     $('#errors').html("");
     $("#form").attr("action", "currencies/store");
   });

    $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');
     var shortname = $(this).data('shortname');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

     //$('#update').removeAttr('disabled');
     $(".modal-body .tdname").html( name );
     $(".modal-body .tdshortname").html( shortname );
     /*$(".modal-body #id").val( id );
     $('#title').html('Update Currency');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     $("#submit").attr("id", "update");
      $("#form").attr("action", "currencies/update");*/
   });

    $("#users").on("click",".edit", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');
     var shortname = $(this).data('shortname');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

     $('#update').removeAttr('disabled');
     $(".modal-body #name").val( name );
     $(".modal-body #shortname").val( shortname );
     $(".modal-body #id").val( id );
     $('#title').html('Update Currency');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     //$("#submit").attr("id", "update");
     $('#errors').html("");
     $('#shortnameerrors').html("");
     $('.sub-form').remove();
     var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
        $("#modal-form .modal-footer").append(r);
      $("#form").attr("action", "currencies/update");
   });

  
       $('body').on("click","#submit", function() {
    
     if($('#name').val() == ""){
        $('#errors').html("Please insert name!");
        return false;
     }else if($('#shortname').val() == ""){
        $('#shortnameerrors').html("Please insert shortname!");
        return false;
     }else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var name = $('#name').val();
        var shortname = $("#shortname").val();
        var id = $('#vid').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("shortname", shortname);
        data.append("name",name);
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
                      $('#name').val('');
                      $('#shortname').val('');
                      displaydata(); 
                      /*$.alert("Registration Successfully! <br/>A confirmation link has been sent to your email!", {autoClose: true,closeTime: 5000,withTime: false,type: 'success',position: ['center', [-0.25, 0]], title: false,icon:'glyphicon glyphicon-ok',close: '',speed: 'normal',isOnly: true,minTop: 10,animation: false,animShow: 'fadeIn',animHide: 'fadeOut'});*/
                      $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Currency',
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
        $('#errors').html("Please insert name!");
        return false;
     }else if($('#shortname').val() == ""){
        $('#shortnameerrors').html("Please insert shortname!");
        return false;
     }else{
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var name = $('#name').val();
        var shortname = $("#shortname").val();
        var id = $('#id').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("shortname", shortname);
        data.append("name",name);
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
    title: 'Currency',
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
        $('#errors').html("Please insert name!");
        return false;
     }else{
      $('#errors').html("");
     }
   });

   $('#shortname').keyup(function(){
    if($('#shortname').val() == ""){
        $('#shortnameerrors').html("Please insert shortname!");
        return false;
     }else{
      $('#shortnameerrors').html("");
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
         
                if(confirm("Are you sure you want to delete this currency?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('currencies/delete')}}",
                        data: {id:id,_token:token},
                        success: function(response){
                          if(response == 1){
                            $('.check-error').show();
                            $('.check-error').html("That Currency can`t be deleted because its assigned to a payment!");
                            setTimeout(function() {
                            $(".check-error").hide('blind', {}, 500)
                            }, 5000);
                          }else{
                           //alert(response);
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Currency',
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