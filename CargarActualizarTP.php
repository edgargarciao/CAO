<?php
    require 'databasecao.php';
 
    $id = null;
    if ( !empty($_GET['idTm'])) {
        $id = $_REQUEST['idTm'];
    }
     
    if ( null==$id ) {
        header("Location: VerTM.php");
    }
     
    if ( !empty($_POST)) {

    	/***************************************
        * Se obtienen los datos para actualizar
        ***************************************/
		$tipoRegistro = $_POST['TipoRegistro'];
		$tipoMatricula = $_POST['TipoMatricula'];
		$nombretipoMatricula = $_POST['NombreTipoMatricula'];
		$descripcionTipoMatricula = $_POST['DescripcionTipoMatricula'];
		$finalDate = date('Y-m-d', strtotime($_POST['finalDate']));  
		$infoCourses = $_POST['infoCourses'];
		$courses = explode(',', $infoCourses);
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

        actualiazarCursos();


        Database::disconnect();



        echo "Actualización exitosa";
            //header("Location: VerTM.php");
        
    } else {

    	/****************************************************************************************
        * 					 Carga los datos actuales del tipo de matricula
        *****************************************************************************************/
        
        /*************************************
        * Consulta en BD del tipo de matricula
        **************************************/
        $pdo = DatabaseCao::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);               
        $sql = "SELECT * FROM ca_tipo_matricula where id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        /*******************************
        * Carga de datos en variables
        ********************************/
        $tipo_registro = $data['tipo_registro'];
        $nombre = $data['nombre'];
        $descripcion = $data['descripcion'];
        $fecha_in = $data['fecha_inicio'];
        $fecha_inicial = date("m-d-Y", strtotime($fecha_in));
        $fecha_fin = $data['fecha_fin'];
        $fecha_final = date("m-d-Y", strtotime($fecha_fin));

        /*************************************
        * Consulta en BD los cursos asociados
        *       al tipo de matricula
        **************************************/
        $sql = "SELECT 	c.id id,c.fullname fullname,c.shortname shortname,c.category category  
				FROM 	ca_tipo_matricula_curso tmc 
				INNER JOIN moodle.mdl_course c ON tmc.curso = c.id
				WHERE 	tipo_matricula = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $results = array();
        $i = 0;

        /*******************************
        * Carga de datos en variables
        ********************************/
 		while ($fila = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
 					$results[$i]['id'] = $fila[0]; 
 					$results[$i]['category'] = $fila[1]; 
 					$results[$i]['fullname'] = $fila[2]; 
 					$results[$i]['shortname'] = $fila[3];
 					$i++;
    	}

        DatabaseCao::disconnect();
    }


/************************************
* Actualiza los cursos asociados a un
* 		tipo de matricula
************************************/
function actualiazarCursos($courses){
	
}



?>