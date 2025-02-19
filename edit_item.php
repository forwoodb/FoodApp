<?php

// Dev DB
$link = mysqli_connect('localhost', 'root', 'root', 'grocery_db');
// Production DB
// $link = mysqli_connect('localhost', 'brenoqmo', 'hbaw5xqfsTFA', 'brenoqmo_grocery_db');

if (mysqli_connect_error()) {
  die('An error occurred while connecting to the database');
}

if ($_GET) {
  $edit_item = $_GET['edit_item'];

  if ($_POST) {
    $item = $_POST['item'];
    $price = $_POST['price'];
    $price_type = $_POST['price_type'];
    $brand = $_POST['brand'];
    $location = $_POST['location'];
    $servings = $_POST['servings'];

    $query = "UPDATE `items`
              SET `item` = '".$item."',
              price = '".$price."',
              price_type = '".$price_type."',
              brand = '".$brand."',
              location = '".$location."',
              servings = '".$servings."'
              WHERE  id = '".$edit_item."'
              LIMIT 1";

    // echo $query;
    mysqli_query($link, $query);
    header('location: index.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Food App</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive -->
    <!-- <link rel="stylesheet" href="responsive.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <div class="container2">
      <h1>Food App</h1>
      <h1>List</h1>
      <h1>Add Item</h1>

      <div class="form-wrapper">
        <form class="input-form" method="post">
          <div class="top-row">
            <div class="input">
              <label for="">Item: </label>
              <input type="text" name="item">
            </div>
            <div class="input">
              <label for="">Price: </label>
              <input type="number" step=".01" name="price">
            </div>
            <div class="input">
              <label for="">Price Type: </label>
              <select class="" name="price_type">
                <option value="Regular">Regular</option>
                <option value="Sale">Sale</option>
                <option value="Coupon">Coupon</option>
              </select>
            </div>
          </div>
          <div class="bottom-row">
            <div class="input">
              <label for="">Brand:</label>
              <input type="text" name="brand">
            </div>
            <div class="input">
              <label for="">Location:</label>
              <input type="text" name="location">
            </div>
            <div class="input">
              <label for="">Servings:</label>
              <input type="number" name="servings">
            </div>
          </div>

          <!-- Add Button -->
          <input type="submit" value="Submit" class="submit">
        </form>
      </div>
      <table>
        <thead>
          <th>Item</th>
          <th>Price</th>
          <th>Price Type</th>
          <th>Brand</th>
          <th>Location</th>
          <th>Servings</th>
          <th>Price/Serving</th>
        </thead>
        <tbody>
          <?php

          $query = "SELECT * FROM items";

          if ($result = mysqli_query($link, $query)) {
            while ($row = mysqli_fetch_array($result)) { ?>
              <tr>
                <?php if ($_GET['edit_item'] == $row['id']) { ?>
                  <form id="edit-form" method="post">
                    <td>
                      <input type="text" name="item" value="<?php echo $row['item']; ?>" class="input-edit">
                    </td>
                    <td>
                      <input type="text" name="price" value="<?php echo $row['price']; ?>" class="input-edit">
                    </td>
                    <td>
                      <select class="input-edit select-edit" name="price_type" value="<?php echo $row['price_type']; ?>">
                        <option value="Regular">Regular</option>
                        <option value="Sale">Sale</option>
                        <option value="Coupon">Coupon</option>
                      </select>
                      <!-- <input type="text" name="price_type" value="<?php echo $row['price_type']; ?>" class="input-edit"> -->
                    </td>
                    <td>
                      <input type="text" name="brand" value="<?php echo $row['brand']; ?>" class="input-edit">
                    </td>
                    <td>
                      <input type="text" name="location" value="<?php echo $row['location']; ?>" class="input-edit">
                    </td>
                    <td>
                      <input type="text" name="servings" value="<?php echo $row['servings']; ?>" class="input-edit">
                    </td>
                    <td>
                      <?php

                      if ($row['servings'] == 0) {
                        echo '';
                      } else {
                        echo '$'.round($row['price']/$row['servings'], 2);
                      }

                      ?>
                    </td>
                    <td class="button">
                      <input type="submit" value="Edit" class="submit edit">
                    </td>
                    <td class="button">
                      <input type="submit" value="Delete" class="submit delete">
                    </td>
                    <td class="button">
                      <input type="submit" value="Done" class="submit done">
                    </td>
                  </form>

                <?php } else { ?>
                  <td><?php echo $row['item']; ?></td>
                  <td><?php echo '$'.$row['price']; ?></td>
                  <td><?php echo $row['price_type']; ?></td>
                  <td><?php echo $row['brand']; ?></td>
                  <td><?php echo $row['location']; ?></td>
                  <td><?php echo $row['servings']; ?></td>
                  <td>
                    <?php

                    if ($row['servings'] == 0) {
                      echo '';
                    } else {
                      echo '$'.round($row['price']/$row['servings'], 2);
                    }

                    ?>
                  </td>
                  <td class="button">
                    <form class="" action="edit_item.php?edit_item=<?php echo $row['id'] ?>" method="post">
                      <input type="submit" name="" value="Edit" class="submit edit">
                    </form>
                  </td>
                  <td class="button">
                    <form action="index.php?del_item=<?php echo $row['id']; ?>" method="post">
                      <input type="submit" value="Delete" class="submit delete">
                    </form>
                  </td>

                <?php } ?>

              </tr>
            <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>