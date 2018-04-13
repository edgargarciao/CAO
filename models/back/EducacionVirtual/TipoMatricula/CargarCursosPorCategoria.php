<?php

// Importamos el controlador de cursos
include explode("CAO_DES", dirname( __DIR__ ))[0].'CAO_DES'.DIRECTORY_SEPARATOR.'CAO'.DIRECTORY_SEPARATOR.'controllers'.DIRECTORY_SEPARATOR.'CursoController.php';

// Obtenemos el Id de la categoria que buscamos
$categoria = $_POST["categoria"];

// Cargamos la instancia de cursos
$cursos = CursoController::getInstancia();

// Obtenemos todos los cursos por la categoria seleccionada.
$cursosPorCategoria = $cursos->obtenerCursosPorCategoria($categoria);

// recorremos los cursos para retornarlos
foreach($cursosPorCategoria as $curso) {
    echo '<tr id="tr-'.$curso->getId().'" >';		
    echo    '<td>'.$curso->getId().'</td>';
    echo    '<td>'.$curso->getCategoria().'</td>';
    echo    '<td>'.$curso->getNombreCompleto().'</td>';
    echo    '<td>'.$curso->getNombreCorto().'</td>';
    // Aquí es cargado el boton de selección
    echo    '<td>   <label  class="switch"> 
                    <input  id      = "ch-'.$curso->getId().'" 
                            type    = "checkbox" 
                            onclick = "cambiarEstadoDeCurso(this.id)" 
                    checked> 
                    <span class="slider round"></span> 
                    </label>
            </td>';
    echo '</tr>';
}
?>