<!DOCTYPE php>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Montserrat:200,400,700' rel='stylesheet'/>
    <link href='https://fonts.googleapis.com/css?family=Roboto&display=swap' rel='stylesheet'>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Personal Soft | Seleccion</title>
  </head>
  <body>
    <!--wrap-->
    <div id="wrap">

      <header>
        <ul>
          <li>
            <a href="../tareas.html">Tareas</a>
          </li>
          <li>
            <a href="login.php">Login</a>
          </li>
        </ul>
      </header>
      
      <!--Container-->
      <div class="container">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form" name="login">

          <h1 class="title">Registrarse</h1>

          <div class="form-group">
            <input type="text" name="user" class="user" placeholder="Usuario">
          </div>
          <div class="form-group">
            <input type="password" name="password" class="password" placeholder="Contraseña">
          </div>
          <div class="form-group">
            <input type="password" name="password2" class="btn_pwd" placeholder="Repetir Contraseña">
          </div>
          <div class="form-group">
            <a class="fa fa-arrow-right btn-sbm" onclick="login.submit()" id="submit">Registrarse</a>
          </div>

          <?php if(!empty($php_errormsg)); ?>
            <div class="error">
              <ul>
                <?php echo $php_errormsg ?>
              </ul>
            </div>

        </form>

        <p class="txt-ckeck">
          ¿ Ya tienes cuenta ?<br>
          <a href="login.php">Iniciar Sesion</a>
        </p>
        
      </div>
      
    </div>
    <script src="js/scripts.js"></script>
  </body>
</html>