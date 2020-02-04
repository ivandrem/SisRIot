@if(session()->has('message'))
	<div class="alert alert-success" title="Click para cerrar">
		{{ session()->get('message') }}
	</div>
	<script type="text/javascript">
		window.setTimeout(function(){
		    $(".alert-success").fadeTo(500, 0).slideUp(500, function(){
		        $(this).remove();
		    });
		}, 5000);
	</script>
@endif

@if(session()->has('error_message'))
	<div class="alert alert-danger" title="Click para cerrar">
		{{ session()->get('error_message') }}
	</div>
	<script type="text/javascript">
		window.setTimeout(function(){
		    $(".alert-danger").fadeTo(500, 0).slideUp(500, function(){
		        $(this).remove();
		    });
		}, 5000);
	</script>
@endif