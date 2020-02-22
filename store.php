<?php

include 'db_connect.php';

if (isset($_GET['del_item'])) {
  $del_item = $_GET['del_item'];
  $query = "DELETE FROM items WHERE id=".$del_item;
  mysqli_query($link, $query);
  header('location: index.php');
}

?>

<h1>Store</h1>

<table>
  <thead>
    <th>Item</th>
    <th>Price</th>
    <th>Price Type</th>
    <th>Brand</th>
    <th>Location</th>
    <th>Servings</th>
    <th class="calc">Price/Serving</th>
  </thead>
  <tbody>
    <?php

    $query = "SELECT * FROM items";

    if ($result = mysqli_query($link, $query)) {
      while ($row = mysqli_fetch_array($result)) { ?>
        <tr>
          <td><?php echo $row['item']; ?></td>
          <td><?php echo '$'.$row['price']; ?></td>
          <td><?php echo $row['price_type']; ?></td>
          <td><?php echo $row['brand']; ?></td>
          <td><?php echo $row['location']; ?></td>
          <td><?php echo $row['servings']; ?></td>
          <td class="calc">
            <?php

            if ($row['servings'] == 0) {
              echo '';
            } else {
              echo '$'.round($row['price']/$row['servings'], 2);
            }

            ?>
          </td>
          <td class="button">
            <form class="" action="index.php?add_to_list=<?php echo $row['id'] ?>" method="post">
              <input type="submit" name="" value="Add" class="submit add">
            </form>
          </td>
          <td class="button">
            <form class="" action="edit_item.php?edit_item=<?php echo $row['id'] ?>" method="post">
              <input type="submit" name="" value="Edit" class="submit edit">
            </form>
          </td>
          <td class="button">
            <form action="store.php?del_item=<?php echo $row['id']; ?>" method="post">
              <input type="submit" value="Del" class="submit delete">
            </form>
          </td>
        </tr>
      <?php }
    } ?>
  </tbody>
</table>