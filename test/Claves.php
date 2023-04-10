<?php

//tabla
$claveUsuario = "SENATI";

$claveMD5 = md5($claveUsuario);
$claveSHA = sha1($claveUsuario);
$claveHASH = password_hash($claveUsuario, PASSWORD_BCRYPT);

//Clave acceso (LOGIN)
$claveAcceso ="SENATI";

//VAR_DUMP($claveHASH);

//Validar clave HASH
if (password_verify($claveAcceso,$claveHASH)){
  echo "Acceso correcto";
}