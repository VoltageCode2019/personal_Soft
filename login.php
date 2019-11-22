<?php session_start();

//Si el usuario no esta iniciado, mandar al index
if (isset($_SESSION['user'])) {
  
  header('Location: index.php');

}

$php_errormsg = '';

//Si el usuario no esta iniciado, mandar al index
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  //Nombre usuario
  $user =filter_var(strtolower($_POST['user']), FILTER_SANITIZE_STRING);
  //Contraseña usuario
  $password = $_POST['password'];

  //Hash o encriptado de contraseñas
  $password = hash('sha512', $password);

  try {
    //Conectarse a la base de datos del sitio
    $conection = new PDO('mysql:host=127.0.0.1;dbname=//nombre_de_la_base_de_datos', 'usuario', 'contraseña' );
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }

  $statement = $conection->prepare('SELECT * FROM /*Nombre de la Tabla*/ WHERE user = :user AND pass = :password');
  $statement->execute(array(':user' => $user, ':password' => $password));

  $result = $statement->fetch();

  //Comprobacion de datos para ingreso
  if ($result !== false) {
    $_SESSION['user'] = $user;
    header('Location: index.php');
  } else {
    $php_errormsg .= '<li>Datos incorrectos</li>';
  }
}
 
require 'views/login.view.php';
 
?>