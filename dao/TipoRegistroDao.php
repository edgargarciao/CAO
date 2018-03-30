<?php
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'Database.php');
require_once(dirname( __DIR__ ).DIRECTORY_SEPARATOR.'dto'.DIRECTORY_SEPARATOR.'TipoRegistro.php');
class TipoRegistroDao
{

    // Contructor
    function __construct(){        
    }

    /**
     * Método que consulta en base de datos todos los tipos de registro.
     */
    function buscarTiposDeRegistro(){

        // creamos la instancia para conectarnos con la base de datos
        $baseDeDatos = new Database();

        // Diseñamos la consulta.
        $consulta = '   SELECT  * 
                        FROM    ca_tipo_registro ';
          
        // Realizamos la consulta en base de datos. 
        $resultados = $baseDeDatos->ConsultarCao($consulta);

        // Colocar if ($resultados==false) lanzar error controlado


        // Creamos un array vacio, el cual se llenará y será retornado.
        $tiposDeRegistros = array();
        
        /**
         * Ahora recorremos los resultados de la búsqueda en base de datos y guardamos 
         * cada registro dentro del array de tipos de registro creado.
         */
        
        while ($registro = $resultados->fetch_assoc()) {
            
            // Creamos la instancia del tipo de matricula.
            $tipoDeRegistro = new TipoRegistro();

            // Guardamos el registro dentro del objeto creado.
            $tipoDeRegistro->setIdTipoRegistro($registro['id']);
            $tipoDeRegistro->setNombreTipoRegistro($registro['nombre']);
            $tipoDeRegistro->setDescripcion($registro['descripcion']);

            // Guardamos el tipo de matricula dentro del array de tipos de matricula.
            array_push($tiposDeRegistros,$tipoDeRegistro);
        }
    
        // Retornamos el resultado
        return $tiposDeRegistros;
    }   
    
    
}

?>