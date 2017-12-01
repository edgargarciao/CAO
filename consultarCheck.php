<?php
    require 'databasecao.php';
	$estaEnBaseDeDatos = null;
	$pdo = DatabaseCao::connect();
	$sql = "SELECT 		m.id 
			FROM 		ca_tipo_matricula_curso tmc
			INNER JOIN  ca_matricula m ON m.ID_TM_CURSO = tmc.id
			WHERE 		tmc.curso = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($_POST['idCurso']));
    $estaEnBaseDeDatos = null;
	while ($fila = $q->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
 		$estaEnBaseDeDatos = $fila[0]; 	
 		break;				
    }
	echo $estaEnBaseDeDatos;
?>