<?php include('db_connect.php')?>
<?php $usee = $_SESSION['login_id'] ?> 
<?php if($_SESSION['login_type'] == 1): ?>  
 <!-- Begin Page Content -->
 <link href="pj/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->

        <!-- App css -->
        <link href="pj/assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link href="pj/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">

        <style>
           .ctn {
    min-height: 10em;
    display: table-cell;
    vertical-align: middle;
}
        </style>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


         <title>E-XE</title>

<div id="reloadContent">
                    <div class="row d-flex flex-row" id="thisdiv">
                                        <div class="col-sm col-xl-4" id="kol">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="float-end">
                                                        <i class="mdi mdi-account-circle widget-icon"></i>
                                                    </div>
                                                    <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Utilisateurs</h5>
                                                    <h3 class="mt-3 mb-3"><?php echo $conn->query("SELECT id FROM users where type=2")->num_rows; ?></h3>
                                                    
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->
                    
                                        <div class="col-sm col-xl-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="float-end">
                                                        <i class="mdi mdi-format-align-justify widget-icon"></i>
                                                    </div>
                                                    <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Questionnaire</h5>
                                                    <h3 class="mt-3 mb-3"><?php echo $conn->query("SELECT id FROM survey_set")->num_rows; ?></h3>
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->
                    
                                        <div class="col-sm col-xl-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="float-end">
                                                        <i class="mdi mdi-lightbulb-on-outline widget-icon"></i>
                                                    </div>
                                                    <h5 class="text-muted fw-normal mt-0" title="Growth">Réponses Totals</h5>
                                                    <h3 class="mt-3 mb-3"><?php echo $conn->query("SELECT id FROM answers")->num_rows; ?></h3>
                                                
                                                </div> <!-- end card-body-->
                                            </div> <!-- end card-->
                                        </div> <!-- end col-->
                                    </div> <!-- end row -->

          </div>
                        <!-- end row -->
     

  <script>
 setInterval(function() {
$("#reloadContent").load(location.href+" #reloadContent>*","");
}, 3000);
  </script> 
                   
                        <div class="row">
                           <!-- end col -->
                           <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            </a>
                                           
                                        </div>
                                        <h4 class="header-title">Réponse par Questionnaire</h4>
<div id="cdg">
                                        <div class="">
                                            <canvas id="poart"></canvas>
                                            
                                        </div>
                                          </div>                                  

                                       
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                            <div class="col-lg-8">
                                <div class="card card-h-100">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            </a>
                                            
                                        </div>
                                        <h4 class="header-title mb-3">Questionnaire Par Client</h4>

                                        <div id="cvd">
                                        <div class="jik">
                                            <canvas id="bart"></canvas>
                                            
                                        </div>
                                        </div>
                                            
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            </a>
                                           
                                        </div>
                                        <h4 class="header-title mb-3">Réponse Par Client</h4>

                                        

                                        
                                        <div id="admm">
                                        

                                                            <div class="jika">
                                                                <canvas id="mycanvas"></canvas>
                                                            </div> 
                                    </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                            </a>
                                            
                                        </div>
                                        <h4 class="header-title mb-1">Reponse par Questionnaire</h4>
                                            <div id="adms">
                                        <div class="">
                                                <canvas id="art"></canvas>
                                              </div>
                                              </div>
                                        <div class="row text-center mt-2">
                                            <div class="col-md-4">
                                                <i class=" widget-icon rounded-circle bg-light-lighten text-muted"></i>
                                                <h3 class="fw-normal mt-3">
                                                    <span><?php echo $conn->query("SELECT survey_id FROM answers where survey_id = 10 ")->num_rows; ?></span>
                                                </h3>
                                                <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text"></i> CSAT</p>
                                            </div>
                                            <div class="col-md-4">
                                                <i class=" widget-icon rounded-circle bg-light-lighten text-muted"></i>
                                                <h3 class="fw-normal mt-3">
                                                    <span><?php echo $conn->query("SELECT survey_id FROM answers where survey_id = 9  ")->num_rows; ?></span>
                                                </h3>
                                                <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text"></i> E-CES</p>
                                            </div>
                                            <div class="col-md-4">
                                                <i class=" widget-icon rounded-circle bg-light-lighten text-muted"></i>
                                                <h3 class="fw-normal mt-3">
                                                    <span><?php echo $conn->query("SELECT survey_id FROM answers where survey_id = 11 ")->num_rows; ?></span>
                                                </h3>
                                                <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text"></i> NPS</p>
                                            </div>
                                            <div class="col-md-4">
                                                <i class=" widget-icon rounded-circle bg-light-lighten text-muted"></i>
                                                <h3 class="fw-normal mt-3">
                                                    <span><?php echo $conn->query("SELECT survey_id FROM answers where survey_id = 17 ")->num_rows; ?></span>
                                                </h3>
                                                <p class="text-muted mb-0 mb-2"><i class="mdi mdi-checkbox-blank-circle text"></i> CES</p>
                                            </div>
                                        </div>
                                    </div> <!-- end card-body-->
                                </div> <!-- end card-->
                            </div> <!-- end col-->
           
 

            <div class="rightbar-overlay"></div>
          
            <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="pj/assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="pj/assets/js/pages/demo.dashboard-projects.js"></script>
                        <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="pj/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="pj/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="pj/assets/js/pages/demo.dashboard.js"></script>

        <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>


        <!-- Todo js -->
        <script src="pj/assets/js/ui/component.todo.js"></script>

        <!-- demo app -->
        <script src="pj/assets/js/pages/demo.dashboard-crm.js"></script>
            
        

        <?php else: ?>



        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                <link rel="shortcut icon" href="pj/assets/images/lg.png">

