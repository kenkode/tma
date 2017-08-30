
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
                        <div class="ibox-content">
                        <p id="error" style="color:red"></p><br>
                            <h2>
                                User Registration Form
                            </h2>
                            <p style="color:red">
                                Please fill in the fields in *
                            </p>

                            <form id="form" class="wizard-big">
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
                            <div align="center" style="margin-top: 10px; font-size: 10px">
                             <strong>Copyright</strong> TMA &copy; 2017
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
                
            </div>
        <!-- <div class="footer">
            
            <div>
                <strong>Copyright</strong> TMA &copy; 2017
            </div>
        </div> -->

        </div>
        </div>

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

                    var dataString = 'username='+ username + '&email=' + email + '&password=' + password + '&name=' + name + '&phone=' + phone + '&address=' + address + '&type=' + type + '&nairobi=' + nairobi +'&central=' + central +'&coast=' + coast +'&western=' + western +'&nyanza=' + nyanza +'&rift=' + rift +'&eastern=' + eastern +'&neast=' + neast +'&terms=1';
                    //alert (dataString);return false;
                    $.ajax({
                      type: "POST",
                      url: "submit.php",
                      data: {username:username,email:email,password:password,name:name,phone:phone,address:address,type:type ,nairobi:nairobi,central:central,coast:coast,western:western,nyanza:nyanza,rift:rift,eastern:eastern,neast:neast,terms:1,page:page},
                      beforeSend: function(){
                      $("#loading").show();
                      },
                      complete: function(){
                      $("#loading").hide();
                      },
                      success: function(response) {
                      //alert(response);
                      if(response != ""){
                      $('#error').html(response);
                      }else{
                      window.location.href = "http://localhost/tma/index.php";
                      }
                     },
                     error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                       setTimeout(function(){ 
                       alert("An error occured....Please check your internet connection and reload page and try again!!!"); 
                       $('#loading').hide();
                       location.reload();
                       }, 30000);
                        //return false;
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

    

</body>

</html>
