<?php


if (isset($_GET['add_to_list'])) {
  $add_to_list = $_GET['add_to_list'];

  $query = "INSERT INTO `list`
            SELECT *
            FROM `items`
            WHERE id = $add_to_list";

  // echo $query;
  mysqli_query($link, $query);

}


?>

