<script type="text/javascript">
	function changeState(formID)
	{
		var form = document.getElementById(formID);

		if(confirm('¿Está seguro de realizar cambios?'))
		{
			form.submit();
		}
		else{form.state.checked = !form.state.checked;}
	}
</script>