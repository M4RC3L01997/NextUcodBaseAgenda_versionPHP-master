<?php
require('conector.php');
session_start();

if (isset($_SESSION['username'])) {
  $usuario=$_SESSION['username'];
  $con = new ConectorBD();
  if ($con->initConexion('agendaphp')=="OK") {
    $resultado = $con->consultar(['eventos'], ['*'], 'WHERE fk_usuario ="'.$usuario.'"');
    if ($resultado) {
      $i=0;
      while ($fila = $resultado->fetch_assoc()) {
        $response['eventos'][$i]['id']=$fila['id'];
        $response['eventos'][$i]['title']=$fila['titulo'];
        if ($fila['fulldia']==1) {
          $response['eventos'][$i]['allDay']=true;
          $response['eventos'][$i]['start']=$fila['fecha_ini'];
          $response['eventos'][$i]['end']=$fila['fecha_fin'];
        }else {
          $response['eventos'][$i]['allDay']=false;
          $response['eventos'][$i]['start']=$fila['fecha_ini']." ".$fila['hora_ini'];
          $response['eventos'][$i]['end']=$fila['fecha_fin']." ".$fila['hora_fin'];
        }



        $i++;
      }
      $response['msg'] = "OK";
    }


  }else {
    $response['msg'] = "No se ha podido establecer conexión con la base de datos";
  }
}else{
  $response['msg'] = "No se ha iniciado sesión";
}

echo json_encode($response);



 ?>
