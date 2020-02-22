<?php

include 'db_connect.php';

if (isset($_GET['del_item'])) {
  $del_item = $_GET['del_item'];
  $query = "DELETE FROM list WHERE id=".$del_item;
  mysqli_query($link, $query);
  header('location: index.php');
}

?>

<h1>List</h1>

<table>
  <thead>
    <th>Item</th>
    <th>Price</th>
    <th>Price Type</th>
    <th>Brand</th>
    <th>Location</th>
    <th>Servings</th>
    <!-- <th class="calc">Price/Serving</th> -->
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM list";

    if ($result = mysqli_query($link, $query)) {
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo $row['item']; ?></td>
          <td><?php echo '$'.$row['price']; ?></td>
          <td><?php echo $row['price_type']; ?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td><?php echo $row['servings']; ?></td>
          <td class="button">
            <form action="list.php?del_item=<?php echo $row['id']; ?>" method="post">
              <input type="submit" value="Del" class="submit delete">
            </form>
          </td>
        </tr>
      <?php }
    } ?>

  </tbody>
</table>