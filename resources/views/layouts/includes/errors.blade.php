@if(count($errors) > 0)
	<div class="alert alert-danger" title="Click para cerrar">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	<script type="text/javascript">
		window.setTimeout(function(){
		    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
		        $(this).remove();
		    });
		}, 5000);
	</script>
@endif