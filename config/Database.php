<?php

// Variables de configuración
include 'config.php';

class Database
{
  private $_conexionCao;
  private $_conexionMoodle;
  private static $_instance;
  private $_host = "localhost";
  private $_username = "root";
  private $_password = "";
  private $_databaseCao = "cao";
  private $_databaseMoodle = "moodle";

  // Constructor
  function __construct() {
  }

  // Metodo que realiza la conexión con la base de datos del CAO
  private function conectarCao(){
    
    // Crea una instancia de la conexion a base de datos del CAO
    $this->_conexionCao = new mysqli(Config::$DB_SERVER, Config::$DB_USERNAME, 
    Config::$DB_PASSWORD, Config::$DB_NAME_CAO);

    // Cambiar el conjunto de caracteres a utf8
    mysqli_set_charset($this->_conexionCao, "utf8");
    
    // Error handling
    if(mysqli_connect_error()) {
      trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
        E_USER_ERROR);
    }
  }

  // Metodo que realiza la conexión con la base de datos de moodle
  private function conectarMoodle(){
    
    // Crea una instancia de la conexion a base de datos de moodle
    $this->_conexionMoodle = new mysqli(Config::$DB_SERVER, Config::$DB_USERNAME, 
    Config::$DB_PASSWORD, Config::$DB_NAME_MOODLE);

    // Cambiar el conjunto de caracteres a utf8
    mysqli_set_charset($this->_conexionMoodle, "utf8");

    // Error handling
    if(mysqli_connect_error()) {
      trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
        E_USER_ERROR);
    }
  }

  /**
   * Metodo que desconecta la base de datos del CAO
   */
  private function desconectarCao()
  {
    $this->_conexionCao->close();
  }

  /**
   * Metodo que desconecta la base de datos de Moodle
   */
  private function desconectarMoodle()
  {
    $this->_conexionMoodle->close();
  }  

  /**
   * Metodo para realizar consultas sobre la base de datos del CAO
   */

  public function ConsultarCao($consulta)
  {
    $this->conectarCao();
        
    $resultados =  $this->_conexionCao->query($consulta);        
    if( $this->_conexionCao->error){     
      $this->desconectarCao(); 
      return false;
    }    
    $this->desconectarCao();   
    return $resultados;      
  } 
  
  /**
   * Metodo para realizar consultas sobre la base de datos de moodle
   */
  public function consultarMoodle($consulta)
  {
    $this->conectarMoodle();
    $resultados =  $this->_conexionMoodle->query($consulta);
    if( $this->_conexionMoodle->error){
      $this->desconectarMoodle();   
      return false;
    }
    $this->desconectarMoodle();   
    return $resultados;
  }    

  /**
   * Metodo que actualiza la base de datos del CAO
   */
  public function ActualizarCao($sql)
  {
    $respuesta = false;
    $this->conectarCao();    
    $respuesta = ($this->_conexionCao->query($sql) === TRUE) ? true : $conn->error ;
    $this->desconectarCao();   
    return $respuesta;    
  }   

  /**
   * Metodo que actualiza la base de datos de moodle
   */
  public function ActualizarMoodle($sql)
  {
    $respuesta = false;
    $this->conectarCao();    
    $respuesta = ($this->_conexionMoodle->query($sql) === TRUE) ? true : $conn->error ;
    $this->desconectarCao();   
    return $respuesta;    
  }     
}
?>