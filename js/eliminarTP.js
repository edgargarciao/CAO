  var selecteds =[];
  var k = 0;

  $(document).ready(function(){      
      var e = document.getElementById("CAT");
      getState(e.options[e.selectedIndex].value);
  });

function getState(val) {
  $.ajax({
  type: "POST",
  url: "get_state.php",
  data:'country_id='+val,
  success: function(data){
    document.getElementById("tboCourses").innerHTML = data;
    var element =  document.getElementById('previous');
    if (typeof(element) != 'undefined' && element != null)
    {
          var myNode = document.getElementById("pags");
          myNode.innerHTML = '';
    }
    printPags();
    checkToogles();
  }
  });

}

$(document).ready(function(){
  $("#submit").click(function(){
    var tipoMatricula = $("#TipoMatricula").val();
    var nombreTipoMatricula = $("#NombreTipoMatricula").val();
    var descripcionTipoMatricula = $("#DescripcionTipoMatricula").val();
    var initDate = $("#initDate").val();
    var finalDate = $("#finalDate").val();

    var infoCourses = "";
    for(var j = 0;j<=selecteds.length;j++){

      if(typeof selecteds[j] != 'undefined'){
        infoCourses += ((selecteds[j]+"").split("-")[1]) + ",";
      }
    }
    // Returns successful data submission message when the entered information is stored in database.
    var now = new Date();
    now.setHours(0, 0, 0, 0);
    var dateI = new Date(initDate);
    dateI.setHours(0, 0, 0, 0);
    if(tipoMatricula==''||nombreTipoMatricula==''||descripcionTipoMatricula==''||initDate==''||finalDate==''){
      alert("Por favor digite todos los campos");
    }    
    else if( (dateI) < (now)){
      alert("La fecha inicial debe ser mayor que la fecha actual.");
    }else if((Date.parse(initDate)) > (Date.parse(finalDate))){
      alert("La fecha inicial debe ser menor que la fecha final.");
    }else if(selecteds.length == 0){
      alert("Debe seleccionar por lo menos un curso");
    }
    else
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
    }
    return false;
  });
});