<?php
if(!isset($conn)){
	include 'db_connect.php' ;
}
?>

<body class="bg-gradient-primary">

<div class="container">

	<!-- Outer Row -->
	<div class="row justify-content-center">

		<div class="col-xl-10 col-xl-12 col-md-9">

			<div class="card o-hidden border-0 shadow-lg my-5">
				<div class="card-body p-0">
					<!-- Nested Row within Card Body -->
						
							<div class="p-5">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Ajouter Questionnaire</h1>
								</div>
			<form action="" id="manage_survey">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
					<div class="col-md-6 border-right">
						<div class="form-group">
							<label for="" class="control-label">Titre</label>
							<input type="text" name="title" class="form-control form-control-sm" required value="<?php echo isset($stitle) ? $stitle : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Date de Debut</label>
							<input type="date" name="start_date" class="form-control form-control-sm" required value="<?php echo isset($start_date) ? $start_date : '' ?>">
						</div>
						<div class="form-group">
							<label for="" class="control-label">Date de Fin</label>
							<input type="date" name="end_date" class="form-control form-control-sm" required value="<?php echo isset($end_date) ? $end_date : '' ?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">Description</label>
							<textarea name="description" id="" cols="30" rows="4" class="form-control" required><?php echo isset($description) ? $description : '' ?></textarea>
						</div>
					</div>
				</div>
				<hr>
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2">Enregistrer</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=survey_list'">Quitter</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	
	$('#manage_survey').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		$('#msg').html('')
		start_load()
		$.ajax({
			url:'ajax.php?action=save_survey',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.',"success");

					setTimeout(function(){
						location.replace('index.php?page=survey_list')
					},1500)
				}
				
				
			}
		})
		
	})
	
</script>