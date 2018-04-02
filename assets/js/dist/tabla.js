//Array que contendra los cursos seleccionados por el usuario. 
var seleccionados =[];
// Cantidad de cursos seleccionados
var cantidadSeleccionados = 0;
// Cantidad de cursos para agruparse.
let cantidadCursosEnPantalla = 15;

// Evento de Jquery para que realice la función recien inicie la pagina.
$(document).ready(cargarCursos)

// 
$(document).ready(cargarCursos)

/**
 * Método que carga todos los cursos en pantalla.
 */
function cargarCursos(){

  // Obtenemos el objeto donde se encuentra la categoria
  var categoria = document.getElementById("Categoria");
  // Aqui cargamos todos los cursos dentro del DOM
  cargarCursosPorCaterogia(categoria.options[categoria.selectedIndex].value);
}

/**
 * Método para cargar todos los cursos de una categoria especificamente. 
 * Se realiza una petición ajax a un servicio en php y éste devuelve toda
 * la información de los cursos
 * @param {*} categoria Id de la categoria con el cual seran buscados los cursos.
 */
function cargarCursosPorCaterogia(categoria) {
  
  // Método de la petición que realizaremos
  let method = "POST";

  // Url a donde se realizara la petición
  let url = (window.location.href).split("views")[0]+"models/back/EducacionVirtual/TipoMatricula/CargarCursosPorCategoria.php";
  
  $.ajax({
    // Tipo de método http que usaremos  
    type: method,
    // Ruta a la cual solicitaremos el servicio
    url: url,
    // Datos que se necesitan para realizar la petición
    data:{"categoria":categoria},
  })
  // Si ejecuto normalmente la petición ejecuta este metodo
  .done(EjecutarProcesoConCursos)
  // Si fallo la petición por algún motivo entonces se ejecuta este metodo
  .fail(MostrarMensajeCursosNoCargados);
  
}

/**
 * Método que es ejecutado cuando la petición al back para
 * obtener los cursos fue exitosa.
 * @param {*} data Información del mensaje.
 * @param {*} textStatus Estado del mensaje.
 * @param {*} jqXHR Contenido del mensaje.
 */
function EjecutarProcesoConCursos(data, textStatus, jqXHR){
  // Cargamos los datos en el cuerpo de la tabla de cursos
  document.getElementById("BodyCursos").innerHTML = data;

  // Obtenemos el boton previous 
  var botonAtras =  document.getElementById('previous');
  
  /**
   * Si el boton existe se elimina para que debe cargarse todo de nuevo.
   */
  if (typeof(botonAtras) != 'undefined' && botonAtras != null){
    // Se elimina el contenido del boton.
    var myNode = document.getElementById("paginas").innerHTML = "";        
  }
  // Agrega los cursos dependiendo del agrupamiento 
  agruparCursosPorCantidad();

  // Agrega los cursos seleccionados anteriormente
  //seleccionarCursos();
}

/**
 * Método que es ejecutado cuando la petición al back para
 * obtener los cursos no funciono.
 * @param {*} data Información del mensaje.
 * @param {*} textStatus Estado del mensaje.
 * @param {*} jqXHR Contenido del mensaje.
 */
function MostrarMensajeCursosNoCargados(data, textStatus, jqXHR){
  alert("Los cursos no fueron cargados. Contacte al administrados del sistema.");
}

/**
 * Método para modificar la acción del curso. 
 * Los cursos que van siendo seleccionado se guardan en un array
 * para que cuando se cambie de categoria queden aún guardados,
 * en caso de que, se devuelva a la misma categoria pueda ver los
 * cursos que selecciono al principio en esa categoria.
 * @param {*} idCurso Identificación del curso a seleccionar.
 */
function cambiarEstadoDeCurso(idCurso){
  // Aqui lo selecciono para que realice el cambio de estado.
  var cursoSeleccionado = document.getElementById(idCurso).checked;
  
  /**
   * Aqui se pregunta si el curso fue seleccionado y no esta en la lista de los 
   * ya seleccionados.
   */
  if(!cursoSeleccionado && !estaEnLaListaDeSeleccionados(idCurso)){
    // Guardamos el elemento seleccionado en el array de elementos seleccionados
    seleccionados.push(idCurso);
  }
  // Si el curso fue des-seleccionado entonces se elimina del array.
  if(cursoSeleccionado){
    // Se obtienen el indice del curso en el array.
    var indiceCurso = selecteds.indexOf(idCurso);
    
    /**
     * Se elimina el curso del array de cursos seleccionados.
     * el "1" significa que sera removido solo un elemento. 
     */
    seleccionados.splice(indiceCurso, 1);
  }
}

