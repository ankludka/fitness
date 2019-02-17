<?php

$link = mysqli_connect("localhost", "ariies1_fitness", "fitpass1234", "ariies1_fitness");

  if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

session_start();

if(array_key_exists("id", $_COOKIE)){
  $_SESSION["id"] = $_COOKIE["id"];
  echo $_COOKIE["id"];
}
if(!array_key_exists("id", $_SESSION)){
  header("Location: https://anklu.pl/fitness/");
}


?>
