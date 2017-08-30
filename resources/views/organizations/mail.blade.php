@extends('layouts.travel')

@section('content')

<div class="row  border-bottom white-bg dashboard-header">
<div class="pro-head">
            <h2>Mail Settings</h2>
        </div>

        <div id="loading" style="display:none;">
                                         <div style="margin-top:5%;"><p id="sucessmessage">Updating Mail Settings</p>
                                         <img src="{{url('/assets/images/ellipsis.svg')}}" alt="...." />
                                         </div>
                                         </div>

           <form id="mailform" method="post" data-toggle="validator" role="form">
              {{ csrf_field() }}
                  <div class="form-group">
                  <label>Driver <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="driver" data-error="Please insert mail driver" name="driver" placeholder="Mail Driver" value="{{$organization->mail_driver}}">
                    <div style="color:red" id="drivererrors"></div>
                  </div>
                  
                  <div class="form-group">
                  <label>Host <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="host" data-error="Please insert mail host" name="host" placeholder="Mail Host" value="{{$organization->mail_host}}">
                    <div style="color:red" id="hosterrors"></div>
                  </div>

                  <div class="form-group">
                  <label>Port <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="port" data-error="Please insert mail port" name="port" placeholder="Mail Port" value="{{$organization->mail_port}}">
                    <div style="color:red" id="porterrors"></div>
                  </div>
                  
                  <div class="form-group">
                  <label>Username <span style="color:red">*</span></label>
                  
                    <input type="text" class="form-control" id="username" data-error="Please insert mail username" name="username" placeholder="Mail Username" value="{{$organization->mail_username}}">
                    <div style="color:red" id="usernameerrors"></div>
                  </div>

                  <div class="form-group">
                  <label>Password <span style="color:red">*</span></label>
                  
                    <input type="text" class="form-control" id="password" data-error="Please insert mail password" name="password" placeholder="Mail Password" value="{{$organization->mail_password}}">
                    <div style="color:red" id="passworderrors"></div>
                  </div>
                  
                  <div class="form-group">
                  <label>Encryption (Optional):</label>
                  
                    <input type="text" class="form-control" id="encryption" name="encryption" placeholder="Mail Encryption" value="{{$organization->mail_encryption}}">
                  </div>
                  
                    <button type="button" id="submit" class="btn btn-primary sub-form">Save changes</button>
      
    </form>
</div>

@include('includes.footer')

<script type="text/javascript">
$(document).ready(function(){

  $('#submit').on("click",function(event){
        event.preventDefault();
        var driver = $("#driver").val();
        var host = $("#host").val();
        var port = $("#port").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var encryption = $("#encryption").val();
        var token = $("#mailform input[name=_token]").val();

        function isPositiveInteger(n) {
        return n >>> 0 === parseFloat(n);
        }

        if($('#driver').val() == ""){
        $('#drivererrors').html("Please insert mail driver!");
        return false;
        }else if($('#host').val() == ""){
        $('#hosterrors').html("Please insert mail host!");
        return false;
        }else if($('#port').val() == ""){
        $('#porterrors').html("Please insert a valid mail port!");
        return false;
        }else if($('#username').val() == ""){
        $('#usernameerrors').html("Please insert mail username!");
        return false;
        }else if($('#password').val() == ""){
        $('#passworderrors').html("Please insert mail password!");
        return false;
        }else{

        var data= false;
        if (window.FormData) {
        data= new FormData();
        }

        data.append("driver",driver);
        data.append("host",host);
        data.append("port",port);
        data.append("username",username);
        data.append("password",password);
        data.append("encryption",encryption);
        data.append("_token",token);

       $.ajax({
                      url     : "{{URL::to('mails/update')}}",
                      type    : "POST",
                      data: data,
                      processData: false,
                      contentType: false,
                      beforeSend: function() { $('#loading').show(); },
                      complete: function(){
                      $("#loading").hide();
                      },
                      success: function(response) {
                      results = JSON.parse(response);
            $("#loading").hide();
            $('#driver').val(results.driver);
            $('#host').val(results.host);
            $('#port').val(results.port);
            $('#username').val(results.username);
            $('#password').val(results.password);
            $('#encryption').val(results.encryption);

            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'Mail settings',
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

        },
        error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                        //return false;
        } 
     });
     }
    });
     
    $('#driver').keyup(function(){
    if($('#driver').val() == ""){
        $('#drivererrors').html("Please insert mail driver!");
        return false;
     }else{
      $('#drivererrors').html("");
     }
   });

    $('#host').keyup(function(){
    if($('#host').val() == ""){
        $('#hosterrors').html("Please insert mail host!");
        return false;
     }else{
      $('#hosterrors').html("");
     }
   });


    $('#port').keyup(function(){
    if($('#port').val() == ""){
        $('#porterrors').html("Please insert a valid mail port!");
        return false;
     }else{
      $('#porterrors').html("");
     }
   });

    $('#username').keyup(function(){
    if($('#username').val() == ""){
        $('#usernameerrors').html("Please insert mail username!");
        return false;
     }else{
      $('#usernameerrors').html("");
     }
   });

    $('#password').keyup(function(){
    if($('#password').val() == ""){
        $('#passworderrors').html("Please insert mail password!");
        return false;
     }else{
      $('#passworderrors').html("");
     }
   });

  });

</script>


@endsection