/**
 * Método que verifica si un elemento se encuentra en el array
 * de cursos seleccionados.
 * @param {*} idElementoSeleccionado 
 */
function estaEnLaListaDeSeleccionados(idElementoSeleccionado){
  return !(seleccionados.indexOf(idElementoSeleccionado) === -1);
}

function agruparCursosPorCantidad(){

  /*********************************
  * Aqui se ocultan casi todos 
  * los cursos y se muestran 
  * solamente los primeros N cursos
  **********************************/
    var tablaDeCursos, filas;
    tablaDeCursos = document.getElementById("BodyCursos");
    filas = tablaDeCursos.getElementsByTagName("tr");
    for (let indice = cantidadCursosEnPantalla; indice<filas.length; indice++) {
      filas[indice].style.display = "none";
    }

    
  /******************************
  * A partir de aca se agregan
  *       los numeros 
  ******************************/

    // Cantidad de agrupamientos de N cursos
    var cantidadDePaginas = Math.ceil(filas.length / cantidadCursosEnPantalla);
    var paginas = document.getElementById("paginas");
      
    /******************************
    * AGREGAMOS EL BOTON ATRAS
    ******************************/
    
    var iLiPrevious = document.createElement('li');
    iLiPrevious.setAttribute('class', 'disabled');
    iLiPrevious.setAttribute('onclick', 'cargarPaginaAnterior('+cantidadDePaginas+')');  
    iLiPrevious.setAttribute('id', 'previous');
    var iSpan = document.createElement('span');
    iSpan.setAttribute('class', 'glyphicon glyphicon-chevron-left');
    iLiPrevious.appendChild(iSpan);
    paginas.appendChild(iLiPrevious);
   
    /******************************
    * AGREGAMOS LOS NUMEROS
    ******************************/
    for(var j = 0 ; j<cantidadDePaginas ; j++){
        var ili = document.createElement('li');
        ili.setAttribute('id', 'pg-'+(j+1));
        ili.setAttribute('onclick', 'cambiarDePagina(this.id,'+cantidadDePaginas+')');
        if (j == 0){
            ili.setAttribute('class', 'active');
        }
        var iSpanLi = document.createElement('span');
        var nodeValueLi = document.createTextNode(j+1);
        iSpanLi.appendChild(nodeValueLi);
        ili.appendChild(iSpanLi);
        paginas.appendChild(ili);
    }

    /******************************
    * AGREGAMOS EL BOTON SIGUIENTE
    ******************************/

    var iLiNext = document.createElement('li');
    iLiNext.setAttribute('id', 'next');
    iLiNext.setAttribute('onclick', 'cargarSiguientePagina('+cantidadDePaginas+')');
    if (cantidadDePaginas == 1){
        iLiNext.setAttribute('class', 'disabled');
    }
    var iSpanNext = document.createElement('span');
    iSpanNext.setAttribute('class', 'glyphicon glyphicon-chevron-right');
    iLiNext.appendChild(iSpanNext);
    paginas.appendChild(iLiNext);

}

/**
 * Evento que carga el agrupamiento anterior de paginas al numero
 * seleccionado.
 * Cuando esta seleccionado el numero 1, este evento no debe
 * realizarse. 
 * @param {*} cantidadDePaginas Cantidad de agrupamientos de paginas. 
 */