<!-- App css -->
    <link href="pj/assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="pj/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="pj/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">


     
<div id="reloadContent">           
                <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                           <?php 
                                                    $usid = $_SESSION['login_id'];
                                                    $speey = $conn->query("SELECT s.title, COUNT(answer) as counted FROM survey_set AS s, users as u, answers as a WHERE FIND_IN_SET(s.title,u.serv) and  answer <> '' and u.id= a.user_id and s.id = a.survey_id and u.id = '".$usid."' GROUP by a.survey_id");
                                                    while($row=$speey->fetch_assoc()):
                                            ?>
                
                                            <div class="col-sm col-xl">
                                                <div class="card shadow-none m-0 border-start">
                                                    <div class="card-body text-center">
                                                        <i class="mdi mdi-comment-question-outline widget-icon" style="font-size: 24px;"></i>
                                                        <h3><span><?php echo $row['counted'] ?></span></h3>
                                                        <p class="text-muted font-15 mb-0"><?php echo $row['title'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                <?php
                
                
                
                endwhile; ?>
                                    
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row-->
    </div>
                        <!-- end row -->
     

  <script>
 setInterval(function() {
$("#reloadContent").load(location.href+" #reloadContent>*","");
}, 3000);
  </script> 

                           
                    <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                          <?php 
                                                            $usid = $_SESSION['login_id'];
                                                        $sey = $conn->query("SELECT s.title FROM survey_set AS s, users as u  WHERE FIND_IN_SET(s.title,u.serv) and s.title != 'E-CES' and s.title != 'CES' and u.id = '".$usid."' ");
                                                        
                                                        while($row=$sey->fetch_assoc()):
                                                        ?>
                                                              
                                            <div class="col-sm col-lg-<?php  $usid = $_SESSION['login_id'];
                                                        echo 12 / $conn->query("SELECT s.title FROM survey_set AS s, users as u  WHERE FIND_IN_SET(s.title,u.serv)  and s.title != 'E-CES' and s.title != 'CES' and u.id = '".$usid."' ")->num_rows ;
                                                      
                                                        ?>">
                                                <style>
                                   
                                   .char{
        width:65%;
                margin-left:20%;

    }
 @media only screen and (Max-width:800px) {
  /* For tablets: */
  .char{
        width:100%;
        margin-left:0%;

    }
     
 }
    
    
  


                               </style> 
                                               <div class="card shadow-none m-0 border-start">
                                                    
                                                    <div class="card-body text-center">
                                                        <div class="charf"> 
                                                        <div class="char">
                                                 <canvas id="<?php echo $row['title'] ?>" width="500" height="500"></canvas>
                                                       </div>
                                                     </div></div>
                                                </div>
                                            </div>

                                                                <?php  endwhile; ?>
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                 
                      
                      
                      
                       <br>
                      
                   <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                          <?php 
                          $usid = $_SESSION['login_id'];
                                                        $seyc = $conn->query("SELECT s.title FROM survey_set AS s, users as u  WHERE FIND_IN_SET(s.title,u.serv) and s.title = 'E-CES' and u.id = '".$usid."' ");
                                                        
                                                        while($row=$seyc->fetch_assoc()):
                                                        ?>
                                                 <?php
$mais = $_SESSION['login_id'];

//query to get data from the table
$totg = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9  and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rstg = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ansg = array();
$spg = 0;
$srg = 0;
$sdg = 0;

while ($row = $rstg->fetch_assoc()) :
    $ans3[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
$totalg = 0;
    $dg = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $pg = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $dg)) {

        $totalg = $totg ;
        $calcg = ($row['t'] / $totalg) * 100;
        $sdg += $calcg;
    } elseif (in_array($row['answer'], $pg)) {
        $totalg = $totg ;

        $calcg = ($row['t'] / $totalg) * 100;
        $spg += $calcg;
    }



    ?>

    
    
