<!DOCTYPE html>
<html lang="en">

<?php
include('./inc/head.php')
?>

<body class="w-full bg-dark-primary h-screen scroll-container">
  <?php

  if (is_file("./vistas/" . $_GET['vista'] . ".php") && $_GET['vista'] != "404") {
    include('./inc/navbar.php');
    include("./vistas/" . $_GET['vista'] . ".php");
  } else {
    include("./vistas/404.php");
  }

  ?>
</body>

</html>