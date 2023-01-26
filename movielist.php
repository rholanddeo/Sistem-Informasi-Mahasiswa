<style>
	td img{
		width: 50px;
		height: 75px;
		margin:auto;
	}
</style>
<?php include ('db_connect.php') ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-7">
			<button class="btn btn-block btn-sm btn-primary col-sm-2" type="button" id="new_movie"><i class="fa fa-plus"></i> New Data</button>
		</div>
	</div>
	<div class="row">
		<div class="card col-md-12 mt-3">
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th class="text-center">#</th>
							<th class="text-center">NIM</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Jurusan</th>
							<th class="text-center">Semester</th>
							<th class="text-center">IPK</th>
							<th class="text-center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$movie = $conn->query("SELECT * FROM movies ");
						while($row=$movie->fetch_assoc()){
						 ?>
						 <tr>
						 <td><?php echo $i++ ?></td>
						 	<td><?php echo $row['title'] ?></td>
							<td align="center"><img src="assets/img/<?php echo $row['cover_img'] ?>" alt=""> <br><?php echo ucwords($row['leader']) ?> <br><?php echo ($row['email']) ?></td>
							<td><?php echo $row['jurusan'] ?></td>
							<td><?php echo $row['semester'] ?></td>
							<td><?php echo $row['client'] ?></td>
	
							<td>
						 		<center>
								<div class="btn-group">
								  <button type="button" class="btn btn-primary">Action</button>
								  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								    <a class="dropdown-item edit_movie" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Edit</a>
								    <div class="dropdown-divider"></div>
								    <a class="dropdown-item delete_movie" href="javascript:void(0)" data-id = '<?php echo $row['id'] ?>'>Hapus</a>
								  </div>
								</div>
								</center>
						 	</td>
						 </tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<script>
	$('table').dataTable();
	$('#new_movie').click(function(){
		uni_modal('New Movie','manage_movie.php');
	})
	$('.edit_movie').click(function(){
		uni_modal('Edit Movie','manage_movie.php?id='+$(this).attr('data-id'));
	})
	$('.delete_movie').click(function(){
		_conf('Are you sure to delete this data?','delete_movie' , [$(this).attr('data-id')])
	})

	function delete_movie($id=''){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_movie',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp ==1){
					alert_toast("Data successfully deleted",'success');
					setTimeout(function(){
						location.reload()
					},1500)
				}
			}
		})
	}
</script>