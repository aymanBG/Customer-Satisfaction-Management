<?php include 'db_connect.php' ?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .datee {
        float: right
    }

    .imop {

        width: 12%;

    }

    .chart-container {
        width: 100%;

    }
    
    .piecha{
        width:65%;
        margin-left:20%;
        
    }
    
  
  @media only screen and (Max-width:800px) {
  /* For tablets: */
  .piecha{
        width:100%;
                margin-left:0%;

    }}

  .dropbtn {
  background-color: #4e73df;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #0041ff;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
  margin: 8px;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>


<div class="dropdown d-flex justify-content-center" >
  <button onclick="myFunction()" class="dropbtn">choisir un client</button>
  <div id="myDropdown" class="dropdown-content">
    <input type="text" placeholder="Recherche.." id="myInput" onkeyup="filterFunction()" >
    <?php
        $usc = $conn->query("SELECT s.* , u.id, u.middlename from users as u, survey_set as s where FIND_IN_SET(s.title,u.serv) and s.title = 'CSAT'");
        while ($row = $usc->fetch_assoc()) :
        ?>
        
      
            <a href="http://localhost/mxp/index.php?page=csat&selected=<?php echo ucwords($row['id'])  ?>" ><?php echo ucwords($row['middlename'])  ?></a>
             
        <?php endwhile; ?>
  </div>
</div>
<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
  }
}
</script>




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
$selected = 0;
if (isset($_POST['sub'])) {

    if (!empty($_GET['selected'])) {
        $selected = $_GET['selected'];
    } else {
        echo $selected;
    }
}


?>



<?php
$select = 0;
$select = $_GET['selected'];
//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '" . $select . "'  ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.date_created between '".$no."' AND '".$on."' and a.user_id = '" . $select . "' GROUP by a.answer");
$ans = array();
$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rst->fetch_assoc()) :
    $ans[$row['question_id']][$row['answer']][] = 1;


?>




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


    <?php $d = array(1, 2, 3);


    $p = array(4, 5);



    if (in_array($row['answer'], $d)) {


        $calc = ($row['t'] / $tot) * 100;
        $sd += $calc;
    } elseif (in_array($row['answer'], $p)) {

        $calc = ($row['t'] / $tot) * 100;
        $sp += $calc;
    }




    ?>

<?php endwhile; ?>



<?php
        $utc = $conn->query("SELECT  middlename from users where id = '" . $select . "'");
        while ($row = $utc->fetch_assoc()) :
        ?>
        
      
<h1 class="d-flex  justify-content-center"><?php echo $row['middlename']?></h1>             
<?php endwhile; ?>


<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                
                <h4 class="header-title">Réponses total <?php echo $tot  ?> </h4>

                <hr>
                <H5><img class="imop" src="img/grp2.png" /> Satisfait <span class="border border-success datee">  <?php echo (($sd / 100) * $tot) ?> </span>
                    </H5>
                        <hr>
                        <H5><img class="imop" src="img/grp1.png" /> Non satisfait <span class="border border-danger datee"><?php echo (($sp / 100) * $tot) ?> </span>
                             </H5>




            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
    <div class="col-lg-6">
        <div class="card">
        <div class="piecha">
            <div class="chart-container">
                        <canvas id="pie-chart" width="300" height="300"></canvas>
                 <!-- end card-->
           
</div>
    </div> <!-- end col --></div>
</div>
</div>


<br>


<div class="row">
<div class="col-lg-6">
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
    <div class="col-lg-6">
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
        type: 'pie',
        data: {
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                data: [<?php echo $sd; ?>, <?php echo $sp; ?>]
            }]
        },
        options: {
            title: {
                display: false,
                text: 'CSAT'
            },
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
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '" . $select . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.date_created, COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '" . $select . "' and a.answer != '4' AND a.answer !='5' GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rst->fetch_assoc()) :
    


?>




    
    
    <?php $p = array(4, 5);


    $d = array(1, 2, 3);



    if (in_array($row['answer'], $d)) {


        $calc1 = ($row['t'] / 1);
        $sd = $calc1;
        $arrd[] = $sd;
        $Lit = implode(', ', $arrd);
        $tim = date("m",strtotime($row['date_created']));
        $stim = $tim;
        $arti[] = $stim;
        $til = implode(', ', $arti);


// Display month name

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
            label: 'Positive', // Name the series
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
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '" . $select . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.date_created, COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '" . $select . "' and a.answer != '1' and a.answer != '2' AND a.answer !='3'  GROUP by EXTRACT(YEAR_MONTH FROM a.date_created) order by a.date_created asc;");

$sp = 0;
$sr = 0;
$sd = 0;

while ($row = $rst->fetch_assoc()) :
    


?>

   
    <?php $p = array(4, 5);


    $d = array(1, 2, 3);


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
            label: 'Negative', // Name the series
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









