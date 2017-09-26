@extends('layouts.hotel')
<style type="text/css">
    @media screen and (min-width: 768px) {
        .modal-dialog {
          width: 900px; /* New width for default modal */
        }
        .modal-sm {
          width: 450px; /* New width for small modal */
        }
    }
    @media screen and (min-width: 992px) {
        .modal-lg {
          width: 750px; /* New width for large modal */
        }
    }  

    .modal { overflow: auto !important; } 
       
</style>
@section('content')
<div class="wrapper wrapper-content  animated fadeInRight">
  <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                        {{strtoupper($organization->name)}}
                        ROOM TYPES
                    </h5>                                    
                </div>
                <div class="ibox-content">                     
                <!-- Begin Content Here--> 
                <div class="row">
                    <div class="panel blank-panel">
                        <div class="panel-heading">                            
                            <!-- <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Room Types</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-desktop"></i>Reservations</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-signal"></i>Performance</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-bar-chart-o"></i>History Log</a></li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active table-responsive "> 
                                    <div style="margin-bottom:20px;margin-left:10px;">
                                        <a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">
                                            New Room Type
                                        </a>     
                                        &emsp;
                                        <a data-toggle="modal" id="report" href="#modal-report" class="btn btn-warning">Room Type Report
                                        </a>   
                                    </div>                                
                                    <form id="form" action="" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content animated fadeIn">                         
                                                            <div class="modal-body">
                                                                <div id="loading" style="display:none;">
                                                                     <div style="margin-top:5%;">
                                                                     <p id="sucessmessage">     Saving data
                                                                     </p>
                                                                     <img src="{{url('/assets/images/ellipsis.svg')}}" alt="...." />
                                                                     </div>
                                                                 </div>
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;
                                                                </span><span class="sr-only">Close</span>
                                                            </button>
                                                            <h3 id="title" class="m-t-none m-b">Create Room Type</h3>
                                                                 <input type="hidden" id="type_id" placeholder="Enter Room Type Name" 
                                                                 class="form-control" required data-error="Please insert room type name">                            
                                                                 <div class="form-group">
                                                                     <input type="text" id="name" placeholder="Enter Room Type Name" name="name" 
                                                                     class="form-control" required 
                                                                     data-error="Please insert room type">
                                                                     <p id="errors" style="color:red"></p>
                                                                 </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                                                <button type="button" id="submit" class="btn btn-primary sub-form">Save Changes</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>                
                                        </form>

                                       <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="{{url('report/roomtypes')}}" method="post">     
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
                                        <h3 id="title" class="m-t-none m-b">Room Type</h3>
                                        <table class="table table-bordered table-hover">

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

                                         <table class="table table-condensed table-hover dataTables-example" id="users">
                                         <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="displayrecord">
                                              <?php $i=1;?>
                                               @foreach($types as $type) 
                                                <tr class="{{'del'.$type->id}}">
                                                  <td>{{$i}}</td>                 
                                                  <td>{{$type->name}}</td>
                                                  <td>
                                                      <div class="btn-group">
                                                          <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                          </button>          
                                                          <ul class="dropdown-menu" role="menu">
                                                          <li>
                                                                <a class="view" data-toggle="modal" data-name="{{$type->name}}" data-id="{{$type->id}}" href="#modal-view">
                                                                    View
                                                                </a>
                                                            </li>    
                                                            <li>
                                                                <a class="edit" data-toggle="modal" data-name="{{$type->name}}" data-id="{{$type->id}}" href="#modal-form">
                                                                    Update
                                                                </a>
                                                            </li>                   
                                                            <li>
                                                                <a id="{{$type->id}}" class="delete">
                                                                    <form id="delform">
                                                                    {{ csrf_field() }}
                                                                        Delete
                                                                    </form>
                                                                </a>
                                                            </li>                    
                                                          </ul>
                                                      </div>
                                                  </td>
                                                </tr>
                                                <?php $i++; ?>
                                              @endforeach
                                            </tbody>
                                    </table>                  
                                </div>

                                <div id="tab-2" class="tab-pane">
                                    
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    
                                </div>
                                <div id="tab-4" class="tab-pane">
                                                                        
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <!--End Content Here-->                
               </div>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
