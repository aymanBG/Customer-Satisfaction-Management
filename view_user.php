<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$type_arr = array('',"Admin","Client","");
	$qry = $conn->query("SELECT * FROM users where id = ".$_GET['id'])->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<link href="pj/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="pj/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />


	<table id="basic-datatable" class="table dt-responsive nowrap w-100">
		<tr>
			<th>Prénom:</th>
			<td><b><?php echo ucwords($firstname) ?></b></td>
		</tr>
		<tr>
			<th>Nom:</th>
			<td><b><?php echo ucwords($lastname) ?></b></td>
		</tr>
		<tr>
			<th>Entreprise:</th>
			<td><b><?php echo ucwords($middlename) ?></b></td>
		</tr>
		<tr>
			<th>Email:</th>
			<td><b><?php echo $email ?></b></td>
		</tr>
		<tr>
			<th>Contact:</th>
			<td><b><?php echo $contact ?></b></td>
		</tr>
		<tr>
			<th>Address:</th>
			<td><b><?php echo $address ?></b></td>
		</tr>
		<tr>
			<th>Role:</th>
			<td><b><?php echo $type_arr[$type] ?></b></td>
		</tr>
	</table>
</div>
<div class="modal-footer display p-0 m-0">
        <button type="button" class="btn btn-secondary" onClick="window.location.reload();" data-dismiss="modal">Close</button>
</div>
<script src="pj/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="pj/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="pj/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="pj/assets/js/vendor/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="assets/js/pages/demo.datatable-init.js"></script>
<style>
	#uni_modal .modal-footer{
		display: none
	}
	#uni_modal .modal-footer.display{
		display: flex
	}
</style>