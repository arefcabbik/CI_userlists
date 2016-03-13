<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Daftar Pengguna</title>
<!-- Materialize Framework -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
<!-- Materialize Icon -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- SweetAlert Style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
<!-- Materialize JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
<!-- jQuery Form Validator -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.2.43/jquery.form-validator.min.js"></script>
<!-- SweetAlert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">
$(window).load(function() {
	$(".loader").fadeOut("slow");
})
</script>
</head>

<style>
#content {
	margin-top: 10px;
}

.loader {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url('<?php echo base_url('assets/images/loading.gif');?>') 50% 50% no-repeat;
}
</style>

<body>
<div class="loader"></div>
	<nav>
	<div class="nav-wrapper">
		<a href="#" class="brand-logo center">Daftar Pengguna</a>
	</div>
	</nav>