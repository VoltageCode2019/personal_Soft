<?php session_start();

//Si el usuario no esta iniciado, mandar al index
if (isset($_SESSION['user'])) {
  
  header('Location: index.php');

}

$php_errormsg = '';

//Metodo de requerimiento - Method Post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Nombre usuario
  $user = filter_var(strtolower($_POST['user']), FILTER_SANITIZE_STRING);
  //Contraseña usuario
  $password = filter_var(strtolower($_POST['password']));
  //Repetir contraseña usuario
  $password2 = filter_var(strtolower($_POST['password2']));

  //Mensaje de Error predeterminado
  $php_errormsg = '';

  //Validacion para errores
  if (empty($user) or empty($password) or empty($password2)) {

    //Mensaje de validacion para los campos sin contenido
    $php_errormsg .= '<li>Todos los campos son obligatorios</li>';

  } else {

    try {

      //Conectarse a la base de datos del sitio
      $conection = new PDO('mysql:host=127.0.0.1;dbname=//nombre_de_la_base_de_datos', 'usuario', 'contraseña' );

    } catch (PDOException $e) {

      //En caso de ser incorrecto, mensaje de error
      echo "Error: " . $e->getMessage();

    }

    //Tomar los datos de la base de datos
    $statement = $conection->prepare(('SELECT * FROM /*Nombre de la tabla*/ WHERE /*Usuario*/ = :/*usuario*/ LIMIT 1'));
    //Prevalidacion nombres de usuarios repetidos.
    $statement->execute(array(':Usuario' => $user));
    $result = $statement->fetch();

    //Validacion para nombres de usuarios repetidos
    if ($result != false) {
      $php_errormsg .= '<li>El nombre de usuario ya existe</li>';
    }

    //Hash o encriptado de contraseñas
    $password = hash('sha512', $password);
    $password2 = hash('sha512', $password2);

    //sha512: Parametro de encriptado
    //Agencia de Seguridad Nacional (NSA) y publicada en 2001 por el Instituto Nacional de Estándares y Tecnología (NIST) como un Estándar Federal de Procesamiento de la Información (FIPS).

    //Error de coincidencia
    if ($password != $password2) {
      $php_errormsg .= '<li>Uno o mas caracteres no coinciden</li>';
    }
  }

  //Validacion de errores nula - Llamar login.php
  if ($php_errormsg == '') {
    $statement = $conection->prepare('INSERT INTO /*Nombre de la tabla*/(id, usuario, pass) VALUES (null, !/*Nombre de la tabla*/, :/*Contraseña*/');
    $statement->execute(array(':user' => $user, ':pass' => $password));

    //Redireccionamiento login.php
    header('Location: login.php');

  }

}

//Llamar la vista de registro
require 'views/check-in.view.php';
 
?>