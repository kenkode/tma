<?php $__env->startSection('content'); ?>

<?php $currency = ''; ?>
        <?php if($organization->currency_shortname == null || $organization->currency_shortname == ''): ?>
        <?php $currency = 'KES'; ?>
        <?php else: ?>
        <?php $currency = $organization->currency_shortname; ?>
        <?php endif; ?>

<style type="text/css">
    @media  screen and (min-width: 768px) {
        .modal-dialog {
          width: 500px; /* New width for default modal */
        }
        .modal-sm {
          width: 250px; /* New width for small modal */
        }
    }
    @media  screen and (min-width: 992px) {
        .modal-lg {
          width: 450px; /* New width for large modal */
        }
    }  
       
    #imagePreview {
      width: 180px;
      height: 180px;
      background-position: center center;
      background-size: cover;
      background-image:url("<?php echo e(url('/public/uploads/logo/1497620012_3.png')); ?>");
      -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
      display: inline-block;
    }  

    .modal-body {
    max-height: calc(100vh - 100px);
    overflow-y: auto;
    }  

    .modal { overflow: auto !important; } 
</style>

<div class="wrapper wrapper-content  animated fadeInRight">
  <div class="row">
        <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>
                        <?php echo e(strtoupper($organization->name)); ?>

                        PRICING PLAN
                    </h5>                                    
                </div>
                <div class="ibox-content">                     
                <!-- Begin Content Here--> 
                <div class="row">
                    <div class="panel blank-panel">
                        <div class="panel-heading">                            
                            <!-- <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-laptop"></i>Rooms</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-desktop"></i>Rates</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-3"><i class="fa fa-signal"></i>Foods</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-4"><i class="fa fa-bar-chart-o"></i>Reservations</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5"><i class="fa fa-bar-chart-o"></i>History Log</a></li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active table-responsive "> 
                                    <div style="margin-bottom:20px;margin-left:10px;">
                                        <a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">
                                            New Pricing Plan
                                        </a>  
                                        &emsp;
                                        <a data-toggle="modal" id="report" href="#modal-report" class="btn btn-warning">Pricing Plan Report
                                        </a>        
                                    </div>                                
