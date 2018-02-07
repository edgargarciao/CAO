<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["tipoDeMatricula"])) {
	$query ="SELECT estudiante.*, fecha_matricula fecha 
			   FROM mdl_user estudiante
	     INNER JOIN cao.ca_matricula m ON m.ID_USER = estudiante.id
	     INNER JOIN cao.ca_tipo_matricula_curso tmc ON  m.ID_TM_CURSO = tmc.id
			  WHERE m.estado = 'Matriculado'
		    	AND tmc.tipo_matricula = '".$_POST["tipoDeMatricula"]."'";

	$results = $db_handle->runQuery($query);
	
	if($results != null){
	foreach($results as $state) {
		$id = $state['id'];
		$firstname = utf8_encode($state['firstname']);
		$lastname = utf8_encode($state['lastname']);
		$fecha = utf8_encode($state['fecha']);
		echo '<tr id="tr-'.$id.'" >';		
		echo '<td>'.$firstname.'</td>';
		echo '<td>'.$lastname.'</td>';
		echo '<td>'.$fecha.'</td>';		
		echo '<td> <label class="switch"> <input id="che-'.$id.'" type="checkbox" onclick="onClickHandler(this.id)" checked> <span class="slider round"></span> </label></td>';
		echo '</tr>';
        
	}
   }
}
?>