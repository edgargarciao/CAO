<?php
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Database.php');
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dto'.DIRECTORY_SEPARATOR.'TipoMatricula.php');
class TipoMatriculaDao
{

    // Contructor
    function __construct(){        
    }

    /**
     * Método que consulta en base de datos todos los tipos de matrícula actuales.
     * Un tipo de matrícula es actual siempre y cuando la fecha fin de dicho tipo
     * de matrícula sea mayor a la fecha actual.
     */
    function buscarTiposDeMatriculas(){

        // creamos la instancia para conectarnos con la base de datos
        $baseDeDatos = new Database();

        // Diseñamos la consulta.
        $consulta = '   SELECT  tipoMatricula.id                id, 
                                tipoMatricula.nombre            nombre, 
                                tipoMatricula.descripcion       descripcion,
                                tipoMatricula.fecha_creacion    fecha_creacion,
                                tipoMatricula.fecha_inicio      fecha_inicio,
                                tipoMatricula.fecha_fin         fecha_fin,
                                tipoRegistro.nombre             tipo_registro
                        FROM    ca_tipo_matricula               tipoMatricula 
                        INNER JOIN ca_tipo_registro tipoRegistro ON tipoMatricula.tipo_registro = tipoRegistro.id 
                        WHERE   tipoMatricula.fecha_fin > sysdate() 
                        ORDER BY tipoMatricula.id DESC ';
         
        // Realizamos la consulta en base de datos. 
        $resultados = $baseDeDatos->ConsultarCao($consulta);

        // Colocar if ($resultados==false) lanzar error controlado


        // Creamos un array vacio, el cual se llenará y será retornado.
        $tiposDeMatriculas = array();
        
        /**
         * Ahora recorremos los resultados de la búsqueda en base de datos y guardamos 
         * cada registro dentro del array de tipos de matricula creado.
         */
        
        while ($registro = $resultados->fetch_assoc()) {
            
            // Creamos la instancia del tipo de matricula.
            $tipoDeMatricula = new TipoMatricula();

            // Guardamos el registro dentro del objeto creado.
            $tipoDeMatricula->setIdTipoMatricula($registro['id']);
            $tipoDeMatricula->setNombreTipoMatricula($registro['nombre']);
            $tipoDeMatricula->setDescripcion($registro['descripcion']);
            $tipoDeMatricula->setFecha_creacion($registro['fecha_creacion']);
            $tipoDeMatricula->setTipoRegistro($registro['tipo_registro']);

            // Guardamos el tipo de matricula dentro del array de tipos de matricula.
            array_push($tiposDeMatriculas,$tipoDeMatricula);
        }
         
        // Retornamos el resultado
        return $tiposDeMatriculas;
    }


}

?>