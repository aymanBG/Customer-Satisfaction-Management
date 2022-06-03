<?php include 'db_connect.php' ?>


               	
               	
               	
               	
               	
               	
               	
               	
               	
               	
              <style>
              
 body{
background-color: #f7f7fc;
}
.card-subtitle, .card-title {
    font-weight: 400;
}
.card-title {
    font-size: .875rem;
    color: #495057;
}
.card {
    margin-bottom: 24px;
    box-shadow: 0 0 0.875rem 0 rgba(33,37,41,.05);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: initial;
    border: 0 solid transparent;
    border-radius: .25rem;
}
.card-body {
    flex: 1 1 auto;
    padding: 1.25rem;
}
.card-header:first-child {
    border-radius: .25rem .25rem 0 0;
}
.card-header {
    border-bottom-width: 1px;
}
.pb-0 {
    padding-bottom: 0!important;
}
.card-header {
    padding: 1rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 0 solid transparent;
}
              </style> 	
               	
               	<title>Messages</title>
               	<div class="container p-0">

	<h1 style="text-align:center; margin-top:-3%;margin-bottom:3%;">Messages clients</h1>
	<div class="row">
	    
	    <?php 

		$mail = $_SESSION['login_id'];

		$sey = $conn->query("SELECT m.id, m.mess, m.subject, m.email, m.datemess, u.middlename FROM mess as m, users as u where m.name = u.id order by m.id DESC");
		
		while($row=$sey->fetch_assoc()):

		?>
		<div class="col-12 col-md-6 col-lg-3">
			<div class="card">
			    				<div class="card-header px-4 pt-4">
					<h3 class="card-title mb-0"><div style="">société : <?php echo $row['middlename'] ?></div></h3>
					
				</div>

				<div class="card-header px-4 pt-4">
					<h5 class="card-title mb-0"><div style="">Sujet : <?php echo $row['subject'] ?></div></h5>
					
				</div>

				<ul class="list-group list-group-flush">
					<li class="list-group-item px-4 pb-4">
						<p class="mb-2 font-weight-bold"> Email : <?php echo $row['email'] ?></p>
						
					</li>
				</ul>
								<div class="card-body px-4 pt-2">
					<p>message : <?php echo $row['mess'] ?></p><br>
					<p>à : <?php echo $row['datemess'] ?></p>

				
				</div>
			</div>
		</div>
		<?php endwhile; ?>
		</div>
		
		</div>
		
 <script src="pj/assets/js/vendor.min.js"></script>
    <script src="pj/assets/js/app.min.js"></script>