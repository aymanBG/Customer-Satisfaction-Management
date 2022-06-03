<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$qry = $conn->query("SELECT * FROM questions where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<meta charset="UTF-8">
<style>
	
	</style>
	
<style>

.hoja{
		width:50%;
	}
	* { box-sizing: border-box; }

.container {
  display: flex;
  flex-wrap: wrap;
  height: 100vh;
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
  padding: 30px;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  box-shadow: 0 4px 30px rgba(0,0,0,.05);
}

</style>
<div class="container-fluid">
	<form action="" id="manage-question">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-sm-6 border-right">
						<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
						<input type="hidden" name="sid" value="<?php echo isset($_GET['sid']) ? $_GET['sid'] : '' ?>">
						<div class="form-group">
							<label for="" class="control-label">Question</label>
							<textarea name="question" id="" cols="30" rows="4" class="form-control"><?php echo isset($question)? $question: '' ?></textarea>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Question Answer Type</label>
							<select name="type" id="type" class="custom-select custom-select-sm">
								<?php if(isset($id)): ?>
								<option value="" disabled="" selected="">Please Select here</option>
								<?php endif; ?>
								<option value="radio_opt" <?php echo isset($type) && $type == 'radio_opt' ? 'selected':'' ?>>Single Answer/Radio Button</option>
								<option value="check_opt" <?php echo isset($type) && $type == 'check_opt' ? 'selected':'' ?>>Multiple Answer/Check Boxes</option>
								<option value="textfield_s" <?php echo isset($type) && $type == 'textfield_s' ? 'selected':'' ?>>Text Field/ Text Area</option>
							</select>
						</div>
						
				</div>
				<div class="col-sm-6">
					<b>Preview</b>
					<div class="preview">
						<?php if(!isset($id)): ?>
						<center><b>Select Question Answer type first.</b></center>
						<?php else: ?>
							<div class="callout callout-info">
							<?php if($type != 'textfield_s'): 
								$opt= $type =='radio_opt' ? 'radio': 'checkbox';
							?>
						      <table width="100%" class="table">
						      	<colgroup>
						      		<col width="10%">
						      		<col width="80%">
						      		<col width="10%">
						      	</colgroup>
						      	<thead>
							      	<tr class="">
								      	<th class="text-center"></th>

								      	<th class="text-center">
								      		<label for="" class="control-label">Label</label>
								      	</th>
								      	<th class="text-center"></th>
							     	</tr>
						     	</thead>
						     	<tbody>
						     		<?php  
						     		$i = 0;
						     		foreach(json_decode($frm_option) as $k => $v):
						     			$i++;
						     		?>
						     		<tr class="">
								      	<td class="text-center">
								      		<div class="icheck-primary d-inline" data-count = '<?php echo $i ?>'>
									        	<input type="<?php echo $opt ?>" id="<?php echo $opt ?>Primary<?php echo $i ?>" name="<?php echo $opt ?>" checked="">
									        	<label for="<?php echo $opt ?>Primary<?php echo $i ?>">
									        	</label>
									        </div>
								      	</td>

								      	<td class="text-center">
								      		<input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="<?php echo $v ?>">
								      	</td>
								      	<td class="text-center"></td>
							     	</tr>
						     		<?php  endforeach; ?>

						     	</tbody>
						      </table>
						      <div class="row">
						      <div class="col-sm-12 text-center">
						      	<button class="btn btn-sm btn-flat btn-default" type="button" onclick="<?php echo $type ?>($(this))"><i class="fa fa-plus"></i> Add</button>
						      </div>
						      </div>
						    </div>
						</div>

						<?php else: ?>
								<textarea name="frm_opt" id="" cols="30" rows="10" class="form-control" disabled="" placeholder="Write Something here..."></textarea>
						<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
<div id="check_opt_clone"  style="display: none">
	<div class="callout callout-info">
      <table width="100%" class="table">
      	<colgroup>
      		<col width="10%">
      		<col width="80%">
      		<col width="10%">
      	</colgroup>
      	<thead>
	      	<tr class="">
		      	<th class="text-center"></th>

		      	<th class="text-center">
				  
		      		<label for="" class="control-label">Label</label>
		      	</th>
		      	<th class="text-center"></th>
	     	</tr>
     	</thead>
     	<tbody>
     		<tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '1'>
			        	<input type="checkbox" id="checkboxPrimary1" checked="">
			        	<label for="checkboxPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" class="form-control form-control-sm check_inp" name="label[]" >
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
	     	<tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '2'>
			        	<input type="checkbox" id="checkboxPrimary2" >
			        	<label for="checkboxPrimary2">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" class="form-control form-control-sm check_inp" name="label[]">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
     	</tbody>
      </table>
      <div class="row">
      <div class="col-sm-12 text-center">
      	<button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_check($(this))"><i class="fa fa-plus"></i> Add</button>
      </div>
      </div>
    </div>
</div>
<div id="radio_opt_clone" style="display: none">
	<div class="callout callout-info">
      <table width="100%" class="table">
      	<colgroup>
      		<col width="10%">
      		<col width="80%">
      		<col width="10%">
      	</colgroup>
      	<thead>
	      	<tr class="">
		      	<th class="text-center"></th>

		      	<th class="text-center">
		      		<label for="" class="control-label">Label</label>
		      	</th>
		      	<th class="text-center"></th>
	     	</tr>
     	</thead>
     	<tbody>
     		<tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '1'>
			        	<input type="radio" size="32" id="radioPrimary1" class="hoja" name="radio" checked="" value="#128545">
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

				
				  
		      	<td class="text-center">  
				  <input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="#128544">
						
		      	</td>
				
		      	<td class="text-center"></td>
	     	</tr>
			 <tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '2'>
			        	<input type="radio" id="radioPrimary2" name="radio" >
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="#128548">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
			 <tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '3'>
			        	<input type="radio" id="radioPrimary1" name="radio" >
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
		      		<input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="#128528">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
			 <tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '4'>
			        	<input type="radio" id="radioPrimary1" name="radio" >
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
				<input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="#128522">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
			 <tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '5'>
			        	<input type="radio" id="radioPrimary1" name="radio" >
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
				<input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="#128515">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
			 <tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '6'>
			        	<input type="radio" id="radioPrimary1" name="radio" >
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
				<input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="#128519;">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
			 <tr class="">
		      	<td class="text-center">
		      		<div class="icheck-primary d-inline" data-count = '7'>
			        	<input type="radio" id="radioPrimary1" name="radio" >
			        	<label for="radioPrimary1">
			        	</label>
			        </div>
		      	</td>

		      	<td class="text-center">
				<input type="text" size="32" class="form-control form-control-sm check_inp"  name="label[]" value="#128525;">
		      	</td>
		      	<td class="text-center"></td>
	     	</tr>
			 
			
     	</tbody>
      </table>
      <div class="row">
      <div class="col-sm-12 text-center">
      	<button class="btn btn-sm btn-flat btn-default" type="button" onclick="new_radio($(this))"><i class="fa fa-plus"></i> Add</button>
      </div>
      </div>
    </div>
</div>



<div id="textfield_s_clone" style="display: none">
	<div class="callout callout-info">


<div class="container">
  <div class="feedback">
    <div class="rating">
      <input type="radio" name="labe" id="rating-5" value = "1">
      <label for="rating-5"></label>
      <input type="radio" name="labe" id="rating-4" value = "1">
      <label for="rating-4"></label>
      <input type="radio" name="labe" id="rating-3" value = "1">
      <label for="rating-3"></label>
      <input type="radio" name="labe" id="rating-2" value = "1">
      <label for="rating-2"></label>
      <input type="radio" name="labe" id="rating-1" value = "1">
      <label for="rating-1"></label>

    </div>
  </div>
</div>
	</div>
</div>
<script>
	function new_check(_this){
		var tbody=_this.closest('.row').siblings('table').find('tbody')
		var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
			count++;
		console.log(count)
		var opt = '';
			opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input type="checkbox" id="checkboxPrimary'+count+'"><label for="checkboxPrimary'+count+'"> </label></div></td>';
			opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
			opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
		var tr = $('<tr></tr>')
		tr.append(opt)
		tbody.append(tr)
	}
	function new_radio(_this){
		var tbody=_this.closest('.row').siblings('table').find('tbody')
		var count = tbody.find('tr').last().find('.icheck-primary').attr('data-count')
			count++;
		console.log(count)
		var opt = '';
			opt +='<td class="text-center pt-1"><div class="icheck-primary d-inline" data-count = "'+count+'"><input type="radio" id="radioPrimary'+count+'" name="radio"><label for="radioPrimary'+count+'"> </label></div></td>';
			opt +='<td class="text-center"><input type="text" class="form-control form-control-sm check_inp" name="label[]"></td>';
			opt +='<td class="text-center"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove()"><span class="fa fa-times" ></span></a></td>';
		var tr = $('<tr></tr>')
		tr.append(opt)
		tbody.append(tr)
	}
	function check_opt(){
		var check_opt_clone = $('#check_opt_clone').clone()
		$('.preview').html(check_opt_clone.html())
	}
	function radio_opt(){
		var radio_opt_clone = $('#radio_opt_clone').clone()
		$('.preview').html(radio_opt_clone.html())
	}
	function textfield_s(){
		var textfield_s_clone = $('#textfield_s_clone').clone()
		$('.preview').html(textfield_s_clone.html())
	}
	$('[name="type"]').change(function(){
		window[$(this).val()]()
	})
	$(function () {
	$('#manage-question').submit(function(e){
		e.preventDefault()
		start_load()
		// $('#msg').html('')
		$.ajax({
			url:'ajax.php?action=save_question',
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
						location.reload()
					},1500)
				}
			}
		})
	})

  })
</script>