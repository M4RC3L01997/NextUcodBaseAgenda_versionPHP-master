<?php
require('conector.php');
session_start();

if (isset($_SESSION['username'])) {
  $con = new ConectorBD();
  if ($con->initConexion('agendaphp')=="OK") {
    $data['fecha_ini'] = '"'.$_POST['start_date'].'"';
    $data['fecha_fin'] = '"'.$_POST['end_date'].'"';
    $data['hora_ini'] = '"'.$_POST['start_hour'].'"';
    $data['hora_fin'] = '"'.$_POST['end_hour'].'"';
    if ($con->actualizarRegistro('eventos', $data, 'id = '.$_POST['id'])) {
      $response['msg']="OK";
    }else {
      $response['msg']= "No se pudo actualizar el registro";
    }
  }else {
    $response['msg'] = "No se ha podido establecer conexión con la base de datos";
  }
}else{
  $response['msg'] = "No se ha iniciado sesión";
}
echo json_encode($response);


 ?>
