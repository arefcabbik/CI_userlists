
<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">CRUD DEMO</h5>
				<p class="grey-text text-lighten-4">Using CodeIgniter HMVC and Ajax.</p>
			</div>
			<div class="col l6 s12">
				<a class="waves-effect waves-light btn"><i class="material-icons right">cloud</i>button</a>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
		<div class="container">
			<center>&copy; 2016 Azis Muttaqin</center>
		</div>
	</div>
</footer>

</body>

<script>
	$('body').on('click', '.pagination a', function(){
		var url = $(this).attr('href');
		$('#content').load(url);
		return false;
	});
</script>

</html>