<?php
    require 'databasecao.php';
 
    $id = null;
    if ( !empty($_GET['idM'])) {
        $id = $_REQUEST['idM'];
    }           
     
    /********************************************
    * Si solamente esta cargando la pagina
    * entonces carga los datos en las variables.
    ********************************************/ 
    if ( !empty($_POST)) {

    	/***************************************
        * Se obtienen los datos para actualizar
        ***************************************/
		$tipoRegistro = $_POST['TipoRegistro'];
		$tipoMatricula = $_POST['TipoMatricula'];
		$nombretipoMatricula = $_POST['NombreTipoMatricula'];
		$descripcionTipoMatricula = $_POST['DescripcionTipoMatricula'];
        $vectorFecha = explode('/', $_POST['finalDate']);
        $finalDate = $vectorFecha[2].'-'.$vectorFecha[0].'-'.$vectorFecha[1];
		$infoCourses = $_POST['infoCourses'];
		$cursosSeleccionados = explode(',', $infoCourses);
		$now = date('Y-m-d H:i:s');

        /****************************************************************************************
        * 								Actualizar tipo de matricula
        *****************************************************************************************/
        $pdo = DatabaseCao::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		/*******************************
        * Actualiza el tipo de matricula
        ********************************/
		$sql = "UPDATE ca_tipo_matricula  set tipo_registro = ?, nombre = ?, descripcion =?, fecha_fin =? WHERE id = ?";        
        $q = $pdo->prepare($sql);
        $q->execute(array($tipoRegistro,$nombretipoMatricula,$descripcionTipoMatricula,$finalDate,$tipoMatricula));
        
        /*******************************
        * Actualiza los cursos asociados
        ********************************/           
        $cursosActuales = cargarCursosActuales($tipoMatricula);
        agregarCursos($cursosSeleccionados,$cursosActuales,$tipoMatricula);
        $cursosEliminados = eliminarCursos($cursosSeleccionados,$cursosActuales,$tipoMatricula);        
        DatabaseCao::disconnect();

        echo 'Actualización exitosa/'.(implode('-',$cursosEliminados));
        
    } else {

    	/****************************************************************************************
        * 					 Carga los datos actuales de la matrícula
        *****************************************************************************************/
        
        /*************************************
        * Consulta en BD la matrícula
        **************************************/
        $pdo = DatabaseCao::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);               
        $sql = "SELECT * FROM ca_matricula where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        /*******************************
        * Carga de datos en variables
        ********************************/
        $fecha_fin = $data['fecha_finalizacion'];
        $fecha_final = date("m/d/Y", strtotime($fecha_fin));  

        DatabaseCao::disconnect();
    }

    /****************************************
    * Asocia un curso a un tipo de matricula
    *****************************************/
    function agregarCurso($tipoMatricula,$cursoParaAgregar){
        $pdo = DatabaseCao::connect();
            if($cursoParaAgregar!=null){
                $sql = "INSERT INTO ca_tipo_matricula_curso (tipo_matricula, curso) VALUES (?,?);";        
                $q = $pdo->prepare($sql);
                $q->execute(array($tipoMatricula,$cursoParaAgregar));
            }      
    }

    function eliminarCurso($cursoParaEliminar,$tipoMatricula){
        if(!TieneMatriculasAsociadas($cursoParaEliminar)){
            $pdo = DatabaseCao::connect();           
            $sql = "DELETE FROM ca_tipo_matricula_curso WHERE tipo_matricula = ? AND curso = ?";        
            $q = $pdo->prepare($sql);
            $q->execute(array($tipoMatricula,$cursoParaEliminar));
            return true;
        }
        return false;    
    }

    function TieneMatriculasAsociadas($cursoParaEliminar){
        /*******************************************************
        * Consulta en BD si un curso tiene matriculas asociadas
        ********************************************************/
        $pd = DatabaseCao::connect();
        $pd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        $sql = "SELECT      m.id id
                FROM        ca_tipo_matricula_curso tmc
                INNER JOIN  ca_matricula m ON tmc.id = m.ID_TM_CURSO
                AND         tmc.curso = ?";        
        $q = $pd->prepare($sql);
        $q->execute(array($cursoParaEliminar));  

        /*****************************************************
        * Carga de datos en variables
        ******************************************************/
        $TieneMatriculasAsociadasACursos = false;
        while ($fila = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {            
            $TieneMatriculasAsociadasACursos = true;      
            break;        
        }
        return $TieneMatriculasAsociadasACursos;

    }

    /*************************************
    * Obtiene todos los tipos de matricula 
    *          por curso
    *************************************/
    function cargarCursosActuales($tipoMatricula){
        /*****************************************************
        * Consulta en BD los tipos de matricula por curso
        ******************************************************/
        $pd = DatabaseCao::connect();
        $pd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        $sql = "SELECT ca_tipo_matricula_curso.curso curso FROM ca_tipo_matricula_curso WHERE tipo_matricula = ?";        
        $q = $pd->prepare($sql);
        $q->execute(array($tipoMatricula)); 

        /*****************************************************
        * Carga de datos en variables
        ******************************************************/
        $cursosActuales = array();
        $i = 0;
        while ($fila = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {       
            $cursosActuales[$i++] = $fila[0];         
        }
        return $cursosActuales;
    }

    /*****************************************************
    * Dados todos los cursos seleccionados por el usuario 
    * y los cursos que tiene actualmente en la BD Permite 
    *     eliminar los que haya des-seleccionado. 
    *****************************************************/
    function eliminarCursos($cursosSeleccionados,$cursosActuales,$tipoMatricula){
        $i=0;
        $cursosEliminados = array();
        foreach ($cursosActuales as $cursoActual) {
            if(!in_array($cursoActual, $cursosSeleccionados)){
                if(eliminarCurso($cursoActual,$tipoMatricula))
                {
                    $cursosEliminados[$i++] = $cursoActual;
                }
            }
        }
        return $cursosEliminados;
    }

    /*****************************************************
    * Dados todos los cursos seleccionados por el usuario 
    * y los cursos que tiene actualmente en la BD Permite 
    *     agregar los que no esten en la BD.
    *****************************************************/
    function agregarCursos($cursosSeleccionados,$cursosActuales,$tipoMatricula){
        foreach ($cursosSeleccionados as $cursoSeleccionado) {
            if(!in_array($cursoSeleccionado, $cursosActuales)){
                agregarCurso($tipoMatricula,$cursoSeleccionado);
            }
        }
    }
?>