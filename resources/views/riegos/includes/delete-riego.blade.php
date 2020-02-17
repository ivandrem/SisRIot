<script type="text/javascript">
	function deleteRiego(id)
	{
		if(confirm('¿Está seguro de eliminar el riego ?'))
		{
			document.getElementById('delete-riego-'+id).submit();
		}
	}
</script>