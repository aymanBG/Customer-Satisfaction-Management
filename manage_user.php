<?php
include 'db_connect.php';
$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
	}

?>



<style>
img {
    max-width: 150px;
    margin:2%;
}



  @media 
only screen and (max-width: 700px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
    
  .container{
width:100%;
}
.hik{
    
    justify-content:center;
}

}

</style>
	<body class="bg-gradient-primary">

<div class="container">

	<!-- Outer Row -->
	

	<div class="col-xl-12 col-xl-12 col-md-12">

			<div class="card o-hidden border-0 shadow-lg my-2">
				<div class="card-body p-0">
				
							<div class="p-2">
								<div class="text-center">
									<h1 class="h4 text-gray-900 mb-4">Mon profil</h1>
								</div>

			<?php
error_reporting(0);
?>
<?php include 'db_connect.php' ?>

<?php
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
		$folder = "image/".$filename;
		

		// Get all the submitted data from the form
		$md = $_GET['id'];
		$sql = "INSERT INTO image (filename,upload,userdi) VALUES ('$filename', NOW(),'$md')";

		// Execute query
		mysqli_query($conn, $sql);
		
		// Now let's move the uploaded image into the folder: image
		if (move_uploaded_file($tempname, $folder)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
	}
}

?>

<div id="content">
<?php 
$img = '3135715.png';
$md = $_GET['id'];
$im = $conn->query("SELECT filename, userdi from image where userdi = '".$md."' ORDER BY id DESC LIMIT 1");
while ($row = $im->fetch_assoc()) :
    
  $img = $row['filename']
?>


<?php endwhile; ?>
<title>Modifier utilisateur</title>
<link rel="stylesheet" type= "text/css" href ="style.css"/>

<form method="POST" action="" enctype="multipart/form-data">
    <div class="hik">
        <img  src="image/<?php echo $img; ?>"/>
	<input type="file" name="uploadfile" value=""/> 
		<button type="submit" name="upload" class="btn btn-outline-primary">Importer</button>
		</div>
</form>

	<form action="uploadu.php"  class="needs-validation" id="manage_user" method="post" novalidate>
    
	<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">

	<div class="form-group mb-3">
        <label class="form-label" for="validationCustom01">Prénom</label>
        <input type="text" class="form-control" name="firstname" id="validationCustom01" placeholder="Nom"  value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>


    <div class="form-group mb-3">
        <label class="form-label" for="validationCustom02">Nom</label>
        
        <input type="text" class="form-control" id="validationCustom02" name="lastname" placeholder="Prénom"  value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
            <div class="invalid-feedback">
               champ requis
            </div>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="validationCustomUsername">Entreprise</label>
        <div class="input-group">
            <input type="text" class="form-control" name="middlename" id="validationCustomUsername" placeholder="Username"
                aria-describedby="inputGroupPrepend" value="<?php echo isset($middlename) ? $middlename : '' ?>" required>
            <div class="invalid-feedback">
               champ requis
            </div>
        </div>
    </div>





    <div class="form-group mb-3">
        <label class="form-label" for="validationCustom04">Téléphone</label>
        <input type="text" class="form-control" name="contact"  id="validationCustom04" placeholder="Téléphone" required value="<?php echo isset($contact) ? $contact : '' ?>">
        <div class="invalid-feedback">
             champ requis
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="validationCustom05">Addresse</label>
        <input type="text" class="form-control" name="address" id="validationCustom05" placeholder="Adresse" value="<?php echo isset($address) ? $address : '' ?>" required>
            <div class="invalid-feedback">
               champ requis
            </div>
    </div>



	<div class="form-group mb-3">
        <img src="google-logo.png" alt="HTML tutorial"style="max-height:100px;">
        <input type="text" class="form-control" name="grl" id="validationCustom06" placeholder="Google Link" value="<?php echo isset($grl) ? $grl : '' ?>" required>
        <small><i>veuillez saisir le lien avec "https://" </i></small>
            <div class="invalid-feedback">
               champ requis
            </div>
    </div>
	<div class="form-group mb-3">
        <img src="Facebook-Logo.png" alt="HTML tutorial" style="max-height:100px;">
        <input type="text" class="form-control" name="frl" id="validationCustom07" placeholder="Facebook Link" value="<?php echo isset($frl) ? $frl : '' ?>" required>
        <small><i>veuillez saisir le lien avec "https://" </i></small>
            <div class="invalid-feedback">
               champ requis
            </div>
    </div>
    	<div class="form-group mb-3">
        <img src="Tripadvisor-Logo.png" alt="HTML tutorial" style="max-height:100px;">
        <input type="text" class="form-control" name="tpv" id="validationCustom07" placeholder="TripAdvisor Link" value="<?php echo isset($tpv) ? $tpv : '' ?>" required>
        <small><i>veuillez saisir le lien avec "https://" </i></small>
            <div class="invalid-feedback">
               champ requis
            </div>
    </div>

	<div class="form-group mb-3">
        <label class="form-label" for="validationCustom05">E-mail</label>
        <input type="text" class="form-control" name="email" id="validationCustom08" placeholder="Enter Email Address..." required value="<?php echo isset($email) ? $email : '' ?>">
            <div class="invalid-feedback">
               champ requis
            </div>
    </div>


	

							<div class="form-group mb-3">
							<label class="control-label">Mot de passe</label>
							<input type="text" class="form-control form-control-sm" value = "<?php echo $editpass ?>" name="password" <?php echo isset($id) ? "":'required' ?>>
							<small><i><?php echo isset($id) ? "Laissez ce champ vide si vous ne souhaitez pas modifier le mot de passe":'' ?></i></small>
						</div>
						
							<div class="form-group mb-3" hidden>
							<label class="control-label">Mot de passe</label>
							<input type="password" class="form-control form-control-sm" value = "" name="editpass">
						
						</div>
						
						
						<div class="form-group mb-3">
							<label class="label control-label">Confirmer  Mot de passe</label>
							<input type="text" class="form-control form-control-sm" value = "<?php echo $editpass ?>" name="cpass" <?php echo isset($id) ? 'required' : '' ?>>
							<small id="pass_match" data-status=''></small>
						</div>
 

					
		


				<hr>

			
							<div class="col-lg-12 text-right justify-content-center d-flex">
								<button class="btn btn-primary mr-2" name="submit" value="Upload">Sauvegarder</button>
								<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=user_list'">Annuler</button>
							</div>
				</form>

        
		</div>  

	</div>
</div>


 <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>
<script>
	$('[name="password"],[name="cpass"]').keyup(function(){
		var pass = $('[name="password"]').val()
		var cpass = $('[name="cpass"]').val()
		if(cpass == '' ||pass == ''){
			$('#pass_match').attr('data-status','')
		}else{
			if(cpass == pass){
				$('#pass_match').attr('data-status','1').html('<i class="text-success">Password Matched.</i>')
			}else{
				$('#pass_match').attr('data-status','2').html('<i class="text-danger">Password does not match.</i>')
			}
		}
	})
	function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
	}
	$('#manage_user').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()
		$('#msg').html('')
		
		$.ajax({
			url:'ajax.php?action=save_edition',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('profile à jour',"success");
					setTimeout(function(){
						location.replace('index.php?page=home')
					},750)
				}else if(resp == 2){
					$('#msg').html("<div class='alert alert-danger'>L'e-mail existe déjà.</div>");
					$('[name="email"]').addClass("border-danger")
					end_load()
				}
			}
		})
	})
</script>