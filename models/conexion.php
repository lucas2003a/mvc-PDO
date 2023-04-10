<?php
//esta clase le permitirá a los modelos acceder y consumir los datos
class Conexion{

  //Atributos
  private $host = "localhost";  //Servidor
  private $port = "3306";       //Puerto de comunicacion BD
  private $database = "senati"; //Nombre BD
  private $charset = "UTF8";    //Codificacion (idioma)
  private $user = "root";       //Usuario(raíz)
  private $password = "";       //Contraseña

  //Atributo (inicia PDO) que almacena la conexion
  private $pdo;
  
  //Método 1:Acceder a la BD
  private function conectarServidor(){
    //Constructor:
    //neew PDO("CADENA_CONEXION","USER","PASWORD");
    $conexion = new PDO("mysql:host={$this->host};port={$this->port};dbname={$this->database};charset={$this->charset}",$this->user,$this->password);

    return $conexion;
  }

  //Método 2: retornar el acceso
  public function getConexion(){
    try{
      //Pasaremos la conexión el atributo/objeto $pdo;
      $this->pdo = $this->conectarServidor();

      //Controlar los errores (será constrolado por los TRY-CATCH)
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //Retornamos la conexión al modelo que lo necesite
      return $this->pdo;
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
}
?>