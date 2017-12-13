 $(document).ready(function(){
  $("#submit").click(function(){
    var matricula = $("#matricula").val();
    var finalDate = $("#finalDate").val();
    
    var now = new Date();
    now.setHours(0, 0, 0, 0);
    var dateF = new Date(finalDate);
    dateF.setHours(0, 0, 0, 0);
    if(matricula == '' || finalDate ==''){
      alert("Por favor digite todos los campos");
    }    
    else if( (dateF) < (now)){
      alert("La fecha final debe ser mayor que la fecha actual.");
    }else
    {
        $.ajax({
            type: "POST",
            url: "CargarActualizarM.php",
            data:
            {
              matricula:matricula,  
              finalDate:finalDate
            },
            cache: false,
            async: true,
            success: function(result){                
                    if(result.trim() == ('Actualización exitosa') != -1){                                            
                      alert('Actualización exitosa');    
                      location.pathname = "CAO_DES/VerM.php";                    
                    }else{
                      pintarMensajeDeError();
                    }
            }
        });
    }
    return false;
  });
});


function pintarMensajeDeError()
{
  // Agrego el fondo de color rojo
  var mensajeError = document.getElementById("mensajeError");
  mensajeError.setAttribute('class', 'alert bg-danger');
  mensajeError.setAttribute('role', 'alert');

  // Creo el cuerpo del mensaje
  var iem = document.createElement('em');
  iem.setAttribute('class', 'fa fa-lg fa-warning');
  var valorDelNodoIem = document.createTextNode("&nbsp;");

  var valorDelNodoMensajeError = document.createTextNode("  No es posible eliminar la matricula por que tiene notas asociadas.");

  var ia = document.createElement('a');
  ia.setAttribute('class', 'pull-right');
  ia.setAttribute('onclick', 'eliminarMensajeDeError()');

  var iema = document.createElement('em');
  iema.setAttribute('class', 'fa fa-lg fa-close');

  ia.appendChild(iema);
  mensajeError.appendChild(iem);
  mensajeError.appendChild(valorDelNodoMensajeError);
  mensajeError.appendChild(ia);
 
}

function eliminarMensajeDeError()
{
  var mensajeError = document.getElementById("mensajeError");
  mensajeError.innerHTML = '';
  mensajeError.removeAttribute('class');
  mensajeError.removeAttribute('role');
}