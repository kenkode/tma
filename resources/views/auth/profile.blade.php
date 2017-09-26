@extends('layouts.travel')

@section('content')

<div class="row  border-bottom white-bg dashboard-header">

       

           <div class="pro-head">
            <h4><a href="#" class="user"><i class="fa fa-plus user-plus"></i>User Profile</a></h4>
           </div>

            <div id="loading" style="display:none;">
                                         <div style="margin-top:5%;"><p id="sucessmessage">Updating user profile</p>
                                         <img src="{{url('/assets/images/ellipsis.svg')}}" alt="...." />
                                         </div>
                                         </div>

           <div id="user-content">
           <form id="profileform" method="post" data-toggle="validator" role="form">
              {{ csrf_field() }}
                  <div class="form-group">
                  <label>Username <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="username" data-error="Please insert your username" name="username" placeholder="Username" value="{{$user->name}}">
                    <div style="color:red" id="nameerrors"></div>
                  </div>
                  
                  <div class="form-group">
                  <label>Email <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="email" data-error="Please insert your email" name="email" placeholder="Your email address" value="{{$user->email}}">
                    <div style="color:red" id="emailerrors"></div>
                  </div>

                  <button type="button" id="profilebtn" class="btn btn-primary sub-form">Update Profile</button>

                  </form>
                  </div>
                  <br><br>

                  <div class="pro-head">
                  <h4><a href="#" class="pass"><i class="fa fa-plus user-plus"></i>User Password</a></h4>
                  </div>

                <div id="pass-content">
                <form id="passform" method="post" data-toggle="validator" role="form">
                 {{ csrf_field() }}
                  <div class="form-group">
                  <label>Old Password <span style="color:red">*</span></label>
                    <input type="password" class="form-control" id="oldpassword" data-error="Please insert mail port" name="oldpassword" placeholder="Old Password">
                    <div style="color:red" id="oldpasserrors"></div>
                  </div>
                  
                  <div class="form-group">
                  <label>New Password <span style="color:red">*</span></label>
                  
                    <input type="password" class="form-control" id="newpassword" data-error="Please insert mail username" name="newpassword" placeholder="New Password">
                    <div style="color:red" id="newpasserrors"></div>
                  </div>

                  <div class="form-group">
                  <label>Confirm Password <span style="color:red">*</span></label>
                  
                    <input type="password" class="form-control" id="confirmpassword" data-error="Please insert mail password" name="confirmpassword" placeholder="Confirm Password">
                    <div style="color:red" id="confpasserrors"></div>
                  </div>
                  <button type="button" id="passbtn" class="btn btn-primary sub-form">Update Password</button>          
      
                 </form>
                 </div>
                 </div>

@include('includes.footer')

