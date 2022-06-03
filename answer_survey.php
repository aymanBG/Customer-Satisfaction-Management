<?php include 'db_connect.php' ?>
<?php 
$qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	if($k == 'title')
		$k = 'stitle';
	$$k = $v;
}

$us = $_GET['usid'];
$_SESSION['iden'] = $us;





?>

<title>E-XE</title>
<link href="assets/img/favicon.png" rel="icon">
<style>


#sized{

    font-size: 280%;
  text-align: center;
   margin-bottom:12%;
    
}




  @media 
only screen and (max-width: 700px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
    
    #sized{
font-size: 280%;
  text-align: center;
  margin-bottom:14%;
    
}

#jlo{
    margin-bottom :10%;
}

}
    
    
	#control {
		background-color: #fefefe;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  overflow: auto; /* Enable scroll if needed */

	}
.tij {
  width: 20%;
}
	
	* { box-sizing: border-box; }

.container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: center;
  padding: 0 20px;
}

.rating {
  display: flex;
  width: 100%;
  justify-content: center;
  overflow: hidden;
  flex-direction: row-reverse;
  height: 150px;
  position: relative;
}

.rating-0 {
  filter: grayscale(100%);
}

.rating > input {
  display: none;
}

.rating > label {
  cursor: pointer;
  width: 40px;
  height: 40px;
  margin-top: auto;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: center;
  background-size: 76%;
  transition: .3s;
}

.rating > input:checked ~ label,
.rating > input:checked ~ label ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}


.rating > input:not(:checked) ~ label:hover,
.rating > input:not(:checked) ~ label:hover ~ label {
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
}

.emoji-wrapper {
  width: 100%;
  text-align: center;
  height: 100px;
  overflow: hidden;
  position: absolute;
  top: 0;
  left: 0;
}

.emoji-wrapper:before,
.emoji-wrapper:after{
  content: "";
  height: 15px;
  width: 100%;
  position: absolute;
  left: 0;
  z-index: 1;
}

.emoji-wrapper:before {
  top: 0;
  background: linear-gradient(to bottom, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji-wrapper:after{
  bottom: 0;
  background: linear-gradient(to top, rgba(255,255,255,1) 0%,rgba(255,255,255,1) 35%,rgba(255,255,255,0) 100%);
}

.emoji {
  display: flex;
  flex-direction: column;
  align-items: center;
  transition: .3s;
}

.emoji > svg {
  margin: 15px 0; 
  width: 70px;
  height: 70px;
  flex-shrink: 0;
}

#rating-1:checked ~ .emoji-wrapper > .emoji { transform: translateY(-100px); }
#rating-2:checked ~ .emoji-wrapper > .emoji { transform: translateY(-200px); }
#rating-3:checked ~ .emoji-wrapper > .emoji { transform: translateY(-300px); }
#rating-4:checked ~ .emoji-wrapper > .emoji { transform: translateY(-400px); }
#rating-5:checked ~ .emoji-wrapper > .emoji { transform: translateY(-500px); }

.feedback {
  max-width: 360px;
  background-color: #fff;
  width: 100%;
  padding: 10px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  box-shadow: 0 4px 30px rgba(0,0,0,.05);
  margin-top:20px;
}




@media only screen and (min-width:800px) {
  /* For tablets: */
  #fth {
  display: flex;
  
	flex-direction: row;
	justify-content: center;
	break-before: always;
	width:87%;
	
}
.tij{
    width:20%;
}
}
@media only screen and (min-width:500px) {
  /* For mobile phones: */
 #fth {
    display: flex;
	flex-direction: row;
	justify-content: center;
	break-before: always;
	width:87%;
	
}
.tij{
    width:20%;
}
}

#concard {
    
 
	width:100%;
	
}

@media only screen and (max-width:800px) {
  /* For tablets: */
  .main {
    width: 100%;
    padding: 0;
  }
  .right {
    width: 100%;
  }
  .tij{
    width:40%;
}
}
@media only screen and (max-width:500px) {
  /* For mobile phones: */
  .menu, .main, .right {
    width: 100%;
  }
    .tij{
    width:40%;
}
}





:root {
	--bg: #e3e4e8;
	--fg: #17181c;
	--bs1: #ffffff;
	--bs2: #38761d;
	--bs3: #38761d;
	--bs4: #38761d;
	--transDur: 0.1s;
	
}



