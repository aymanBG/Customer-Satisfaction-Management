<?php include 'db_connect.php' ?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .datee {
        float: right
    }

    .tio {

        width: 12%;

    }

    .chart-container {
        width: 100%;

    }
</style>

<?php
if(isset($_POST['submit'])){
    $timer = $_POST;
    
    $pno =  $timer['reviewdate'];
    $pon =  $timer['enddate'];
    
    
}else{
    
    $pno = "";
    $pon = "";
}

?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" />
<form method="POST">
  <div class="input-group d-flex justify-content-center">
  <div class="input-group-prepend">
    <span class="input-group-text" id="">Filtrage par date</span>
  </div>
  <input name="reviewdate" type="text" id="datepicker" value="<?php echo $pno; ?>"/>
    <input name="enddate" type="text" id="datepickere" value="<?php echo $pon; ?>"/>
    <input name="reviewmonth" type="hidden" value="" />
    <input name="reviewmonthe" type="hidden" value="" />
    <input type="submit" name="submit" value="Filtrer" class="btn btn-dark"/>
</div>
</form>
<br><br>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
<script type="text/javascript">
$('#datepicker').datepicker({
    dateFormat: 'yy-mm-dd' ,
    inline: true,
    onSelect: function(dateText, inst){
        var date = $(this).val();
        var d = new Date(date);
        var n = (d.getMonth() + 1);
        $('input[name="reviewmonth"]').attr('value', n);
        
    }
});
</script>
<script type="text/javascript">
$('#datepickere').datepicker({
    dateFormat: 'yy-mm-dd' ,
    inline: true,
    onSelect: function(dateText, inst){
        var date = $(this).val();
        var d = new Date(date);
        var e = (d.getMonth() + 1);
        $('input[name="reviewmonthe"]').attr('value', e);
        
    }
});
</script>


<?php
$no = '(SELECT MIN(a.date_created) FROM answers)';
$on = '(SELECT MAX(a.date_created) FROM answers)';
if(isset($_POST['submit'])){
    $timer = $_POST;
    
    $no =  $timer['reviewdate'];
    $on =  $timer['enddate'];
}
else{
    
    $no = "2000-11-30";
    $on = "2900-11-30";
}
$mais = $_SESSION['login_id'];

//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.date_created between '".$no."' AND '".$on."'   and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans = array();
$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rst->fetch_assoc()) :
    $ans[$row['question_id']][$row['answer']][] = 1;


?>




    <?php foreach (json_decode($row['frm_option']) as $k => $v) :



    ?>


    <?php endforeach; ?>
    <?php


    /* switch ($v) {
case "#128515":
echo "d";
break;
case "#128522":
echo "p";
break;

} */
    ?>
    <?php


    /* switch ($row['answer']) {
case "uOTEp":
echo "d";
break;
case "vGqVf":
   echo "d";
   break;
   case "baXrR":
       echo "d";
       break;
       case "qsGRh":
           echo "p";
           break;
           case "dntHO":
               echo "p";
               break;
               case "BWjkU":
                   echo "r";
                   break;
                   case "lChTn":
                       echo "r";
                       break;
                                                                                

}  */
    ?>


    <?php $d = array('uOTEp', 'vGqVf', 'baXrR');


    $p = array('qsGRh', 'dntHO');

    $r = array('BWjkU', 'lChTn');



    if (in_array($row['answer'], $d)) {


        $calc = ($row['t'] / $tot) * 100;
        $sd += $calc;
    } elseif (in_array($row['answer'], $p)) {

        $calc = ($row['t'] / $tot) * 100;
        $sp += $calc;
    } else {
        $calc = ($row['t'] / $tot) * 100;
        $sr += $calc;
    }




    ?>

<?php endwhile; ?>