<form id="form" action="" enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content animated fadeIn">                         
                    <div class="modal-body">
                        <div id="loading" style="display:none;">
                             <div style="margin-top:5%;">
                             <p id="sucessmessage"> 
                                 Saving Data...
                             </p>
                             <img src="<?php echo e(url('/assets/images/ellipsis.svg')); ?>" alt="...." />
                             </div>
                         </div>
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;
                        </span><span class="sr-only">Close</span>
                    </button>
                    <h3 id="title" class="m-t-none m-b">Create Pricing Plan</h3>
                         <input type="hidden" id="pricing_id" placeholder="Enter Room Name" 
                         class="form-control" required data-error="Please insert hotel room name">     
                            <div class="form-group">
                            <label>Branch</label> 
                                 <select class="form-control" name="branch" required 
                                 data-error="Please select hotel branch" id="branch" placehoder="Please select hotel branch">
                                        <option value="">Select Branch</option>
                                    <?php $__currentLoopData = $branches; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $branch): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($branch->id); ?>">
                                            <?php echo e($branch->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                 </select>                                
                                 <p id="errors22" style="color:red"></p>
                             </div>                                            
                             <!-- <div class="form-group">
                             <label>Room Number</label> 
                                 <input type="text" id="room_number" placeholder="Enter Room Number" name="room_number" class="form-control" required 
                                 data-error="Please insert hotel room number">
                                 <p id="errors1" style="color:red"></p>
                             </div>  -->
                             <div class="form-group">
                             <label>Room Type</label> 
                                 <select class="form-control" name="room_type" required 
                                 data-error="Please select room type" id="room_type">
                                     <option value="">Select Room Type</option>
                                      <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <option value="<?php echo e($type->id); ?>">
                                            <?php echo e($type->name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                     <option></option>
                                 </select>                                
                                 <p id="errors2" style="color:red"></p>
                             </div> 
                             <div class="form-group">
                             <label>Monday (Optional) KES:</label> 
                                 <input type="text" id="mon" placeholder="Enter Price" class="form-control" data-error="Please insert room maximum adult number">
                                 <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#mon').priceFormat();
                                             });
                                             </script>
                                 <p id="errors3" style="color:red"></p>
                             </div> 
                             <div class="form-group">
                             <label>Tuesday (Optional) KES:</label> 
                                 <input type="text" id="tue" placeholder="Enter Price" class="form-control" data-error="Please insert room maximum Children number">
                                 <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#tue').priceFormat();
                                             });
                                             </script>
                                 <p id="errors4" style="color:red"></p>
                             </div> 
                             <div class="form-group">
                             <label>Wednesday (Optional) KES:</label> 
                                 <input type="text" id="wen" placeholder="Enter Price" class="form-control" data-error="Please insert rooms available!" >
                                 <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#wen').priceFormat();
                                             });
                                             </script>
                                 <p id="errors36" style="color:red"></p>
                             </div>    
                             <div class="form-group"><label>Thursday (Optional) KES:</label> 
                                             <input type="text" id="thur" placeholder="Enter Price" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#thur').priceFormat();
                                             });
                                             </script>
                                             </div>    
                             <div class="form-group"><label>Friday (Optional) KES:</label> 
                                             <input type="text" id="fri" placeholder="Enter Price" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#fri').priceFormat();
                                             });
                                             </script>
                                             </div>    

                             <div class="form-group"><label>Saturday (Optional) KES:</label> 
                                             <input type="text" id="sat" placeholder="Enter Price" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#sat').priceFormat();
                                             });
                                             </script>
                                             </div>   

                             <div class="form-group"><label>Sunday (Optional) KES:</label> 
                                             <input type="text" id="sun" placeholder="Enter Price" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#sun').priceFormat();
                                             });
                                             </script>
                                             </div>       

                             <div class="form-group"><label>Children (Optional) %:</label> 
                                             <input type="text" id="children" placeholder="Enter children percentage" class="form-control" maxlength="6">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#children').priceFormat();
                                             });
                                             </script>
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
                                        <form target="_blank" action="<?php echo e(url('report/pricing')); ?>" method="post">     
                                        <div class="modal-body">
                                        
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Select Report Type</h3>
                                            
                                             <?php echo e(csrf_field()); ?>

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

                                            <input type="submit" class="btn btn-primary" value="Select" />
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
                                        <h3 id="title" class="m-t-none m-b">Pricing Plan</h3>
                                        <table class="table table-bordered table-hover">

                                            <tr>
                                               <td><strong>Branch : </strong></td><td class="tdbranch"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Room Type : </strong></td><td class="tdtype"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Monday : </strong></td><td class="tdmon"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Tuesday : </strong></td><td class="tdtue"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Wednesday : </strong></td><td class="tdwen"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Thursday : </strong></td><td class="tdthur"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Friday : </strong></td><td class="tdfri"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Saturday : </strong></td><td class="tdsat"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Sunday : </strong></td><td class="tdsun"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Children : </strong></td><td class="tdchildren"></td>
                                            </tr>

                                            <!-- <tr>
                                               <td><strong>Start Date : </strong></td><td class="tdsdate"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>End Date : </strong></td><td class="tdedate"></td>
                                            </tr> -->

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
                                                <th>Room Type</th>
                                                <th>Branch</th>
                                                <th>Mon</th>
                                                <th>Tue</th>
                                                <th>Wen</th>
                                                <th>Thu</th>
                                                <th>Fri</th>
                                                <th>Sat</th>
                                                <th>Sun</th>
                                                <th>Children %</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody class="displayrecord">
                                              <?php $i=1;?>
                                               <?php $__currentLoopData = $pricings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pricing): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?> 
                                                <tr class="<?php echo e('del'.$pricing->id); ?>">
                                                  <td>
                                                    <?php echo e($i); ?>

                                                  </td>                 
                                                  
                                                  <td><?php echo e($pricing->branch->name); ?></td>
                                                  <td><?php echo e($pricing->roomtype->name); ?></td>
                                                  <td><?php echo e(number_format($pricing->mon,2)); ?></td>
                                                  <td><?php echo e(number_format($pricing->tue,2)); ?></td>
                                                  <td><?php echo e(number_format($pricing->wen,2)); ?></td>
                                                  <td><?php echo e(number_format($pricing->thur,2)); ?></td>
                                                  <td><?php echo e(number_format($pricing->fri,2)); ?></td>
                                                  <td><?php echo e(number_format($pricing->sat,2)); ?></td>
                                                  <td><?php echo e(number_format($pricing->sun,2)); ?></td>
                                                  <td><?php echo e($pricing->children); ?></td>
                                                  <td>
                                                      <div class="btn-group">
                                                          <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                          </button>          
                                                          <ul class="dropdown-menu" role="menu">
                                                          <li>
                                                                <a class="view" data-toggle="modal" data-id="<?php echo e($pricing->id); ?>" data-roomtype="<?php echo e($pricing->roomtype->name); ?>" data-mon="<?php echo e(number_format($pricing->mon,2)); ?>" data-tue="<?php echo e(number_format($pricing->tue,2)); ?>" data-wen="<?php echo e(number_format($pricing->wen,2)); ?>" data-thu="<?php echo e(number_format($pricing->thur,2)); ?>" data-fri="<?php echo e(number_format($pricing->fri,2)); ?>" data-sat="<?php echo e(number_format($pricing->sat,2)); ?>" data-sun="<?php echo e(number_format($pricing->sun,2)); ?>" data-children="<?php echo e($pricing->children); ?>" data-branch="<?php echo e($pricing->branch->name); ?>" href="#modal-view">
                                                                    View
                                                                </a>
                                                            </li> 
                                                            <li>
                                                                <a class="edit" data-toggle="modal" data-id="<?php echo e($pricing->id); ?>" data-roomtype="<?php echo e($pricing->roomtype_id); ?>" data-mon="<?php echo e(number_format($pricing->mon,2)); ?>" data-tue="<?php echo e(number_format($pricing->tue,2)); ?>" data-wen="<?php echo e(number_format($pricing->wen,2)); ?>" data-thu="<?php echo e(number_format($pricing->thur,2)); ?>" data-fri="<?php echo e(number_format($pricing->fri,2)); ?>" data-sat="<?php echo e(number_format($pricing->sat,2)); ?>" data-sun="<?php echo e(number_format($pricing->sun,2)); ?>" data-branch="<?php echo e($pricing->branch_id); ?>" data-children="<?php echo e($pricing->children); ?>" href="#modal-form">
                                                                    Update
                                                                </a>
                                                            </li>                   
                                                            <li>
                                                                <a id="<?php echo e($pricing->id); ?>" class="delete">
                                                                    <form id="delform">
                                                                    <?php echo e(csrf_field()); ?>

                                                                        Delete
                                                                    </form>
                                                                </a>
                                                            </li>                    
                                                          </ul>
                                                      </div>
                                                  </td>
                                                </tr>
                                                <?php $i++; ?>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                    </table>                  
                                </div>

                                <div id="tab-2" class="tab-pane">
                                    
                                </div>
                                <div id="tab-3" class="tab-pane">
                                    
                                </div>
                                <div id="tab-4" class="tab-pane">
                                                                        
                                </div>
                                <div id="tab-5" class="tab-pane">
                                                                        
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
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
$(document).ready(function() {
    $("#image").on("change", function(){
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
  var room_id;
  $(document).ready(function() {    
     $('#submit').removeAttr('disabled');
     $('#update').removeAttr('disabled');
     $('#title').html('Create Pricing Plan');
     $('#submit').html('Save Changes');
     $('#sucessmessage').html('Saving Data...');
     $("#update").attr("id", "submit");
     $('#errors').html("");

    function displaydata(){
       $.ajax({
          url     : "<?php echo e(URL::to('pricing/showrecord')); ?>",
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
         $('#title').html('Create Pricing Plan');
         $('#submit').html('Save Changes');
         $('#sucessmessage').html('Saving Data...');     
         //$('#room_number').val('');
         $('#branch').val('');
         $('#room_type').val('');
         $('#mon').val('');
         $('#tue').val('');
         $('#wen').val('');
         $('#thur').val('');
         $('#fri').val('');
         $('#sat').val('');
         $('#sun').val('');
         $('#children').val('');
         $('#errors1').html("");
         $('#errors3').html("");
         $('#errors2').html("");
         $('#errors22').html("");  
         $('#errors4').html("");
         $('#errors5').html("");
         $('#errors36').html("");
         $("#form").attr("action", "pricing/store");
   });

    $("#users").on("click",".edit", function(){
         var id = $(this).data('id');
         //var name = $(this).data('name');   
         var branch = $(this).data('branch');  
         var roomtype = $(this).data('roomtype');
         var mon = $(this).data('mon');
         var tue = $(this).data('tue');
         var wen = $(this).data('wen');
         var thu = $(this).data('thu');
         var fri = $(this).data('fri');
         var sat = $(this).data('sat');
         var sun = $(this).data('sun');
         var children = $(this).data('children');
         
         $('#update').removeAttr('disabled');
         $(".modal-body #branch").val(branch);
         $(".modal-body #room_type").val(roomtype);
         $(".modal-body #mon").val(mon);
         $(".modal-body #tue").val(tue);
         $(".modal-body #wen").val(wen);
         $(".modal-body #thur").val(thu);
         $(".modal-body #fri").val(fri);
         $(".modal-body #sat").val(sat);
         $(".modal-body #sun").val(sun);
         $(".modal-body #children").val(children); 
         $(".modal-body #pricing_id").val( id );       

         $('#title').html('Update Pricing Plan');
         $('#submit').html('Update changes');
         $('#sucessmessage').html('Updating Data...');
         $('#errors1').html("");
         $('#errors3').html("");
         $('#errors2').html("");
         $('#errors22').html("");  
         $('#errors4').html("");
         $('#errors5').html("");
         $('#errors36').html("");
         //$("#submit").attr("id", "update");
         $('.sub-form').remove();
         var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
         $("#modal-form .modal-footer").append(r);
         $("#form").attr("action", "pricing/update");
   });

   $("#users").on("click",".view", function(){
     var id = $(this).data('id'); 
     var branch = $(this).data('branch'); 
     var roomtype = $(this).data('roomtype');
     var mon = $(this).data('mon');
     var tue = $(this).data('tue');
     var wen = $(this).data('wen');
     var thu = $(this).data('thu');
     var fri = $(this).data('fri');
     var sat = $(this).data('sat');
     var sun = $(this).data('sun');
     var children = $(this).data('children');
     
     $('#update').removeAttr('disabled');
     $(".modal-body .tdmon").html( '<?php echo e($currency); ?> '+ mon );
     $(".modal-body .tdtue").html( '<?php echo e($currency); ?> '+ tue );
     $(".modal-body .tdwen").html( '<?php echo e($currency); ?> '+ wen );
     $(".modal-body .tdthur").html( '<?php echo e($currency); ?> '+ thu );
     $(".modal-body .tdbranch").html( branch );
     $(".modal-body .tdtype").html( roomtype );
     $(".modal-body .tdfri").html( '<?php echo e($currency); ?> '+ fri );
     $(".modal-body .tdsat").html( '<?php echo e($currency); ?> '+ sat );
     $(".modal-body .tdsun").html( '<?php echo e($currency); ?> '+ sun );
     $(".modal-body .tdchildren").html( children+'%' );
    });

  
      $('body').on("click","#submit",function() {
     
    if($('#room_type').val() == ""){
        $('#errors2').html("Please select room type!");
        return false;
     }
    if($('#branch').val() == ""){
        $('#errors22').html("Please select hotel branch!");
        return false;
     }
    else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var room_type = $('#room_type').val();
        var mon = $('#mon').val();
        var tue = $('#tue').val();
        var wen = $('#wen').val();
        var branch=$('#branch').val();
        var thu = $('#thur').val();
        var fri = $('#fri').val();
        var sat = $('#sat').val();
        var sun = $('#sun').val();
        var children = $('#children').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');
        
        data.append("mon",mon);
        data.append("room_type",room_type);
        data.append("tue",tue);
        data.append("wen",wen);
        data.append("branch",branch);
        data.append("thur",thu);
        data.append("fri",fri);
        data.append("sat",sat);
        data.append("sun",sun);
        data.append("children",children);
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
                            title: 'Pricing Plan',
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
     if($('#room_type').val() == ""){
        $('#errors2').html("Please select room type!");
        return false;
     }
    if($('#branch').val() == ""){
        $('#errors22').html("Please select hotel branch!");
        return false;
     }
     
     else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var mon = $('#mon').val();
        var room_type = $('#room_type').val();
        var tue = $('#tue').val();
        var wen = $('#wen').val();
        var id = $('#pricing_id').val();
        var branch=$('#branch').val();
        var thur = $('#thur').val();
        var fri = $('#fri').val();
        var sat = $('#sat').val();
        var sun = $('#sun').val();
        var children = $('#children').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');
        
        data.append("room_type",room_type);
        data.append("mon",mon);
        data.append("id",id);
        data.append("tue",tue);
        data.append("wen",wen);
        data.append("branch",branch);
        data.append("thur",thur);
        data.append("fri",fri);
        data.append("sat",sat);
        data.append("sun",sun);
        data.append("children",children);
        data.append("_token",token);
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
                        title: 'Pricing Plan',
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

               

               $('#room_type').keyup(function(){
                if($('#room_type').val() == ""){
                  $('#errors2').html("Please select room type!");
                  return false;
                }else{
                  $('#errors2').html("");
                 }
               });  

               $('#branch').on('change', function() {
                if($('#branch').val() == ""){
                  $('#errors22').html("Please select hotel branch!");
                  return false;
                }else{
                  $('#errors22').html("");
                 }
               });  

               
  });
</script>
<script type="text/javascript">
   $(document).ready(function() {
   $("#users").on("click",".delete", function(){    
                var id = $(this).attr("id");
                var token = $("#delform input[name=_token]").val();                
                if(confirm("Are you sure you want to delete this pricing plan?")){
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(url('pricing/delete')); ?>",
                        data: {id:id,_token:token},
                        success: function(){                           
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
                                // options
                                icon: 'glyphicon glyphicon-ok',
                                title: 'Pricing Plan',
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hotel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>