label {
    
	display: block;
	margin: 0 0.2em;
	text-align: center;
	-webkit-tap-highlight-color: transparent;
}
label:first-child input {
	border-radius: 0.5em 0em 0 0em;
}
label:last-child input {
	border-radius: 0 0.5em 0.5em 0;
}
input {
   
	border-radius: 0;

	cursor: pointer;
	display: block;
	margin-bottom: 0.5em;
	width: 100%;
	height: 0em;
	transition: all var(--transDur) ease-in-out;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
}
input:checked {
	box-shadow:
		-0.15em 2em 0.15em #38761d inset,
		0.15em 2em 1.15em #38761d inset;
		border: 2px solid #4fa927;
}
input:checked + span {
	opacity: 1;
}
input:focus {
	outline: transparent;
}
input + span {
	opacity: 0.65;
	transition: opacity var(--transDur) ease-in-out;
}



</style>



<div class="" id="concard">
	<div class="row d-flex justify-content-center" >
		<div class="col-md-10">
			
					<h3 class="card-title"><b></b>
					</h3>
<div id="content" class="d-flex w-100 justify-content-center">
<?php 
$img = '3135715.png';
$md = $_GET['usid'];
$im = $conn->query("SELECT filename, userdi from image where userdi = '".$md."' ORDER BY id DESC LIMIT 1");
while ($row = $im->fetch_assoc()) :
    
  $img = $row['filename']
?>


