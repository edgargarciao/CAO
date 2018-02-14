function realizaProceso(curso){
        var parametros = {
                "curso" : curso
        };
        $.ajax({
                data:  parametros,
                url:   'servicios/calculo_recaudos.php',
                type:  'post',
                success:  function (response) {

                        var salida=response;
                        var split=salida.split(",");
                        
                        $("#resultM").html(split[1]);
                        $("#resultNM").html(split[2]);
                        $("#resultT").html(split[0]);
                }
        });
}