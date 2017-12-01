 
<?php
	require 'databasecao.php';
 	$id = 0; 
 	/************************************
    * Consulta si solamente está cargando 
    * 			la pagina.
    ************************************/
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
    /*************************************
    * Utiliza el metodo POST cuando oprime
    * que si eliminara un registro.
    *************************************/
    if ( !empty($_POST)) {        
        $id = $_POST['id'];       
        if(!tieneCursosConMatriculas($id)){
        	eliminarCursosDelTipoDeMatricula($id);
        	eliminarTipoDeMatricula($id);
        	echo 'Eliminación existosa';
    	}else{
        	echo 'No es pósible eliminar el tipo de matricula.';	
        }       
    } 

    /************************************
    * Consulta si un tipo de matricula 
    * 	 tiene cursos con matriculas
    ************************************/
    function tieneCursosConMatriculas($idTipoMatricula){
    	/*******************************************************
        * Consulta en BD si un curso tiene matriculas asociadas
        *******************************************************/
        $pd = DatabaseCao::connect();
        $pd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        $sql = "SELECT      m.id id
				FROM        ca_tipo_matricula tp
				INNER JOIN 	ca_tipo_matricula_curso tmc ON tmc.tipo_matricula = tp.id
				INNER JOIN  ca_matricula m ON tmc.id = m.ID_TM_CURSO
				AND         tp.id = ?";        
        $q = $pd->prepare($sql);
        $q->execute(array($idTipoMatricula));  

        /*****************************************************
        * Carga de datos en variables
        *****************************************************/
        $TieneMatriculasAsociadasACursos = FALSE;
        while ($fila = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {  
            $TieneMatriculasAsociadasACursos = TRUE;      
            break;        
        }        
        return $TieneMatriculasAsociadasACursos;
    }

    /**************************************
    * Elimina todos los cursos asociados
    * 	 a un tipo de matricula
    **************************************/
    function eliminarCursosDelTipoDeMatricula($id){
    	$pdo = DatabaseCao::connect();
        $sql = "DELETE FROM ca_tipo_matricula_curso WHERE tipo_matricula =  ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        DatabaseCao::disconnect();
    }

    /**************************************
    * Elimina un tipo de matricula y todos
    * 		sus cursos asociados
    **************************************/
    function eliminarTipoDeMatricula($id){
    	$pdo = DatabaseCao::connect();
        mysql_query("DELETE FROM ca_tipo_matricula WHERE id = ? ;");
        $sql = "DELETE FROM ca_tipo_matricula  WHERE id = ?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        DatabaseCao::disconnect();
    }
