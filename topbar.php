<?php include 'db_connect.php' ?>

					
<div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<style>
    .img-profile{
        height:3%;
    }
    ul{
        float:left;
    }
</style>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    
<li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger badge-counter" id="showhde"> </span>
            <script>
                $('#showhde').click(function() {
                $(this).toggleClass('badge badge-counter');
                });
            </script>
        </a>
        
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Messages 
            </h6>

<?php if($_SESSION['login_type'] == 1): ?> 


  <div class="scroller" id="style-2">
             
            <?php 
            

    $mis = $conn->query("SELECT m.id , u.middlename, m.datemess FROM mess as m, users as u where m.name = u.id  ORDER by m.id desc limit 3");
		while($row=$mis->fetch_assoc()): 

    ?>
   

            <a class="dropdown-item d-flex align-items-center" href="http://localhost/mxp/index.php?page=supmess">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">Bonjour Support</div>
                    <span class="font-weight-bold">Société  <?php echo $row['middlename'] ?>  </span>
                    <div class="small text-gray-500">à envoyer un message à <?php echo date('g:ia', strtotime($row['datemess']))?> </div>
                </div>
            </a>

            <?php endwhile; ?>
        </div>
        
        <?php else: ?>

            <div class="scroller" id="style-2">
             
            <?php 
            

            $usdd = $_SESSION['login_id'];
    $ms = $conn->query("select name,id,datemess  from mess  where user_id = '".$usdd."'  ORDER by id desc limit 3");
		while($row=$ms->fetch_assoc()): 

    ?>
   

            <a class="dropdown-item d-flex align-items-center" href="http://localhost/mxp/index.php?page=messages">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">Bonjour <?php echo $_SESSION['login_middlename'] ?></div>
                    <span class="font-weight-bold">Mr  <?php echo $row['name'] ?>  </span>
                    <div class="small text-gray-500"> vous à envoyer un message à <?php echo date('g:ia', strtotime($row['datemess']))?></div>
                </div>
            </a>

            <?php endwhile; ?>
        </div>



<?php endif; ?>

</li>
    
    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger badge-counter" id="showhide"> </span>
            <script>
                $('#showhide').click(function() {
                $(this).toggleClass('badge badge-counter');
                });
            </script>
        </a>
        
        <!-- Dropdown - Alerts -->
        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Notifications
            </h6>



            
            <style>
.scroller {
  width: 300px;
  height: 150px;
  overflow-y: scroll;
  scrollbar-color: blue;
  scrollbar-width: thin;
}

/*
 *  STYLE 2
 */

#style-2::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	border-radius: 10px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar
{
	width: 12px;
	background-color: #F5F5F5;
}

#style-2::-webkit-scrollbar-thumb
{
	border-radius: 10px;
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
	background-color: #D62929;
}

</style>



<?php if($_SESSION['login_type'] != 1): ?> 
            <div class="scroller" id="style-2">
             
            <?php 
            

            $usdd = $_SESSION['login_id'];
    $sec = $conn->query("select s.title,a.date_created  from answers as a, survey_set as s where a.survey_id = s.id and a.user_id = '".$usdd."'  ORDER by a.date_created desc limit 3
");
		while($row=$sec->fetch_assoc()): 

    ?>
   

            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">Bonjour <?php echo $_SESSION['login_middlename'] ?></div>
                    <span class="font-weight-bold">Nouvelle Réponse <?php echo $row['title'] ?> </span>
                    <div class="small text-gray-500"> à <?php echo $row['date_created'] ?></div>
                </div>
            </a>

            <?php endwhile; ?>
        </div>
        <?php else: ?>
<div class="scroller" id="style-2">
             
            <?php 
            

            $usdd = $_SESSION['login_id'];
    $sec = $conn->query("select s.title,a.date_created, u.middlename from answers as a, survey_set as s, users as u where a.survey_id = s.id and u.id = a.user_id ORDER by a.date_created desc limit 5;
");
		while($row=$sec->fetch_assoc()): 

    ?>
   

            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">Client <?php echo $row['middlename'] ?></div>
                    <span class="font-weight-bold">nouvelle insertion <?php echo $row['title'] ?>  </span>
                    <div class="small text-gray-500"> à <?php echo $row['date_created'] ?></div>
                </div>
            </a>

            <?php endwhile; ?>
        </div>
        <?php endif; ?>
        
    </li>
    
    <!-- Nav Item - Messages -->
   

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ucwords($_SESSION['login_middlename']) ?></span>
            <?php
                $md = $_SESSION['login_id'];

$img = '3135715.png';

$im = $conn->query("SELECT filename from image where userdi = '".$md."' ORDER BY id DESC LIMIT 1");
while ($row = $im->fetch_assoc()) :
    
  $img = $row['filename'] ;          
  
  ?>

            
                    <img class="img-profile" src="image/<?php echo $img ?>" /> 


                <?php endwhile; ?>

   





        </a>
        <!-- Dropdown - User Information -->
        <?php $md = $_SESSION['login_id']; ?>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="index.php?page=manage_user&id=<?php echo $md; ?>">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
               Mon Profile
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Se déconnecter
            </a>
            </a>
        </div>
    </li>

</ul>

</nav>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
<!-- End of Topbar -->

