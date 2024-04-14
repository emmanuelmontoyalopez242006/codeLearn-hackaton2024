<?php
function conexion()
{
  $pdo = new PDO('mysql:host=localhost;dbname=codelearn-v1', 'root', '');
  return $pdo;
}
