<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Shark Behavior ADM<</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>

  <!-- Cabeçário / header da página -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" text-align="center" href="#">Shark Beharvior</a>
      </div>
      <!-- <ul class="nav navbar-nav"> -->
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <!-- <li><a href="#">Page 1</a></li> -->
      <!-- <li><a href="#">Page 2</a></li> -->
      <!-- </ul> -->
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Logar</a></li> -->
        <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Sair</a></li> -->
      </ul>
    </div>
  </nav>

<br>

  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="images/shark_obs_logo.jpg"></img>
      </div>
      <div class="col-md-6">
        <?php
        /**
        * A simple, clean and secure PHP Login Script / MINIMAL VERSION
        *
        * Uses PHP SESSIONS, modern password-hashing and salting and gives the basic functions a proper login system needs.
        *
        * @author Panique
        * @link https://github.com/panique/php-login-minimal/
        * @license http://opensource.org/licenses/MIT MIT License
        */

        // checking for minimum PHP version
        if (version_compare(PHP_VERSION, '5.3.7', '<')) {
          exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
        } else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
          // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
          // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
          require_once("libraries/password_compatibility_library.php");
        }

        // include the configs / constants for the database connection
        require_once("config/db.php");

        // load the login class
        require_once("classes/Login.php");

        // create a login object. when this object is created, it will do all login/logout stuff automatically
        // so this single line handles the entire login process. in consequence, you can simply ...
        $login = new Login();

        // ... ask if we are logged in here:
        if ($login->isUserLoggedIn() == true) {
          // the user is logged in. you can do whatever you want here.
          // for demonstration purposes, we simply show the "you are logged in" view.
          include("views/logged_in.php");

        } else {
          // the user is not logged in. you can do whatever you want here.
          // for demonstration purposes, we simply show the "you are not logged in" view.
          include("views/not_logged_in.php");
        }
        ?>

      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/stylejs.js"></script>
  </body>
  </html>
