<?php
require('conector.php');
session_start();

if (isset($_SESSION['username'])) {
  $con = new ConectorBD();

  if ($con->initConexion('agendaphp')=="OK") {
    //$response['msg']=$_POST['titulo'];
    //echo json_encode($response);
    //die;
    $data['titulo']='"'.$_POST['titulo'].'"';
    $data['fecha_ini']='"'.$_POST['start_date'].'"';
    $data['fecha_fin']='"'.$_POST['end_date'].'"';
    $data['hora_ini']='"'.$_POST['start_hour'].'"';
    $data['hora_fin']='"'.$_POST['end_hour'].'"';
    $data['fk_usuario']='"'.$_SESSION['username'].'"';
    if ($_POST['allDay']=="true") {
      $data['fulldia']=1;
    }else {
      $data['fulldia']=0;
    }

    if ($con->insertData('eventos',$data)) {
      $response['msg']="OK";
    }else {
      $response['msg']= "No se pudo añadir el registro";
    }
  }else {
    $response['msg'] = "No se ha podido establecer conexión con la base de datos";
  }
}else{
  $response['msg'] = "No se ha iniciado sesión";
}
echo json_encode($response);


 ?>
