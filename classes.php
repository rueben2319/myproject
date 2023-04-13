<?php include'db_connect.php' ?>
   <div class="col-md-12">
      <div class="card" style="border-radius: 0; width: 100%;">
		 <div class="card-header">
			<div class="card-tools">
				<a class="btn btn-success btn-sm" href="./index.php?page=manage_class"><i class="fa fa-plus"></i> Add New</a>
			</div>
		 </div>
         <div class="card-body">
			<table class="table tabe-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="60%">
					<col width="20%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th>Form</th>
						<th>Class Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM classes order by level asc, section asc ");
					while($row= $qry->fetch_assoc()):
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo $row['level'] ?></b></td>
						<td><b><?php echo $row['section'] ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="index.php?page=edit_class&id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat manage_class" style="background:green; border:0;">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-flat delete_class" data-id="<?php echo $row['id'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	 </div>
   </div>
   
<script>
	$(document).ready(function(){
		$('#list').dataTable()
		$('.new_class').click(function(){
			uni_modal("New class","manage_class.php")
		})
		$('.manage_class').click(function(){
			uni_modal("Manage class","manage_class.php?id="+$(this).attr('data-id'))
		})
	$('.delete_class').click(function(){
	_conf("Are you sure to delete this class?","delete_class",[$(this).attr('data-id')])
	})
	})
	function delete_class($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_class',
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