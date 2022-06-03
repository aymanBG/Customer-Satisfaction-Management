<?php include 'db_connect.php' ?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .datee {
        float: right
    }

    .telo {

        width: 12%;

    }

   .piechag{
        width:65%;
        margin-left:;
        
    }
    
  
  @media only screen and (Max-width:800px) {
  /* For tablets: */
  .piechag{
        width:100%;
                margin-left:0%;

    }}
  
    
    .inline { 
    display: inline-block; 
    height:50%;

    }
    
    
    
      .inlinee { 
    display: inline-block; 
    float:right;

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
$no = "(SELECT MIN(a.date_created) FROM answers)";
$on = "(SELECT MAX(a.date_created) FROM answers)";

if(isset($_POST['submit'])){
    $timer = $_POST;
    
    $no =  $timer['reviewdate'];
    $on =  $timer['enddate'];
    
    
}else{
    
    $no = "2000-11-30";
    $on = "2900-11-30";
}




$mais = $_SESSION['login_id'];
//query to get data from the table
$tot1 = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 119 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst1 = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and a.date_created between '".$no."' AND '".$on."' and q.id = 119 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans1 = array();
$sp1 = 0;
$sr1 = 0;
$sd1 = 0;
 $total1 = 0;
while ($row = $rst1->fetch_assoc()) :
    $ans1[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
    $total1 = 0;
    $d1 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $p1 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $d1)) {

        $total1 = $tot1 ;

        $calc1 = ($row['t'] / $total1) * 100;
        $sd1 += $calc1;
    } elseif (in_array($row['answer'], $p1)) {
$total1 = $tot1 ;
        $calc1 = ($row['t'] / $total1) * 100;
        $sp1 += $calc1;
    }



    ?>

<?php endwhile; ?>




<?php

$no = "(SELECT MIN(a.date_created) FROM answers)";
$on = "(SELECT MAX(a.date_created) FROM answers)";

if(isset($_POST['submit'])){
    $timer = $_POST;
    
    $no =  $timer['reviewdate'];
    $on =  $timer['enddate'];
    
    
}else{
    
    $no = "2000-11-30";
    $on = "2900-11-30";
}

$mais = $_SESSION['login_id'];

//query to get data from the table
$tot3 = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 120 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst3 = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and a.date_created between '".$no."' AND '".$on."' and q.id = 120 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans3 = array();
$sp3 = 0;
$sr3 = 0;
$sd3 = 0;
$total3 = 0;
while ($row = $rst3->fetch_assoc()) :
    $ans3[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
$total3 = 0;
    $d3 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $p3 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $d3)) {

        $total3 = $tot3 ;
        $calc3 = ($row['t'] / $total3) * 100;
        $sd3 += $calc3;
    } elseif (in_array($row['answer'], $p3)) {
        $total3 = $tot3 ;

        $calc3 = ($row['t'] / $total3) * 100;
        $sp3 += $calc3;
    }



    ?>

<?php endwhile; ?>








<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
               
                
                    <div id="reloadContent">
                        
                        
               
                <h4 class="header-title"> CES : Contact avec service</h4>

                <hr>
                <H5> <img class="telo" src="img/grp2.png" />Satisfait <span class="border border-warning datee"> <?php echo (($sp1 / 100) * $total1) ?> </span>
                    </H5>
                        <hr>
                        <H5> <img class="telo" src="img/grp1.png" /> Non Satisfait <span class="border border-danger datee"> <?php echo (($sd1 / 100) * $total1) ?> </span>
                            </H5></div>

            <hr class="sidebar-divider">
            <br>
              <div class="d-flex justify-content-center" >
                  <div class="piechag">
                    <div class="chart-container" >
                        <canvas id="pie1-chart" width="300" height="300"></canvas>
                    </div></div>
                </div>
            


 </div> </div> </div> 
             


         

 <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>
         <script src="pj/assets/js/vendor/Chart.bundle.min.js"></script>


         <!-- end col-->




    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div id="reload">
                <!-- <h4 class="header-title mb-3" style="text-align:center;">Client Par </h4>-->
<h4 class="header-title"> CES : Utilisation de service </h4>

                <hr>
                <H5> <img class="telo" src="img/grp2.png" /> Satisfait <span class="border border-warning datee"> <?php echo (($sp3 / 100) * $total3) ?> </span>
                    </H5>
                        <hr>
                        <H5> <img class="telo" src="img/grp1.png" /> Non Satisfait <span class="border border-danger datee"> <?php echo (($sd3 / 100) * $total3) ?> </span>
                            </H5>
</div>
            <hr class="sidebar-divider">
<br>
              
               
                <div class="d-flex justify-content-center">
                    <div class="piechag">
                    <div class="chart-container">
                        <canvas id="pie3-chart" width="300" height="300"></canvas>
                    </div>
                </div></div>
 
            </div> <!-- end card-body-->
        </div> <!-- end card-->
</div>
    <!-- end col -->
    
    </div>
    <br>
    <div class="row">
    
     <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">

                </div>
               <!-- <h4 class="header-title mb-3">Client Par </h4>-->

                <div class="d-flex justify-content-center">
                    <div class="chart-container">
                        <canvas id="myfart"></canvas>
                        <canvas id="myfart2"></canvas>
                    </div>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div>
    
    
    
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="dropdown float-end">

                </div>
               <!-- <h4 class="header-title mb-3">Client Par </h4>-->

                <div class="d-flex justify-content-center">
                    <div class="chart-container">
                        <canvas id="myfart3"></canvas>
                        <canvas id="myfart4"></canvas>
                    </div>
                </div>

            </div> <!-- end card-body-->
        </div> <!-- end card-->

    </div>
    
    
           