<?php endwhile; ?>
<img class ="tij" src="image/<?php echo $img; ?>"/>
				</div>
				<br>
				<div style="text-align:center;color:black;">S'il vous plait, prenez quelques instants pour partager votre expérience avec nous. <br>Votre avis est non seulement important pour nous, mais il nous aide à devenir Meilleur &#128522</div>
				

				<form action="" id="manage-survey">
					<input type="hidden" name="survey_id" value="<?php echo $id ?>">
				<div class="card-body ui-sortable">
					<?php 
					$question = $conn->query("SELECT * FROM questions where survey_id = $id order by abs(order_by) asc,abs(id) asc");
					while($row=$question->fetch_assoc()):	
					    
					    
					 
					    
					?>
					<div class="callout callout-info ">
					    <br>
					    <div class="d-flex w-100 justify-content-center">
						<h5 style="text-align: center;"><?php echo $row['question'];   $qion = $conn->query("SELECT middlename FROM users where id = $us and $id = 18");
					while($rw=$qion->fetch_assoc()):   echo $rw['middlename']; ?>    <?php 
					endwhile;
					?>  </h5>
						</div>
						<br>
						<span class="d-flex w-100 justify-content-center">
					    <div class="translate" id="google_translate_element"></div>

                            <script type="text/javascript">
                                function googleTranslateElementInit() {  new google.translate.TranslateElement({pageLanguage: 'fr', includedLanguages: 'en,fr,ar', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true}, 'google_translate_element');}
                            </script>
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
					</span>
						<br>
						        <hr class="sidebar-divider">

						<div class="col-md-12 d-flex w-100 justify-content-center">
						<input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">	
						<input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">	
						<input type="hidden" name="usid" value="<?php echo $us ?>">	
                                
						<div id="fth" >
						    
							<?php
						
							
						
							
							
								if($row['type'] == 'radio_opt'):
									foreach(json_decode($row['frm_option']) as $k => $v):
							?>
							<div class="icheck-primary" >
                      			<label for="option_<?php echo $k ?>" class="radio-inline" id=""><span id="sized"  tabindex=""><?php echo "&".$v ?></span>
		                                              									            <hr class="sidebar-divider">

		                        <input type="radio" size="32"  id="option_<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>]" value="<?php echo $k ?>" > 
		                                              									            <hr class="sidebar-divider">

		                        </label>
		                        
		                        
		          			</div>
		          		<script>
		         
		          		</script>
								<?php endforeach; ?>
						
           				 </div>
								
							<?php elseif($row['type'] == 'check_opt'): 
									foreach(json_decode($row['frm_option']) as $k => $v):
							?>
							<div class="icheck-primary">
		                        <input type="checkbox" id="option_<?php echo $k ?>" name="answer[<?php echo $row['id'] ?>][]" value="<?php echo $k ?>" >
		                        <label for="option_<?php echo $k ?>"><?php echo $v ?></label>
		                     </div>
							 

								<?php endforeach; ?>
						<?php else: ?>
							<div class="form-group">
								<div class="container">
							  <div class="feedback">
								<div class="rating">
								<form name="myForm" id="test">
								    
								  <input type="radio" name="answer[<?php echo $row['id'] ?>]" onclick="handleClick(this);" id="rating-5" value = "1">
								  <label for="rating-5"></label>
								  <input type="radio" name="answer[<?php echo $row['id'] ?>]" onclick="handleClick(this);" id="rating-4" value = "2">
								  <label for="rating-4"></label>
								  <input type="radio" name="answer[<?php echo $row['id'] ?>]" onclick="handleClick(this);" id="rating-3" value = "3">
								  <label for="rating-3"></label>
								  <input type="radio" name="answer[<?php echo $row['id'] ?>]" onclick="handleClick(this);" id="rating-2" value = "4">
								  <label for="rating-2"></label>
								  <input type="radio" name="answer[<?php echo $row['id'] ?>]" onclick="handleClick(this);" id="rating-1" value = "5">
								  <label for="rating-1"></label>
                                  
								  </form>
							
										

								  <div class="emoji-wrapper">
									<div class="emoji">
									  <svg class="rating-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									  <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
									  <path d="M512 256c0 141.44-114.64 256-256 256-80.48 0-152.32-37.12-199.28-95.28 43.92 35.52 99.84 56.72 160.72 56.72 141.36 0 256-114.56 256-256 0-60.88-21.2-116.8-56.72-160.72C474.8 103.68 512 175.52 512 256z" fill="#f4c534"/>
									  <ellipse transform="scale(-1) rotate(31.21 715.433 -595.455)" cx="166.318" cy="199.829" rx="56.146" ry="56.13" fill="#fff"/>
									  <ellipse transform="rotate(-148.804 180.87 175.82)" cx="180.871" cy="175.822" rx="28.048" ry="28.08" fill="#3e4347"/>
									  <ellipse transform="rotate(-113.778 194.434 165.995)" cx="194.433" cy="165.993" rx="8.016" ry="5.296" fill="#5a5f63"/>
									  <ellipse transform="scale(-1) rotate(31.21 715.397 -1237.664)" cx="345.695" cy="199.819" rx="56.146" ry="56.13" fill="#fff"/>
									  <ellipse transform="rotate(-148.804 360.25 175.837)" cx="360.252" cy="175.84" rx="28.048" ry="28.08" fill="#3e4347"/>
									  <ellipse transform="scale(-1) rotate(66.227 254.508 -573.138)" cx="373.794" cy="165.987" rx="8.016" ry="5.296" fill="#5a5f63"/>
									  <path d="M370.56 344.4c0 7.696-6.224 13.92-13.92 13.92H155.36c-7.616 0-13.92-6.224-13.92-13.92s6.304-13.92 13.92-13.92h201.296c7.696.016 13.904 6.224 13.904 13.92z" fill="#3e4347"/>
									</svg>
									  <svg class="rating-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									  <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
									  <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
									  <path d="M328.4 428a92.8 92.8 0 0 0-145-.1 6.8 6.8 0 0 1-12-5.8 86.6 86.6 0 0 1 84.5-69 86.6 86.6 0 0 1 84.7 69.8c1.3 6.9-7.7 10.6-12.2 5.1z" fill="#3e4347"/>
									  <path d="M269.2 222.3c5.3 62.8 52 113.9 104.8 113.9 52.3 0 90.8-51.1 85.6-113.9-2-25-10.8-47.9-23.7-66.7-4.1-6.1-12.2-8-18.5-4.2a111.8 111.8 0 0 1-60.1 16.2c-22.8 0-42.1-5.6-57.8-14.8-6.8-4-15.4-1.5-18.9 5.4-9 18.2-13.2 40.3-11.4 64.1z" fill="#f4c534"/>
									  <path d="M357 189.5c25.8 0 47-7.1 63.7-18.7 10 14.6 17 32.1 18.7 51.6 4 49.6-26.1 89.7-67.5 89.7-41.6 0-78.4-40.1-82.5-89.7A95 95 0 0 1 298 174c16 9.7 35.6 15.5 59 15.5z" fill="#fff"/>
									  <path d="M396.2 246.1a38.5 38.5 0 0 1-38.7 38.6 38.5 38.5 0 0 1-38.6-38.6 38.6 38.6 0 1 1 77.3 0z" fill="#3e4347"/>
									  <path d="M380.4 241.1c-3.2 3.2-9.9 1.7-14.9-3.2-4.8-4.8-6.2-11.5-3-14.7 3.3-3.4 10-2 14.9 2.9 4.9 5 6.4 11.7 3 15z" fill="#fff"/>
									  <path d="M242.8 222.3c-5.3 62.8-52 113.9-104.8 113.9-52.3 0-90.8-51.1-85.6-113.9 2-25 10.8-47.9 23.7-66.7 4.1-6.1 12.2-8 18.5-4.2 16.2 10.1 36.2 16.2 60.1 16.2 22.8 0 42.1-5.6 57.8-14.8 6.8-4 15.4-1.5 18.9 5.4 9 18.2 13.2 40.3 11.4 64.1z" fill="#f4c534"/>
									  <path d="M155 189.5c-25.8 0-47-7.1-63.7-18.7-10 14.6-17 32.1-18.7 51.6-4 49.6 26.1 89.7 67.5 89.7 41.6 0 78.4-40.1 82.5-89.7A95 95 0 0 0 214 174c-16 9.7-35.6 15.5-59 15.5z" fill="#fff"/>
									  <path d="M115.8 246.1a38.5 38.5 0 0 0 38.7 38.6 38.5 38.5 0 0 0 38.6-38.6 38.6 38.6 0 1 0-77.3 0z" fill="#3e4347"/>
									  <path d="M131.6 241.1c3.2 3.2 9.9 1.7 14.9-3.2 4.8-4.8 6.2-11.5 3-14.7-3.3-3.4-10-2-14.9 2.9-4.9 5-6.4 11.7-3 15z" fill="#fff"/>
									</svg>
									  <svg class="rating-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									  <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
									  <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
									  <path d="M336.6 403.2c-6.5 8-16 10-25.5 5.2a117.6 117.6 0 0 0-110.2 0c-9.4 4.9-19 3.3-25.6-4.6-6.5-7.7-4.7-21.1 8.4-28 45.1-24 99.5-24 144.6 0 13 7 14.8 19.7 8.3 27.4z" fill="#3e4347"/>
									  <path d="M276.6 244.3a79.3 79.3 0 1 1 158.8 0 79.5 79.5 0 1 1-158.8 0z" fill="#fff"/>
									  <circle cx="340" cy="260.4" r="36.2" fill="#3e4347"/>
									  <g fill="#fff">
										<ellipse transform="rotate(-135 326.4 246.6)" cx="326.4" cy="246.6" rx="6.5" ry="10"/>
										<path d="M231.9 244.3a79.3 79.3 0 1 0-158.8 0 79.5 79.5 0 1 0 158.8 0z"/>
									  </g>
									  <circle cx="168.5" cy="260.4" r="36.2" fill="#3e4347"/>
									  <ellipse transform="rotate(-135 182.1 246.7)" cx="182.1" cy="246.7" rx="10" ry="6.5" fill="#fff"/>
									</svg>
									  <svg class="rating-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
								<circle cx="256" cy="256" r="256" fill="#ffd93b"/>
								<path d="M407.7 352.8a163.9 163.9 0 0 1-303.5 0c-2.3-5.5 1.5-12 7.5-13.2a780.8 780.8 0 0 1 288.4 0c6 1.2 9.9 7.7 7.6 13.2z" fill="#3e4347"/>
								<path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
								<g fill="#fff">
								  <path d="M115.3 339c18.2 29.6 75.1 32.8 143.1 32.8 67.1 0 124.2-3.2 143.2-31.6l-1.5-.6a780.6 780.6 0 0 0-284.8-.6z"/>
								  <ellipse cx="356.4" cy="205.3" rx="81.1" ry="81"/>
								</g>
								<ellipse cx="356.4" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
								<g fill="#fff">
								  <ellipse transform="scale(-1) rotate(45 454 -906)" cx="375.3" cy="188.1" rx="12" ry="8.1"/>
								  <ellipse cx="155.6" cy="205.3" rx="81.1" ry="81"/>
								</g>
								<ellipse cx="155.6" cy="205.3" rx="44.2" ry="44.2" fill="#3e4347"/>
								<ellipse transform="scale(-1) rotate(45 454 -421.3)" cx="174.5" cy="188" rx="12" ry="8.1" fill="#fff"/>
							  </svg>
									  <svg class="rating-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									  <circle cx="256" cy="256" r="256" fill="#ffd93b"/>
									  <path d="M512 256A256 256 0 0 1 56.7 416.7a256 256 0 0 0 360-360c58.1 47 95.3 118.8 95.3 199.3z" fill="#f4c534"/>
									  <path d="M232.3 201.3c0 49.2-74.3 94.2-74.3 94.2s-74.4-45-74.4-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
									  <path d="M96.1 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2C80.2 229.8 95.6 175.2 96 173.3z" fill="#d03f3f"/>
									  <path d="M215.2 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
									  <path d="M428.4 201.3c0 49.2-74.4 94.2-74.4 94.2s-74.3-45-74.3-94.2a38 38 0 0 1 74.4-11.1 38 38 0 0 1 74.3 11.1z" fill="#e24b4b"/>
									  <path d="M292.2 173.3a37.7 37.7 0 0 0-12.4 28c0 49.2 74.3 94.2 74.3 94.2-77.8-65.7-62.4-120.3-61.9-122.2z" fill="#d03f3f"/>
									  <path d="M411.3 200c-3.6 3-9.8 1-13.8-4.1-4.2-5.2-4.6-11.5-1.2-14.1 3.6-2.8 9.7-.7 13.9 4.4 4 5.2 4.6 11.4 1.1 13.8z" fill="#fff"/>
									  <path d="M381.7 374.1c-30.2 35.9-75.3 64.4-125.7 64.4s-95.4-28.5-125.8-64.2a17.6 17.6 0 0 1 16.5-28.7 627.7 627.7 0 0 0 218.7-.1c16.2-2.7 27 16.1 16.3 28.6z" fill="#3e4347"/>
									  <path d="M256 438.5c25.7 0 50-7.5 71.7-19.5-9-33.7-40.7-43.3-62.6-31.7-29.7 15.8-62.8-4.7-75.6 34.3 20.3 10.4 42.8 17 66.5 17z" fill="#e24b4b"/>
									</svg>
									  <svg class="rating-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
									  <g fill="#ffd93b">
										<circle cx="256" cy="256" r="256"/>
										<path d="M512 256A256 256 0 0 1 56.8 416.7a256 256 0 0 0 360-360c58 47 95.2 118.8 95.2 199.3z"/>
									  </g>
									  <path d="M512 99.4v165.1c0 11-8.9 19.9-19.7 19.9h-187c-13 0-23.5-10.5-23.5-23.5v-21.3c0-12.9-8.9-24.8-21.6-26.7-16.2-2.5-30 10-30 25.5V261c0 13-10.5 23.5-23.5 23.5h-187A19.7 19.7 0 0 1 0 264.7V99.4c0-10.9 8.8-19.7 19.7-19.7h472.6c10.8 0 19.7 8.7 19.7 19.7z" fill="#e9eff4"/>
									  <path d="M204.6 138v88.2a23 23 0 0 1-23 23H58.2a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#45cbea"/>
									  <path d="M476.9 138v88.2a23 23 0 0 1-23 23H330.3a23 23 0 0 1-23-23v-88.3a23 23 0 0 1 23-23h123.4a23 23 0 0 1 23 23z" fill="#e84d88"/>
									  <g fill="#38c0dc">
										<path d="M95.2 114.9l-60 60v15.2l75.2-75.2zM123.3 114.9L35.1 203v23.2c0 1.8.3 3.7.7 5.4l116.8-116.7h-29.3z"/>
									  </g>
									  <g fill="#d23f77">
										<path d="M373.3 114.9l-66 66V196l81.3-81.2zM401.5 114.9l-94.1 94v17.3c0 3.5.8 6.8 2.2 9.8l121.1-121.1h-29.2z"/>
									  </g>
									  <path d="M329.5 395.2c0 44.7-33 81-73.4 81-40.7 0-73.5-36.3-73.5-81s32.8-81 73.5-81c40.5 0 73.4 36.3 73.4 81z" fill="#3e4347"/>
									  <path d="M256 476.2a70 70 0 0 0 53.3-25.5 34.6 34.6 0 0 0-58-25 34.4 34.4 0 0 0-47.8 26 69.9 69.9 0 0 0 52.6 24.5z" fill="#e24b4b"/>
									  <path d="M290.3 434.8c-1 3.4-5.8 5.2-11 3.9s-8.4-5.1-7.4-8.7c.8-3.3 5.7-5 10.7-3.8 5.1 1.4 8.5 5.3 7.7 8.6z" fill="#fff" opacity=".2"/>
									</svg>
									</div>
								  </div>
								</div>
							  </div>
							  
							</div>
						<?php endif; ?>
						</div>	
					</div>
					<?php endwhile; ?>
				</div>
				
	
    
    <?php 
    $hid=""; $bid="";
            
            if($_GET['id'] == 10 ){
                
           
        
                $hid = "hidden";
                
            }else{
                
            
    
            $bid = "hidden";
            }
    ?>
    
    
   

				<div class="">
					<div class="d-flex w-100 justify-content-center">
    						<button class="btn btn-sm btn-flat btn-outline-primary mx-1" name="save_select"  form="manage-survey" <?php echo $hid; ?> >Confirmer</button>
					</div>
				</div>
			<br>

				<style>
				
				    .Click-here {
  cursor: pointer;
 
}

