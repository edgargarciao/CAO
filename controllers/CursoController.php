<?php
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dao'.DIRECTORY_SEPARATOR.'CursoDao.php');
class CursoController{
        
    private static $instancia;
    private $cursoDao;

    // Método para obtener la instancia de la clase.
    public static function getInstancia()
    {
        if(!self::$instancia) { // If no instance then make one
			self::$instancia = new self();
		}
		return self::$instancia;
    }

    // Constructor para instanciar el atributo cursoDao
    public function __construct(){       
        $this->cursoDao = new CursoDao();        
    }

    // retornamos todos las categorias de cursos
    function buscarCategorias(){                     
        return $this->cursoDao->buscarCategorias();
    }

    // 
    function obtenerCursosPorCategoria($idCategoria){
        return $this->cursoDao->obtenerCursosPorCategoria($idCategoria);
    }
}

?>