function cargarPaginaAnterior(cantidadDePaginas){
  /**
   * Se obtiene el elemento que contiene los botones 
   * con los numeros de las paginas .
   */ 
  var ulPages = document.getElementById("paginas");
  /**
   * Se obtiene la lista de elementos del contenedor.
   */
  var ulLis   = ulPages.getElementsByTagName("li");
  /**
   * Se recorre elemento de la lista para ver cual es
   * el que esta activo.
   */
  for(var i = 0;i<ulLis.length;i++){
    /**
     * Consulta por cada elemento para encontrar
     * el que esta actualmente seleccionado.
     */
    if(ulLis[i].getAttribute("class") == 'active'){      
      
      //Se obtiene el numero de la pagina
      var numeroSeleccionado = ulLis[i].id.split("-")[1];
      
      /**
       * Si el numero seleccionado es el 1 no hace nada
       * por que no hay numeros atras.
       */
      if (numeroSeleccionado == 1){
        return;
      }
      // Se elimina el sombreado sobre el numero
      ulLis[i].removeAttribute('class');

      // Se agrega el sombreado al numero anterior
      ulLis[i-1].setAttribute('class', 'active');

      /**
       * Si el numero es el 2 se debe agregar al boton previous
       * el evento de que cuando coloquen el click sobre salga
       * la imagen de deshabilitado.
       */
      if(numeroSeleccionado == 2){       
        // Deshabilita el numero
        document.getElementById("previous").setAttribute('class', 'disabled'); 
      }
      // Se habilita el boton siguiente.
      document.getElementById("next").removeAttribute('class');

      /****************************************
      * Se ocultan las paginas correspondientes
      * a ese agrupamiento
      ****************************************/
      var tablaDeCursos, filas, posicion;
      // Se obtiene la tabla con todos los cursos
      tablaDeCursos = document.getElementById("Cursos");
      
      // Se obtienen los cursos 
      filas = tablaDeCursos.getElementsByTagName("tr");    

      // Se obtiene la posicion inicial del agrupamiento
      var posicionInicial = (numeroSeleccionado-1)*cantidadCursosEnPantalla; 

      // Si estamos en la ultima pagina
      var posicionFinal  =  ( ((numeroSeleccionado)*cantidadCursosEnPantalla) > filas.length )
                            // Mostramos las paginas que quedan, las cuales pueden ser la cantidad
                            // de paginas seleccionadas o menos.
                            ? ((posicionInicial) + (filas.length%cantidadCursosEnPantalla) - 1)
                            // Si no, mostramos la cantidad de cursos completa.
                            : ((numeroSeleccionado)*cantidadCursosEnPantalla);

      for (posicion = posicionInicial; posicion <= posicionFinal; posicion++) {
        filas[posicion].style.display = "none";
      }

      /******************************
      * Muestra los items
      ******************************/

      for (posicion = posicionInicial;posicion > (posicionInicial - cantidadCursosEnPantalla); posicion--) {         
        filas[posicion].style.display = "";
      }
      break;
    }
  }
}

/**
 * Evento que carga el siguiente agrupamiento de paginas del numero
 * seleccionado.
 * @param {*} cantidadDePaginas 
 */
function cargarSiguientePagina(cantidadDePaginas){
  /**
   * Se obtiene el elemento que contiene los botones 
   * con los numeros de las paginas .
   */ 
  var ulPages = document.getElementById("paginas");
  /**
   * Se obtiene la lista de elementos del contenedor.
   */
  var ulLis   = ulPages.getElementsByTagName("li");
  /**
   * Se recorre elemento de la lista para ver cual es
   * el que esta activo.
   */  
  for(var i = 0;i<ulLis.length;i++){
    /**
     * Consulta por cada elemento para encontrar
     * el que esta actualmente seleccionado.
     */
    if(ulLis[i].getAttribute("class") == 'active'){      
      //Se obtiene el numero de la pagina que esta actualmente seleccionado
      var paginaActualmenteSeleccionada = ulLis[i].id.split("-")[1];
      // Si la pagina seleccionada ya es la ultima entonces se sale
      if (paginaActualmenteSeleccionada == cantidadDePaginas){
          return; 
      }
      // Elimina el sombreado sobre la numero de pagina
      ulLis[i].removeAttribute('class');      
      // Agrega el sombreado sobre la pagina siguiente
      ulLis[i+1].setAttribute('class', 'active');

      // Si la pagina actualmente seleccionada 
      if(paginaActualmenteSeleccionada == (cantidadDePaginas-1)){       
        // Deshabilita el boton siguiente
        document.getElementById("next").setAttribute('class', 'disabled'); 
      }
      // Habilita el boton Atras.
      document.getElementById("previous").removeAttribute('class');

      /******************************
      * Oculta los cursos
      ******************************/
      var tablaDeCursos, filas, k;
      tablaDeCursos = document.getElementById("Cursos");
      filas = tablaDeCursos.getElementsByTagName("tr");
      var limit = ((paginaActualmenteSeleccionada-1)*cantidadCursosEnPantalla);
      for (k = limit + 1; k <= (limit+cantidadCursosEnPantalla) && k < filas.length; k++) {
        filas[k].style.display = "none";
      }
      /******************************
      * Muestra los cursos
      ******************************/
      limit = k + 14;
      for (;k <= (limit) && k < filas.length; k++) {
        filas[k].style.display = "";
      }
      break;
    }
  }
}


