<script type="text/javascript">
	function deleteRole(id)
	{
		if(confirm('¿Está seguro de eliminar el registro?'))
		{
			document.getElementById('delete-role-'+id).submit();
		}
	}
</script>