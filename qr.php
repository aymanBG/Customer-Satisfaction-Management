<?php

include 'db_connect.php' ;

?>




<!doctype html>
	<head>

		<style>
			/* CSS comes here */
			body {
			    padding:20px;
			}
			input {
			    padding:5px;
			    background-color:transparent;
			    border:none;
			    border-bottom:solid 4px #8c52ff;
			    width:250px;
			    font-size:16px;
			}
			
			.qr-btn {
			    background-color:#8c52ff;
			    padding:8px;
			    color:white;
			    cursor:pointer;
			}

          
		</style>
		
		<title>Qr</title>
	</head>
	<body style="text-align:center;">
		<h3>QR Code </h3>
        <br/>
        <div>
        <br/>
        <p id="qr-result"></p>
        <br>
        <a id="download" download="triangle.png">
<button type="button" class="btn btn-outline-primary " onClick="download()">Télecharger</button>
</a>
<br><br><br>
        <canvas id="qr-code"></canvas>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/qrious/4.0.2/qrious.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
		<script>
			var qr;
			(function() {
                    qr = new QRious({
                    element: document.getElementById('qr-code'),
                    size: 200,
                    value: 'http://localhost/app.php?page=answer_survey&id=<?php echo $_GET['id'] ?>&usid=<?php echo $_GET['usid'] ?>'
                });
            })();
            
		</script>

        <script>

        function download() {
        var download = document.getElementById("download");
        var image = document.getElementById("qr-code").toDataURL("image/png")
            .replace("image/png", "image/octet-stream");
        download.setAttribute("href", image);
        //download.setAttribute("download","archive.png");
        } 
        
        </script>


	
	
	</body>

</html>