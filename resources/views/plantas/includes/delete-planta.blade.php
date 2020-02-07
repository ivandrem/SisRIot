<script type="text/javascript">
	function deletePlanta(id)
	{
		if(confirm('¿Está seguro de eliminar la Planta?'))
		{
			document.getElementById('delete-planta-'+id).submit();
		}
	}
</script>