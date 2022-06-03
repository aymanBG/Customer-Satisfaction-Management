<?php include 'db_connect.php' ?>
<link href="pj/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="pj/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
			<div style="position:relative;">
				<a class="btn primary" style="color:#2E67F8;text-align:center;" href="./index.php?page=new_survey"><i class="fa fa-plus"></i> Add New Survey</a>
			</div>
		
<style>
table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #5C5CFF; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}

    @media 
only screen and (max-width: 700px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

	/* Force table to not be like tables anymore */
	table, thead, tbody, th, td, tr { 
		display: block; 
	}
	
	/* Hide table headers (but not display: none;, for accessibility) */
	thead tr { 
		position: absolute;
		top: -9999px;
		left: -9999px;
	}
	
	tr { border: 1px solid #ccc; }
	
	td { 
		/* Behave  like a "row" */
		border: none;
		border-bottom: 1px solid #eee; 
		position: relative;
		padding-left: 40%; 
	}
	
	td:before { 
		/* Now like a table header */
		position: absolute;
		/* Top/left values mimic padding */
		top: 6px;
		left: 6px;
		width: 45%; 
		margin-right: 10px; 
		white-space: nowrap;
	}
	
	/*
	Label the data
	*/
	td:nth-of-type(1):before { content: "Titre"; }
	td:nth-of-type(2):before { content: "Description"; }
	td:nth-of-type(3):before { content: "Date D"; }
	td:nth-of-type(4):before { content: "Date F"; }
}
</style>

	<table id="basic-datatable" class="">
				<colgroup>
					<col width="5%">
					<col width="5%">
					<col width="10%">
					<col width="10%">
					<col width="10%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class=""></th>
						<th>Titre</th>
						<th>Description</th>
						<th>Date de Debut</th>
						<th>Date de Fin</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM survey_set order by date(start_date) asc,date(end_date) asc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['title']) ?></b></td>
						<td><b class="truncate"><?php echo $row['description'] ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['start_date'])) ?></b></td>
						<td><b><?php echo date("M d, Y",strtotime($row['end_date'])) ?></b></td>
						<td class="text-center">
							<!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		                      Action
		                    </button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item" href="./index.php?page=edit_survey&id=<?php echo $row['id'] ?>">Edit</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_survey" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Delete</a>
		                    </div> -->
		                    <div class="btn-group">
		                        <a href="./index.php?page=edit_survey&id=<?php echo $row['id'] ?>" class="btn btn-outline-dark btn-flat">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <a  href="./index.php?page=view_survey&id=<?php echo $row['id'] ?>" class="btn btn-outline-primary btn-flat">
		                          <i class="fas fa-eye"></i>
		                        </a>
		                        <button type="button" class="btn btn-outline-danger btn-flat delete_survey" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			<script src="pj/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="pj/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="pj/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="pj/assets/js/vendor/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="assets/js/pages/demo.datatable-init.js"></script>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.delete_survey').click(function(){
	_conf("Are you sure to delete this survey?","delete_survey",[$(this).attr('data-id')])
	})
	})
	function delete_survey($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_survey',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>