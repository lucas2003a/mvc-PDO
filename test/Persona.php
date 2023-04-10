<?php

class Persona{

  private $apellidos;
  private $nombres;
  private $estadoCivil;
  private $numeroHijos;
  private $telefono;

  //Métodos mágicos 
  public function __GET($atributo){
    return $this->$atributo;
  }

  public function __SET($atributo,$valor){
    $this->$atributo = $valor;
  }
}

$persona1 = new Persona();

$persona1->__SET("apellidos","ATUNCAR VALERIO",);
$persona1->__SET("nombres","LUCAS ALFREDO");
$persona1->__SET("telefono","922634773");

echo $persona1->__GET("apellidos");
echo $persona1->__GET("nombres");
echo $persona1->__GET("telefono");
