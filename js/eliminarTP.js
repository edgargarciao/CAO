  var selecteds =[];
  var k = 0;

  $(document).ready(function(){    
      var e = document.getElementById("CAT");
      getState(e.options[e.selectedIndex].value);

  });

function getState(val) {
  $.ajax({
  type: "POST",
  url: "get_tps.php",
  data:'idTM='+val,
  success: function(data){
    alert(data);    
    document.getElementById("TP").innerHTML = data;    
  }
  });

}

$(document).ready(function(){
  $("#submit").click(function(){

    var e = document.getElementById("TP");
    var idTipoMatricula = (e.options[e.selectedIndex].value);
    if(idTipoMatricula==''){
      alert("Por favor seleccione un tipo de matricula");
    }   
    alert(idTipoMatricula);
    /*else
    {
        // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "ProcessRegistrarTM.php",
        //data: dataString,
        data:
        {
          TipoMatricula: tipoMatricula,
          NombreTipoMatricula: nombreTipoMatricula,
          DescripcionTipoMatricula: descripcionTipoMatricula,
          initDate: initDate,
          finalDate:finalDate,
          infoCourses: infoCourses
        },
        cache: false,
                success: function(result){                
                  if(result.trim() == 'Registro exitoso'){                   
                    $('#formRTM').trigger("reset"); 
                  }
                  alert(result.trim());
                }
        });
    }*/
    return false;
  });
});