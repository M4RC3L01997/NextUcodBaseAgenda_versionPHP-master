<?php

require('conector.php');

$con = new ConectorBD();
$con->initConexion('agendaphp');

$hash = password_hash('32612595', PASSWORD_DEFAULT);

$data['username']= '"Alfredover"';
$data['password']= '"'.$hash.'"';
$data['nombre']='"Alfredo Vergara"';
$data['fecha_nacimiento']='"1976-07-26"';
$con->insertData('usuarios', $data);

 ?>