/**
 * Evento que carga la pagina seleccionada por el usuario
 * @param {*} idPaginaSeleccionada Pagina seleccionada
 * @param {*} cantidadDePaginas Cantidad de paginas existentes
 */
function cambiarDePagina(idPaginaSeleccionada,cantidadDePaginas){
      
  // Extraemos el numero de la pagina seleccionada
  var paginaSeleccionada = idPaginaSeleccionada.split("-")[1];

  // Extraemos el elemento de la pagina seleccionada
  var elementoPaginaSeleccionada = document.getElementById(idPaginaSeleccionada);   
  
  /**
   * Si selecciono la pagina en la que actualmente esta no se realiza
   * el evento.
   */
  if(elementoPaginaSeleccionada.getAttribute("class") == 'active'){
    return;
  }   

  /**
   * Si el numero seleccionado es el ultimo se debe deshabilitar el boton
   * siguiente.
   */
  if(paginaSeleccionada == cantidadDePaginas){  
    // Deshabilita el boton siguiente
    document.getElementById("next").setAttribute('class', 'disabled'); 
    /**
     * Si hay mas de un agrupamiento, es decir, mas de 1 numero, se desbloquea
     * el boton atras
     */
    if(cantidadDePaginas > 1){
      document.getElementById("previous").removeAttribute('class');
    }              
  }

  /**
   * Si la pagina seleccionada es la primera, es decir, el numero 1 entonces
   * se bloquea el boton atras.
   */
  if(paginaSeleccionada == 1){       
    // Deshabilita el boton atras
    document.getElementById("previous").setAttribute('class', 'disabled'); 
    /**
     * Si hay mas de un agrupamiento, es decir, mas de 1 numero, se desbloquea
     * el boton siguiente
     */
    if(cantidadDePaginas > 1){
      document.getElementById("next").removeAttribute('class');
    }              
  }

  // Habilita el boton atras si el elemento seleccionado no es el 1
  if(paginaSeleccionada > 1 && cantidadDePaginas > 1){
    document.getElementById("previous").removeAttribute('class');
  }

  // Habilita el boton next si el elemento seleccionado no es el ultimo
  if(paginaSeleccionada < cantidadDePaginas && cantidadDePaginas > 1 ){  
    document.getElementById("next").removeAttribute('class');
  }

  /******************************
  * Mostrar items de la tabla
  ******************************/
  var tablaDeCursos, filas, indice;
  tablaDeCursos = document.getElementById("Cursos");
  filas = tablaDeCursos.getElementsByTagName("tr");
  var posicionFinal = ((paginaSeleccionada-1)*cantidadCursosEnPantalla);
      
  for (indice = posicionFinal+1; 
       indice <= (posicionFinal+cantidadCursosEnPantalla) && indice < filas.length; 
       indice++) 
  {
    filas[indice].style.display = "";
  }
    
  /******************************
  * Ocultar elementos
  ******************************/
  // Obtenemos el actual contenedor de numeros de paginas.
  var ulPages = document.getElementById("paginas");

  // Obtenemos la lista de numeros.
  var ulLis   = ulPages.getElementsByTagName("li"); 
  
  // Recorremos para buscar que numero esta actualmente seleccionado
  for(var i = 0 ; i < ulLis.length ; i++){
    // Preguntamos si esta seleccionado.
    if(ulLis[i].getAttribute("class") == 'active'){
      // Numero que esta actualmente seleccionado
      var numeroSeleccionado = ulLis[i].id.split("-")[1];

      // Elimina el sombreado sobre el numero que estaba seleccionado.       
      ulLis[i].removeAttribute('class') ;         

      /**
       * Deshabilita los cursos necesarios
       */
      var initIndex =  ((numeroSeleccionado-1)*cantidadCursosEnPantalla); 
      var endIndex  = (  ((numeroSeleccionado)*cantidadCursosEnPantalla) > filas.length ) 
                      ? ( (initIndex) + (filas.length%cantidadCursosEnPantalla))
                      : ((numeroSeleccionado)*cantidadCursosEnPantalla) ;

      for (indice = initIndex + 1; indice <= endIndex ; indice++) {
        filas[indice].style.display = "none";
      }
      // Se sale del for por que ya oculto los campos
      break;
    }
  }

  // Sombre el nuevo numero seleccionado
  elementoPaginaSeleccionada.setAttribute('class', 'active');
}