.custom-model-main {
  text-align: center;
  overflow: hidden;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0; /* z-index: 1050; */
  -webkit-overflow-scrolling: touch;
  outline: 0;
  opacity: 0;
  -webkit-transition: opacity 0.15s linear, z-index 0.15;
  -o-transition: opacity 0.15s linear, z-index 0.15;
  transition: opacity 0.15s linear, z-index 0.15;
  z-index: -1;
  overflow-x: hidden;
  overflow-y: auto;
}


.custom-model-prime {
  text-align: center;
  overflow: hidden;
  position: fixed;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0; /* z-index: 1050; */
  -webkit-overflow-scrolling: touch;
  outline: 0;
  opacity: 0;
  -webkit-transition: opacity 0.15s linear, z-index 0.15;
  -o-transition: opacity 0.15s linear, z-index 0.15;
  transition: opacity 0.15s linear, z-index 0.15;
  z-index: -1;
  overflow-x: hidden;
  overflow-y: auto;
}

.model-open {
  z-index: 99999;
  opacity: 1;
  overflow: hidden;
}
.custom-model-inner {
  -webkit-transform: translate(0, -25%);
  -ms-transform: translate(0, -25%);
  transform: translate(0, -25%);
  -webkit-transition: -webkit-transform 0.3s ease-out;
  -o-transition: -o-transform 0.3s ease-out;
  transition: -webkit-transform 0.3s ease-out;
  -o-transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out;
  transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
  display: inline-block;
  vertical-align: middle;
  width: 600px;
  margin: 30px auto;
  max-width: 97%;
}
.custom-model-wrap {
  display: block;
  width: 100%;
  position: relative;
  background-color: #fff;
  border: 1px solid #999;
  border: 1px solid rgba(0, 0, 0, 0.2);

  -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
  background-clip: padding-box;
  outline: 0;
  text-align: left;
  padding: 20px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  max-height: calc(100vh - 70px);
	overflow-y: auto;
}
.model-open .custom-model-inner {
  -webkit-transform: translate(0, 0);
  -ms-transform: translate(0, 0);
  transform: translate(0, 0);
  position: relative;
  z-index: 999;
}
.model-open .bg-overlay {
  background: rgba(0, 0, 0, 0.6);
  z-index: 99;
}
.bg-overlay {
  background: rgba(0, 0, 0, 0);
  height: 100vh;
  width: 100%;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 0;
  -webkit-transition: background 0.15s linear;
  -o-transition: background 0.15s linear;
  transition: background 0.15s linear;
}