<div class="row">
    <!-- end col -->
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">


                </div>    
                
                
        <div id="reloadContent">


                
                <h4 class="header-title">Réponses total <?php echo $tot ?></h4>

                <H5> <img class="tio" src="img/grp2.png" /> Promoters <span class="border border-success datee"> <?php echo (($sr / 100) * $tot) ?> </span>
                    <H5>
                        <hr>
                        <H5><img class="tio" src="img/grp3.png" /> Passives <span class="border border-warning datee"> <?php echo (($sp / 100) * $tot) ?> </span>
                            <H5>
                                <hr>
                                <H5><img class="tio" src="img/grp1.png" /> Detractor <span class="border border-danger datee"> <?php echo (($sd / 100) * $tot) ?> </span>
                                    <H5>

</div>
                        <!-- end row -->
     

  <script>
 setInterval(function() {
$("#reloadContent").load(location.href+" #reloadContent>*","");
}, 3000);
  </script> 


            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-lg-6">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="dropdown float-end">

                </div>
               <!-- <h4 class="header-title mb-3">Client Par </h4>-->

                <div class="d-flex justify-content-center">
                    <div class="chart-container">
                        <canvas id="pie-chart"></canvas>
                    </div>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div> <!-- end col -->
</div>
</div>
<br> <br>
<div class="row">
<div class="col-lg-4">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="dropdown float-end">

                </div>
               <!-- <h4 class="header-title mb-3">Client Par </h4>-->

                <div class="d-flex justify-content-center">
                    <div class="chart-container">
                        <canvas id="myfart"></canvas>
                    </div>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div>
    <div class="col-lg-4">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="dropdown float-end">

                </div>
               <!-- <h4 class="header-title mb-3">Client Par </h4>-->

                <div class="d-flex justify-content-center">
                    <div class="chart-container">
                        <canvas id="myfart2"></canvas>
                    </div>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div>
    <div class="col-lg-4">
        <div class="card card-h-100">
            <div class="card-body">
                <div class="dropdown float-end">

                </div>
               <!-- <h4 class="header-title mb-3">Client Par </h4>-->

                <div class="d-flex justify-content-center">
                    <div class="chart-container">
                        <canvas id="myfart3"></canvas>
                    </div>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div><!-- end col -->
</div>







 <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>

         <script src="pj/assets/js/vendor/Chart.bundle.min.js"></script>

<script>
  Chart.plugins.register({
        afterDraw: function(chart) {
            if (chart.data.datasets[0].data.every(item => item === 0)) {
                let ctx = chart.chart.ctx;
                let width = chart.chart.width;
                let height = chart.chart.height;

                chart.clear();
                ctx.save();
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText('Aucune donnée à afficher', width / 2, height / 2);
                ctx.restore();
            }
        }
    });

</script>
<script>
    new Chart(document.getElementById("pie-chart"), {
        type: 'bar',
        data: {
            labels: [ "Detractor","Passives", "Promoters"],
            datasets: [{
                label: "Taux",
                backgroundColor: ["#E33301","#F8B607", "#BED901"],
                data: [<?php echo $sd; ?>,<?php echo $sp; ?> , <?php echo $sr; ?>]
            }]
        },
        options: {
            
            scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
            title: {
                display: false,
                text: 'NPS'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(2)+ "%";         
          return precentage ;
        }
      }
    }
        }
    });
      myChart.update();
</script>

<script>
    new Chart(document.getElementById("pie-chart"), {
        type: 'bar',
        data: {
            labels: [ "Detractor","Passives", "Promoters"],
            datasets: [{
                label: "Taux",
                backgroundColor: ["#E33301","#F8B607", "#BED901"],
                data: [<?php echo $sd; ?> , <?php echo $sp; ?> , <?php echo $sr; ?>]
            }]
        },
        options: {
                   title: {
                display: false,
                text: 'NPS'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(2)+ "%";         
          return precentage ;
        }
      }
    }
    
        }
    });
     
</script>

<?php

$mais = $_SESSION['login_id'];

//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.date_created, COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and a.answer != 'qsGRh' AND a.answer !='dntHO' and a.answer !='lChTn' and a.answer !='BWjkU' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rst->fetch_assoc()) :
    


