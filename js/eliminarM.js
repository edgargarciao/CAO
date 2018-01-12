function buscarTiposDeMatriculas(tipoRegistro){
  
  $.ajax({
  type: "POST",
  url: "get_tps.php",
  data:'idTM='+tipoRegistro,
  async: false,
  success: function(data){
    document.getElementById("tiposDeMatricula").innerHTML = data;
    var cat = $("#CAT").val();
    //getState(cat);
  }
  });

}

function getState(val) {
  var tipoMatricula = $("#tiposDeMatricula").val();
  $.ajax({
  type: "POST",
  url: "get_cursos.php",
  data: {
          'categoria':val,
          'tipoDeMatricula':tipoMatricula
        },
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