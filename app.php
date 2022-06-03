<!DOCTYPE html>
<html lang="en">
<?php 

	include 'header.php' 
?>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <?php include 'sectop.php' ?>
  <?php include 'secside.php' ?>

  <!-- Content Wrapper. Contains page content -->
  
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
         <?php 
          $page = isset($_GET['page']) ? $_GET['page'] : 'home';
          include $page.'.php';
          ?>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
    
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- Bootstrap -->
<?php include 'footer.php' ?>
</body>
</html>
