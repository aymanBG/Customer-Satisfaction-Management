<?php include 'db_connect.php' ?>

<?php if($_SESSION['login_type'] == 1): 
    
    
   
	?> 

<style>
img {
    max-width:150px;
    margin:2%;
}



  @media 
only screen and (max-width: 700px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
    
  .tij{
     max-width:100px;
     max-height:100px;
     margin-left:5%;
    
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
									<h1 class="h4 text-gray-900 mb-4">Ajouter utilisateur</h1>
								</div>

			<?php
error_reporting(0);
?>
<?php include 'db_connect.php' ?>

<?php
$msgg = "";

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
			$msgg = "Image uploaded successfully";
		}else{
			$msgg = "Failed to upload image";
	}
}

?><div id="content">
<?php 
$img = '3135715.png';
$md = $_GET['id'];
$im = $conn->query("SELECT filename, userdi from image where userdi = '".$md."' ORDER BY id DESC LIMIT 1");
while ($row = $im->fetch_assoc()) :
    
  $img = $row['filename']
?>


<?php endwhile; ?>

<title>Ajouter Utilisateur</title>
<form method="POST"  enctype="multipart/form-data">
    <div class="hik">
    <img src="image/<?php echo $img; ?>"/>
    <input type="file" name="uploadfile" value=""/> 
  
		<button type="submit" name="upload" class="btn btn-outline-primary">Importer</button>
		</div>
</form>

	<form  class="needs-validation" id="manage_user" method="post" novalidate>
    
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
                champ requis.
            </div>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="validationCustomUsername">Entreprise</label>
        <div class="input-group">
            <input type="text" class="form-control" name="middlename" id="validationCustomUsername" placeholder="Entreprise"
                aria-describedby="inputGroupPrepend" value="<?php echo isset($middlename) ? $middlename : '' ?>" required>
            <div class="invalid-feedback">
                champ requis.
            </div>
        </div>
    </div>





    <div class="form-group mb-3">
        <label class="form-label" for="validationCustom04">Téléphone</label>
        <input type="text" class="form-control" name="contact"  id="validationCustom04" placeholder="Télephone" required value="<?php echo isset($contact) ? $contact : '' ?>">
        <div class="invalid-feedback">
            champ requis
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="validationCustom05">Adresse</label>
        <input type="text" class="form-control" name="address" id="validationCustom05" placeholder="Adresse"  required>
        <div class="invalid-feedback">
            Please provide a valid zip.
        </div>
    </div>

	<b class="text-muted"></b>
						<?php if($_SESSION['login_type'] == 1): ?>
						<div class="form-group mb-3">
							<label for="" class="control-label">User Role</label>
							<select name="type" id="type" class="custom-select custom-select-sm">
								<option value="2" <?php echo isset($type) && $type == 2 ? 'selected' : '' ?>>Client</option>
								<option value="1" <?php echo isset($type) && $type == 1 ? 'selected' : '' ?>>Admin</option>
							</select>
						</div>
						<?php else: ?>
							<input type="hidden" name="type" value="3">
	<?php endif; ?>

	<div class="form-group mb-3">
	     <img src="google-logo.png" alt="HTML tutorial" style="max-height:100px;">
        <input type="text" class="form-control" name="grl" id="validationCustom06" placeholder=" Google Reviews" value="<?php echo isset($grl) ? $grl : '' ?>" >
        <small><i>veuillez saisir le lien avec "https://" </i></small>
        <div class="invalid-feedback">
          champ requis
        </div>
    </div>
	<div class="form-group mb-3">
	    <img src="Facebook-Logo.png" alt="HTML tutorial" style="max-height:100px;">
        <input type="text" class="form-control" name="frl" id="validationCustom07" placeholder="Facebook Reviews" value="<?php echo isset($frl) ? $frl : '' ?>" >
        <small><i>veuillez saisir le lien avec "https://" </i></small>
        <div class="invalid-feedback">
       champ requis
        </div>
    </div>
	<div class="form-group mb-3">
       <img src="Tripadvisor-Logo.png" alt="HTML tutorial" style="max-height:100px;">
        <input type="text" class="form-control" name="tpv" id="validationCustom07" placeholder="Reviews TripAdvisor"  value="<?php echo isset($tpv) ? $tpv : '' ?>" >
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
							<input type="password" class="form-control form-control-sm"  name="password"  required>
						</div>
						
							<div class="form-group mb-3" hidden>
							<label class="control-label">Mot de passe</label>
							<input type="password" class="form-control form-control-sm" value = "" name="editpass">
						
						</div>
						
						
						<div class="form-group mb-3">
							<label class="label control-label">Confirmer Mot de passe</label>
							<input type="password" class="form-control form-control-sm"  name="cpass"  required>
						</div>
 

	<div class="form-group mb-3">
							<label class="label control-label">sélectionner Questionnaire</label>

	</div>
				
			<?php
			$checked = '';
			    $lastname = '';
			     $movies_id = array();
			     
			$pg = $_GET['page'];
			if($pg != 'new_user'):
			    
			
			    

    
			    
			    	$arr = $conn->query("SELECT s.title as ntitle from survey_set as s , users as u where FIND_IN_SET(s.title,u.serv) and u.id = ".$_GET['id']);
					while($rw = $arr ->fetch_assoc()):
					    

							$til = $rw['ntitle'];
                    $movies_id[$til] = $til;

			
 
							
				?>
				
				<?php endwhile; ?>
				<?php endif; ?>
			<?php
				$srv = $conn->query("SELECT title from survey_set ");
				while($row= $srv->fetch_assoc()):
                    
                    
                
				

								
				?>
				
				<?php 
                            if(in_array($row['title'],$movies_id)){
                    
                                     $checked = 'checked';
                                }else{
                                            $checked = 'unchecked';

                    } ?>
									<input type="checkbox" name="serv[]" value="<?php echo ucwords($row['title'])  ?>" <?php echo $checked ?> ><?php  echo ucwords($row['title'])  ?> <br />

				<?php endwhile; 
				
				?>
				
					<link rel="stylesheet" type= "text/css" href ="style.css"/>






				<hr>


                        <div class="form-group mb-3">
							<label class="label control-label">Note Client</label>
							<textarea class="form-control form-control-sm"  name="ncc"  ></textarea>
						</div>
						
						<hr>
			
							<div class="col-lg-12 text-right justify-content-center d-flex">
								<button class="btn btn-primary mr-2" name="submit" value="Upload">sauvegarder</button>
								<button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=user_list'">Annuler</button>
							</div>
				</form>

        
		</div>  

	</div>
</div>
<?php endif; ?>

 <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>
<script>
	
	
	$('#manage_user').submit(function(e){
		e.preventDefault()
		$('input').removeClass("border-danger")
		start_load()

			if($("[name='password']").val() ==''){
				$('[name="password"],[name="cpass"]').addClass("border-danger")
				end_load()
				
				return false;
			}
		
		$.ajax({
			url:'ajax.php?action=save_user',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp == 1){
					alert_toast('client Ajouté',"success");
					setTimeout(function(){
						location.replace('index.php?page=user_list')
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