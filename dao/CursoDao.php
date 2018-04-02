<?php
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Database.php');
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dto'.DIRECTORY_SEPARATOR.'Categoria.php');
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dto'.DIRECTORY_SEPARATOR.'Curso.php');
class CursoDao
{

    // Contructor
    function __construct(){           
    }

    /**
     * Método que consulta en base de datos todos los tipos de registro.
     */
    function buscarCategorias(){
        
        // creamos la instancia para conectarnos con la base de datos
        $baseDeDatos = new Database();
        
        // Diseñamos la consulta.
        $consulta = '   SELECT   id id,
                                 name nombre 
                        FROM     mdl_course_categories 
                        WHERE    parent = 0 
                        ORDER BY id';
         
        // Realizamos la consulta en base de datos. 
        $resultados = $baseDeDatos->ConsultarMoodle($consulta);
        
        // Colocar if ($resultados==false) lanzar error controlado


        // Creamos un array vacio, el cual se llenará y será retornado.
        $categorias = array();
        
        /**
         * Ahora recorremos los resultados de la búsqueda en base de datos y guardamos 
         * cada registro dentro del array de tipos de registro creado.
         */
        
        while ($registro = $resultados->fetch_assoc()) {
            
            // Creamos la instancia del tipo de matricula.
            $categoria = new Categoria();

            // Guardamos el registro dentro del objeto creado.
            $categoria->setId($registro['id']);
            $categoria->setNombre($registro['nombre']);

            // Guardamos el tipo de matricula dentro del array de tipos de matricula.
            array_push($categorias,$categoria);
        }
    
        // Retornamos el resultado
        return $categorias;
    }   

    /**
     * Método con el cual podemos obtener todos los cursos de una categoria especificamente.
     */
    function obtenerCursosPorCategoria($categoria){
            
        // creamos la instancia para conectarnos con la base de datos
        $baseDeDatos = new Database();
        
        // Diseñamos la consulta.
        $consulta = "   SELECT  cursos.* 
                        FROM    mdl_course cursos 
                        INNER JOIN  mdl_course_categories cursoCategorias ON cursoCategorias.id = cursos.category    
                        INNER JOIN  mdl_course_categories categoria ON categoria.id = cursoCategorias.parent 
                        WHERE   categoria.id = '".$categoria."'";
         
        // Realizamos la consulta en base de datos. 
        $resultados = $baseDeDatos->ConsultarMoodle($consulta);
        
        // Colocar if ($resultados==false) lanzar error controlado


        // Creamos un array vacio, el cual se llenará y será retornado.
        $cursos = array();
        
        /**
         * Ahora recorremos los resultados de la búsqueda en base de datos y guardamos 
         * cada registro dentro del array de cursos creado.
         */
        while ($registro = $resultados->fetch_assoc()) {
            
            // Creamos la instancia del curso.
            $curso = new Curso();

            // Guardamos el registro dentro del objeto creado.
            $curso->setId($registro['id']);
            $curso->setNombreCorto($registro['shortname']);
            $curso->setNombreCompleto($registro['fullname']);
            $curso->setCategoria($registro['category']);

            // Guardamos el tipo de matricula dentro del array de cursos.
            array_push($cursos,$curso);
        }
    
        // Retornamos el resultado
        return $cursos;
    }
    
    
}

?>