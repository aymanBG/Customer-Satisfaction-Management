<?php include 'db_connect.php' ?>
<link href="pj/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
<link href="pj/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
				<div style="position:relative;">
				<a class="btn primary" style="color:#2E67F8;text-align:center;" href="./index.php?page=new_user"><i class="fa fa-plus"></i>Ajouter utilisateur</a>
				</div>
				<div  class="d-flex justify-content-center" >
    
	<input type="text"id="myInput"   onkeyup="myFunction()" placeholder="Chercher.." title="Type in a name" >
</div>
			
		
<style>
table { 
  width: 100% important; 
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
		padding-left: 30%; 
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
	td:nth-of-type(1):before { content: "Prénom"; }
	td:nth-of-type(2):before { content: "Nom"; }
	td:nth-of-type(3):before { content: "Entreprise"; }
	td:nth-of-type(4):before { content: "Téléphone"; }
	td:nth-of-type(5):before { content: "Note"; }
	td:nth-of-type(6):before { content: "Questionnaire"; }
	td:nth-of-type(7):before { content: "E-mail"; }
}


.next{
    display:none;
}

.previous{
    display:none;
}
</style>
<style>
    table {
      width: 40em;
      margin: 2em auto;
    }
    
    thead {
      background: #5C5CFF;
      color: #fff;
    }
    
    td {
      width: 10em;
      padding: 0.3em;
    }
    
    tbody {
      background: #ccc;
    }
    
    div.pager {
      text-align: center;
      margin: 1em 0;
    }
    
    div.pager span {
      display: inline-block;
      width: 1.8em;
      height: 1.8em;
      line-height: 1.8;
      text-align: center;
      cursor: pointer;
      background: #5C5CFF;
      color: #fff;
      margin-right: 0.5em;
    }
    
    div.pager span.active {
      background: #5C5CFF;
    }
  
</style>



	<table id="tab" class="paginated" style="width:100%"> 
				<thead >
					<tr>
						<th class=""></th>
						<th scope="col" class="sort">Prénom</th>
						<th scope="col" class="sort">Nom</th>
						<th scope="col" class="sort">Entreprise</th>
						<th scope="col" class="sort">Téléphone</th>
						<th scope="col" class="sort">Note</th>
						<th scope="col" class="sort">Questionnaire</th>
						<th scope="col" class="sort">E-mail</th>
						<th scope="col" class="sort">Action</th>
					</tr>
				</thead>
				<tbody id="">
					<?php
					$i = 1;
					$type = array('',"Admin","Client","");
					$qry = $conn->query("SELECT * FROM users where type = 2 order by middlename asc");


					
					while($row= $qry->fetch_assoc()):

					
					?>
					<tr>
						<th class=""><div class="media align-items-center">
                        
                        <div class="media-body">
							<?php echo $i++ ?>
							</div>
                      </div></th>
						<td><?php echo ucwords($row['lastname']) ?></td>
						<td><?php echo ucwords($row['firstname']) ?></td>
						<td><?php echo ucwords($row['middlename']) ?></td>
						<td><b><?php echo $row['contact'] ?></b></td>
						<td><b><?php echo ucwords($row['ncc']) ?></b></td>
						<td><b><?php  echo ucwords($row['serv'])?></b></td>
						<td><?php echo $row['email'] ?></td>
						<td class="text-center">
							<button type="button" class="btn btn-outline-dark" data-toggle="dropdown" aria-expanded="false">
		                      Action
		                    </button>
		                    <div class="dropdown-menu">
		                      <a class="dropdown-item" href="./index.php?page=edit_user&id=<?php echo $row['id'] ?>">Modifier</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_user" href="#" data-id="<?php echo $row['id'] ?>">Supprimer</a>
		                    <div class="dropdown-divider"></div>
		                      <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>">Supprimer data</a>
		                    
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
			
		
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("tab");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
        
       <script> 
       $(function() {
  $('table.paginated').each(function() {
    var currentPage = 0;
    var numPerPage = 10;
    var $table = $(this);
    $table.bind('repaginate', function() {
      $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    });
    $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    var $pager = $('<div class="pager"></div>');
    var $previous = $('<span class="previous"><<</spnan>');
    var $next = $('<span class="next">>></spnan>');
    for (var page = 0; page < numPages; page++) {
      $('<span class="page-number"></span>').text(page + 1).bind('click', {
        newPage: page
      }, function(event) {
        currentPage = event.data['newPage'];
        $table.trigger('repaginate');
        $(this).addClass('active').siblings().removeClass('active');
      }).appendTo($pager).addClass('clickable');
    }
    $pager.insertAfter($table).find('span.page-number:first').addClass('active');
    $previous.insertBefore('span.page-number:first');
    $next.insertAfter('span.page-number:last');

    $next.click(function(e) {
      $previous.addClass('clickable');
      $pager.find('.active').next('.page-number.clickable').click();
    });
    $previous.click(function(e) {
      $next.addClass('clickable');
      $pager.find('.active').prev('.page-number.clickable').click();
    });
    $table.on('repaginate', function() {
      $next.addClass('clickable');
      $previous.addClass('clickable');

      setTimeout(function() {
        var $active = $pager.find('.page-number.active');
        if ($active.next('.page-number.clickable').length === 0) {
          $next.removeClass('clickable');
        } else if ($active.prev('.page-number.clickable').length === 0) {
          $previous.removeClass('clickable');
        }
      });
    });
    $table.trigger('repaginate');
  });
});
</script>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.view_user').click(function(){
		uni_modal("<i class='fa fa-id-card'></i> User Details","view_user.php?id="+$(this).attr('data-id'))
	})
	$('.delete_user').click(function(){
	_conf("Êtes-vous sûr de supprimer cet utilisateur ? ","delete_user",[$(this).attr('data-id')])
	})
	$('.delete_data').click(function(){
	_conf("Êtes-vous sûr de supprimer les données de cet utilisateur ? ","delete_data",[$(this).attr('data-id')])
	})
	})
	function delete_user($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_user',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("compte suprimer",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
	function delete_data($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_data',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Donneés suprimer",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>

 <script src="pj/assets/js/pages/demo.datatable-init.js"></script>
<script src="pj/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="pj/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="pj/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="pj/assets/js/vendor/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="pj/assets/js/vendor.min.js"></script>
        <script src="pj/assets/js/app.min.js"></script>