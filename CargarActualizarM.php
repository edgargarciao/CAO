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
        $matricula = $_POST['matricula'];
        $vectorFecha = explode('/', $_POST['finalDate']);
        $finalDate = $vectorFecha[2].'-'.$vectorFecha[0].'-'.$vectorFecha[1];

        /****************************************************************************************
        * 								Actualizar tipo de matricula
        *****************************************************************************************/
        $pdo = DatabaseCao::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		/*************************************************************
        * Actualiza la matricula siempre y cuando no tenga notas ya
        * registradas
        **************************************************************/
        if(!existenNotasRegistradas($matricula)){
    		$sql = "UPDATE ca_matricula SET fecha_finalizacion = ? WHERE id = ?";                
            $q = $pdo->prepare($sql);
            $q->execute(array($finalDate,$matricula));
            DatabaseCao::disconnect();
            echo ('Actualización exitosa');
        }else{
            echo ('Actualización rechazada');
        }    


        
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

    /*****************************************
    * Consulta en la base de datos de mooodle 
    * si la matricula tiene notas registradas.
    ******************************************/
    function existenNotasRegistradas($matricula){
        return false;
    }
?>