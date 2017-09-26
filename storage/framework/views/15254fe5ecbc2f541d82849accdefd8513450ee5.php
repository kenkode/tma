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

<?php $__env->startSection('content'); ?>
<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Customers</h2>
        </div>

      <div style="margin-bottom:20px;margin-left:10px;">
      <a data-toggle="modal" id="report" href="#modal-report" class="btn btn-warning">Customer Report</a>&emsp;<a data-toggle="modal" id="graph" href="#modal-graph" class="btn btn-primary">Graph</a>
      </div>

      
          

                        <div class="modal fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="<?php echo e(url('report/customers')); ?>" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             <?php echo e(csrf_field()); ?>

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
                             
                            <div class="modal fade" id="modal-graph" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form action="<?php echo e(url('report/graph/customer')); ?>" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             <?php echo e(csrf_field()); ?>


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

                            <div class="modal fade" id="modal-singlereport" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                        <form target="_blank" action="<?php echo e(url('report/single/customer')); ?>" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             <?php echo e(csrf_field()); ?>

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

                            <div class="modal fade" id="modal-view" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                            
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Customer</h3>
                                        <table class="table table-bordered table-hover">

                                        <?php if(Auth::user()->type == 'Car Hire'): ?>
                                            <tr>
                                               <td><strong>Receipt No : </strong></td><td class="tdticket"></td>
                                            </tr>

                                        <?php else: ?>
                                            <tr>
                                               <td><strong>Ticket No : </strong></td><td class="tdticket"></td>
                                            </tr>
                                        <?php endif; ?>

                                            <tr>
                                               <td><strong>First name : </strong></td><td class="tdfname"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Last name : </strong></td><td class="tdlname"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Email : </strong></td><td class="tdemail"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>ID / Passport No. : </strong></td><td class="tdidno"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Contact : </strong></td><td class="tdcontact"></td>
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
        <?php if(Auth::user()->type == 'Car Hire'): ?>
        <th style="color:#FFF">Receipt No.</th>
        <?php else: ?>
        <th style="color:#FFF">Ticket No.</th>
        <?php endif; ?>
        <th style="color:#FFF">Firstname</th>
        <th style="color:#FFF">Lastname</th>
        <th style="color:#FFF">Email</th>
        <th style="color:#FFF">ID / Passport No.</th>
        <th style="color:#FFF">Contact</th>
        <th style="color:#FFF">Action</th>

      </thead>
      <tbody class="displayrecord">
      <?php $i=1;?>
      <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr class="<?php echo e('del'.$customer->id); ?>">
          <td><?php echo e($i); ?></td>
          <td><?php echo e($customer->ticketno); ?></td>
          <td><?php echo e($customer->firstname); ?></td>
          <td><?php echo e($customer->lastname); ?></td>
          <td><?php echo e($customer->email); ?></td>
          <td><?php echo e($customer->id_number); ?></td>
          <td><?php echo e($customer->phone); ?></td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    
                    <li><a class="view" data-toggle="modal" data-ticket="<?php echo e($customer->ticketno); ?>" data-fname="<?php echo e($customer->firstname); ?>" data-lname="<?php echo e($customer->lastname); ?>" data-email="<?php echo e($customer->email); ?>" data-idno="<?php echo e($customer->id_number); ?>" data-contact="<?php echo e($customer->phone); ?>" data-id="<?php echo e($customer->id); ?>" href="#modal-view">View</a></li>
                    <li><a class="sreport" data-toggle="modal" data-id="<?php echo e($customer->id); ?>" href="#modal-singlereport">Report</a></li>
                    
                  </ul>
              </div>

                    </td>
        </tr>
        <?php $i++; ?>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
      </tbody>


    </table>
    </div>
    </div>

<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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
     var fname = $(this).data('fname');
     var lname = $(this).data('lname');
     var email = $(this).data('email');
     var idno = $(this).data('idno');
     var contact = $(this).data('contact');
     var ticket = $(this).data('ticket');
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

     //$('#update').removeAttr('disabled');
     $(".modal-body .tdticket").html( ticket );
     $(".modal-body .tdfname").html( fname );
     $(".modal-body .tdlname").html( lname );
     $(".modal-body .tdemail").html( email );
     $(".modal-body .tdidno").html( idno );
     $(".modal-body .tdcontact").html( contact );
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
                        url: "<?php echo e(url('vehicles/delete')); ?>",
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
                        url: "<?php echo e(url('vehicles/deactivate')); ?>",
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.travel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>