<?php endwhile; ?>
                                                
                               <style>
                                   
                                   
                                   .piechag{
        width:25%;
        margin-left:37%;
        
    }
    
  
  @media only screen and (Max-width:800px) {
  /* For tablets: */
  .piechag{
        width:100%;
                margin-left:0%;

    }}
    

                               </style>                 
                                            
                                            <div class="col-sm col-lg-12">
                                                <div class="card shadow-none m-0 border-start">
                                                    
                                                    <div class="card-body text-center">
                                                        <div class="piechag"> 
                                                        <div class="chart-">
                                                        <canvas id="cesglo" width="300" height="300"></canvas>
                                                       </div>
                                                     </div></div>
                                                     
                                                     <div class="row text-center mt-2">
                                                     <div style="display:inline;display:flex;justify-content:center;">
                
                                             <i class="fas fa-arrow-up" style="color:#BED901;"></i><span style="margin-right:5%;">Satisfait</span>
                                                <i class=" fas fa-arrow-down" style="color:#E33301;margin-left:5%;"></i><span style=""> Non Satisfait</span>
  </div>
                                             <br>
                                             <div style="display:inline;display:flex;justify-content:center;">
                                             <span style="margin-right:10%"><?php echo round($spg ,1) ?>%</span>
                                             </i><span style="margin-left:3%;"> <?php echo round($sdg,1) ?>%</span>

                                             </div>
                                            
                                                </div>
                                                </div>
                                            </div>
                                           
                                            
                                           

                                                                <?php  endwhile; ?>
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <br>
                 
                        <!-- end row-->

<div class="row">
     <?php 
                                                            $usid = $_SESSION['login_id'];
                                                        $set = $conn->query("SELECT s.title FROM survey_set AS s, users as u  WHERE FIND_IN_SET(s.title,u.serv) and s.title = 'E-CES' and u.id = '".$usid."' ");
                                                        
                                                        while($row=$set->fetch_assoc()):
                                                        ?>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
               
                
             
           
              <div class="d-flex justify-content-center">
                  <div class="piecha">
                    <div class="chart-container">
                                                        <canvas id="ECES"  width="300" height="300"></canvas>
             </div>
                </div>




</div> <BR>
    <div style="display:inline;display:flex;justify-content:center;">
  <i class="fas fa-arrow-up" style="color:#BED901;"></i><span style="margin-right:5%;">Satisfait</span>
                                                <i class=" fas fa-arrow-down" style="color:#E33301;margin-left:5%;"></i><span style=""> Non Satisfait</span>
</div> </div></div></div>
                 


          
          




         <!-- end col-->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
               
                
                <div class="d-flex justify-content-center">
                    <div class="piecha">
                    <div class="chart-container">
<canvas id="aCES"  width="300" height="300"></canvas>                    </div>
                </div></div>
                <BR>
                    <div style="display:inline;display:flex;justify-content:center;">
  <i class="fas fa-arrow-up" style="color:#BED901;"></i><span style="margin-right:5%;">Satisfait</span>
                                                <i class=" fas fa-arrow-down" style="color:#E33301;margin-left:5%;"></i><span style=""> Non Satisfait</span>

            </div> <!-- end card-body--> </div>
        </div> <!-- end card-->

    </div> <!-- end col -->



    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
            
              
               
                <div class="d-flex justify-content-center">
                    <div class="piecha">
                       
                    <div class="chart-container">
                                                        <canvas id="bCES"  width="300" height="300"></canvas>
                    </div>
                </div>
                </div><BR>
                    <div style="display:inline;display:flex;justify-content:center;">
  <i class="fas fa-arrow-up" style="color:#BED901;"></i><span style="margin-right:5%;">Satisfait</span>
                                                <i class=" fas fa-arrow-down" style="color:#E33301;margin-left:5%;"></i><span style=""> Non Satisfait</span>

            </div> <!-- end card-body--></div>
        </div> 
        </div> <!-- end card-body-->
         
         <?php  endwhile; ?>
        </div>
        
        
        
        
        
        
        
        
        <div class="row">
                            <div class="col-12">
                                <div class="card widget-inline">
                                    <div class="card-body p-0">
                                        <div class="row g-0">
                                          <?php 
                          $usid = $_SESSION['login_id'];
                                                        $seyc = $conn->query("SELECT s.title FROM survey_set AS s, users as u  WHERE FIND_IN_SET(s.title,u.serv) and s.title = 'CES' and u.id = '".$usid."' ");
                                                        
                                                        while($row=$seyc->fetch_assoc()):
                                                        ?>
                                                 <?php
$mais = $_SESSION['login_id'];

