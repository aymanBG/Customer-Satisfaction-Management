<?php 
// Include the database configuration file  
session_start();

require_once 'db_connect.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    
        // Get file info 
        $mess=$_POST['mess'];
$email=$_POST['email'];
$subject=$_POST['subject'];
$name=$_POST['name'];
$user=$_POST['user'];
         
            // Insert image content into database 
            $maid = $_GET['usid']; 
            $insert = $conn->query("INSERT INTO mess (mess, email, subject,user_id, name) VALUES ('$mess','$email','$subject','$user','$name')"); 
           

             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
         
   
} 
 ?>
<script>
    window.location.replace("thanks.php");

</script>