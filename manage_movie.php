<?php 
include 'db_connect.php';
if(isset($_GET['id'])){
	$mov = $conn->query("SELECT * FROM movies where id =".$_GET['id']);
	foreach($mov->fetch_array() as $k => $v){
		$meta[$k] = $v;
		if($k == 'duration' && !is_numeric($k)){
			$v = explode('.',$v);
			$meta['duration_hour'] = $v[0];
			$v[1] = isset($v[1]) ? $v[1] : 0;
		 	$meta['duration_min'] = 60 * ('.'.$v[1]);

		}
	}
}

?>

<div class="container-fluid">
	<div class="col-lg-12">
		<form id="manage-movie">
			<div class="form-group">
				<input type="hidden" name="id" value="<?php echo isset($_GET['id']) ? $_GET['id'] : '' ?>">
				<label for="" class="control-label">Project Name</label>
				<input type="text" name="title" required="" class="form-control" value="<?php echo isset($meta['title']) ? $meta['title'] : '' ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Client</label>
				<input type="text" name="client" required="" class="form-control" value="<?php echo isset($meta['client']) ? $meta['client'] : '' ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Project Leader</label>
				<input type="text" name="leader" required="" class="form-control" value="<?php echo isset($meta['leader']) ? $meta['leader'] : '' ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Email</label>
				<input type="text" name="email" required="" class="form-control" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Jadwal Mulai Proyek</label>
				<input name="date_showing" id="" type="date" class="form-control" value="<?php echo isset($meta['date_showing']) ? $meta['date_showing'] : '' ?>" required>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Tanggal Akhir Proyek</label>
				<input name="end_date" id="" type="date" class="form-control" value="<?php echo isset($meta['end_date']) ? $meta['end_date'] : '' ?>" required>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Progress</label>
				<input type="text" name="progress" required="" class="form-control" value="<?php echo isset($meta['progress']) ? $meta['progress'] : '' ?>">
			</div>
			<div class="form-group">
				<img src="assets/img/<?php echo isset($meta['cover_img']) ? $meta['cover_img'] : '' ?>" alt="" id="cover_img" width="50" height="75">
			</div>
			<div class="form-group input-group">
				<label for="" class="control-label">Cover Image</label>
				<br>
				<div class="input-group-prepend">
				    <span class="input-group-text">Upload</span>
				  </div>
				  <div class="custom-file">
				    <input type="file" name="cover" class="custom-file-input" id="cover-img" onchange="displayImg(this,$(this))">
				    <label class="custom-file-label" for="cover-img">Pilih file</label>
				  </div>
			</div>
			
		</form>
	</div>
</div>

<script>
	$('#manage-movie').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_movie',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			error:err=>{
				console.log(err)
			},
			success:function(resp){
				if(resp == 1){
					alert_toast('Data successfully saved.','success')
					setTimeout(function(){
						location.reload()
					},1500)
					//end_load()
				}
			}
		})

	})
			function displayImg(input,_this) {
			    if (input.files && input.files[0]) {
			        var reader = new FileReader();
			        reader.onload = function (e) {
			        	$('#cover_img').attr('src', e.target.result);
            			_this.siblings('label').html(input.files[0]['name'])
            			_this.siblings('input[name="fname"]').val('<?php echo strtotime(date('y-m-d H:i:s')) ?>_'+input.files[0]['name'])
            			var p = $('<p></p>')
			            
			        }

			        reader.readAsDataURL(input.files[0]);
			    }
			}
</script>