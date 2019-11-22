<?php session_start();

//Proteccion de contenido, sino ha iniciado sesion.
if (isset($_SESSION['user'])) {
  
  //Si se cumple, llamar a la vista de contenido
  require 'views/content.view.php';

} else {

  //Redireccionamiento
  header('Location: login.php');

}

//en caso de que el contenido se cambie, cambie de lugar o se elimine.
//require 'views/content.view.php';

?>