<?php
session_start();
include('./db/conexion.php');
date_default_timezone_set('America/Bogota');
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('./inc/head.php')
?>

<body class="w-full bg-dark-primary h-screen scroll-container box-border">
  <?php

  if (is_file("./vistas/" . $_GET['vista'] . ".php") && $_GET['vista'] != "404") {
    include('./inc/navbar.php');
    include("./vistas/" . $_GET['vista'] . ".php");
    include('./inc/script.php');
  } else if (is_file("./vistasUser/" . $_GET['vista'] . ".php") && $_GET['vista'] != "404") {
    // Restringir accesso
    if ((!isset($_SESSION['id']) || $_SESSION['id']) == "" || (!isset($_SESSION['usuario'])) || $_SESSION['usuario'] == "") {
      require_once("./vistasUser/logout.php");
      exit();
    }
    include('./inc/navbarUser.php');
    include("./vistasUser/" . $_GET['vista'] . ".php");
    include('./inc/script.php');
  } else if (is_file("./vistasAdministrador/" . $_GET['vista'] . ".php") && $_GET['vista'] != "404") {
    // // Restringir accesso
    // if ((!isset($_SESSION['id']) || $_SESSION['id']) == "" || (!isset($_SESSION['usuario'])) || $_SESSION['usuario'] == "") {
    //   require_once("./vistasUser/logout.php");
    //   exit();
    // }
    include('./inc/navbarAdmin.php');
    include("./vistasAdministrador/" . $_GET['vista'] . ".php");
  } else {
    include("./vistas/404.php");
  }

  ?>
</body>

</html>