/**
 * Método que marca los cursos como agregados ya que cuando se
 * filtra la categoria, se reinician todos los cursos.
 */
function seleccionarCursos(){
  for(let j = 0 ; j<=seleccionados.length ; j++){
    if(document.getElementById(seleccionados[j])){
     document.getElementById(seleccionados[j]).click();
    }
    
  }
}

/**
 * Evento ejecuado al momento de dar click en Registrar Tipo de matricula.
 */
function guardarTipoDeMatricula(){
  $("#submit").click(function(){
    // En esta seccion se capturan todos los datos
    var tipoMatricula = $("#TipoMatricula").val();
    var nombreTipoMatricula = $("#NombreTipoMatricula").val();
    var descripcionTipoMatricula = $("#DescripcionTipoMatricula").val();
    var fechaInicial = $("#fechaInicial").val();
    var fechaFinal = $("#fechaFinal").val();

    // En esta seccion se guardan todos los cursos separados por ","
    var cursos = "";
    for(var j = 0;j<=selecteds.length;j++){
      if(typeof selecteds[j] != 'undefined'){
        cursos += ((selecteds[j]+"").split("-")[1]) + ",";
      }
    }

    // Se obtiene la fecha actual
    var fechaActual = new Date();
    // Se deja la fecha actual sin horas, es decir, si era 10-10-2019 14:23 entonces queda 10-10-2019 00:00
    fechaActual.setHours(0, 0, 0, 0);
    // Con la cadena de texto que contiene la fecha creamos un objeto
    var dateI = new Date(fechaInicial);
    // Se deja la fecha inicial sin horas, es decir, si era 10-10-2019 14:23 entonces queda 10-10-2019 00:00
    dateI.setHours(0, 0, 0, 0);

    // Validamos que todos los campos
    if(tipoMatricula==''||nombreTipoMatricula==''||descripcionTipoMatricula==''||fechaInicial==''||fechaFinal==''){
      alert("Por favor digite todos los campos");
    } 
    // La fecha inicial no debe ser menor que la actual   
    else if( (dateI) < (fechaActual)){
      alert("La fecha inicial debe ser mayor que la fecha actual.");
    // La fecha inicial no debe ser mayor ni igual que la final
    }else if((Date.parse(fechaInicial)) > (Date.parse(fechaFinal))){
      alert("La fecha inicial debe ser menor que la fecha final.");
    // Debe seleccionar por lo menos un curso
    }else if(selecteds.length == 0){
      alert("Debe seleccionar por lo menos un curso");
    }
    else
    {
      /**
       * Si todos los campos estan digitados correctamente entonces se realiza la 
       * petición al server para guardar el tipo de matricula.
       */
      $.ajax({
        type: "POST",
        url: "ProcessRegistrarTM.php",
        data:
        {
          TipoMatricula: tipoMatricula,
          NombreTipoMatricula: nombreTipoMatricula,
          DescripcionTipoMatricula: descripcionTipoMatricula,
          fechaInicial: fechaInicial,
          fechaFinal:fechaFinal,
          cursos: cursos
        },
        cache: false,
                success: function(result){             
                  if(result.trim() == 'Registro exitoso'){                   
                    $('#formRTM').trigger("reset"); 
                    alert(result.trim());
                    location.pathname = "CAO_DES/VerTM.php";
                  }else{
                    alert(result.trim());
                  }                  
                }
        });
    }
    return false;
  });
}

function mostrarMensajeExitoso(){

}