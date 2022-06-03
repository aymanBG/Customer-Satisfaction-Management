<style>
    
    #dd{
        margin:10%;
        width:100%;
        justify-content:center;
       
       
    }
    
    .sidebar{
        
        margin-bottom: -100%; /* any large number will do */
  padding-bottom: 100%;
    }
    
    
</style>

<?php 
include('db_connect.php');

$usr = $conn->query("SELECT Max(id) as m FROM users");
 while($row = $usr->fetch_assoc()): 


?>
<?php endwhile; ?>
<script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>

<body id="page-top">
    
    <!-- Page Wrapper -->
    <div id="">
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark  nav-treeview" id="accordionSidebar">
      
  <br>
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                
                                <img src="ME-logo-white.png" id="dd"   />

                                <br>
            </a>
<script>
 
</script>
            <!-- Divider -->

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="./index.php?page=home">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            
           

            <!-- Heading -->
            <?php if($_SESSION['login_type'] == 1): ?>
             <script>
  if ($(window).width() < 700 || $(window).height() < 700) {
    
    document.getElementById("accordionSidebar").classList.add('toggled');

document.getElementById("accordionSidebar").classList.remove('nav-treeview');
}
</script>
            <div class="sidebar-heading">
                Client
            </div>

<?php 
$mail = $_SESSION['login_id'];
$li = '';

$spo = $conn->query("SELECT MAX(id) as id FROM users");
		while($row=$spo->fetch_assoc()):
		    
		    
	
 

?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" >
                <a class="nav-link nav-new_user tree-item collapsed " href="./index.php?page=new_user&id=<?php echo $row['id'] + 1 ?>">
                    <i class="fas fa-fw fa-user-plus"></i>           
                    <span>Ajouter Client</span>
                </a>
            </li>
            
            <?php endwhile; ?>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="./index.php?page=user_list"  data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Liste Client</span>
                </a>
                
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">


                        <!-- Heading -->

      <!-- Nav Item - Tables -->

              <!-- Heading -->
              <div class="sidebar-heading">
                    Rapports
              </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=nps&selected=0">
                    <i class="fas fa-fw fa-atom"></i>
                    <span>NPS</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=ces&selected=0">
                    <i class="fas fa-fw fa-stroopwafel"></i>
                    <span>CES</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=csat&selected=0">
                    <i class="fas fa-fw fa-meteor"></i>
                    <span>CSAT</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=cess&selected=0">
                    <i class="fas fa-fw fa-meteor"></i>
                    <span>E-CES</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=enps&selected=0">
                    <i class="fas fa-fw fa-meteor"></i>
                    <span>E-NPS</span></a>
            </li>
            
              <hr class="sidebar-divider">
            <div class="sidebar-heading">
                    
              </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=supmess">
                    <i class="fas fa-fw fa-atom"></i>
                    <span>Message</span></a>
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <a class="nav-link" href="documentation/doc-Admin.php" target="_blank">
                    <i class="fas fa-fw fa-atom"></i>
                    <span>Documentation</span></a>
            </li>
            
            </ul>
        
      
            <?php else: ?>  
            
 <body id="page-top">
    
    <!-- Page Wrapper -->
 <script>
  if ($(window).width() < 700 || $(window).height() < 700) {
    
    document.getElementById("accordionSidebar").classList.add('toggled');

document.getElementById("accordionSidebar").classList.remove('nav-treeview');
}
</script>
    

            <hr class="sidebar-divider">

              <!-- Heading -->
              <div class="sidebar-heading">
             Questionnaire
          </div>

          <!-- Nav Item - Tables -->
        <li class="nav-item">
  <a class="nav-link" href="./index.php?page=survey_widget">
      <i class="fas fa-fw fa-table"></i>
      <span>Questionnaire</span></a>
          </li>
          <hr class="sidebar-divider">

              <!-- Heading -->
              <div class="sidebar-heading">
                    Rapport
              </div>


<?php 
$mail = $_SESSION['login_id'];
$link = '';

$spey = $conn->query("SELECT s.title FROM survey_set AS s, users as u WHERE FIND_IN_SET(s.title,u.serv) and u.id = '".$mail."' ");
		while($row=$spey->fetch_assoc()):
		    
		    
	
 

?>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=<?php echo strtolower($row['title'])."_user"?>">
                    <i class="fas fa-fw fa-meteor"></i>
                    <span><?php echo $row['title'] ?></span></a>
            </li>
            
            	<?php endwhile; ?>

 <hr class="sidebar-divider">
 
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=messages">
                    <i class="fas fa-fw fa-atom"></i>
                    <span>Messages</span>
                </a>
            </li>
             <hr class="sidebar-divider">
 
            <li class="nav-item">
                <a class="nav-link" href="./index.php?page=sup">
                    <i class="fas fa-fw fa-life-ring"></i>
                    <span>Support</span>
                </a>
            </li>
            
            <hr class="sidebar-divider">
                 <li class="nav-item">
                <a class="nav-link" href="documentation/Doc-clients.php" target="_blank">
                    <i class="fas fa-fw fa-atom"></i>
                    <span>Documentation</span></a>
            </li>
            </div>
                
           <!--  
           <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
           

            Sidebar Message -->
            
            
        </ul>
          
        <!-- End of Sidebar -->
      <?php endif; ?>
      
   
   

    <!-- Custom scripts for all pages-->


 
        
  
  
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   