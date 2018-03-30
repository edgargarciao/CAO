<?php

require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dao'.DIRECTORY_SEPARATOR.'CursoDao.php');
class CursoController{
        
    private static $instance;

    private $cursoDao;

    // Constructor para instanciar el atributo cursoDao
    public function __construct(){
        $this->cursoDao = new CursoDao();
    }

    // retornamos todos las categorias de cursos
    function buscarCategorias(){        
        return $this->cursoDao->buscarCategorias();
    }
}

?>