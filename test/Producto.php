<?php

class Producto{

  private $tipo = "";
  private $marca = "";
  private $precio = 0.0;

  //Método para actualizar los atributos
  //SET = ASIGNAR | escribir
  //GET = OBTENER | leer
  public function setTipo($value){
    $this->tipo = $value;
  }

  public function getTipo(){
    return $this->tipo;
  }

  ///// GET-SET MARCA
  public function setMarca($value){
    $this->marca = $value;
  }

  public function getMarca(){
    return $this->marca;
  }

  /// precio
  public function setPrecio($value){
    $this->precio = $value;
  }
  public function getPrecio(){
    return $this->precio;
  }

}

//INSTANCIA
$producto1 = new Producto();
$producto1->setTipo("TECLADO");
$producto1->setMarca("SONIC");
$producto1->setPrecio("200");

echo $producto1->getTipo();
echo $producto1->getMarca();
echo $producto1->getPrecio();