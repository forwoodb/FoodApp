<?php

include 'db_connect.php';



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Food App</title>
    <!-- <link rel="stylesheet" href="css/normalize.css"> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive -->
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container2">
      <h1>Food App</h1>
      <div class="list-wrapper">
        <?php
          include 'add_to_list.php';
          include 'list.php';
        ?>
      </div>
      <div class="form-wrapper">
        <?php
          include 'add_to_store.php';
        ?>
      </div>
      <div class="store-wrapper">
        <?php
          include 'store.php';
        ?>
      </div>
    </div>
  </body>
</html>





