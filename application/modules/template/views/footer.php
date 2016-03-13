
<footer class="page-footer">
	<div class="container">
		<div class="row">
			<div class="col l6 s12">
				<h5 class="white-text">CRUD DEMO</h5>
				<p class="grey-text text-lighten-4">Using CodeIgniter HMVC and Ajax.</p>
			</div>
			<div class="col l6 s12">
				<br />
				<a href="https://github.com/azism/CI_userlists/" target="_blank" 
					class="waves-effect waves-light red btn right">view source on github</a>
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