//query to get data from the table
$ctotg = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17  and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$crstg = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and a.user_id = '" . $mais . "' GROUP by a.answer");
$cansg = array();
$cspg = 0;
$csrg = 0;
$csdg = 0;

while ($row = $crstg->fetch_assoc()) :
    $cans3[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
$ctotalg = 0;
    $cdg = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $cpg = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $cdg)) {

        $ctotalg = $ctotg ;
        $ccalcg = ($row['t'] / $ctotalg) * 100;
        $csdg += $ccalcg;
    } elseif (in_array($row['answer'], $cpg)) {
        $ctotalg = $ctotg ;

        $ccalcg = ($row['t'] / $ctotalg) * 100;
        $cspg += $ccalcg;
    }



    ?>

    
    
<?php endwhile; ?>
                                                
                               <style>
                                   
                                   
                                   .piechago{
        width:25%;
        margin-left:37%;
        
    }
    
  
  @media only screen and (Max-width:800px) {
  /* For tablets: */
  .piechago{
        width:100%;
                margin-left:0%;

    }}
    

                               </style>                 
                                            
                                            <div class="col-sm col-lg-12">
                                                <div class="card shadow-none m-0 border-start">
                                                    
                                                    <div class="card-body text-center">
                                                        <div class="piechago"> 
                                                        <div class="chart-">
                                                        <canvas id="ccesglo" width="300" height="300"></canvas>
                                                       </div>
                                                     </div></div>
                                                     
                                                     <div class="row text-center mt-2">
                                                     <div style="display:inline;display:flex;justify-content:center;">
                
                                             <i class="fas fa-arrow-up" style="color:#BED901;"></i><span style="margin-right:5%;">Satisfait</span>
                                                <i class=" fas fa-arrow-down" style="color:#E33301;margin-left:5%;"></i><span style=""> Non Satisfait</span>
  </div>
                                             <br>
                                             <div style="display:inline;display:flex;justify-content:center;">
                                             <span style="margin-right:10%"><?php echo round($cspg ,1) ?>%</span>
                                             </i><span style="margin-left:3%;"> <?php echo round($csdg,1) ?>%</span>

                                             </div>
                                            
                                                </div>
                                                </div>
                                            </div>
                                           
                                            
                                           

                                                                <?php  endwhile; ?>
                
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card-box-->
                            </div> <!-- end col-->
                        </div>
                        <br>
                        
                        
                        <div class="row">
     <?php 
                                                            $usid = $_SESSION['login_id'];
                                                        $set = $conn->query("SELECT s.title FROM survey_set AS s, users as u  WHERE FIND_IN_SET(s.title,u.serv) and s.title = 'CES' and u.id = '".$usid."' ");
                                                        
                                                        while($row=$set->fetch_assoc()):
                                                        ?>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
               
                
             
           
              <div class="d-flex justify-content-center">
                  <div class="piecha">
                    <div class="chart-container">
                                                        <canvas id="EECES"  width="300" height="300"></canvas>
             </div>
                </div>




</div> <BR>
    <div style="display:inline;display:flex;justify-content:center;">
  <i class="fas fa-arrow-up" style="color:#BED901;"></i><span style="margin-right:5%;">Satisfait</span>
                                                <i class=" fas fa-arrow-down" style="color:#E33301;margin-left:5%;"></i><span style=""> Non Satisfait</span>
</div> </div></div></div>
                 


          
          






    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
            
              
               
                <div class="d-flex justify-content-center">
                    <div class="piechar">
                       
                    <div class="chart-container">
                                                        <canvas id="beCES"  width="300" height="300"></canvas>
                    </div>
                </div>
                </div><BR>
                    <div style="display:inline;display:flex;justify-content:center;">
  <i class="fas fa-arrow-up" style="color:#BED901;"></i><span style="margin-right:5%;">Satisfait</span>
                                                <i class=" fas fa-arrow-down" style="color:#E33301;margin-left:5%;"></i><span style=""> Non Satisfait</span>

            </div> <!-- end card-body--></div>
        </div> 
        </div> <!-- end card-body-->
         
         <?php  endwhile; ?>
        </div>
        <script>
 setInterval(function() {
$("#rlc").load(location.href+" #rlc>*","");
}, 3000);
  </script>
        
                        <!-- end row-->
                       
                        <!-- bundle -->
        <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="pj/assets/js/vendor/Chart.bundle.min.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="pj/assets/js/pages/demo.dashboard-projects.js"></script>
                        <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>

        <!-- third party js -->
        <script src="pj/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="pj/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
        <!-- third party js ends -->

        <!-- demo app -->
        <script src="pj/assets/js/pages/demo.dashboard.js"></script>

        <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>


        <!-- Todo js -->
        <script src="pj/assets/js/ui/component.todo.js"></script>

        <!-- demo app -->
        <script src="pj/assets/js/pages/demo.dashboard-crm.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-streaming/2.0.0/chartjs-plugin-streaming.min.js"></script>


        <!-- bundle -->
        
