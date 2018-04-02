/**
 * Metodo que permite filtrar los registros de una tabla con respecto
 * a un texto
 * @param {*} elemento Nombre del elemento(Input) que contiene el texto a buscar.
 * @param {*} nombreTabla Nombre de la tabla a filtrarle los campos
 * @param {*} item Posición del campo donde se va a filtrar.
 */
function buscar(elemento,nombreTabla,item){
	// Declaración de variables
	var elementoConElTexto, textoABuscar, tabla, vectorRegistros;
	
	// Se obtiene el elemento
	elementoConElTexto = document.getElementById(elemento);

	// Saco el texto de lo que deseo buscar y en mayuscula
	textoABuscar = elementoConElTexto.value.toUpperCase();

	// Obtengo el nombre de la tabla en donde buscare y filtrare los registros 
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
        // No coloco ningun atributo para que se muestre.
				vectorRegistros[i].style.display = "";
			} else { 
        // Coloco el atributo "none" para que no se muestre.
				vectorRegistros[i].style.display = "none";
			}
		}	
	}
}