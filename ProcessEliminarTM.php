 
<?php
 
$enlace	 = mysql_connect('localhost','root','');
if (!$enlace) {
    die('No se pudo conectar: ' . mysql_error());
}

// create a variable
$tipoMatricula = $_POST['TipoMatricula'];
mysql_select_db('cao');
/*
$resultado = mysql_query("SELECT cc.id FROM ca_tipo_matricula_curso cc WHERE tipo_matricula = ".$tipoMatricula);
if (!$resultado) {
    $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
    $mensaje .= 'Consulta completa: ' . $consulta;
    die($mensaje);
}

while ($fila = mysql_fetch_assoc($resultado)) {
	mysql_query( "DELETE FROM ca_tipo_matricula_curso WHERE ");

    echo $fila['nombre'];
    echo $fila['apellido'];
    echo $fila['direccion'];
    echo $fila['edad'];
}*/


mysql_query("DELETE FROM ca_tipo_matricula_curso WHERE tipo_matricula = ".$tipoMatricula.";");
mysql_query("DELETE FROM ca_tipo_matricula WHERE id = ".$tipoMatricula.";");

echo 'Eliminación exitosa.';
