<script type="text/javascript">
	function deleteUser(id)
	{
		if(confirm('¿Está seguro de eliminar el registro?'))
		{
			document.getElementById('delete-user-'+id).submit();
		}
	}
</script>