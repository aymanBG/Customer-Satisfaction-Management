<?php 

session_start();
include('./db_connect.php');
?>




<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>
    <head>
        <meta charset="utf-8" />
        <title>EXE</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="monexpe mon experience client" name="description" />
        <meta content="Coderthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.png">

        <!-- App css -->
        <link href="pj/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="pj/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
        <link href="pj/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    </head>

    <body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <div class="align-items-center d-flex h-100">
                    <div class="card-body">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-start">
                                      <a href="/" class="logo d-flex align-items-center">
                                             <img src="assets/img/logo.png" alt="">
                                         <span style="    font-size: 30px;
    font-weight: 700;
    letter-spacing: 1px;
    color: #012970;
    font-family: "Nunito", sans-serif;
    margin-top: 3
px
;">MONEXPE</span>
                                         </a>
                        </div>

                        <!-- title-->
                        <h4 class="mt-0">S'identifier</h4>
                        <p class="text-muted mb-4">Entrez votre adresse e-mail et votre mot de passe pour accéder à votre espace.</p>

                        <!-- form -->
                        <form class="user" role="form"  id="login-form">
                            

                            <div class="form-group mb-3">
                            <label for="emailaddress" class="form-label">Email</label>
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email ...">
                                        </div>
                                        <div class="form-group mb-3">
                                        <label for="password" class="form-label">Mot de passe</label>

                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Entrer mot de passe">
                                        </div>

                                        
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signin">
                                    <label class="form-check-label" for="checkbox-signin"> Se souvenir de moi</label>
                                </div>
                            </div>
                            <div class="d-grid mb-0 text-center">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-login"></i> Connexion</button>
                            </div>
                            <!-- social-->
                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Vous n'avez pas de compte ? <a href="https://localhost/" class="text-muted ms-1"><b>contactez nous</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3">VALEXPE</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Better cx, Better world. <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <p>
                    </p>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

        <!-- bundle -->
        <script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>

    </body>
    <script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Email ou le mot de passe est incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
	$('.number').on('input',function(){
        var val = $(this).val()
        val = val.replace(/[^0-9 \,]/, '');
        $(this).val(val)
    })
</script>	
</html>