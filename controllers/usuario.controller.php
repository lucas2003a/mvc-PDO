<?php
session_start();
require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){
  $usuario = new Usuario();

  //Identificando la operación..
  if ($_POST['operacion'] == 'login'){

    $registro = $usuario->iniciarSesion($_POST['nombreusuario']);

    $_SESSION["login"] = false;

    //Obheto para contener el resultado
    $resultado = [
      "status"  => false,
      "mensaje" => ""
    ];
    
    if ($registro){
      //El usuario si existe
      $claveEncriptada = $registro["claveacceso"];

      //Validar la contraseña
      if (password_verify($_POST['claveIngresada'], $claveEncriptada)){
        $resultado["status"] = true;
        $resultado["mensaje"] = "Bienvenido al sistema";
        $_SESSION["login"] = true;
      }else{
        $resultado["mensaje"] = "Error en la contraseña";
      }
    }else{
      //El usuiario si existe
      $resultado["mensaje"] = "No encontramos el usuario";
    }

    //Enviamos el objetivo resultado a la vista
    echo json_encode($resultado);

  }
}

//Interceptar valoes que llegan por la URl
if (isset($_GET['operacion'])){

  if ($_GET['operacion'] == 'finalizar'){
    session_destroy();
    session_unset();
    header('Location:../index.php');
  }
}