
<?php include 'db_connect.php' ?>


<form action="" method="POST">

<div class="row justify-content-center">

		<div class="col-xl-10 col-xl-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<div class="p-5">
						<div class="text-center">
							<h1 class="h4 text-gray-900 mb-4">Choisir Client :</h1>
						</div>
	
						<select name="usc" id="usc" class="custom-select form-control form-control-sm">
						<?php
						$usc = $conn->query("SELECT id, middlename from users where type = 2 ");
						while($row= $usc->fetch_assoc()):
						?>
						<option value="<?php echo ucwords($row['id'])  ?>"><?php echo ucwords($row['middlename'])  ?></option>
						<?php endwhile;?>
						</select>
						<br><br><br><br>
				<div class="d-flex justify-content-center">
					<input type="submit" class="btn btn-outline-primary" name="sub" vlaue="Choose user">
				</div>
			
</form>

<?php 
$selected = 0;
if(isset($_POST['sub'])){
    if(!empty($_POST['usc'])) {
        $selected = $_POST['usc'];
        
    } else {
        echo $selected;
    }
}

		$answers = $conn->query("SELECT distinct(survey_id) from answers as a, users as u ");
?>


<div class="col-lg-12">
	
	<div class="row">
		<?php 

		$survey = $conn->query("SELECT s.id, s.title, s.description, s.start_date, s.end_date FROM survey_set AS s, users as u WHERE FIND_IN_SET(s.title,u.serv) and u.id = '".$selected."' "	);
		while($row=$survey->fetch_assoc()):

		?>
		<div class="col-md-3 py-1 px-1 survey-item">
			<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title"><?php echo ucwords($row['title']) ?></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">
               <div class="row">
               	<hr class="border-primary">
               	<div class="d-flex justify-content-center w-100 text-center">
               			<a href="index.php?page=view_survey_report&id=<?php echo $row['id'] ?>&usid=<?php echo $selected ?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-poll"></i> View Report</a>
               	</div>
               </div>
              </div>
            </div>
		</div>



		
	<?php endwhile; ?>
	</div>
</div>

<?php

error_reporting( E_NOTICE);


?>

<script>
	function find_survey(){
		start_load()
		var filter = $('#filter').val()
			filter = filter.toLowerCase()
			console.log(filter)
		$('.survey-item').each(function(){
			var txt = $(this).text()
			if((txt.toLowerCase()).includes(filter) == true){
				$(this).toggle(true)
			}else{
				$(this).toggle(false)
			}
			if($('.survey-item:visible').length <= 0){
				$('#ns').show()
			}else{
				$('#ns').hide()
			}
		})
		end_load()
	}
	$('#search').click(function(){
		find_survey()
	})
	$('#filter').keypress(function(e){
		if(e.which == 13){
		find_survey()
		return false;
		}
	})
</script>