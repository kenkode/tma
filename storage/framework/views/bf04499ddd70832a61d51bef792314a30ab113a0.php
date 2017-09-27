<style type="text/css">

    #imagePreview {
    width: 180px;
    height: 180px;
    background-position: center center;
    background-size: cover;
    background-image:url("<?php echo e(url('/public/uploads/logo/'.$organization->logo)); ?>");
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
    }
    
    .modal-body {
    max-height: calc(100vh - 100px);
    overflow-y: auto;
    }
   </style>

<?php $__env->startSection('content'); ?>

<div class="row  border-bottom white-bg dashboard-header">

<div class="col-lg-7 ">
<div class="pro-head">
            <h2>Organization</h2>
        </div>

      <div style="margin-bottom:20px;margin-left:10px;">
      
      </div>

      
           <form id="form" action="" enctype="multipart/form-data">
           <?php echo e(csrf_field()); ?>

            <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content animated fadeIn">
                                            
                                        <div class="modal-body">
                                        <div id="loading" style="display:none;">
                                         <div style="margin-top:5%;"><p id="sucessmessage">Updating data</p>
                                         <img src="<?php echo e(url('/assets/images/ellipsis.svg')); ?>" alt="...." />
                                         </div>
                                         </div>
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="title" class="m-t-none m-b">Update Organization</h3>
                                            <div class="form-group">
                                             <label>Logo :</label>
                                             <input id="image" type="file" name="logo">
                                             <br>
                                             <div id="imagePreview"></div>
                                             </div>

                                             <div class="form-group"><label>Name</label> 
                                             <input type="text" id="name" placeholder="Enter name" class="form-control" required data-error="Please insert organization name">
                                             <p id="nameerrors" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Email</label> 
                                             <input type="text" id="email" placeholder="Enter email" class="form-control" required data-error="Please insert organization email">
                                             <p id="emailerrors" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Phone</label> 
                                             <input type="text" id="phone" placeholder="Enter Phone" class="form-control" required data-error="Please insert organization phone">
                                             <p id="phoneerrors" style="color:red"></p>
                                             </div>

                                             <div class="form-group"><label>Address</label> 
                                             <textarea id="address" placeholder="Enter Address" class="form-control"></textarea>   
                                             </div>

                                             <div class="form-group"><label>Currency Name</label> 
                                             <input type="text" id="currency_name" placeholder="Enter currency name" class="form-control"> 
                                             </div>

                                             <div class="form-group"><label>Currency Shortname</label> 
                                             <input type="text" id="currency_shortname" placeholder="Enter currency shortname" class="form-control">  
                                             </div>

                                             <h4>Area of Operation</h4>
                                <fieldset>
                                <div class="col-lg-2"></div>
                                <div class="col-sm-10">
                                <label>Select an area(s) where your business operates</label><br>
                                    <div class="col-sm-4">
                                    
                                        <label class="checkbox-inline" style="margin-left: 10px !important;"> <input type="checkbox" id="nairobi"> Nairobi </label> 
                                        <label class="checkbox-inline">
                                        <input type="checkbox" id="central"> Central </label> 
                                        <label class="checkbox-inline">
                                        <input type="checkbox" id="coast"> Coast </label> 
                                        <label class="checkbox-inline">
                                        <input type="checkbox" id="western"> Western </label>
                                        </div>
                                        <div class="col-sm-5"><label style="margin-left: 10px !important;" class="checkbox-inline">
                                        <input type="checkbox" id="nyanza"> Nyanza </label><label class="checkbox-inline">
                                        <input type="checkbox" id="rift"> Rift Valley </label><label class="checkbox-inline">
                                        <input type="checkbox" id="eastern"> Eastern </label><label class="checkbox-inline">
                                        <input type="checkbox" id="neast"> North Eastern </label></div>
                                        </div>
                                </fieldset>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>

                                            <button type="button" id="update" class="btn btn-primary sub-form">Update changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>                
                        </form>   
           
        <table id="org" style="background-color: white" class="table table-bordered table-hover">

      <tbody class="displayrecord">
      <tr>
        <td colspan="2"><a data-toggle="modal" data-name="<?php echo e($organization->name); ?>" data-logo="<?php echo e($organization->logo); ?>" data-email="<?php echo e($organization->email); ?>" data-phone="<?php echo e($organization->phone); ?>" data-address="<?php echo e($organization->address); ?>" data-currencyname="<?php echo e($organization->currency_name); ?>" data-currencyshortname="<?php echo e($organization->currency_shortname); ?>" data-nairobi="<?php echo e($organization->is_nairobi); ?>" data-central="<?php echo e($organization->is_central); ?>" data-coast="<?php echo e($organization->is_coast); ?>" data-eastern="<?php echo e($organization->is_eastern); ?>" data-western="<?php echo e($organization->is_western); ?>" data-nyanza="<?php echo e($organization->is_nyanza); ?>" data-northeastern="<?php echo e($organization->is_northeastern); ?>" data-rift="<?php echo e($organization->is_rift); ?>" id="edit" class="btn btn-primary" href="#modal-form">Update Organization</a>&emsp;<a href="<?php echo e(url('report/organization')); ?>" target="_blank" class="btn btn-warning">Organization Report</a></td>
      </tr>
        <tr><td><strong>Logo:</strong></td><td><img src="<?php echo e(url('/public/uploads/logo/'.$organization->logo)); ?>" width="100" height="100" alt="no logo" /></td></tr>
        <tr><td><strong>Name:</strong></td><td><?php echo e($organization->name); ?></td></tr>
        <tr><td><strong>Email:</strong></td><td><?php echo e($organization->email); ?></td></tr>
        <tr><td><strong>Phone:</strong></td><td><?php echo e($organization->phone); ?></td></tr>
        <tr><td><strong>Address:</strong></td><td><?php echo e($organization->address); ?></td></tr>
        <tr><td><strong>Currency Name:</strong></td><td><?php echo e($organization->currency_name); ?></td></tr>
        <tr><td><strong>Currency Shortname:</strong></td><td><?php echo e($organization->currency_shortname); ?></td></tr>
        <tr>
        <td width="35%"><strong>Areas of Operation:</strong></td>
        <td>
        <ul style="margin-left:-30px;">
        <?php if($organization->is_nairobi == 1): ?>
        <li>Nairobi Province</li>
        <?php endif; ?>
        <?php if($organization->is_central == 1): ?>
        <li>Central Province</li>
        <?php endif; ?>
        <?php if($organization->is_coast == 1): ?>
        <li>Coast Province</li>
        <?php endif; ?>
        <?php if($organization->is_western == 1): ?>
        <li>Western Province</li>
        <?php endif; ?>
        <?php if($organization->is_nyanza == 1): ?>
        <li>Nyanza Province</li>
        <?php endif; ?>
        <?php if($organization->is_northeastern == 1): ?>
        <li>North-Eastern Province</li>
        <?php endif; ?>
        <?php if($organization->is_eastern == 1): ?>
        <li>Eastern Province</li>
        <?php endif; ?>
        <?php if($organization->is_rift == 1): ?>
        <li>Rift-Valley Province</li>
        <?php endif; ?>
        </ul>
        </td>
        </tr>
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
  var id;

  $(document).ready(function() {    
     $('#nameerrors').html("");
     $('#phoneerrors').html("");
     function displaydata(){
       $.ajax({
                      url     : "<?php echo e(URL::to('organizations/showrecord')); ?>",
                      type    : "GET",
                      async   : false,
                     
                      success : function(s){
                      $('.displayrecord').html(s)
                      }        
       });
       }
                   
    $('#org').on("click","#edit", function(){
     var l = window.location;
     var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
     var logo = base_url+'/public/uploads/logo/'+$(this).data('logo');
     
     var name = $(this).data('name');
     var email = $(this).data('email');
     var phone = $(this).data('phone');
     var address = $(this).data('address');
     var currency_name = $(this).data('currencyname');
     var currency_shortname = $(this).data('currencyshortname');
     var nairobi = $(this).data('nairobi');
     var central = $(this).data('central');
     var coast = $(this).data('coast');
     var western = $(this).data('western');
     var nyanza = $(this).data('nyanza');
     var eastern = $(this).data('eastern');
     var northeastern = $(this).data('northeastern');
     var rift = $(this).data('rift');

     $('#update').removeAttr('disabled');
     $(".modal-body #name").val( name );
     $(".modal-body #email").val( email );
     $(".modal-body #phone").val( phone );
     $(".modal-body #address").val( address );
     $(".modal-body #currency_name").val( currency_name );
     $(".modal-body #currency_shortname").val( currency_shortname );
     
     if(nairobi == 1){
       $(".modal-body #nairobi").prop('checked','checked');
     }else{
       $(".modal-body #nairobi").prop('checked',false);
     }
     if(central == 1){
       $(".modal-body #central").prop('checked','checked');
     }else{
       $(".modal-body #central").prop('checked',false);
     }
     if(coast == 1){
       $(".modal-body #coast").prop('checked','checked');
     }else{
       $(".modal-body #coast").prop('checked',false);
     }
     if(nyanza == 1){
       $(".modal-body #nyanza").prop('checked','checked');
     }else{
       $(".modal-body #nyanza").prop('checked',false);
     }
     if(western == 1){
       $(".modal-body #western").prop('checked','checked');
     }else{
       $(".modal-body #western").prop('checked',false);
     }
     if(northeastern == 1){
       $(".modal-body #neast").prop('checked','checked');
     }else{
       $(".modal-body #neast").prop('checked',false);
     }
     if(eastern == 1){
       $(".modal-body #eastern").prop('checked','checked');
     }else{
       $(".modal-body #eastern").prop('checked',false);
     }
     if(rift == 1){
       $(".modal-body #rift").prop('checked','checked');
     }else{
       $(".modal-body #rift").prop('checked',false);
     }
     
     $(".modal-body #imagePreview").css('background-image', 'url('+logo+')');
     $("#form").attr("action", "organizations/update");             
     });

    $('#update').on("click",function() {
     
    //alert($('#name').val());
     if($('#name').val() == ""){
        $('#nameerrors').html("Please insert organization name!");
        return false;
     }else if($('#phone').val() == ""){
        $('#phoneerrors').html("Please insert organization phone!");
        return false;
     }else{
                  
        $('#update').attr("disabled", "true");
        var data= false;
        if (window.FormData) {
        data= new FormData();
        }
        var token = $("#form input[name=_token]").val();
        var urL = $('#form').attr('action');
        var email = $('#email').val();
                    var name = $('#name').val();
                    var phone = $('#phone').val();
                    var address = $('#address').val();
                    var currency_name = $('#currency_name').val();
                    var currency_shortname = $('#currency_shortname').val();
                    var nairobi = 0;
                    var central = 0;
                    var coast = 0;
                    var eastern = 0;
                    var western = 0;
                    var neast = 0;
                    var rift = 0;
                    var nyanza = 0;

                    if($("#nairobi").is(':checked')){
                    nairobi = 1;
                    }else{
                    nairobi = 0;
                    }

                    if($("#central").is(':checked')){
                    central = 1;
                    }else{
                    central = 0;
                    }

                    if($("#coast").is(':checked')){
                    coast = 1;
                    }else{
                    coast = 0;
                    }

                    if($("#nyanza").is(':checked')){
                    nyanza = 1;
                    }else{
                    nyanza = 0;
                    }

                    if($("#western").is(':checked')){
                    western = 1;
                    }else{
                    western = 0;
                    }

                    if($("#eastern").is(':checked')){
                    eastern = 1;
                    }else{
                    eastern = 0;
                    }

                    if($("#rift").is(':checked')){
                    rift = 1;
                    }else{
                    rift = 0;
                    }

                    if($("#neast").is(':checked')){
                    neast = 1;
                    }else{
                    neast = 0;
                    }

        data.append("name",name);
        data.append("_token",token);
        data.append("email",email);
        data.append("image", $('input[type=file]')[0].files[0]);
        data.append("phone",phone);
        data.append("address",address);
        data.append("currency_name",currency_name);
        data.append("currency_shortname",currency_shortname);
        data.append("nairobi",nairobi);
        data.append("central",central);
        data.append("coast",coast);
        data.append("eastern",eastern);
        data.append("neast",neast);
        data.append("nyanza",nyanza);
        data.append("western",western);
        data.append("rift",rift);
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
    title: 'Organization',
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
                      $('#loading').hide();
                      }
                     },
                     error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.travel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>