<?php endif;?>

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
$(document).ready(function(){
  $.ajax({
    url : "http://localhost/mxp/high.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var title = [];
      var taux = [];
      

      for(var i in data) {
        title.push(data[i].title);
        taux.push(data[i].taux);
      }

      var chartdata = {
        labels: title,
        datasets: [
          {
            label:"Client",
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            
            data: taux
          }
        ],
      
      };

      var ctx = $("#pie-chat");

      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata,
        options: {
            
             
        responsive: true,
          legend: {
    onClick: function (e) {
        e.stopPropagation();
    }
    },

            scales: {
    yAxes: [{
      id: 'y-axis-0',
      gridLines: {
        display: true,
        lineWidth: 0.5,
        color: "rgba(26, 43, 44,0.30)"
      },
      ticks: {
        beginAtZero:true,
        mirror:false,
        suggestedMin: 0,
      },
      afterBuildTicks: function(chart) {

      }
    }],
    xAxes: [{
      id: 'x-axis-0',
      gridLines: {
        display: false
      },
      ticks: {
        beginAtZero: true
      }
    }]
}
	} 
      });
    },
    error : function(data) {

    }
  });
});     myChart.update();

  </script>
<?php
$mais = $_SESSION['login_id'];
//query to get data from the table
$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans = array();
$sp = 0;
$sr = 0;
$sd = 0;
while ($row = $rst->fetch_assoc()) :
    $ans[$row['question_id']][$row['answer']][] = 1;
?>
 
    <?php $d = array(4, 5);


    $p = array(1, 2, 3);



    if (in_array($row['answer'], $d)) {


        $calc = ($row['t'] / $tot) * 100;
        $sd += $calc;
    } elseif (in_array($row['answer'], $p)) {

        $calc = ($row['t'] / $tot) * 100;
        $sp += $calc;
    }




    ?>

<?php endwhile; ?>

<div id="chaaa">
<script>

Chart.plugins.register({afterDraw: function(chart) {
		console.log('After draw: ', chart);
		console.log('Title: ', chart.options.title.text);
		console.log(chart.data.datasets[0].data.length,  chart.canvas.id, chart.data.datasets[0].data);
		if (chart.data.datasets[0].data.length === 0) {
			// No data is present
			var ctx = chart.chart.ctx;
			var width = chart.chart.width;
			var height = chart.chart.height;
			chart.clear();

			ctx.save();
			ctx.textAlign = 'center';
			ctx.textBaseline = 'middle';
			ctx.font = "16px normal 'Helvetica Nueue'";
			// chart.options.title.text <=== gets title from chart 
			// width / 2 <=== centers title on canvas 
			// 18 <=== aligns text 18 pixels from top, just like Chart.js 
			ctx.fillText('My Chart Title'); // <====   ADDS TITLE
			ctx.fillText('No data to display for selected time period');
			ctx.restore();
		}
	}
});
var ctx = document.getElementById('CSAT').getContext('2d');
var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Satisfait", "Non satisfait"],
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                data: [<?php echo $sp; ?>, <?php echo $sd; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'CSAT (customer satisfaction score)'
            },     
            legend: {
    onClick: function (e) {
        e.stopPropagation();
    }
},
            tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
           
        }
       
    });
    chart.update();
     
</script>
 </div>

 

