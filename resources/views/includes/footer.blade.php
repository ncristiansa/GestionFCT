
<script>
    var infoEmpresa = {!! json_encode($empresa->toArray(), JSON_HEX_TAG) !!};
    crearTabla("h1", "table", "thead-dark", infoEmpresa);
</script>