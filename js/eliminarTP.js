$(document).ready(function(){
  $("#submit").click(function(){

    var idTipoMatricula = $("#id").val();

    // AJAX Code To Submit Form.
    $.ajax({
    type: "POST",
    url: "ProcessEliminarTM.php",
    data:
    {
      "id": idTipoMatricula
    },
    cache: false,
           success: function(result)
           {        
              if(result.trim() == 'Eliminación existosa')
              {                   
                alert(result.trim());
                location.href = "http://localhost:83/CAO_DES/VerTM.php";               
              }else{
                 pintarMensajeDeError();
              }                  
           }
        });
    
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

  var valorDelNodoMensajeError = document.createTextNode("  No es posible eliminar el tipo de matricula debido a que tiene cursos que se están realizando.");

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