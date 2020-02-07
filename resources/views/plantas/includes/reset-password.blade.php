<script type="text/javascript">
	function resetPassword(id)
	{
		if(confirm('¿Está seguro de restablecer la contraseña del registro?'))
		{
			document.getElementById('reset-password-'+id).submit();
		}
	}
</script>