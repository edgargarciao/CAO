<?php
require_once("dbcaocontroller.php");
$db_handle = new DBCaoController();
if(!empty($_POST["idTM"])) {
	$query ="SELECT  cur.* 
				FROM ca_tipo_matricula cur  		
		  WHERE cur.tipo_registro = '".$_POST["idTM"]."'";

	$results = $db_handle->runQuery($query);
	
	if($results != null){
		foreach($results as $state) {
			$id = $state['id'];
		    $nombre = utf8_encode($state['nombre']);
			echo '<option value = '.$id.'>'.$nombre.'</option>';        
		}
   }
}
?>