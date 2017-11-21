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
    document.getElementById("TP").innerHTML = data;    
  }
  });

}

$(document).ready(function(){
  $("#submit").click(function(){

    var e = document.getElementById("TP");
    var idTipoMatricula = (e.options[e.selectedIndex].value);
    alert(idTipoMatricula);
    if(idTipoMatricula==''){
      alert("Por favor seleccione un tipo de matricula");
    }       
    else
    {
        // AJAX Code To Submit Form.
        $.ajax({
        type: "POST",
        url: "ProcessEliminarTM.php",
        data:
        {
          TipoMatricula: idTipoMatricula
        },
        cache: false,
                success: function(result){                
                  if(result.trim() == 'Registro exitoso'){                   
                    $('#FEM').trigger("reset"); 
                  }
                  alert(result.trim());
                }
        });
    }
    return false;
  });
});