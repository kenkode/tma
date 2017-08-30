@extends('layouts.main')

<style type="text/css">
    #loading {
   width: 100%;
   height: 100%;
   top: 0;
   left: 0;
   position: fixed;
   display: block;
   opacity: 0.7;
   background-color: #fff;
   z-index: 99;
   text-align: center;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}
</style>

@section('content')



<div id="wrapper">

        <div id="page-wrapper">
       
            
        <div class="wrapper wrapper-content animated fadeInDown">

        
           
            <div class="row">
                <div class="col-lg-10">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>User Registration Form</h5>
                            
                            <!-- <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div> -->
                        </div>

                        <div id="loading" style="display:none;">
                        <div style="margin-top:30%;margin-left:-100px !important;">Confirming Registration 
                        <img src="{{url('/assets/images/ellipsis.svg')}}" alt="Loading" />
                        </div>
                        </div>

                        <div class="ibox-content">
                        <p id="error" style="color:red"></p><br>
                            <h2>
                                User Registration Form
                            </h2>
                            <p style="color:red">
                                Please fill in the fields in *
                            </p>

                            
                    <form id="form" class="wizard-big" >
                        {{ csrf_field() }}

                        <h1>Account</h1>
                                <fieldset>
                                    <h2>Account Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Username *</label>
                                                <input id="userName" name="userName" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Email *</label>
                                                <input id="email" name="email" type="text" class="form-control required email">
                                            </div>
                                            </div>
                                            <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Password *</label>
                                                <input id="password" name="password" type="password" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm Password *</label>
                                                <input id="confirm" name="confirm" type="password" class="form-control required">
                                            </div>
                                        </div>
                                        <!-- <div class="col-lg-4">
                                            <div class="text-center">
                                                <div style="margin-top: 20px">
                                                    <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>

                                </fieldset>
                                <h1>Profile</h1>
                                <fieldset>
                                    <h2>Organization Information</h2>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Name *</label>
                                                <input id="name" name="name" type="text" class="form-control required">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number *</label>
                                                <input id="phone" name="phone" type="text" class="form-control required">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Type *</label>
                                                <select name="type" id="type" class="form-control required">
                                                <option></option>
                                                <option value="Travel">Travel</option>
                                                <option value="SGR">SGR</option>
                                                <option value="Taxi">Taxi</option>
                                                <option value="Airline">Airline</option>
                                                <option value="Hotel">Hotel</option>
                                                <option value="Events">Events</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <textarea id="address" name="address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <h1>Area of Operation</h1>
                                <fieldset>
                                <div class="col-lg-2"></div>
                                <div class="col-sm-8">
                                <label>Select an area(s) where your business operates</label><br>
                                    <div class="col-sm-4">
                                    
                                        <label class="checkbox-inline" style="margin-left: 10px !important;"> <input type="checkbox" id="nairobi"> Nairobi </label> <label class="checkbox-inline">
                                        <input type="checkbox" id="central"> Central </label> <label class="checkbox-inline">
                                        <input type="checkbox" id="coast"> Coast </label> <label class="checkbox-inline">
                                        <input type="checkbox" id="western"> Western </label></div>
                                        <div class="col-sm-4"><label style="margin-left: 10px !important;" class="checkbox-inline">
                                        <input type="checkbox" id="nyanza"> Nyanza </label><label class="checkbox-inline">
                                        <input type="checkbox" id="rift"> Rift Valley </label><label class="checkbox-inline">
                                        <input type="checkbox" id="eastern"> Eastern </label><label class="checkbox-inline">
                                        <input type="checkbox" id="neast"> North Eastern </label></div>
                                        </div>
                                </fieldset>

                                <h1>Finish</h1>
                                <fieldset>
                                    <h2>Terms and Conditions (*)</h2>
                                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                                </fieldset>
                    </form>
                    <p class="m-t">
                        <small>Copyright Upstridge©2017</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Mainly scripts -->
    <script src="{{url('/assets/js/jquery-2.1.1.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/assets/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{url('/assets/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{url('/assets/js/inspinia.js')}}"></script>
    <script src="{{url('/assets/js/plugins/pace/pace.min.js')}}"></script>

    <!-- Steps -->
    <script src="{{url('/assets/js/plugins/staps/jquery.steps.min.js')}}"></script>

    <!-- Jquery Validate -->
    <script src="{{url('/assets/js/plugins/validate/jquery.validate.min.js')}}"></script>

    <script src="{{url('/assets/js/bootstrap-flash-alert.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap-notify.js')}}"></script>

<script>
        $(document).ready(function(){

            

            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onCanceled: function (event, currentIndex)
                {
                    window.location.href = "{{url('/login')}}";
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);
                    
                    // Submit form input
                    //form.submit();

                    var username = $('#userName').val();
                    var email = $('#email').val();
                    var password = $('#password').val();
                    var name = $('#name').val();
                    var phone = $('#phone').val();
                    var type = $('#type').val();
                    var address = $('#address').val();
                    var terms = $('#terms').val();
                    var page = 'registration';
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
                    var token = $("#form input[name=_token]").val();
                    var dataString = 'username='+ username + '&email=' + email + '&password=' + password + '&name=' + name + '&phone=' + phone + '&address=' + address + '&type=' + type + '&nairobi=' + nairobi +'&central=' + central +'&coast=' + coast +'&western=' + western +'&nyanza=' + nyanza +'&rift=' + rift +'&eastern=' + eastern +'&neast=' + neast +'&terms=1';
                    //alert (dataString);return false;
                    //alert("{{url('/register')}}"); return;
                    $.ajax({
                      type: "POST",
                      url: "{{url('/create')}}",
                      data: {username:username,email:email,password:password,name:name,phone:phone,address:address,type:type ,nairobi:nairobi,central:central,coast:coast,western:western,nyanza:nyanza,rift:rift,eastern:eastern,neast:neast,terms:1,_token:token},
                      beforeSend: function() { $('#loading').show(); },
                      success: function(response) {
                      //alert(response);return;
                      
                      if(response != 1){
                      $('#error').html(response);
                      }else if(response == 1){
                      /*$.alert("Registration Successfully! <br/>A confirmation link has been sent to your email!", {autoClose: true,closeTime: 5000,withTime: false,type: 'success',position: ['center', [-0.25, 0]], title: false,icon:'glyphicon glyphicon-ok',close: '',speed: 'normal',isOnly: true,minTop: 10,animation: false,animShow: 'fadeIn',animHide: 'fadeOut'});*/
                      $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Registration Successful....',
    message: 'A confirmation link has been sent to your email!',
    url: '{{url("/")}}',
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
    delay: 5000,
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
                      enableFinishButton: false;
                      $('#loading').hide();
                      setTimeout(function () {
                      window.location.href = "{{url('/login')}}"; //will redirect to your blog page (an ex: blog.html)
                      }, 2000);

                      //window.location.href = "{{url('/login')}}";
                      }
                     },
                     error: function(response) {
                       $('#error').html(response);
                     }
                     });
                     //return false;


                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

@endsection
