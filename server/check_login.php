<?php
require('conector.php');

$con = new ConectorBD();

if ($con->initConexion('agendaphp')=='OK') {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $response['msg']="conecto";
  $resultado = $con->consultar(['usuarios'], ['username','password'], 'WHERE username = "'.$username.'"');
  $hash=$resultado->fetch_assoc()['password'];

  if ($resultado->num_rows == 1) {
    if (password_verify($password, $hash)) {
        session_start();
        $_SESSION['username']=$username;
        $response['msg']="OK";
      }else {
        $response['msg']="Contraseña incorrecto.".$resultado->fetch_assoc()['password'];
      }
  }else {
    $response['msg']="Usuario $username no existe.";
  }


}else {
  $response['msg'] = "No se ha podido conectar con la base de datos";
}
$con->cerrarConexion();
echo json_encode($response);




 ?>
