<div class="row">
	<div class="col s10 offset-s1">
		<div class="row">
			<form method="post" action="<?php echo site_url('user/submit');?>"
				base-url="<?php echo site_url();?>">
				<div class="input-field col s3">
					<input placeholder="Isi nama depan" name="first_name" id="first_name" type="text" 
						data-validation="custom" 
						data-validation-regexp="^([a-z]+)$"
						data-validation-error-msg="Harus diisi hanya dengan huruf."
						value="<?php echo $firstname;?>">
					<label for="first_name">Nama Depan</label>
				</div>
				<div class="input-field col s3">
					<input placeholder="Isi nama belakang" name="last_name" id="last_name" type="text" 
						data-validation="custom" 
						data-validation-regexp="^([a-z]+)$"
						data-validation-error-msg="Harus diisi hanya dengan huruf."
						value="<?php echo $lastname;?>">
					<label for="last_name">Nama Belakang</label>
				</div>
				<div class="input-field col s2">
					<input placeholder="Isi nama pengguna" name="username" id="username" type="text" 
						data-validation="length alphanumeric" 
		 				data-validation-length="3-12" 
		 				data-validation-error-msg="Harus diisi. Huruf / angka. 3-12 karakter."
		 				value="<?php echo $username;?>">
					<label for="username">Nama Pengguna</label>
				</div>
				<div class="input-field col s3">
					<input placeholder="email@contoh.com" name="email" id="email" type="email" 
						data-validation="email"
						data-validation-error-msg="Format email salah."
						value="<?php echo $email;?>">
					<label for="email">Email</label>
				</div>
				<div class="input-field col s1">
					<button type="submit" class="btn-floating green"><i class="material-icons">add</i></button>
				</div>
				
				<input type="hidden" name="update_id" id="update_id">
			</form>
		</div>
		
		<div id="alert" class="row">
			<blockquote><p id="error"></p></blockquote>
		</div>
		
		<table class="striped responsive">
			<thead>
				<tr>
					<td>No.</td>
					<td>Nama Depan</td>
					<td>Nama Belakang</td>
					<td>Nama Pengguna</td>
					<td>Email</td>
					<td>Menu</td>
				</tr>
			</thead>
			<tbody>
			<?php $offset = $this->uri->segment(3, 0) + 1;?>
			<?php if(isset($record)) : foreach($record->result() as $row) :?>
				<tr>
					<td><?php echo $offset++;?></td>
					<td><?php echo ucfirst($row->firstname);?></td>
					<td><?php echo ucfirst($row->lastname);?></td>
					<td><?php echo $row->username;?></td>
					<td><?php echo $row->email;?></td>
					<td>
						<a href="javascript:;" class="update btn-floating green"
							update-url="<?php echo site_url('user/update/'.$row->id);?>">
							<i class="material-icons">mode_edit</i>
						</a>
						<a href="javascript:;" class="delete btn-floating red"
							delete-url="<?php echo site_url('user/delete/'.$row->id);?>"
							base-url="<?php echo site_url();?>">
							<i class="material-icons">delete</i>
						</a>
					</td>
				</tr>
			<?php endforeach;?>
			<?php endif;?>
		</tbody>
		</table>
		<center><?php echo $page_links; ?></center>
	</div>
</div>

<script>
$('#alert').hide();

function submitDataWithAjax() {
	$('form').submit(function(){
		var baseUrl = $(this).attr('base-url');
		$.ajax({
			type: $(this).attr('method'),
			url: $(this).attr('action'),
			data: $(this).serialize(),
			dataType: 'JSON',
			success: function(data){
				if(data.success){
					$('#content').load(baseUrl);
				} else {
					$('#alert').show();
					$('#error').html(data.error_messages);
				}
			}
		});	
		return false;
	});
};

$.validate({
	onSuccess: submitDataWithAjax()
});

$('.update').click(function(){
	var updateUrl = $(this).attr('update-url');
	$.ajax({
		url: updateUrl,
		type: 'GET',
		dataType: 'JSON',
		success: function(data){
			$('#first_name').val(data.firstname);
			$('#last_name').val(data.lastname);
			$('#username').val(data.username);
			$('#email').val(data.email);
			$('#update_id').val(data.id);
		}
	});
	return false;
});

$('.delete').click(function(){
	var deleteUrl = $(this).attr('delete-url');
	var baseUrl = $(this).attr('base-url');
	swal({
		title: 'Hapus data ini?',
		text: 'Data yang sudah dihapus tidak dapat dipulihkan',
		type: 'warning',
		showCancelButton: true,
		closeOnConfirm: true,
		closeOnCansel: true
	},
	function(isConfirm){
		if(isConfirm){
			$.ajax({
				url: deleteUrl,
				success: function(){
					//swal('Berhasil', 'Data sudah terhapus.', 'success');
					$('#content').load(baseUrl);
				}
			});
			return false;
		}
	});
});
</script>