.bg-overlat {
  background: rgba(0, 0, 0, 0);
  height: 100vh;
  width: 100%;
  position: fixed;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: 0;
  -webkit-transition: background 0.15s linear;
  -o-transition: background 0.15s linear;
  transition: background 0.15s linear;
}

.close-button{
   
     
   
     
     color:white;
}

.donn{
   
     float:right;
}

@media screen and (min-width:800px){
	.custom-model-main:before {
	  content: "";
	  display: inline-block;
	  height: auto;
	  vertical-align: middle;
	  margin-right: -0px;
	  height: 100%;
	}
}
@media screen and (max-width:799px){
  .custom-model-inner{margin-top: 45px;}
}
ul{
    list-style: none;
}


				</style>
					<div class="">
					<div class="d-flex w-100 justify-content-center">
				<button class="Click-here btn btn-sm btn-flat btn-outline-primary mx-1" name="save_select"  form="manage-survey" <?php echo $bid; ?>>Valider</button>   
				
				</div>
								</div>

<div class="custom-model-main" style="text-align: center;">
    <div class="custom-model-inner">   <button type="button" class="btn btn-danger donn"> <a class="close-button" href="thanks.php">×</a></button>
       
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
               <div class='modal-content'>
<div class='modal-header' id='modal-header'>
<div id='message'>
    
