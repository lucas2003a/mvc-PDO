<?php

require_once '../models/Usuario.php';

if (isset($_POST['operacion'])){
  $usuario = new Usuario();

  //Identificando la operación..
  if ($_POST['operacion'] == 'login'){

    $registro = $usuario->iniciarSesion($_POST['nombreusuario']);

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