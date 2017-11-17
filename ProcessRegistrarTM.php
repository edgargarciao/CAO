 
<?php
 
$enlace	 = mysql_connect('localhost','root','');
if (!$enlace) {
    die('No se pudo conectar: ' . mysql_error());
}

// create a variable
$tipoMatricula = $_POST['TipoMatricula'];
$nombretipoMatricula = $_POST['NombreTipoMatricula'];
$descripcionTipoMatricula = $_POST['DescripcionTipoMatricula'];

$initDate = date('Y-m-d', strtotime($_POST['initDate'])); 
$finalDate = date('Y-m-d', strtotime($_POST['finalDate']));  
$infoCourses = $_POST['infoCourses'];
$courses = explode(',', $infoCourses);
$now = date('Y-m-d H:i:s');

mysql_select_db('cao');
mysql_query( "INSERT INTO ca_tipo_matricula (tipo_registro, nombre, descripcion,fecha_creacion,fecha_inicio,fecha_fin) VALUES ('$tipoMatricula','$nombretipoMatricula','$descripcionTipoMatricula','$now','$initDate','$finalDate');");
$idTipoMatricula = mysql_insert_id();


foreach ($courses as $course) {
	if(!empty($course)){		
		mysql_query( "INSERT INTO ca_tipo_matricula_curso (tipo_matricula, curso) VALUES ('".$idTipoMatricula."','".$course."');");
	}
}

echo 'Registro exitoso';