<script type="text/javascript">
  var submit_url;
  var type_id;
  $(document).ready(function() {    
     $('#submit').removeAttr('disabled');
     $('#update').removeAttr('disabled');
     $('#title').html('Create Room Type');
     $('#submit').html('Save Changes');
     $('#sucessmessage').html('Saving Data...');
     $("#update").attr("id", "submit");
     $('#errors').html("");

    function displaydata(){
       $.ajax({
          url     : "{{URL::to('roomtype/showrecord')}}",
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
         $('#title').html('Create Room Type');
         $('#submit').html('Save Changes');
         $('#sucessmessage').html('Saving Data...');     
         $('#name').val('');
         $('#id').val('');
         $('#errors').html("");
         $("#form").attr("action", "roomtype/store");
   });

    $("#users").on("click",".edit", function(){
         var id = $(this).data('id');
         var name = $(this).data('name');    
         $('#update').removeAttr('disabled');
         $(".modal-body #name").val( name );
         $(".modal-body #type_id").val( id );
         $('#title').html('Update Room Type');
         $('#submit').html('Update changes');
         $('#sucessmessage').html('Updating Data...');
         //$("#submit").attr("id", "update");
         $('#errors').html("");
         $('.sub-form').remove();
         var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
         $("#modal-form .modal-footer").append(r);
         $("#form").attr("action", "roomtype/update");
   });

    $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var name = $(this).data('name');
     $(".modal-body .tdname").html( name );
   });

   
    $('body').on("click","#submit",function() {

     if($('#name').val() == ""){
        $('#errors').html("Please insert name!");
        return false;
     }else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var name = $('#name').val();
        var id = $('#type_id').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');
        
        data.append("name",name);
        data.append("_token",token);                
        $.ajax({
              type: "POST",
              url: urL,
              data: data,
              processData: false,
              contentType: false,
              beforeSend: function() { $('#loading').show(); },
              success: function(response) {                      
                  if(response != 1){
                    $('#errors').html(response);
                  }else if(response == 1){
                      $('#submit').removeAttr('disabled');
                      $('#name').val('');
                      displaydata();                  
                      $.notify({
                            // options
                            icon: 'glyphicon glyphicon-ok',
                            title: 'Room Type',
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
       
     if($('#name').val() == ""){
        $('#errors').html("Please insert name!");
        return false;
     }else{
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }        

        var name = $('#name').val();
        var id = $('#type_id').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("name",name);
        data.append("_token",token);
        data.append("type_id",id);
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
             $.notify({
                        // options
                        icon: 'glyphicon glyphicon-ok',
                        title: 'Room Type',
                        message: ' successfully updated....',
                        url: '',
                        target: '_blank'
                    },{
                        // settings
                        element: 'body',
                        allow_duplicates:false,
                        position: null,
                        type: "success",
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
  });
</script>
<script type="text/javascript">
   $(document).ready(function() {
   $("#users").on("click",".delete", function(){    
                var id = $(this).attr("id");
                var token = $("#delform input[name=_token]").val();                
                if(confirm("Are you sure you want to delete this room type?")){
                    $.ajax({
                        type: "POST",
                        url: "{{url('roomtype/delete')}}",
                        data: {id:id,_token:token},
                        success: function(){                           
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
                                // options
                                icon: 'glyphicon glyphicon-ok',
                                title: 'Room Type',
                                message: ' successfully deleted....',
                                url: '',
                                target: '_blank'
                            },{
                                // settings
                                element: 'body',
                                position: null,
                                type: "danger",
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
                        //return false;
                     } 
                    });
                }else{                    
                }
            });       
    });
</script>
@endsection
