<?php $__env->startSection('content'); ?>

       <?php $currency = ''; ?>
       <?php if($organization->currency_shortname == null || $organization->currency_shortname == ''): ?>
       <?php $currency = 'KES'; ?>
       <?php else: ?>
       <?php $currency = $organization->currency_shortname; ?>
       <?php endif; ?>
        
                <div class="row  border-bottom white-bg dashboard-header" style="min-height: 1200px">
                    <form>
                        <input type="hidden" id="year" value="<?php echo e($year); ?>">
                        <input type="hidden" id="type" value="<?php echo e($type); ?>">
                        <input type="hidden" id="from" value="<?php echo e($from); ?>">
                        <input type="hidden" id="to" value="<?php echo e($to); ?>">
                        <input type="hidden" id="period" value="<?php echo e($period); ?>">
                    </form>

                    <!-- <div class="ibox-content">
                            <div class="flot-chart">
                                <div class="flot-chart-pie-content" id="flot-pie-chart"></div>
                            </div>
                        </div> -->
                
                    <div class="col-sm-12">
                    <?php if($period == 'specific'): ?>
                    <h2 align="center" style="font-weight: 500"><?php echo e($year); ?> Customers</h2>
                    <?php else: ?>
                    <h2 align="center" style="font-weight: 500"><?php echo e($from.' - '.$to); ?> Customers</h2>
                    <?php endif; ?>  
                        
                        <div>
                        <?php if($type != 'pie'): ?>
                        <h4 style="float: left;">Total Customers</h4>
                        <?php endif; ?>
                                <canvas id="barChart" height="140"></canvas>
                                <?php if($type != 'pie'): ?>
                                <h4 align="center">Months</h4>
                                <?php endif; ?>
                            </div>
                      
                    </div>
                    

            </div>
        

                <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
           
    <script>
        $(document).ready(function() {

        var results;
        var year = $('#year').val();
        var type = $('#type').val();
        var from = $('#from').val();
        var to = $('#to').val();
        var period = $('#period').val();

        if(period == 'range'){

        $.ajax({
                        type: "GET",
                        url: "<?php echo e(url('rangecustgraph')); ?>",
                        data: {from:from,to:to},
                        async:false,
                        success: function(data){
                           results = JSON.parse(data);
                           //alert(results);
                           //console.log(results.replace(/['"]+/g, ''));
                           console.log(results);                   
                        },
                        error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                        //return false;
                     } 
                 });

        $.ajax({
                        type: "GET",
                        url: "<?php echo e(url('labelbookgraph')); ?>",
                        data: {from:from,to:to},
                        async:false,
                        success: function(data){
                           labels = JSON.parse(data);
                           //alert(results);
                           //console.log(results.replace(/['"]+/g, ''));
                           console.log(labels);                   
                        },
                        error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                        //return false;
                     } 
                 });

        if(type == 'bar'){

        /*var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: results
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
        
    }


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);



            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#464f88"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );*/

            var barCanvas = document.getElementById("barChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 14;

var barData = {
  labels: labels,
  datasets: [{
    fill: true,
    borderColor: 'rgba(26,179,148,0.5)',
    backgroundColor: 'rgba(26,179,148,0.5)',
    label: 'Total customers per month',
    data: results,
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      fontColor: 'black'
    }
  }
};

var barChart = new Chart(barCanvas, {
  type: 'bar',
  data: barData,
  options: chartOptions
});


        }else if(type == 'line'){
           /* var lineData = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: results
            }
        ]
    };

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    };


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
*/

var lineCanvas = document.getElementById("barChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 14;

var lineData = {
  labels: labels,
  datasets: [{
    fill: true,
    borderColor: 'rgba(26,179,148,0.5)',
    backgroundColor: 'rgba(26,179,148,0.5)',
    label: 'Monthly Revenues (KES)',
    data: results,
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(lineCanvas, {
  type: 'line',
  data: lineData,
  options: chartOptions
});
        }else if(type == 'pie'){
        
var pieCanvas = document.getElementById("barChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var pieData = {
    labels: labels,
    datasets: [
        {
            data: results,
            backgroundColor: [
                "#3282ba",
                "#c1d3ec",
                "#f9a153",
                "#66d868",
                "#dd6366",
                "#9467bd",
                "#8c564b",
                "#c49c9b",
                "#bcbd22",
                "#40c8d6",
                "#e377c2",
                "#ff7f0e"
            ]
        }]
};

var pieChart = new Chart(pieCanvas, {
  type: 'pie',
  data: pieData
});
    

        }

            /*var doughnutData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 50,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 100,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);
*/
            /*var polarData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);
*/
}else if(period == 'specific'){

        $.ajax({
                        type: "GET",
                        url: "<?php echo e(url('custgraph')); ?>",
                        data: {year:year},
                        async:false,
                        success: function(data){
                           results = JSON.parse(data);
                           //alert(results);
                           //console.log(results.replace(/['"]+/g, ''));
                           console.log(results);                   
                        },
                        error: function(xhr,thrownError) {
                       console.log(xhr.statusText);
                       console.log(xhr.responseText);
                       console.log(xhr.thrownError);
                        //return false;
                     } 
                 });

        if(type == 'bar'){

        /*var barData = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: results
            }
        ]
    };

    var barOptions = {
        scaleBeginAtZero: true,
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        barShowStroke: true,
        barStrokeWidth: 2,
        barValueSpacing: 5,
        barDatasetSpacing: 1,
        responsive: true,
        
    }


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Bar(barData, barOptions);



            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
            ];
            var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#464f88"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
            );*/

            var barCanvas = document.getElementById("barChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var barData = {
  labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
  datasets: [{
    fill: true,
    borderColor: 'rgba(26,179,148,0.5)',
    backgroundColor: 'rgba(26,179,148,0.5)',
    label: 'Total customers per month',
    data: results,
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      fontColor: 'black'
    }
  }
};

var barChart = new Chart(barCanvas, {
  type: 'bar',
  data: barData,
  options: chartOptions
});


        }else if(type == 'line'){
           /* var lineData = {
        labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
        datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(26,179,148,0.5)",
                strokeColor: "rgba(26,179,148,0.8)",
                highlightFill: "rgba(26,179,148,0.75)",
                highlightStroke: "rgba(26,179,148,1)",
                data: results
            }
        ]
    };

    var lineOptions = {
        scaleShowGridLines: true,
        scaleGridLineColor: "rgba(0,0,0,.05)",
        scaleGridLineWidth: 1,
        bezierCurve: true,
        bezierCurveTension: 0.4,
        pointDot: true,
        pointDotRadius: 4,
        pointDotStrokeWidth: 1,
        pointHitDetectionRadius: 20,
        datasetStroke: true,
        datasetStrokeWidth: 2,
        datasetFill: true,
        responsive: true,
    };


    var ctx = document.getElementById("barChart").getContext("2d");
    var myNewChart = new Chart(ctx).Line(lineData, lineOptions);
*/

var lineCanvas = document.getElementById("barChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var lineData = {
  labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
  datasets: [{
    fill: true,
    borderColor: 'rgba(26,179,148,0.5)',
    backgroundColor: 'rgba(26,179,148,0.5)',
    label: 'Monthly Revenues (KES)',
    data: results,
  }]
};

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(lineCanvas, {
  type: 'line',
  data: lineData,
  options: chartOptions
});
        }else if(type == 'pie'){
        
var pieCanvas = document.getElementById("barChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var pieData = {
    labels: ["January", "February", "March", "April", "May", "June", "July","August","September","October","November","December"],
    datasets: [
        {
            data: results,
            backgroundColor: [
                "#3282ba",
                "#c1d3ec",
                "#f9a153",
                "#66d868",
                "#dd6366",
                "#9467bd",
                "#8c564b",
                "#c49c9b",
                "#bcbd22",
                "#40c8d6",
                "#e377c2",
                "#ff7f0e"
            ]
        }]
};

var pieChart = new Chart(pieCanvas, {
  type: 'pie',
  data: pieData
});
    

        }

            /*var doughnutData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 50,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 100,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);
*/
            /*var polarData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "App"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "Software"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Laptop"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);
*/
}
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.travel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>