<h4 class="messgae">S'il vous plait, prenez quelques instants pour partager votre expérience sur ces sites d'évaluation, "veuillez cliquer".</h4>
</div>
</div>
<div class='modal-body'>
<div id='highlights'>
<?php 
					$rev = $conn->query("SELECT grl, frl, tpv FROM users where id = '".$us."' ");
					while($row=$rev->fetch_assoc()):

                        if(empty($row['grl']) && empty($row['frl']) && empty($row['tpv'])){
                          echo '<h1 style="color:green;">Merci Pour Votre Réponse</h1> <style> .messgae{display:none !important; }</style>';
                        }
                        
					?>
					
					
					
      <div class="highlight">
          
          
        <ul>
            
        <style>   a[href=""] {
  display: none;
}
</style> 
          <li class="google">
            <a href="<?php echo $row['grl']; ?>">
  <img src="google-logo.png" alt="HTML tutorial" style="width:30%;height:18%;">
        </a>
          </li>
          <li class="facebook">
            <a href="<?php  echo $row['frl']; ?>">
  <img src="Facebook-Logo.png" alt="HTML tutorial" style="width:30%;height:18%;">
        </a>
          </li>
          <li class="Trip">
            <a href="<?php  echo $row['tpv']; ?>">
  <img src="Tripadvisor-Logo.png" alt="HTML tutorial" style="width:30%;height:18%;">
        </a>
          </li>
        </ul>
      </div>
      
      