</div>
<script>
 setInterval(function() {
$("#reloadContent").load(location.href+" #reloadContent>*","");
}, 3000);
  </script> 
 
<script>
 setInterval(function() {
$("#reload").load(location.href+" #reload>*","");
}, 3000);
  </script> 
  
  <script>
 setInterval(function() {
$("#Content").load(location.href+" #Content>*","");
}, 3000);
  </script> 
 
 
 
                  
                     


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
    new Chart(document.getElementById("pie1-chart"), {
        type: 'doughnut',
        data: {
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                data: [<?php echo $sp1; ?>, <?php echo $sd1; ?>]
            }]
        },
        options: {
            tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(2) + "%";         
          return precentage ;
        }
      }
    }
        }
    });
</script>
<script>
    new Chart(document.getElementById("pie2-chart"), {
        type: 'doughnut',
        data: {
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                data: [<?php echo $sp2; ?>, <?php echo $sd2; ?>]
            }]
        },
        options: {
            tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(2) + "%";         
          return precentage ;
        }
      }
    }
        }
    });
</script>
<script>
    new Chart(document.getElementById("pie3-chart"), {
        type: 'doughnut',
        data: {
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                data: [<?php echo $sp3; ?>, <?php echo $sd3; ?>]
            }]
        },
        options: {
             tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(2) + "%";         
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
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 119 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rsto = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer , a.date_created from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 119  and a.user_id = '" . $mais . "' and a.answer != 'kyCzj' AND a.answer !='pYSMz' and a.answer !='AZlJj' and a.answer !='tsOFw' and a.answer !='woXvk' and a.answer !='dPQwE' and a.answer !='TuvNe' and a.answer !='GbckJ' and a.answer !='gItBq' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rsto->fetch_assoc()) :
    


?>




     <?php
$total3 = 0;



    $d3 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $p3 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');






   if (in_array($row['answer'], $p3)) {


        $calc1 = ($row['t'] / 1);
        $sd = $calc1;
        $arrd[] = $sd;
        $Lit = implode(', ', $arrd);
        $tim = date("m",strtotime($row['date_created']));
        $stim = $tim;
        $arti[] = $stim;
        $til = implode(', ', $arti);

         
        
    }else{
        $Lit = 0;
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
            label: 'Satisfait', // Name the series
            data: [<?php echo  $Lit; ?>], // Specify the data values array
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









<?php

$mais = $_SESSION['login_id'];

//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 119 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rs = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer , a.date_created from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 119  and a.user_id = '" . $mais . "' and a.answer != 'fThXp' AND a.answer !='XJdKP' and a.answer !='Ymhvn' and a.answer !='UWiDF' and a.answer !='lqoLa' and a.answer !='hqsDn' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rs->fetch_assoc()) :
    


?>




     <?php
$total3 = 0;



    $d3 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $p3 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');






   if (in_array($row['answer'], $d3)) {


        $calc2 = ($row['t'] / 1);
        $sp = $calc2;
        $arrd2[] = $sp;
        $Lit2 = implode(', ', $arrd2);
        $tim2 = date("m",strtotime($row['date_created']));
        $stim2 = $tim2;
        $arti2[] = $stim2;
        $til2 = implode(', ', $arti2);

         
        
    }else{
        $Lit2 = 0;
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
            label: 'Non Satisfait', // Name the series
            data: [<?php echo  $Lit2; ?>], // Specify the data values array
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
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 120 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rstp = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer , a.date_created from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 120 and a.user_id = '" . $mais . "' and a.answer != 'kyCzj' AND a.answer !='pYSMz' and a.answer !='AZlJj' and a.answer !='tsOFw' and a.answer !='woXvk' and a.answer !='dPQwE' and a.answer !='TuvNe' and a.answer !='GbckJ' and a.answer !='gItBq' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rstp->fetch_assoc()) :
    


?>




     <?php
$total3 = 0;



    $d3 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $p3 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');






   if (in_array($row['answer'], $p3)) {


        $calc3 = ($row['t'] / 1);
        $sd3 = $calc3;
        $arrd3[] = $sd3;
        $Lit3 = implode(', ', $arrd3);
        $tim3 = date("m",strtotime($row['date_created']));
        $stim3 = $tim3;
        $arti3[] = $stim3;
        $til3 = implode(', ', $arti3);

         
        
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
            label: 'Satisfait', // Name the series
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









<?php

$mais = $_SESSION['login_id'];

//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 120 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rsti = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer , a.date_created from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 120 and a.user_id = '" . $mais . "' and a.answer != 'fThXp' AND a.answer !='XJdKP' and a.answer !='Ymhvn' and a.answer !='UWiDF' and a.answer !='lqoLa' and a.answer !='hqsDn' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rsti->fetch_assoc()) :
    


?>




     <?php
$total3 = 0;



    $d3 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $p3 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');






   if (in_array($row['answer'], $d3)) {


        $calc4 = ($row['t'] / 1);
        $sp4 = $calc4;
        $arrd4[] = $sp4;
        $Lit4 = implode(', ', $arrd4);
        $tim4 = date("m",strtotime($row['date_created']));
        $stim4 = $tim4;
        $arti4[] = $stim4;
        $til4 = implode(', ', $arti4);

         
        
    } 





   ?>
  
    

<?php endwhile; ?>

<script>
    var ctx = document.getElementById("myfart4").getContext('2d');

var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [<?php echo  $til4; ?>],
        datasets: [{
            label: 'Non Satisfait', // Name the series
            data: [<?php echo  $Lit4; ?>], // Specify the data values array
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









