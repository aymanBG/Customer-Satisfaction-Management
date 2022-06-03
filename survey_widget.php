<?php include 'db_connect.php' ?>
<?php
$answers = $conn->query("SELECT distinct(survey_id) from answers where user_id ={$_SESSION['login_id']}");
$ans = array();
while ($row = $answers->fetch_assoc()) {
	$ans[$row['survey_id']] = 1;
}
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

	$survey = $conn->query("SELECT s.id, s.title, s.description, s.start_date, s.end_date FROM survey_set AS s, users as u WHERE FIND_IN_SET(s.title,u.serv) and u.email = '" . $mail . "' ");



	while ($row = $survey->fetch_assoc()) :

	?>
		<div class="col-sm py-1 px-1 survey-item">
			<div class="card card-outline card-primary">
				<div class="card-header">
					<h3 class="card-title" style="text-align:center;"><?php echo ucwords($row['title']) ?></h3>
						<h6 style="text-align:center;">
						    
						    <?php echo ucwords($row['description']) ?>
						    </h6>
					<div class="card-tools">
						<button type="button" class="btn btn-tool" data-card-widget="collapse">
						</button>
					</div>
				</div>
				<div class="card-body" style="display: block;">
					<div class="row">
						<hr class="border-primary">

						<br>
						<br />

					</div>

					<?php
					$usid = $_SESSION['login_id'];
					?>
					<div style="text-align:center;">

						<i class="fas fa-fw fa-window-restore"></i> <a href="http://localhost/mxp/app.php?page=answer_survey&id=<?php echo $row['id'] ?>&usid=<?php echo $usid ?>" onclick="copyURI(event)" id="myInput">Copier Le lien</a>
					</div>

					<!-- The button used to copy the text -->
					<div style="text-align:center;">
						<i class="fas fa-fw fa-window-restore"></i> <a href="http://localhost/mxp/app.php?page=qr&id=<?php echo $row['id'] ?>&usid=<?php echo $usid ?>" onclick="fun()" id="myInput">QR Code</a>

						<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>

					</div>



					<div id="qrcode"></div>

					<script>
						function fun() {
							window.location.replace("http://localhost/mxp/");

						}
					</script>
	<script>
						function copyURI(evt) {
							evt.preventDefault();
							navigator.clipboard.writeText(evt.target.getAttribute('href')).then(() => {
								/* clipboard successfully set */
							}, alert_toast("copied.", 'success'), () => {
								/* clipboard write failed */
							});
						}
					</script>

				</div>
			</div>
		</div>


	<?php endwhile; ?>




</div>
</div>

<script src="pj/assets/js/vendor.min.js"></script>
<script src="pj/assets/js/app.min.js"></script>
<script>
	function find_survey() {
		start_load()
		var filter = $('#filter').val()
		filter = filter.toLowerCase()
		console.log(filter)
		$('.survey-item').each(function() {
			var txt = $(this).text()
			if ((txt.toLowerCase()).includes(filter) == true) {
				$(this).toggle(true)
			} else {
				$(this).toggle(false)
			}
			if ($('.survey-item:visible').length <= 0) {
				$('#ns').show()
			} else {
				$('#ns').hide()
			}
		})
		end_load()
	}
	$('#search').click(function() {
		find_survey()
	})
	$('#filter').keypress(function(e) {
		if (e.which == 13) {
			find_survey()
			return false;
		}
	})
</script>