<?php
include '../../../controllers/TipoMatriculaController.php';
$tiposDeMatricula = TipoMatriculaController::getInstancia();												
foreach ($tiposDeMatricula->buscarTiposDeMatriculas() as $tipoDeMatricula) {
    echo '<tr>';
	echo '<td>'. $tipoDeMatricula->getId() . '</td>';
	echo '<td>'. $tipoDeMatricula->getTipoRegistro() . '</td>';
	echo '<td>'. $tipoDeMatricula->getNombre() . '</td>';
	echo '<td>'. $tipoDeMatricula->getDescripcion() . '</td>';
	echo '<td>'. $tipoDeMatricula->getFecha_creacion() . '</td>';
	echo '<td width=230>';
    echo '<a class="btn btn-primary" href="ActualizarTP.php?idTm='. $tipoDeMatricula->getId().'">Actualizar</a>';
    echo ' ';
	echo '<a class="btn btn-danger" href="EliminarTP.php?id='. $tipoDeMatricula->getId().'">Eliminar</a>';
	echo '</td>';
	echo '</tr>';
}
	
?>