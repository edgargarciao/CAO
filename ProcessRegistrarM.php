 
<?php
 
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
		$courses = explode(',', $_POST['infoCourses']);
		$estudiantes = explode(',', $_POST['estudiantes']);
		$now = date('Y-m-d H:i:s');

        /****************************************************************************************
        * 					Crea una matricula para cada estudiante por cada cada curso
        *****************************************************************************************/
		
		/*******************************
        * Recorre todos los cursos
        ********************************/

		foreach ($courses as $course) 
		{
			if(!empty($course))
			{	
				// Obtengo desde la configuracion del curso la nota requerida.
				$notaFinal = obtenerNotaFinal($course);

				foreach ($estudiantes as $estudiante)
				{ 	
					if(!empty($estudiante))
					{
						insertarMatriculaEnElCao($now,$finalDate,$rol,$notaFinal,$tipoMatricula,$estudiante,0);
						insertarMatriculaEnMoodle($now,$finalDate,$rol,$notaFinal,$tipoMatricula,$estudiante,0);
			    	}
			    }    
			}
		}

        DatabaseCao::disconnect();
        echo 'Registro exitoso';
    }	

    /***********************************************************
    * Consulta en base de datos la nota final actual que debe 
    * obtener para obtener la certificacion del curso.
    ************************************************************/
    function obtenerNotaFinal($course){
    	return 70;
    }    

    /***********************************************************
    * Guarda las matriculas en la base de datos CAO para el 
    * control historico de la formación
    ************************************************************/
	function insertarMatriculaEnElCao($now,$finalDate,$rol,$notaFinal,$tipoMatricula,$estudiante,$CanHorasSession){
		$pdo = DatabaseCao::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO ca_matricula(fecha_matricula,fecha_finalizacion,ROL,NOTA_REQUERIDA,ID_TM_CURSO,ID_USER ,CanHorasSession) VALUES(?,?,?,?,?,?,?)";        
		$q = $pdo->prepare($sql);
		$q->execute(array($now,$finalDate,$rol,$notaFinal,$tipoMatricula,$estudiante,0));

	}

	/***********************************************************
    * Guarda las matriculas en la base de datos de MOODLE para 
    * permitir el acceso del estudiante y que éste pueda iniciar
    * el curso normalmente por OPENSKY
    ************************************************************/
	function insertarMatriculaEnMoodle($now,$finalDate,$rol,$notaFinal,$tipoMatricula,$estudiante,$CanHorasSession){


	}

?>