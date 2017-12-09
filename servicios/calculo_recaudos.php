<?php 
$curso= $_POST['curso'];
include '../databaseCao.php';
$pdo = DatabaseCao::connect();

IF($curso=="defecto"){
$query="SELECT SUM(ca_matricula.CanHorasSession) as sumatoria
		FROM ca_matricula
		WHERE YEAR(ca_matricula.fecha_matricula)=YEAR(NOW())";
foreach ($pdo->query($query) as $row)
{
	$variable=$row['sumatoria'];	
	if(is_null($variable))
	{
		$resultado="0";	
	}else
	{
		$resultado=$variable;
	}
	
}

$query="SELECT SUM(ca_matricula.CanHorasSession) as sumatoria
		FROM ca_matricula,ca_certificado
		WHERE YEAR(ca_matricula.fecha_matricula)=YEAR(NOW())
        AND ca_matricula.id=ca_certificado.matricula";
foreach ($pdo->query($query) as $row)
{
	$variable=$row['sumatoria'];	
	if(is_null($variable))
	{
		$resultado.=","."0";	
	}else
	{
		$resultado.=",".$variable;
	}
}
$query="SELECT SUM(ca_matricula.CanHorasSession) as sumatoria
		FROM ca_matricula,ca_certificado
		WHERE YEAR(ca_matricula.fecha_matricula)=YEAR(NOW())
        AND ca_matricula.id!=ca_certificado.matricula";
foreach ($pdo->query($query) as $row)
{
	$variable=$row['sumatoria'];	
	if(is_null($variable))
	{
		$resultado.=","."0";		
	}else
	{
		$resultado.=",".$variable;
	}
}


}else{

$query="SELECT SUM(ca_matricula.CanHorasSession) as sumatoria
		FROM ca_matricula, ca_tipo_matricula_curso
		WHERE YEAR(ca_matricula.fecha_matricula)=YEAR(NOW())
        AND	ca_matricula.ID_TM_CURSO= ca_tipo_matricula_curso.id
        and ca_tipo_matricula_curso.curso=".$curso;
foreach ($pdo->query($query) as $row)
{
	$variable=$row['sumatoria'];	
	if(is_null($variable))
	{
		$resultado="0";	
	}else
	{
		$resultado=$variable;
	}
	
}

$query="SELECT SUM(ca_matricula.CanHorasSession) as sumatoria
		FROM ca_matricula, ca_tipo_matricula_curso,ca_certificado
		WHERE YEAR(ca_matricula.fecha_matricula)=YEAR(NOW())
        AND	ca_matricula.ID_TM_CURSO= ca_tipo_matricula_curso.id
        AND ca_matricula.id=ca_certificado.matricula
        and ca_tipo_matricula_curso.curso=".$curso;
foreach ($pdo->query($query) as $row)
{
	$variable=$row['sumatoria'];	
	if(is_null($variable))
	{
		$resultado.=","."0";	
	}else
	{
		$resultado.=",".$variable;
	}
}
$query="SELECT SUM(ca_matricula.CanHorasSession) as sumatoria
		FROM ca_matricula, ca_tipo_matricula_curso,ca_certificado
		WHERE YEAR(ca_matricula.fecha_matricula)=YEAR(NOW())
        AND	ca_matricula.ID_TM_CURSO= ca_tipo_matricula_curso.id
        AND ca_matricula.id!=ca_certificado.matricula
        and ca_tipo_matricula_curso.curso=".$curso;
foreach ($pdo->query($query) as $row)
{
	$variable=$row['sumatoria'];	
	if(is_null($variable))
	{
		$resultado.=","."0";		
	}else
	{
		$resultado.=",".$variable;
	}
}






}

echo $resultado;
?>