<?php endwhile; ?>

</div>

</div>

</div>
            </div>
        </div>  
    </div>  
    <div class="bg-overlay"></div>
</div> 








<div class="custom-model-prime">
    <div class="custom-model-inner">        
<button type="button" class="btn btn-danger donn"> <a class="close-button" href="thanks.php">×</a></button>        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
               <div class='modal-content'>

<center>
    <div class="lab">Nous nous efforçons de satisfaction client de 100%. Si nous sommes tombés à court, s'il vous plaît nous dire comment nous pouvons donc faire amende honorable.
</div>

<script>
 
</script>
<style>
    
 
.container {
  max-width: 400px;
  width: 100%;
  margin: 0 auto;
  position: relative;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea,
#contact button[type="submit"] {
  font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
}

#contact {
  background: #F9F9F9;
  padding: 25px;
  margin:  0;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}

#contact h3 {
  display: block;
  font-size: 30px;
  font-weight: 300;
  margin-bottom: 10px;
}

#contact h4 {
  margin: 5px 0 15px;
  display: block;
  font-size: 13px;
  font-weight: 400;
}

fieldset {
  border: medium none !important;
  margin: 0 0 10px;
  min-width: 100%;
  padding: 0;
  width: 100%;
}

#contact input[type="text"],
#contact input[type="email"],
#contact input[type="tel"],
#contact input[type="url"],
#contact textarea {
  width: 100%;
  border: 1px solid #ccc;
  background: #FFF;
  margin: 0 0 5px;
  padding: 10px;
}

#contact input[type="text"]:hover,
#contact input[type="email"]:hover,
#contact input[type="tel"]:hover,
#contact input[type="url"]:hover,
#contact textarea:hover {
  -webkit-transition: border-color 0.3s ease-in-out;
  -moz-transition: border-color 0.3s ease-in-out;
  transition: border-color 0.3s ease-in-out;
  border: 1px solid #aaa;
}

#contact textarea {
  height: 100px;
  max-width: 100%;
  resize: none;
}

#contact button[type="submit"] {
  cursor: pointer;
  width: 100%;
  border: none;
  background: #4CAF50;
  color: #FFF;
  margin: 0 0 5px;
  padding: 10px;
  font-size: 15px;
}

#contact button[type="submit"]:hover {
  background: #43A047;
  -webkit-transition: background 0.3s ease-in-out;
  -moz-transition: background 0.3s ease-in-out;
  transition: background-color 0.3s ease-in-out;
}

#contact button[type="submit"]:active {
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
}

.copyright {
  text-align: center;
}

#contact input:focus,
#contact textarea:focus {
  outline: 0;
  border: 1px solid #aaa;
}

::-webkit-input-placeholder {
  color: #888;
}

:-moz-placeholder {
  color: #888;
}

::-moz-placeholder {
  color: #888;
}

:-ms-input-placeholder {
  color: #888;
}

</style>


