<style type="text/css">
    @media  screen and (min-width: 768px) {
        .modal-dialog {
          width: 900px; /* New width for default modal */
        }
        .modal-sm {
          width: 450px; /* New width for small modal */
        }
    }
    @media  screen and (min-width: 992px) {
        .modal-lg {
          width: 750px; /* New width for large modal */
        }
    }  

    .modal { overflow: auto !important; } 
    }
       
</style>
<?php $__env->startSection('content'); ?>
<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Seat Assignments</h2>
        </div>    
        <div id="loading" style="display:none;">
                                         <div style="margin-top:5%;"><p style="color: green;font-size: 18px" id="sucessmessage">Saving data</p>
                                         <img src="<?php echo e(url('/assets/images/ellipsis.svg')); ?>" alt="...." />
                                         </div>
                                         </div>                                <!-- <form id="form" action="" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                        <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content animated fadeIn">                         
                                                            <div class="modal-body">
                                                                <div id="loading" style="display:none;">
                                                                     <div style="margin-top:5%;">
                                                                     <p id="sucessmessage">     Saving data
                                                                     </p>
                                                                     <img src="<?php echo e(url('/assets/images/ellipsis.svg')); ?>" alt="...." />
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
                                        <form target="_blank" action="<?php echo e(url('report/seatassignments')); ?>" method="post">     
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
                                        <?php echo e(csrf_field()); ?>


                                        <div class="form-group"><label>Airplane <span style="color:red">*</span></label> 
                                             <select id="vid" class="form-control">
                                             <option value="">Select Airplane</option>
                                             <?php $__currentLoopData = $vehicles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                             <option value="<?php echo e($vehicle->id); ?>"> <?php echo e($vehicle->regno.'-'.$vehicle->vehiclename->name); ?></option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                             </select>
                                             <p id="selname" style="color:red"></p>
                                             </div>

                                          

                                    <table class="display" style="margin-bottom: 40px !important">
                                    
                                     </table>      

                            </form>

                                         
                                </div>

                                
<?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script type="text/javascript">
  var submit_url;
  var type_id;
  $(document).ready(function() { 
  
    $('#vid').change(function(){
      if($('#vid').val() > 0){
        $.get("<?php echo e(url('api/getCapcity')); ?>", 
        { option: $(this).val() }, 
        function(data) {
           $('.display').html(data);
        });
      }else{
         $('.display').html("");
      }
    });

           $('body').on('change',('input[type="checkbox"]'), function() {
           $(this).siblings('input[type="checkbox"]').not(this).prop('checked', false);
           });

     $('#sucessmessage').html('Updating Data...');
     $('#errors').html("");

    function displaydata(){
       $.ajax({
          url     : "<?php echo e(URL::to('deposits/showrecord')); ?>",
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

        var vip = $('.inputVip');
        var business = $('.inputBusiness');
        var normal = $('.inputNormal');
        var apply = $('#apply').val();
        var capacity = $('#capacity').val();
        var vehicle = $('#vid').val();
        var dataVip = new Array();
        var dataNormal = new Array();
        var dataBusiness = new Array();
        var v = 0;
        var n = 0;
        var b = 0;
        $.each(vip, function(){
          //dataVip[$(this).attr('name')] = $(this).is(":checked");
          if($(this).is(":checked") == true){
            v=1;
          }else{
            v=0;
          }
          dataVip.push(v);
          //console.log($(this).is(":checked"));
        });

        $.each(business, function(){
          //dataVip[$(this).attr('name')] = $(this).is(":checked");
          if($(this).is(":checked") == true){
            b=1;
          }else{
            b=0;
          }
          dataBusiness.push(b);
          //console.log($(this).is(":checked"));
        });

        var i = 1;
        $.each(normal, function(){
          //dataVip[$(this).attr('name')] = $(this).is(":checked");
           
          if($(this).is(":checked") == true){
            n=1;
          }else if($('#vip'+i).is(":checked") == false && $('#business'+i).is(":checked") == false){
            n=1;
          }else{
            n=0;
          }
          i++;
          dataNormal.push(n);
          //console.log($('#business'+i).is(":checked"));
          //console.log($('#business'+i).is(":checked"));
        });

        console.log(dataVip.join(""));
        console.log(dataBusiness.join(""));
        console.log(dataNormal.join(""));

        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("vip",dataVip.join(""));
        data.append("business",dataBusiness.join(""));
        data.append("normal",dataNormal.join(""));
        data.append("capacity",capacity);
        data.append("apply",apply);
        data.append("vehicle",vehicle);
        data.append("_token",token);
        $.ajax({
          type: "POST",
          url: "<?php echo e(url('seatassignments/update')); ?>",
          data: data,
          processData: false,
          contentType: false,
          beforeSend: function() { $('#loading').show(); },
          success: function(response) {
          //alert(response);       
          if(response != 1){
            $('#errors').html(response);
          }else if(response == 1){
             $('#update').removeAttr('disabled');             
             //displaydata();        
             $.notify({
                        // options
                        icon: 'glyphicon glyphicon-ok',
                        title: 'Seats ',
                        message: ' successfully assigned....',
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
                        url: "<?php echo e(url('roomtype/delete')); ?>",
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.travel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>