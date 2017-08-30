<div class="footer">
                    <!-- <div class="pull-right">
                        10GB of <strong>250GB</strong> Free.
                    </div> -->
                    <div>
                        <strong>Copyright</strong> TMAPP &copy; 2017
                    </div>
                </div>

                </div>
        </div>

        </div>
    </div>

     <!-- Mainly scripts -->
    
    <script src="<?php echo e(url('/assets/js/validator.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('/assets/js/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/plugins/metisMenu/jquery.metisMenu.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>

    <!-- Flot -->
    <script src="<?php echo e(url('/assets/js/plugins/flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/plugins/flot/jquery.flot.tooltip.min.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/plugins/flot/jquery.flot.spline.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/plugins/flot/jquery.flot.resize.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/plugins/flot/jquery.flot.pie.js')); ?>"></script>

    <!-- Peity -->
    <script src="<?php echo e(url('/assets/js/plugins/peity/jquery.peity.min.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/demo/peity-demo.js')); ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo e(url('/assets/js/inspinia.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/plugins/pace/pace.min.js')); ?>"></script>

    <!-- jQuery UI -->
    <script src="<?php echo e(url('/assets/js/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>

    <!-- GITTER -->
    <script src="<?php echo e(url('/assets/js/plugins/gritter/jquery.gritter.min.js')); ?>"></script>

    <!-- Sparkline -->
    <script src="<?php echo e(url('/assets/js/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>

    <!-- Sparkline demo data  -->
    <script src="<?php echo e(url('/assets/js/demo/sparkline-demo.js')); ?>"></script>

    <!-- ChartJS-->
    <!-- <script src="<?php echo e(url('/assets/js/plugins/chartJs/Chart.min.js')); ?>"></script> -->
    <script src="<?php echo e(url('/js/Chart.min.js')); ?>"></script>

    <!-- Toastr -->
    <script src="<?php echo e(url('/assets/js/plugins/toastr/toastr.min.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/bootstrap-notify.js')); ?>"></script>
    
    <script src="<?php echo e(url('/assets/datepicker/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(url('/assets/js/jquery.datetimepicker.full.js')); ?>"></script>
                                 <script>/*
window.onerror = function(errorMsg) {
  $('#console').html($('#console').html()+'<br>'+errorMsg)
}*/

$.datetimepicker.setLocale('en');

$('#datetimepicker_format').datetimepicker({ format: $("#datetimepicker_format_value").val()});
console.log($('#datetimepicker_format').datetimepicker('getValue'));

$("#datetimepicker_format_change").on("click", function(e){
  $("#datetimepicker_format").data('xdsoft_datetimepicker').setOptions({format: $("#datetimepicker_format_value").val()});
});
$("#datetimepicker_format_locale").on("change", function(e){
  $.datetimepicker.setLocale($(e.currentTarget).val());
});

$('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
format:'Y-m-d H:i:s',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:  '2017-01-01',
});
$('#datetimepicker').datetimepicker({step:10});

$('#dp').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
format:'Y-m-d H:i:s',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:  '2017-01-01',
});
$('#dp').datetimepicker({step:10});

$('.some_class').datetimepicker();

$('#default_datetimepicker').datetimepicker({
  formatTime:'H:i',
  formatDate:'d.m.Y',
  //defaultDate:'8.12.1986', // it's my birthday
  defaultDate:'+03.01.1970', // it's my birthday
  defaultTime:'10:00',
  timepickerScrollbar:false
});

$('#datetimepicker10').datetimepicker({
  step:5,
  inline:true
});
$('#datetimepicker_mask').datetimepicker({
  mask:'9999/19/39 29:59'
});

$('#datetimepicker1').datetimepicker({
  datepicker:false,
  format:'H:i',
  step:5
});
$('#datetimepicker2').datetimepicker({
  yearOffset:222,
  lang:'ch',
  timepicker:false,
  format:'d/m/Y',
  formatDate:'Y/m/d',
  minDate:'-1970/01/02', // yesterday is minimum date
  maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});
$('#datetimepicker3').datetimepicker({
  inline:true
});
$('#datetimepicker4').datetimepicker();
$('#open').click(function(){
  $('#datetimepicker4').datetimepicker('show');
});
$('#close').click(function(){
  $('#datetimepicker4').datetimepicker('hide');
});
$('#reset').click(function(){
  $('#datetimepicker4').datetimepicker('reset');
});
$('#datetimepicker5').datetimepicker({
  datepicker:false,
  allowTimes:['12:00','13:00','15:00','17:00','17:05','17:20','19:00','20:00'],
  step:5
});
$('#datetimepicker6').datetimepicker();
$('#destroy').click(function(){
  if( $('#datetimepicker6').data('xdsoft_datetimepicker') ){
    $('#datetimepicker6').datetimepicker('destroy');
    this.value = 'create';
  }else{
    $('#datetimepicker6').datetimepicker();
    this.value = 'destroy';
  }
});
var logic = function( currentDateTime ){
  if (currentDateTime && currentDateTime.getDay() == 6){
    this.setOptions({
      minTime:'11:00'
    });
  }else
    this.setOptions({
      minTime:'8:00'
    });
};
$('#datetimepicker7').datetimepicker({
  onChangeDateTime:logic,
  onShow:logic
});
$('#datetimepicker8').datetimepicker({
  onGenerate:function( ct ){
    $(this).find('.xdsoft_date')
      .toggleClass('xdsoft_disabled');
  },
  minDate:'-1970/01/2',
  maxDate:'+1970/01/2',
  timepicker:false
});
$('#datetimepicker9').datetimepicker({
  onGenerate:function( ct ){
    $(this).find('.xdsoft_date.xdsoft_weekend')
      .addClass('xdsoft_disabled');
  },
  weekends:['01.01.2014','02.01.2014','03.01.2014','04.01.2014','05.01.2014','06.01.2014'],
  timepicker:false
});
var dateToDisable = new Date();
  dateToDisable.setDate(dateToDisable.getDate() + 2);
$('#datetimepicker11').datetimepicker({
  beforeShowDay: function(date) {
    if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
      return [false, ""]
    }

    return [true, ""];
  }
});
$('#datetimepicker12').datetimepicker({
  beforeShowDay: function(date) {
    if (date.getMonth() == dateToDisable.getMonth() && date.getDate() == dateToDisable.getDate()) {
      return [true, "custom-date-style"];
    }

    return [true, ""];
  }
});
$('#datetimepicker_dark').datetimepicker({theme:'dark'})


</script>

    <script type="text/javascript">
   $(document).ready(function() {
    $('#users').dataTable();            
  });
   </script>

   <script type="text/javascript">

$(function(){
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    orientation: "bottom"
});
});

$(function(){
$('.year').datepicker({
    format: 'yyyy',
    startView: "years", 
    minViewMode: "years",
    autoclose: true,
    endDate: '+0d',
    orientation: "bottom"
});
});

</script>


