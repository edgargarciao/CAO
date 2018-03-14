/**
 * Metodo que permite filtrar los registros de una tabla con respecto
 * a un texto
 * @param {*} elemento Nombre del elemento(Input) que contiene el texto a buscar.
 * @param {*} nombreTabla Nombre de la tabla a filtrarle los campos
 * @param {*} item Posición del campo donde se va a filtrar.
 */
function buscar(elemento,nombreTabla,item){
	// Declare variables
	var elementoConElTexto, textoABuscar, tabla, vectorRegistros;
	
	// Obtengo el elemento
	elementoConElTexto = document.getElementById(elemento);

	// Saco el texto de lo que deseo buscar
	textoABuscar = elementoConElTexto.value.toUpperCase();

	/* 	Obtengo el nombre de la tabla en donde buscare y filtrare los registros */
	tabla = document.getElementById(nombreTabla);

	// Obtengo en un array todos los registros de la tabla pintados
	vectorRegistros = tabla.getElementsByTagName("tr");

	// Recorro todos los registros de la tabla
	for (var i = 0; i < vectorRegistros.length; i++) {
		// Obtengo el registro en la posicion que deseo buscar
		registro = vectorRegistros[i].getElementsByTagName("td")[item];
		// Pregunto si el registro no es nulo
		if (registro) {    
			/* Pregunto si el registro contiene el texto con el que estoy buscando*/

			// Si contiene esta cadena 
			if (registro.innerHTML.toUpperCase().indexOf(textoABuscar) > -1) {

				vectorRegistros[i].style.display = "";
			} else { 
				vectorRegistros[i].style.display = "none";
			}
		}
	
	}
}
/*
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("Cursos");
    tr = table.getElementsByTagName("tr");
    var x = false;
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      if (td) {    
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else { 
          tr[i].style.display = "none";
        }
      }
     
  }
}

  function myFunction2() {
    // Declare variables
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("Cursos");
    tr = table.getElementsByTagName("tr");
    var x = false;
    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[2];
      if (td) {    
        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else { 
          tr[i].style.display = "none";
        }
      }
     
  }
}*/