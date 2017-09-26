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
                        {{strtoupper($organization->name).' '.strtoupper("Advance Payment Settings")}}
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
                                        <a data-toggle="modal" id="report" href="#modal-report" class="btn btn-warning">Advance Payment Report
                                        </a>   
                                    </div>                                
                                    <!-- <form id="form" action="" enctype="multipart/form-data">
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
                                        </form> -->

                                       <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="{{url('report/deposits')}}" method="post">     
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

                                        <!-- <div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
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
                            </div> -->


                            <form id="form" action="" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                    <table style="margin-left: 15px;border-spacing:0 1em; border-collapse: separate;">
                                        <tbody class="displayrecord">
                                        @if(count($deposit)>0)
                                            <tr>
                                                <td width="100">January</td>
                                                <td>
                                                 <input type="text" id="jan" placeholder="Enter %" class="form-control" maxlength="6" value="{{$deposit->jan * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#jan').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">February</td>
                                                <td>
                                                 <input type="text" id="feb" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->feb * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#feb').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">March</td>
                                                <td>
                                                 <input type="text" id="mar" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->mar * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#mar').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">April</td>
                                                <td>
                                                 <input type="text" id="apr" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->apr * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#apr').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">May</td>
                                                <td>
                                                 <input type="text" id="may" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->may * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#may').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">June</td>
                                                <td>
                                                 <input type="text" id="jun" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->jun * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#jun').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">July</td>
                                                <td>
                                                 <input type="text" id="jul" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->jul * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#jul').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">August</td>
                                                <td>
                                                 <input type="text" id="aug" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->aug * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#aug').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">September</td>
                                                <td>
                                                 <input type="text" id="sep" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->sep * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#sep').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">October</td>
                                                <td>
                                                 <input type="text" id="oct" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->oct * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#oct').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">November</td>
                                                <td>
                                                 <input type="text" id="nov" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->nov * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#nov').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">December</td>
                                                <td>
                                                 <input type="text" id="dec" placeholder="Enter %" maxlength="6" class="form-control" value="{{$deposit->dec * 100}}">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#dec').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td width="100">January</td>
                                                <td>
                                                 <input type="text" id="jan" placeholder="Enter %" class="form-control" maxlength="6" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#jan').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">February</td>
                                                <td>
                                                 <input type="text" id="feb" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#feb').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">March</td>
                                                <td>
                                                 <input type="text" id="mar" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#mar').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">April</td>
                                                <td>
                                                 <input type="text" id="apr" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#apr').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">May</td>
                                                <td>
                                                 <input type="text" id="may" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#may').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">June</td>
                                                <td>
                                                 <input type="text" id="jun" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#jun').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">July</td>
                                                <td>
                                                 <input type="text" id="jul" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#jul').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">August</td>
                                                <td>
                                                 <input type="text" id="aug" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#aug').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">September</td>
                                                <td>
                                                 <input type="text" id="sep" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#sep').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">October</td>
                                                <td>
                                                 <input type="text" id="oct" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#oct').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">November</td>
                                                <td>
                                                 <input type="text" id="nov" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#nov').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            <tr>
                                                <td width="100">December</td>
                                                <td>
                                                 <input type="text" id="dec" placeholder="Enter %" maxlength="6" class="form-control" value="0.00">
                                                 <script type="text/javascript">
                                                 $(document).ready(function() {
                                                 $('#dec').priceFormat();
                                                 });
                                                </script>
                                                </td>
                                                <td>% of Total Amount</td>
                                            </tr>
                                            @endif
                                            <tr>
                                                <td><button type="button" id="update" class="btn btn-primary">Update Changes</button></td>
                                                <td>
                                                    
                                                  <div id="loading" style="display:none;">
                                                    <div style="margin-top:5%;">
                                                    <p id="sucessmessage"> 
                                                    Saving Data...
                                                    </p>
                                                   <img src="{{url('/assets/images/ellipsis.svg')}}" alt="...." />
                                                   </div>
                                                 </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                            </form>

                                         
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
     $('#sucessmessage').html('Updating Data...');
     $('#errors').html("");

    function displaydata(){
       $.ajax({
          url     : "{{URL::to('deposits/showrecord')}}",
          type    : "GET",
          async   : false,       
          success : function(s){
            $('.displayrecord').html(s)
          }        
        });
    }
      
    
   
      $('body').on("click","#update",function() {  
       
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }        

        var jan = $('#jan').val();
        var feb = $('#feb').val();
        var mar = $('#mar').val();
        var apr = $('#apr').val();
        var may = $('#may').val();
        var jun = $('#jun').val();
        var jul = $('#jul').val();
        var aug = $('#aug').val();
        var sep = $('#sep').val();
        var oct = $('#oct').val();
        var nov = $('#nov').val();
        var dec = $('#dec').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("jan",jan);
        data.append("feb",feb);
        data.append("mar",mar);
        data.append("apr",apr);
        data.append("may",may);
        data.append("jun",jun);
        data.append("jul",jul);
        data.append("aug",aug);
        data.append("sep",sep);
        data.append("oct",oct);
        data.append("nov",nov);
        data.append("dec",dec);
        data.append("_token",token);
        $.ajax({
          type: "POST",
          url: "{{ url('deposits/update')}}",
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
             //displaydata();        
             $.notify({
                        // options
                        icon: 'glyphicon glyphicon-ok',
                        title: 'Advanced Payment Settings',
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
