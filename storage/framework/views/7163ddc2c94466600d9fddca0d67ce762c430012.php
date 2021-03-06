<style type="text/css">

    #imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    background-image:url("<?php echo e(url('/public/uploads/logo/default_photo.png')); ?>");
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
    }
     .modal-body {
    max-height: calc(100vh - 100px);
    overflow-y: auto;
    }   

    .modal { overflow: auto !important; }  
   </style>

<?php $__env->startSection('content'); ?>
<?php $currency = ''; ?>
        <?php if($organization->currency_shortname == null || $organization->currency_shortname == ''): ?>
        <?php $currency = 'KES'; ?>
        <?php else: ?>
        <?php $currency = $organization->currency_shortname; ?>
        <?php endif; ?>
<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Cars for hire</h2>
        </div>

      <div style="margin-bottom:20px;margin-left:10px;">
      <a data-toggle="modal" id="add" class="btn btn-primary" href="#modal-form">Add Car</a>&emsp;<a data-toggle="modal" id="report" class="btn btn-warning" href="#modal-report">Car Report</a>
      </div>

      
           <form id="form" action="" enctype="multipart/form-data">
           <?php echo e(csrf_field()); ?>

            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                            
                                        <div class="modal-body">
                                        <div id="loading" style="display:none;">
                                         <div style="margin-top:5%;"><p id="sucessmessage">Saving data</p>
                                         <img src="<?php echo e(url('/assets/images/ellipsis.svg')); ?>" alt="...." />
                                         </div>
                                         </div>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Create Car</h3>
                                             <input type="hidden" id="id" placeholder="Enter name" class="form-control" required data-error="Please insert vehicle name">
                                             <div class="form-group">
                                             <label>Car Image :</label>
                                             <input id="image" type="file" name="logo">
                                             <br>
                                             <div id="imagePreview"></div>
                                             </div>
                                             <div class="form-group"><label>Registration number</label> 
                                             <input type="text" id="regno" placeholder="Enter car registration no." class="form-control" required data-error="Please insert vehicle name">
                                             <p id="regerrors" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Car Type</label> 
                                             <input type="text" id="type" placeholder="Enter car type" class="form-control" required data-error="Please insert vehicle name">
                                             <p id="errors" style="color:red"></p>
                                             </div>
                                             
                                             <div class="form-group"><label>Capacity</label> 
                                             <input type="text" id="capacity" placeholder="Enter car capacity" class="form-control"/>
                                             <p id="slotserrors" style="color:red"></p>
                                             </div>
                                             
                                             <div class="form-group"><label>Location</label> 
                                             <input type="text" id="location" placeholder="Enter where you are located" class="form-control"/>
                                             <p id="locerrors" style="color:red"></p>
                                             </div>
                                             <div class="form-group"><label>Price</label> 
                                             <input type="text" id="price" placeholder="Enter Price" class="form-control">
                                             <script type="text/javascript">
                                             $(document).ready(function() {
                                             $('#price').priceFormat();
                                             });
                                             </script>
                                             <p id="priceerrors" style="color:red"></p>
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
                                        <form target="_blank" action="<?php echo e(url('report/carhires')); ?>" method="post">     
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
                                             <p id="carhires" style="color:red"></p>
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
                                               <td><strong>Image : </strong></td><td class="tdimage"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Registration No. : </strong></td><td class="tdregno"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Type : </strong></td><td class="tdtype"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Capacity : </strong></td><td class="tdcapacity"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Location : </strong></td><td class="tdlocation"></td>
                                            </tr>

                                            <tr>
                                               <td><strong>Price : </strong></td><td class="tdprice"></td>
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
        <th style="color:#FFF">Image</th>
        <th style="color:#FFF">Reg No.</th>
        <th style="color:#FFF">Type</th>
        <th style="color:#FFF">Capacity</th>
        <th style="color:#FFF">Location</th>
        <th style="color:#FFF">Price</th>
        <th style="color:#FFF">Action</th>

      </thead>
      <tbody class="displayrecord">
      <?php $i=1;?>
      <?php $__currentLoopData = $carhires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carhire): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tr class="<?php echo e('del'.$carhire->id); ?>">
          <td><?php echo e($i); ?></td>
          <td><img src="<?php echo e(url('/public/uploads/logo/'.$carhire->image)); ?>" width="100" height="100" alt="no logo" /></td>
          <td><?php echo e($carhire->regno); ?></td>
          <td><?php echo e($carhire->type); ?></td>
          <td><?php echo e($carhire->capacity); ?></td>
          <td><?php echo e($carhire->location); ?></td>
          <td><?php echo e(number_format($carhire->price,2)); ?></td>
          <td>

                  <div class="btn-group">
                  <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Action <span class="caret"></span>
                  </button>
          
                  <ul class="dropdown-menu" role="menu">
                    <li><a class="view" data-toggle="modal" data-regno="<?php echo e($carhire->regno); ?>" data-type="<?php echo e($carhire->type); ?>" data-image="<?php echo e($carhire->image); ?>" data-capacity="<?php echo e($carhire->capacity); ?>" data-location="<?php echo e($carhire->location); ?>" data-price="<?php echo e(number_format($carhire->price,2)); ?>" data-id="<?php echo e($carhire->id); ?>" href="#modal-view">View</a></li>

                    <li><a class="edit" data-toggle="modal" data-regno="<?php echo e($carhire->regno); ?>" data-type="<?php echo e($carhire->type); ?>" data-image="<?php echo e($carhire->image); ?>" data-capacity="<?php echo e($carhire->capacity); ?>" data-location="<?php echo e($carhire->location); ?>" data-price="<?php echo e(number_format($carhire->price,2)); ?>" data-id="<?php echo e($carhire->id); ?>" href="#modal-form">Update</a></li>
                   
                    <li><a id="<?php echo e($carhire->id); ?>" class="delete">
                    <form id="delform">
                    <?php echo e(csrf_field()); ?>

                    Delete
                    </form>
                    </a></li>
                    
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
     $('#title').html('Create Car');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');
     $("#update").attr("id", "submit");
     $('#errors').html("");

     function displaydata(){
       $.ajax({
                      url     : "<?php echo e(URL::to('carhires/showrecord')); ?>",
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
     $('#title').html('Create Car');
     $('#submit').html('Save changes');
     $('#sucessmessage').html('Saving data');     
     $('#type').val('');
     $('#regno').val('');
     $('#capacity').val('');
     $('#location').val('');
     $('#price').val('');
     $('#id').val('');
     $('#errors').html("");
     $("#form").attr("action", "carhires/store");
   });

    $("#users").on("click",".edit", function(){
     var id = $(this).data('id');
     var type = $(this).data('type');
     var capacity = $(this).data('capacity');
     var location = $(this).data('location');
     var price = $(this).data('price');
     var regno = $(this).data('regno');
     
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     var logo = base_url+'/public/uploads/logo/'+$(this).data('image');
     $('#update').removeAttr('disabled');
     $(".modal-body #type").val( type );
     $(".modal-body #capacity").val( capacity );
     $(".modal-body #location").val( location );
     $(".modal-body #price").val( price );
     $(".modal-body #regno").val( regno );
     
     $(".modal-body #id").val( id );
     $(".modal-body #imagePreview").css('background-image', 'url('+logo+')');
     $('#title').html('Update Car');
     $('#submit').html('Update changes');
     $('#sucessmessage').html('Updating data');
     //$("#submit").attr("id", "update");
     $('#errors').html("");
     $('.sub-form').remove();
     var r= $('<button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>');
        $("#modal-form .modal-footer").append(r);
      $("#form").attr("action", "carhires/update");
   });

    $("#users").on("click",".view", function(){
     var id = $(this).data('id');
     var type = $(this).data('type');
     var capacity = $(this).data('capacity');
     var location = $(this).data('location');
     var price = $(this).data('price');
     var regno = $(this).data('regno');
     
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     var logo = base_url+'/public/uploads/logo/'+$(this).data('image');
     $('#update').removeAttr('disabled');
     $(".modal-body .tdtype").html( type );
     $(".modal-body .tdimage").html('<img src="'+logo+'" width="100" height="100" alt="no logo" />');
     $(".modal-body .tdcapacity").html( capacity );
     $(".modal-body .tdlocation").html( location );
     $(".modal-body .tdregno").html( regno );
     $(".modal-body .tdprice").html('<?php echo e($currency); ?> '+ price );
   });


       $('body').on("click","#submit", function() {
    
     if($('#type').val() == ""){
        $('#errors').html("Please insert car type!");
        return false;
     }else if($('#regno').val() == ""){
        $('#regerrors').html("Please insert car registration number!");
        return false;
     }else if($('#capacity').val() == ""){
        $('#slotserrors').html("Please insert car capacity!");
        return false;
     }else if($('#price').val() == ""){
        $('#priceerrors').html("Please insert price!");
        return false;
     }else if($('#location').val() == ""){
        $('#locerrors').html("Please insert your location!");
        return false;
     }else{
        $('#submit').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var type = $('#type').val();
        var capacity = $('#capacity').val();
        var location = $('#location').val();
        var price = $('#price').val();
        var regno = $('#regno').val();
        
        var image = $("#form input[name=logo]").val();
        var id = $('#vid').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("image", $('input[type=file]')[0].files[0]);
        data.append("type",type);
        data.append("regno",regno);
        data.append("capacity",capacity);
        data.append("location",location);
        data.append("price",price);
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
                      $('#type').val('');
                      $('#capacity').val('');
                      $('#location').val('');
                      $('#price').val('');
                      displaydata(); 
                      /*$.alert("Registration Successfully! <br/>A confirmation link has been sent to your email!", {autoClose: true,closeTime: 5000,withTime: false,type: 'success',position: ['center', [-0.25, 0]], title: false,icon:'glyphicon glyphicon-ok',close: '',speed: 'normal',isOnly: true,minTop: 10,animation: false,animShow: 'fadeIn',animHide: 'fadeOut'});*/
                      $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Car',
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
     if($('#type').val() == ""){
        $('#errors').html("Please insert car type!");
        return false;
     }else if($('#capacity').val() == ""){
        $('#slotserrors').html("Please insert car capacity!");
        return false;
     }else if($('#regno').val() == ""){
        $('#regerrors').html("Please insert car registration number!");
        return false;
     }else if($('#price').val() == ""){
        $('#priceerrors').html("Please insert price!");
        return false;
     }else if($('#location').val() == ""){
        $('#locerrors').html("Please insert your location!");
        return false;
     }else{
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var type = $('#type').val();
        var image = $("#form input[name=logo]").val();
        var id = $('#id').val();
        var capacity = $('#capacity').val();
        var location = $('#location').val();
        var price = $('#price').val();
        var regno = $('#regno').val();
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');

        data.append("image", $('input[type=file]')[0].files[0]);
        data.append("type",type);
        data.append("regno",regno);
        data.append("capacity",capacity);
        data.append("location",location);
        data.append("price",price);
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
    title: 'Car',
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

  
   $('#type').keyup(function(){
    if($('#type').val() == ""){
        $('#errors').html("Please insert car type!");
        return false;
     }else{
      $('#errors').html("");
     }
   });

   $('#regno').keyup(function(){
    if($('#regno').val() == ""){
        $('#regerrors').html("Please insert car registration number!");
        return false;
     }else{
      $('#regerrors').html("");
     }
   });

   $('#capacity').keyup(function(){
    if($('#capacity').val() == ""){
        $('#slotserrors').html("Please insert car capacity!");
        return false;
     }else{
      $('#slotserrors').html("");
     }
   });

   $('#location').keyup(function(){
    if($('#location').val() == ""){
        $('#locerrors').html("Please insert your location!");
        return false;
     }else{
      $('#locerrors').html("");
     }
   });

   $('#price').keyup(function(){
    if($('#price').val() == ""){
        $('#priceerrors').html("Please insert price!");
        return false;
     }else{
      $('#priceerrors').html("");
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
         
                if(confirm("Are you sure you want to delete this Car?")){
                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(url('carhires/delete')); ?>",
                        data: {id:id,_token:token},
                        success: function(response){
                          if(response == 1){
                            $('.check-error').show();
                            $('.check-error').html("That Car can`t be deleted because its booked!");
                            setTimeout(function() {
                            $(".check-error").hide('blind', {}, 500)
                            }, 5000);
                          }else{
                           //alert(response);
                            $(".del"+id).fadeOut('slow'); 
                            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Car',
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.travel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>