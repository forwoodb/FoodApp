<?php

// Dev DB
$link = mysqli_connect('localhost', 'root', 'root', 'grocery_db');
// Production DB
// $link = mysqli_connect('localhost', 'brenoqmo', 'hbaw5xqfsTFA', 'brenoqmo_grocery_db');

if (mysqli_connect_error()) {
  die('An error occurred while connecting to the database');
}

?>