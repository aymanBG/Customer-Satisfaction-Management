<?php include 'db_connect.php' ?>
<?php 
$answers = $conn->query("SELECT distinct(survey_id) from answers where user_id ={$_SESSION['login_id']}");
?>
<div class="d-flex w-100 justify-content-center align-items-center mb-2">
		
		</div>
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div>
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div>
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div>
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div>
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div>
	<div class="col-lg-12">
		
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div>
		
		
			
		
			
		</div>
		<div class="row">
		<?php 

		$mail = $_SESSION['login_email'];

		$survey = $conn->query("SELECT s.id, s.title, s.description, s.start_date, s.end_date FROM survey_set AS s, users as u WHERE FIND_IN_SET(s.title,u.serv) and u.email = '".$mail."' ");
		while($row=$survey->fetch_assoc()):
		?>


<div class="col-md-3 py-1 px-1 survey-item">
			<div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title" style="text-align:center;"><?php echo ucwords($row['title']) ?></h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  </button>
                </div>
              </div>
              <div class="card-body" style="display: block;">			   
               <div class="row">
               	<hr class="border-primary">
               	<div class="d-flex justify-content-center w-100 text-center">
				   <a href="index.php?page=view_survey_report_user&id=<?php
				   
				   $usid = $_SESSION['login_id'];
				 
				 echo $row['id'] ?>&usid=<?php echo $usid ?>" class="btn btn-outline-primary"><i class="fa fa-poll"></i> Visualiser</a>

               	</div>
				   <br>
				   <br/>
			<div class="d-flex w-100 justify-content-center align-items-center mb-2">
		
		</div>
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div><div class="d-flex w-100 justify-content-center align-items-center mb-2">
		
		</div>
		<div class="d-flex w-100 justify-content-center align-items-center mb-2">
			
		</div>
               </div>

			        
	</div>
            </div>
		</div>












	<?php endwhile; ?>
	</div>
</div>
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