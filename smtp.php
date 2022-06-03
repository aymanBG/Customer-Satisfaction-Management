<html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mon Expérience Client - By Valexpe</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>
<body>

<section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          
          <p>Réserver une démonstration</p> <br>
          <h2>Des insights plus performants au travers de toute votre organisation.<br>
            contactez-nous</h2>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>bureau 13, 34 Av. Oqba<br>Ibn Naafi, Rabat 10000</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Tél</h3>
                  <p>+212 530 047 667</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email</h3>
                  <p>contact@ost.com<br>
                    info@ost.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Horaires</h3>
                  <p>Lundi - Vendredi<br>9:00 à 17:00</p>
                </div>
              </div>
            </div>

          </div>
         

          <div class="col-lg-6">
           <form id="myForm" class="php-email-form">
               <span class="sent-notification"></span>
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" id="name" class="form-control" placeholder="Nom Complet" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" id="email"  class="form-control" name="email" placeholder="Email" required>
                </div>


                <div class="col-md-6">
                  <input type="text" id="company" name="Société" class="form-control" placeholder="Société" required>
                </div>
                
                <div class="col-md-6 ">
                  <input type="text" id="fonction"class="form-control" name="Fonction" placeholder="Fonction" required>
                </div>
                
                <div class="col-md-12">
                  <input type="text" id="phone" class="form-control" name="Téléphone" placeholder="Téléphone" required>
                </div>

            <div class="col-md-12">
                  <textarea class="form-control" id="body" name="message" rows="6" placeholder="Message" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Votre demande a été envoyé. Merci!</div>

                  <button type="submit" onclick="sendEmail()" value="Send An Email">Demande de démonstration</button>
                </div>

			
		</div>
            </form>

	
	<script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var company = $("#company");
            var fonction = $("#fonction");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(fonction) && isNotEmpty(company) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                   url: 'sendEmail.php',
                   method: 'POST',
                   dataType: 'json',
                   data: {
                       name: name.val(),
                       email: email.val(),
                       subject: subject.val(),
                       fonction: fonction.val(),
                       company: company.val(),
                       body: body.val()
                   }, success: function (response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                   }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
          </div>

        </div>

      </div>

    </section><!-- End Contact Section -->

  <footer id="footer" class="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>EXE</span></strong>. All Rights Reserved
      </div>
      <div class="credits">

         by <a href="https://www.exe.com">exe</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>
      