<?php
$mais = $_SESSION['login_id'];
//query to get data from the table
$tot1 = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9  and q.id = 101 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst1 = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and q.id = 101 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans1 = array();
$sp1 = 0;
$sr1 = 0;
$sd1 = 0;

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
<script>
    new Chart(document.getElementById("ECES"), {
        type: 'doughnut',
        data: {
          
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                data: [<?php echo $sp1; ?>, <?php echo $sd1; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'E-CES : Contact avec service'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
    });
         myChart.update();

</script>










<?php
$mais = $_SESSION['login_id'];
//query to get data from the table
$etot1 = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9  and q.id = 101 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$erst1 = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and q.id = 101 and a.user_id = '" . $mais . "' GROUP by a.answer");
$eans1 = array();
$esp1 = 0;
$esr1 = 0;
$esd1 = 0;

while ($row = $erst1->fetch_assoc()) :
    $eans1[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
    $etotal1 = 0;
    $ed1 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $ep1 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $ed1)) {

        $etotal1 = $etot1 ;

        $ecalc1 = ($row['t'] / $etotal1) * 100;
        $esd1 += $ecalc1;
    } elseif (in_array($row['answer'], $ep1)) {
$etotal1 = $etot1 ;
        $ecalc1 = ($row['t'] / $etotal1) * 100;
        $esp1 += $ecalc1;
    }






    ?>
    
<?php endwhile; ?>
<script>
    new Chart(document.getElementById("EECES"), {
        type: 'doughnut',
        data: {
          
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                data: [<?php echo $esp1; ?>, <?php echo $esd1; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'CES : Contact avec service'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
    });
         myChart.update();

</script>





<?php
$mais = $_SESSION['login_id'];
//query to get data from the table
$tot2 = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and q.id = 103 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst2 = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and q.id = 103 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans2 = array();
$sp2 = 0;
$sr2 = 0;
$sd2 = 0;

while ($row = $rst2->fetch_assoc()) :
    $ans2[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
$total2 = 0;
    $d2 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $p2 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $d2)) {

        $total2 = $tot2 ;

        $calc2 = ($row['t'] / $total2) * 100;
        $sd2 += $calc2;
    } elseif (in_array($row['answer'], $p2)) {
$total2 = $tot2 ;

        $calc2 = ($row['t'] / $total2) * 100;
        $sp2 += $calc2;
    }





    ?>
    
<?php endwhile; ?>
<script>
    new Chart(document.getElementById("aCES"), {
        type: 'doughnut',
        data: {
            
            datasets: [{
                label: "Taux",
                backgroundColor: ["#BED901", "#E33301"],
                 data: [<?php echo $sp2; ?>, <?php echo $sd2; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'E-CES : Achat sur site'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
    });
         myChart.update();

</script>

















<?php
$mais = $_SESSION['login_id'];

//query to get data from the table
$totg = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9  and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rstg = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ansg = array();
$spg = 0;
$srg = 0;
$sdg = 0;

while ($row = $rstg->fetch_assoc()) :
    $ans3[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
$totalg = 0;
    $dg = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $pg = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $dg)) {

        $totalg = $totg ;
        $calcg = ($row['t'] / $totalg) * 100;
        $sdg += $calcg;
    } elseif (in_array($row['answer'], $pg)) {
        $totalg = $totg ;

        $calcg = ($row['t'] / $totalg) * 100;
        $spg += $calcg;
    }



    ?>

    
    
<?php endwhile; ?>
<script>
    new Chart(document.getElementById("cesglo"), {
        type: 'doughnut',
        data: {
            
            datasets: [{
                
                backgroundColor: ["#BED901", "#E33301"],
                 data: [<?php echo $spg; ?>, <?php echo $sdg; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'E-CES : Customer Effort Score'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
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
$ctotg = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17  and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$crstg = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and a.user_id = '" . $mais . "' GROUP by a.answer");
$cansg = array();
$cspg = 0;
$csrg = 0;
$csdg = 0;

while ($row = $crstg->fetch_assoc()) :
    $cans3[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
$ctotalg = 0;
    $cdg = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $cpg = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $cdg)) {

        $ctotalg = $ctotg ;
        $ccalcg = ($row['t'] / $ctotalg) * 100;
        $csdg += $ccalcg;
    } elseif (in_array($row['answer'], $cpg)) {
        $ctotalg = $ctotg ;

        $ccalcg = ($row['t'] / $ctotalg) * 100;
        $cspg += $ccalcg;
    }



    ?>
    
    
<?php endwhile; ?>
<script>
    new Chart(document.getElementById("ccesglo"), {
        type: 'doughnut',
        data: {
            
            datasets: [{
                
                backgroundColor: ["#BED901", "#E33301"],
                 data: [<?php echo $cspg; ?>, <?php echo $csdg; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'CES : Customer Effort Score'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
       
    });
         

</script>

<div id="rlc">

<?php
$mais = $_SESSION['login_id'];

//query to get data from the table
$tot3 = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and q.id = 105  and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rst3 = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 9 and q.id = 105 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans3 = array();
$sp3 = 0;
$sr3 = 0;
$sd3 = 0;

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
</div>



<script>
   
   
    
     
     
     
     
     
     
     
     
     $(function(){
        new Chart(document.getElementById("bCES"), {
        type: 'doughnut',
        data: {
            
            datasets: [{
                
                backgroundColor: ["#BED901", "#E33301"],
                 data: [<?php echo $sp3; ?>, <?php echo $sd3; ?>]
            }]
        },
        
        
        options: {
            title: {
                display: true,
                text: 'E-CES : Utilisation de service'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
        
        
    
       
    });

    });    

</script>









<?php
$mais = $_SESSION['login_id'];

//query to get data from the table
$etot3 = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 120  and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$erst3 = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 17 and q.id = 120 and a.user_id = '" . $mais . "' GROUP by a.answer");
$eans3 = array();
$esp3 = 0;
$esr3 = 0;
$esd3 = 0;

while ($row = $erst3->fetch_assoc()) :
    $eans3[$row['question_id']][$row['answer']][] = 1;


?>




    <?php
$etotal3 = 0;
    $ed3 = array('kyCzj', 'pYSMz', 'AZlJj', 'tsOFw', 'woXvk', 'dPQwE', 'TuvNe', 'GbckJ', 'gItBq');


    $ep3 = array('fThXp', 'XJdKP', 'Ymhvn', 'UWiDF', 'lqoLa', 'hqsDn');



    if (in_array($row['answer'], $ed3)) {

        $etotal3 = $etot3 ;
        $ecalc3 = ($row['t'] / $etotal3) * 100;
        $esd3 += $ecalc3;
    } elseif (in_array($row['answer'], $ep3)) {
        $etotal3 = $etot3 ;

        $ecalc3 = ($row['t'] / $etotal3) * 100;
        $esp3 += $ecalc3;
    }



    ?>

    
    
<?php endwhile; ?>
</div>



<script>
   

     
     $(function(){
        new Chart(document.getElementById("beCES"), {
        type: 'doughnut',
        data: {
            
            datasets: [{
                
                backgroundColor: ["#BED901", "#E33301"],
                 data: [<?php echo $esp3; ?>, <?php echo $esd3; ?>]
            }]
        },
        
        
        options: {
            title: {
                display: true,
                text: 'CES : Utilisation de service'
            },tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
        
        
    
       
    });

    });    

</script>




<?php
$mais = $_SESSION['login_id'];

//query to get data from the table
$tott = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 11 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rstt = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 11 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans = array();
$spp = 0;
$srp = 0;
$sdp = 0;

while ($row = $rstt->fetch_assoc()) :
    $ans[$row['question_id']][$row['answer']][] = 1;


?>

    <?php $dp = array('uOTEp', 'vGqVf', 'baXrR');


    $pp = array('qsGRh', 'dntHO');

    $rp = array('BWjkU', 'lChTn');



    if (in_array($row['answer'], $dp)) {


        $calc = ($row['t'] / $tott) * 100;
        $sdp += $calc;
    } elseif (in_array($row['answer'], $pp)) {

        $calc = ($row['t'] / $tott) * 100;
        $spp += $calc;
    } else {
        $calc = ($row['t'] / $tott) * 100;
        $srp += $calc;
    }




    ?>

<?php endwhile; ?>

<script>
    new Chart(document.getElementById("NPS"), {
        type: 'bar',
        data: {
            labels: ["Detractor", "Passives", "Promoters"],
            datasets: [{
                label: "Taux",
                backgroundColor: ["#E33301","#F8B607" , "#BED901"],
                data: [<?php echo $sdp; ?>,<?php echo $spp; ?>, <?php echo $srp; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'NPS(net promoter score)'
            },
            legend: {
        display: false
    }
    ,tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
    });
         myChart.update();

</script>

<?php
$mais = $_SESSION['login_id'];

//query to get data from the table
$tott = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' and answer <> '' ORDER BY user_id desc")->num_rows;
$rstt = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 18 and a.user_id = '" . $mais . "' GROUP by a.answer");
$ans = array();
$spp = 0;
$srp = 0;
$sdp = 0;

while ($row = $rstt->fetch_assoc()) :
    $ans[$row['question_id']][$row['answer']][] = 1;


?>

    <?php $dp = array('uOTEp', 'vGqVf', 'baXrR');


    $pp = array('qsGRh', 'dntHO');

    $rp = array('BWjkU', 'lChTn');



    if (in_array($row['answer'], $dp)) {


        $calc = ($row['t'] / $tott) * 100;
        $sdp += $calc;
    } elseif (in_array($row['answer'], $pp)) {

        $calc = ($row['t'] / $tott) * 100;
        $spp += $calc;
    } else {
        $calc = ($row['t'] / $tott) * 100;
        $srp += $calc;
    }




    ?>

<?php endwhile; ?>
<script>
    new Chart(document.getElementById("E-NPS"), {
        type: 'bar',
        data: {
            labels: ["Detractor", "Passives", "Promoters"],
            datasets: [{
                label: "Taux",
                backgroundColor: ["#E33301","#F8B607" , "#BED901"],
                data: [<?php echo $sdp; ?>,<?php echo $spp; ?>, <?php echo $srp; ?>]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'E-NPS(net promoter score Position)'
            },
            legend: {
        display: false
    }
    ,tooltips: {
      callbacks: {
        label: function(tooltipItem, data) {
        	var dataset = data.datasets[tooltipItem.datasetIndex];
          var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
            return previousValue + currentValue;
          });
          var currentValue = dataset.data[tooltipItem.index];
          var precentage = Math.floor((currentValue * 100 /total) ).toFixed(1)+ "%";         
          return precentage ;
        }
      }
    }
        }
    });
         myChart.update();

</script>



<script>
$(document).ready(function(){
  $.ajax({
    url : "http://localhost/mxp/354rd5gfs3e5f1we8s53f1w6f1w64f/dt.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var title = [];
      var taux = [];
      

      for(var i in data) {
        title.push(data[i].title);
        taux.push(data[i].taux);
      }

      var chartdata = {
        labels: title,
        datasets: [
          {
            label:"Réponse",
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            
            data: taux
          }
        ],
      
      };

      var ctx = $("#mycanvas");

      
      var LineGraph = new Chart(ctx, {
        type: 'line',
        data: chartdata,
          options: {
        responsive: true,
         legend: {
    display:false,
    },
}
      });
    },
    error : function(data) {

    }
  });
});
     myChart.update();

  </script>

<script>

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

$(document).ready(function(){
  $.ajax({
    url : "http://localhost/mxp/354rd5gfs3e5f1we8s53f1w6f1w64f/data.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var title = [];
      var taux = [];
      

      for(var i in data) {
        title.push( data[i].title);
        taux.push(data[i].taux);
      }

      var chartdata = {
        labels: title,
        datasets: [
          {
            label: "Nb de fois passer",
            fill: false,
            lineTension: 0.1,
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            data: taux
          }
        ],
      };
var ctx = document.getElementById("art");

ctx.width = 1000;
ctx.height = 1000;
var myPiChart = new Chart(ctx, {
  type: 'doughnut',
  data: chartdata  ,
    options: {
        responsive: true,
          legend: {
    onClick: function (e) {
        e.stopPropagation();
    }
    }
}
},

);
    },
    error : function(data) {
    }
  });
});
     myChart.update();

</script>




<script>

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

$(document).ready(function(){
  $.ajax({
    url : "http://localhost/mxp/354rd5gfs3e5f1we8s53f1w6f1w64f/data.php",
    type : "GET",
    success : function(data){
      console.log(data);
        
        
    
      var title = [];
      var taux = [];
      
      

      for(var i in data) {
        title.push(data[i].title);
        taux.push(data[i].taux);
        
      }

      var chartdata = {
        labels: title,
        datasets: [
          {
            label: "Nb de fois passer",
            fill: false,
            lineTension: 0.1,
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(201, 205, 96, 1)',
                'rgba(54, 149, 214, 1)',
                'rgba(255, 206, 86, 1)'                
            ],  
            
            data: taux
          }
        ],
      };
var ctx = document.getElementById("poart");

ctx.width = 1000;
ctx.height = 1000;
var myPiChart = new Chart(ctx, {
  type: 'polarArea',
  data: chartdata,
    options: {
        responsive: true,
          legend: {
    onClick: function (e) {
        e.stopPropagation();
    }
    }
}
},

);
    },
    error : function(data) {
    }
  });
});
     myChart.update();

</script>





<script>

Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

$(document).ready(function(){
  $.ajax({
    url : "http://localhost/mxp/354rd5gfs3e5f1we8s53f1w6f1w64f/high2.php",
    type : "GET",
    success : function(data){
      console.log(data);

      var middlename = [];
      var ntitle = [];
      

      for(var i in data) {
        middlename.push(data[i].middlename);
        ntitle.push(data[i].ntitle);
      }

      var chartdata = {
        labels: middlename,
        datasets: [
          {
            label: "Nombre de Questionnaire",
             backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            
            data: ntitle
          }
        ],
        
        
      };
var ctx = document.getElementById("bart");
var myPiChart = new Chart(ctx, {
  type: 'bar',
  data: chartdata ,
  options: {
        legend: {
    display:false,
    },
        
            scales: {
    yAxes: [{
      id: 'y-axis-0',
      gridLines: {
        display: true,
        lineWidth: 0.5,
        color: "rgba(26, 43, 44,0.30)"
      },
      ticks: {
        beginAtZero: true,
        userCallback(label, index, labels) {
                 // only show if whole number
                 if (Math.floor(label) === label) {
                     return label;
                 }
              },
      },
      afterBuildTicks: function(chart) {

      }
    }],
    xAxes: [{
      id: 'x-axis-0',
      gridLines: {
        display: false
      },
      ticks: {
        beginAtZero: true,
        max: 5,
        min: 0
      }
    }]
}
	} 
  
},


);
    },
    error : function(data) {
    }
  });
});
    

</script>






<script>
   

var earning = document.getElementById('earning').getContext('2d');
var myChart = new Chart(earning, {
    type: 'bar',
    data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Earning',
            data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],            
        }]
    },
    options: {
        responsive: true,
          legend: {
    onClick: function (e) {
        e.stopPropagation();
    }
    }
});     myChart.update();

</script>



<?php
$mais = $_SESSION['login_id'];

?>


 
  