?>




    
    
    <?php $d = array('uOTEp', 'vGqVf', 'baXrR');


    $p = array('qsGRh', 'dntHO');

    $r = array('BWjkU', 'lChTn');



    if (in_array($row['answer'], $d)) {


        $calc1 = ($row['t'] / 1);
        $sd = $calc1;
        $arrd[] = $sd;
        $Lit = implode(', ', $arrd);
        $tim = date("m",strtotime($row['date_created']));
        $stim = $tim;
        $arti[] = $stim;
        $til = implode(', ', $arti);

         $month_name = date("F", mktime(0, 0, 0, $til, 10));
  
// Display month name
echo $month_name."\n";
        
    } 





   ?>
  
    

<?php endwhile; ?>

<script>
    var ctx = document.getElementById("myfart").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo  $til; ?>],
        datasets: [{
            label: 'Detracteur', // Name the series
            data: [<?php echo  $Lit; ?>], // Specify the data values array
            fill: false,
            borderColor: '#E33301', // Add custom color border (Line)
            backgroundColor: '#E33301', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        }]
    },
    options: {
     // Add to prevent default behaviour of full-width/height 
    }
});
</script>




















<?php

$mais = $_SESSION['login_id'];

//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.date_created, COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and a.answer != 'uOTEp' and a.answer != 'lChTn' AND a.answer !='vGqVf' and a.answer !='baXrR' and a.answer !='BWjkU' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rst->fetch_assoc()) :
    


?>




    
    
    <?php $d = array('uOTEp', 'vGqVf', 'baXrR');


    $p = array('qsGRh', 'dntHO');

    $r = array('BWjkU', 'lChTn');



    if (in_array($row['answer'], $p)) {


        $calc2 = ($row['t'] / 1);
        $sp = $calc2;
        $arrd2[] = $sp;
         $Lit2 = implode(', ', $arrd2);
         $tim2 = date("m",strtotime($row['date_created']));
        $stim2 = $tim2;
        $arti2[] = $stim2;
         $til2 = implode(', ', $arti2);
         
         $data2 = json_encode($Lit2) ;

         
        
    } 





   ?>
  
    

<?php endwhile; ?>

<script>
    var ctx = document.getElementById("myfart2").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo  $til2; ?>],
        datasets: [{
            label: 'Passive', // Name the series
            data: [<?php echo  $Lit2; ?>], // Specify the data values array
            fill: false,
            borderColor: '#F8B607', // Add custom color border (Line)
            backgroundColor: '#F8B607', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        }]
    },
    options: {
     // Add to prevent default behaviour of full-width/height 
    }
});
</script>


<?php

$mais = $_SESSION['login_id'];

//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.date_created, COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and a.answer != 'uOTEp' and a.answer != 'dntHO' AND a.answer !='vGqVf' and a.answer !='baXrR' and a.answer !='qsGRh' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rst->fetch_assoc()) :
    


?>


    
    <?php $d = array('uOTEp', 'vGqVf', 'baXrR');


    $p = array('qsGRh', 'dntHO');

    $r = array('BWjkU', 'lChTn');



    if (in_array($row['answer'], $r)) {


        $calc3 = ($row['t'] / 1);
        $sr = $calc3;
        $arrd3[] = $sr;
         $Lit3 = implode(', ', $arrd3);
         $tim3 = date("m",strtotime($row['date_created']));
        $stim3 = $tim3;
        $arti3[] = $stim3;
         $til3 = implode(', ', $arti3);
         
         $data2 = json_encode($Lit3) ;

         
        
    } 





   ?>
  
    

<?php endwhile; ?>

<script>
    var ctx = document.getElementById("myfart3").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo  $til3; ?>],
        datasets: [{
            label: 'Promoteur', // Name the series
            data: [<?php echo  $Lit3; ?>], // Specify the data values array
            fill: false,
            borderColor: '#BED901', // Add custom color border (Line)
            backgroundColor: '#BED901', // Add custom color background (Points and Fill)
            borderWidth: 1 // Specify bar border width
        }]
    },
    options: {
     // Add to prevent default behaviour of full-width/height 
    }
});
</script>