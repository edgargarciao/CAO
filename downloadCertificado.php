 
<?php

    require 'databasecao.php';
 
	/********************************************
    * Consulta si viene el id del certificado
    ********************************************/ 
    if ( !empty($_GET['idCert'])) {
        $certificado = $_GET['idCert'];

        /****************************************************************************************
        * 					Carga el certificado desde la base de datos
        *****************************************************************************************/
        $pd = DatabaseCao::connect();
        $pd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        $sql = "SELECT  cert.contenido contenido, cert.nombre nombre, LENGTH(cert.contenido) tamaño
                FROM    ca_certificado cert 
                WHERE   id = ?";        
        $q = $pd->prepare($sql);
        echo '<'.$certificado.'>';
        $q->execute(array($certificado));         

        /*****************************************************
        * Carga de datos en variables
        ******************************************************/
        $contenido = "";
        $nombre = "";
        $tamaño = "";
        $tipo = "";
        while ($fila = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {       
            $contenido = $fila[0];         
            $nombre = $fila[1];
            $tamaño = $fila[2];
            $tipo = mime_content_type($nombre);
        }

        header("Content-Type: $tipo");
        header("Content-Length: $tamaño");
        header("Content-Disposition: attachment; filename= $nombre");

        DatabaseCao::disconnect();

        echo $contenido;
    }	

?>