<script type="text/javascript">
$(document).ready(function(){
  $('#pass-content').hide();
  $('#user-content').hide();

  $('.pass').click(function(){
    if ($('#pass-content').is(":hidden")) {
        $('#pass-content').slideDown("slow");
        $(this).children('i').removeClass('fa-plus').addClass('fa-minus');
    } else {
        $('#pass-content').slideUp("slow");
        $(this).children('i').removeClass('fa-minus').addClass('fa-plus');
    }
  });
    $('.user').click(function(){
     if ($('#user-content').is(":hidden")) {
        $('#user-content').slideDown("slow");
        $(this).children('i').removeClass('fa-plus').addClass('fa-minus');
    } else {
        $('#user-content').slideUp("slow");
        $(this).children('i').removeClass('fa-minus').addClass('fa-plus');
    }
    });

  $('#profilebtn').on("click",function(event){
        event.preventDefault();
        var username = $("#username").val();
        var email = $("#email").val();
        var token = $("#profileform input[name=_token]").val();
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        re.test(email);
 
        if($('#username').val() == ""){
        $('#nameerrors').html("Please insert username!");
        return false;
        }else if($('#email').val() == "" || re.test(email) == false){
        $('#emailerrors').html("Please insert a valid email address!");
        return false;
        }else{

        var data= false;
        if (window.FormData) {
        data= new FormData();
        }

        data.append("username",username);
        data.append("email",email);
        data.append("_token",token);

       $.ajax({
                      url     : "{{URL::to('user/update')}}",
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
            $('#username').val(results.username);
            $('#email').val(results.email);

            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'User Profile',
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

  var delay = (function(){
  var timer = 0;
  return function(callback, ms){
  clearTimeout (timer);
  timer = setTimeout(callback, ms);
 };
})();

  $('#passbtn').on("click",function(event){
        event.preventDefault();
        var oldpassword = $("#oldpassword").val();
        var newpassword = $("#newpassword").val();
        var confpassword = $("#confirmpassword").val();
        var token = $("#passform input[name=_token]").val();
        
 
        if($('#oldpassword').val() == ""){
        $('#oldpasserrors').html("Please insert old password!");
        return false;
      }if($('#oldpassword').val() != ""){
      $('#oldpasserrors').html("");
      var oldpassword = $("#oldpassword").val();
      var token = $("#passform input[name=_token]").val();
      $.ajax({
                      url     : "{{URL::to('user/checkpassword')}}",
                      type    : "POST",
                      data: {password:oldpassword,_token:token},
                      async:false,
                      success: function(response) {
                      if(response == 1){
                        $('#oldpasserrors').html("Old password doesn`t match current password!");
                        return false;
                      }
                    },
                      error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                     }

      
   });
    }if($('#newpassword').val() == ""){
        $('#newpasserrors').html("Please insert new password!");
        return false;
     }if($('#confirmpassword').val() == ""){
        $('#confpasserrors').html("Please confirm new password!");
        return false;
     }if($('#confirmpassword').val() != ""){
      $('#confpasserrors').html("");
      var newpassword = $("#newpassword").val();
      var confpassword = $("#confirmpassword").val();
      if(newpassword != confpassword){
       $('#confpasserrors').html("Passwords don`t match!");
       return false;
      }
     }if($('#newpassword').val() != "" && $('#oldpassword').val() != "" && $('#confirmpassword').val() != ""){

        var newpassword = $("#newpassword").val();
        var confpassword = $("#confirmpassword").val();
        if(newpassword == confpassword){
        var oldpassword = $("#oldpassword").val();
        var token = $("#passform input[name=_token]").val();
        $.ajax({
                      url     : "{{URL::to('user/checkpassword')}}",
                      type    : "POST",
                      data: {password:oldpassword,_token:token},
                      async:false,
                      success: function(response) {
                      if(response == 0){
                      var data= false;
        if (window.FormData) {
        data= new FormData();
        }

        data.append("password",confpassword);
        data.append("_token",token);

       $.ajax({
                      url     : "{{URL::to('user/password')}}",
                      type    : "POST",
                      data: data,
                      processData: false,
                      contentType: false,
                      beforeSend: function() { $('#loading').show(); },
                      complete: function(){
                      $("#loading").hide();
                      },
                      success: function() {
                      $("#oldpassword").val('');
                      $("#newpassword").val('');
                      $("#confirmpassword").val('');

            $.notify({
    // options
    icon: 'glyphicon glyphicon-ok',
    title: 'User password',
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
                    },
                      error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                     }

      
   });
        
     }
   }
    });

  

  $('#oldpassword').keyup(function(){
    if($('#oldpassword').val() == ""){
        $('#oldpasserrors').html("Please insert old password!");
        return false;
     }else{
      $('#oldpasserrors').html("");
      delay(function(){
      var oldpassword = $("#oldpassword").val();
      var token = $("#passform input[name=_token]").val();
      $.ajax({
                      url     : "{{URL::to('user/checkpassword')}}",
                      type    : "POST",
                      data: {password:oldpassword,_token:token},
                      async:false,
                      success: function(response) {
                      if(response == 1){
                        $('#oldpasserrors').html("Old password doesn`t match current password!");
                      }
                    },
                      error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                     }

      
   });
      }, 1000 );
    }
  });

  $('#newpassword').keyup(function(){
    if($('#newpassword').val() == ""){
        $('#newpasserrors').html("Please insert new password!");
        return false;
     }else{
      $('#newpasserrors').html("");
     }
   });

  $('#confirmpassword').keyup(function(e){
    if($('#confirmpassword').val() == ""){
        $('#confpasserrors').html("Please confirm new password!");
        return false;
     }else{
      $('#confpasserrors').html("");
      var newpassword = $("#newpassword").val();
      var confpassword = $("#confirmpassword").val();
      if(newpassword != confpassword){
      
       $('#confpasserrors').html("Passwords don`t match!");
      
    }
     }
   });
     
    $('#username').keyup(function(){
    if($('#username').val() == ""){
        $('#namererrors').html("Please insert mail driver!");
        return false;
     }else{
      $('#namererrors').html("");
     }
   });

    $('#email').keyup(function(){
    if($('#email').val() == ""){
        $('#emailerrors').html("Please insert your email address!");
        return false;
     }else{
      $('#emailerrors').html("");
     }
   });

  });

</script>


@endsection