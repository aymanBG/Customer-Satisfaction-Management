<?php include 'db_connect.php' ?>
<?php 
$qry = $conn->query("SELECT * FROM survey_set where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	if($k == 'title')
		$k = 'stitle';
	$$k = $v;
}
$taken = $conn->query("SELECT distinct(user_id) from answers where survey_id ={$id} and user_id = {$_SESSION['login_id']}")->num_rows;
$answers = $conn->query("SELECT a.*,q.type from answers a inner join questions q on q.id = a.question_id where a.survey_id ={$id} and a.user_id = {$_SESSION['login_id']}");
$ans = array();

while($row=$answers->fetch_assoc()){
	if($row['type'] == 'radio_opt'){
		$ans[$row['question_id']][$row['answer']][] = 1;
	}
	if($row['type'] == 'check_opt'){
		foreach(explode(",", str_replace(array("[","]"), '', $row['answer'])) as $v){
		$ans[$row['question_id']][$v][] = 1;
		}
	}
	if($row['type'] == 'textfield_s'){
		$ans[$row['question_id']][] = $row['answer'];
	}
}
?>
<style>
	.tfield-area{
		max-height: 30vh;
		overflow: auto;
	},

	.progress {
  margin-bottom: 20px;
}

.progress-bar {
  width: 0;
}

.bg-purple {
  background-color: #825CD6 !important;
}

.progress .progress-bar {
  transition: unset;
}

</style>
<div class="col-lg-12">
	<div class="row">
		
		<div class="col-md-8">
			<div class="card card-outline card-success">
				<div class="card-header">
					<h3 class="card-title"><b>Rapport</b></h3>
					<div class="card-tools">
						<button class="btn btn-outline-primary" type="button" id="print"><i class="fa fa-print"></i> Print</button>
					</div>
				</div>
				<div class="card-body ui-sortable">
					<?php 
					$question = $conn->query("SELECT * FROM questions where survey_id = $id order by abs(order_by) asc,abs(id) asc");
					while($row=$question->fetch_assoc()):	
					?>
					<div class="callout callout-info">
						<h5><?php echo $row['question'] ?></h5>	
						<div class="col-md-12">
						<input type="hidden" name="qid[<?php echo $row['id'] ?>]" value="<?php echo $row['id'] ?>">	
						<input type="hidden" name="type[<?php echo $row['id'] ?>]" value="<?php echo $row['type'] ?>">	
							
							<?php if($row['type'] != 'textfield_s'):?>
								<ul>
							<?php foreach(json_decode($row['frm_option']) as $k => $v): 
								$prog = ((isset($ans[$row['id']][$k]) ? count($ans[$row['id']][$k]) : 0) / $taken) * 100;
								$prog = round($prog,2);
								
								?>
								<li>
									<div class="d-inline w-100">
										<b> <?php echo "&".$v ?></b>
									</div>
									<div class="d-flex w-100">
									<span class=""><?php echo isset($ans[$row['id']][$k]) ? count($ans[$row['id']][$k]) : 0 ?>/<?php echo $taken ?></span>
									<div class="mx-1 col-sm-8">
									<div class="progress border w-100" >
									<div class="progress-bar progress-bar progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $prog ?>" aria-valuemin="0" aria-valuemax="100" style="">
					                 <?php echo $prog;
									  ?>

					                  </div>
					                </div>
					                </div>
					                <span class="badge badge-pill badge-light"><?php echo $prog ?>%</span>
									</div>
								</li>
								<?php endforeach;
								
								?>

								</ul>
						<?php else: ?>
					
					
					<?php 
					
					$usid = $_GET['usid'];
					$tot = $conn->query("SELECT a.survey_id, q.frm_option, a.user_id, a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '".$usid."'  ORDER BY user_id desc")->num_rows;
                    $rst = $conn->query("SELECT a.survey_id,a.question_id, q.frm_option, a.user_id,COUNT(a.answer) as t,a.answer from answers as a, questions as q where a.question_id = q.id and a.survey_id = 10 and a.user_id = '".$usid."' GROUP by a.answer");
                    $ans = array();
                    $sp = 0;
                    $sr = 0;
                    $sd = 0;

                    while($row=$rst->fetch_assoc()):
                        $ans[$row['question_id']][$row['answer']][] = 1;
                    
                    
                    $d = array(1,2,3);


$p = array(4,5);



if(in_array($row['answer'],$d)){


$calc = ($row['t'] / $tot) * 100; $sd+=$calc;  


}elseif(in_array($row['answer'],$p)){

$calc = ($row['t'] / $tot) * 100; $sp+=$calc;
}


                    ?>
                    	<?php endwhile;?>
                    	<style>
                    	    .datee { float:right }
     img {
        
                width:12%;

    }
                    	</style>
							<h1><img src="img/grp2.png"/>  positive <span class="border border-success datee">  <?php echo (($sp / 100) * $tot) ?>  </span><h1>
                                            <hr>
                            <h1><img src="img/grp1.png"/>  negative <span class="border border-danger datee">  <?php echo (($sd / 100) * $tot) ?>  </span><h1>
                                                                           

								
								
							
								
							</div>
						<?php endif; ?>
						</div>
					</div>
					<?php endwhile;
					 ?>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$('#manage-survey').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_answer',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp == 1){
					alert_toast("Thank You.",'success')
					setTimeout(function(){
						location.href = 'index.php?page=survey_widget'
					},2000)
				}
			}
		})
	})
	$('#print').click(function(){
		start_load()
		var nw = window.open("print_report.php?id=<?php echo $id ?>","_blank","width=800,height=600")
			nw.print()
			setTimeout(function(){
				nw.close()
				end_load()
			},2500)
	})
</script>


<script>
var delay = 500;
$(".progress-bar").each(function(i) {
  $(this).delay(delay * i).animate({
    width: $(this).attr('aria-valuenow') + '%'
  }, delay);

  $(this).prop('Counter', 0).animate({
    Counter: $(this).text()
  }, {
    duration: delay,
    // easing: 'swing',
    step: function(now) {
      $(this).text(Math.ceil(now) + '%');
    }
  });
});

  </script>