<form class="myForm" action="chatter.php" id="contact" method="post" >

			<div class="form-group">
			<label for="name" class = "lab">Nom Complet</label>
        <input type="text" name="name" id="name" placeholder="Nom et Prénom" tabindex="1"  minlength="3" maxlength="25" class="inp" />
      </div>
			
			<div class="form-group">
        <label for="email" class = "lab">Email</label>
        <input type="email" name="email" id="email" placeholder="email@exemple.com" tabindex="2" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="inp"   />
      </div>


<div class="form-group">
			<label for="name" class = "lab">Téléphone</label>
        <input type="text" name="subject" id="name" placeholder="téléphone" tabindex="3" minlength="10" maxlength="13" class="inp" />
      </div>
			
			<input name="user" type="text" value="<?php echo $_GET['usid'] ?>" hidden>

			
			<div class="form-group">
        <label for="message" class = "lab">Message</label>
        <textarea name="mess" id="message" rows="5" placeholder="écrire votre message ici...." class="inp"></textarea>
      </div>
        
			   
			    
		<div class="form-group">
        <button type="submit" class="submite" name="submit"><i class="far fa-paper-plane"></i>Envoyer</button>
      </div>

    </form>
    	</center>
</div>
            </div>
        </div>  
    </div>  
    <div class="bg-overlat"></div>
</div> 
<?php  $qes = $conn->query("SELECT email FROM users where id = '".$us."' ");
					while($row=$qes->fetch_assoc()):
					   
					?>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



<?php endwhile; ?>



			
				</form>
					<script>
	var currentValue = 0;
	
	
function handleClick(answer) {
  
    currentValue = answer.value;
    console.log(answer.value);
    
      let arry = currentValue;
let lastElement = arry[arry.length - 1];

console.log(lastElement);
   if(lastElement == 1 ){
       
  $(".Click-here").on('click', function() {
  $(".custom-model-main").addClass('model-open');
}); 
$(".close-button, .bg-overlay").click(function(){
  $(".custom-model-main").addClass('model-open');
});

  $(".Click-here").on('click', function() {
 $(".custom-model-prime").removeClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-prime").removeClass('model-open');
});

   }else if(lastElement == 2){
        $(".Click-here").on('click', function() {
 $(".custom-model-main").addClass('model-open');
}); 
$(".close-button, .bg-overlay").click(function(){
 $(".custom-model-main").addClass('model-open');
});

 $(".Click-here").on('click', function() {
 $(".custom-model-prime").removeClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-prime").removeClass('model-open');
});

   }else if(lastElement == 3){
       $(".Click-here").on('click', function() {
 $(".custom-model-prime").addClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-prime").addClass('model-open');
});

 $(".Click-here").on('click', function() {
 $(".custom-model-main").removeClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-main").removeClass('model-open');
});


   }else if(lastElement == 4){
        $(".Click-here").on('click', function() {
 $(".custom-model-prime").addClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-prime").addClass('model-open');
});

 $(".Click-here").on('click', function() {
 $(".custom-model-main").removeClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-main").removeClass('model-open');
});
   }else if(lastElement == 5){
        $(".Click-here").on('click', function() {
 $(".custom-model-prime").addClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-prime").addClass('model-open');
});
 $(".Click-here").on('click', function() {
 $(".custom-model-main").removeClass('model-open');
}); 
$(".close-button, .bg-overlat").click(function(){
 $(".custom-model-main").removeClass('model-open');
});
   }else{
       
        $(".Click-here").on('click', function() {
}); 
$(".close-button, .bg-overlay").click(function(){
});
       
   }
}
			</script>
			
		</div>
	</div>

	


</div>

<?php 

$ids = $_GET['id'];
if($ids != 10):
    ?>
<script>
	$('#manage-survey').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_answer',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				
					
					setTimeout(function(){
						location.href = 'thanks.php'
					},2000)
				
			}
		})
	})
</script>

<?php 
else:
    ?>


<script>
	$('#manage-survey').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_answer',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				
			}
		})
	})
</script>

<?php 
endif;
    ?>

        <style>
        
    .goog-te-banner {display: none;}
    
    
    .goog-logo-link {display: none;}
    #text {display: none;}
    .goog-te-gadget-simple{float: right;margin-bottom:5%;}
</style>
<!-- Translation Code here -->
					
					
					<style>
					
.goog-te-gadget-icon {
    display:none;
    
}
					</style>
					<!-- Translation Code End here -->
