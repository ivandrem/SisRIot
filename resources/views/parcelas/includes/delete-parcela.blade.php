<script type="text/javascript">
	function deleteParcela(id)
	{
		if(confirm('¿Está seguro de eliminar la Parcela?'))
		{
			document.getElementById('delete-parcela-'+id).submit();
		}
	}
</script>