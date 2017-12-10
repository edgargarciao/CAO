 
<?php

    require 'databasecao.php';
 
	/********************************************
    * Consulta si existen variables
    ********************************************/ 
    if ( !empty($_POST)) {

    	/***************************************
        * Se obtienen los datos para registrar
        ***************************************/
		$tipoMatricula = $_POST['TipoMatricula'];
		$rol = $_POST['rol'];
		$vectorFechaInicial = explode('/', $_POST['initDate']);
        $initDate = $vectorFechaInicial[2].'-'.$vectorFechaInicial[0].'-'.$vectorFechaInicial[1];
        $vectorFechaFinal = explode('/', $_POST['finalDate']);
        $finalDate = $vectorFechaFinal[2].'-'.$vectorFechaFinal[0].'-'.$vectorFechaFinal[1];
		$cursos = explode(',', $_POST['infoCourses']);
		$estudiantes = explode(',', $_POST['estudiantes']);
		$now = date('Y-m-d H:i:s');

        /****************************************************************************************
        * 					Crea una matricula para cada estudiante por cada cada curso
        *****************************************************************************************/
		
		/*******************************
        * Recorre todos los cursos
        ********************************/

		
		foreach ($cursos as $curso) 
		{
			if(!empty($curso))
			{	
				// Obtengo desde la configuración del curso la nota requerida.
				$notaFinal = obtenerNotaFinal($curso);

				// Obtengo el id del curso por tipo de matrícula
				$cursoPorMatricula = obtenerCursoPorMatricula($curso,$tipoMatricula);
				foreach ($estudiantes as $estudiante)
				{ 	
					if(!empty($estudiante))
					{
						insertarMatriculaEnElCao($now,$finalDate,$rol,$notaFinal,$cursoPorMatricula,$estudiante,0);
						insertarMatriculaEnMoodle($now,$finalDate,$rol,$notaFinal,$cursoPorMatricula,$estudiante,0);
			    	}
			    }    
			}
		}

        echo 'Registro exitoso';
    }	

    /***********************************************************
    * Consulta en base de datos la nota final actual que debe 
    * obtener para obtener la certificacion del curso.
    ************************************************************/
    function obtenerNotaFinal($curso){
    	return 70;
    }    

    /***********************************************************
    * Guarda las matriculas en la base de datos CAO para el 
    * control historico de la formación
    ************************************************************/
	function insertarMatriculaEnElCao($now,$finalDate,$rol,$notaFinal,$cursoPorMatricula,$estudiante,$CanHorasSession){
		$pdo = DatabaseCao::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO ca_matricula(fecha_matricula,fecha_finalizacion,ROL,NOTA_REQUERIDA,ID_TM_CURSO,ID_USER ,CanHorasSession) VALUES(?,?,?,?,?,?,?)";        
		$q = $pdo->prepare($sql);
		$q->execute(array($now,$finalDate,$rol,$notaFinal,$cursoPorMatricula,$estudiante,$CanHorasSession));
        DatabaseCao::disconnect();
	}

	/***********************************************************
    * Guarda las matriculas en la base de datos de MOODLE para 
    * permitir el acceso del estudiante y que éste pueda iniciar
    * el curso normalmente por OPENSKY
    ************************************************************/
	function insertarMatriculaEnMoodle($now,$finalDate,$rol,$notaFinal,$tipoMatricula,$estudiante,$CanHorasSession){


	}

	function obtenerCursoPorMatricula($curso,$tipoMatricula){
		/*****************************************************
        * Consulta en BD el ID del tipo de matricula por curso
        ******************************************************/
        $pd = DatabaseCao::connect();
        $pd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        $sql = "SELECT 	ca_tipo_matricula_curso.id id 
        		FROM 	ca_tipo_matricula_curso 
        		WHERE 	tipo_matricula = ?
        		AND 	curso = ?";        
        $q = $pd->prepare($sql);
        $q->execute(array($tipoMatricula,$curso)); 

        /*****************************************************
        * Carga de datos en variables
        ******************************************************/
        $tipoDeMatriculaPorCurso = "";
        $i = 0;
        while ($fila = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {       
            $tipoDeMatriculaPorCurso = $fila[0];         
        }
        return $tipoDeMatriculaPorCurso;
	}

?>