<?php


if ($_POST) {
  $item = $_POST['item'];
  $price = $_POST['price'];
  $price_type = $_POST['price_type'];
  $brand = $_POST['brand'];
  $location = $_POST['location'];
  $servings = $_POST['servings'];

  $query = "INSERT INTO items (
    item,
    price,
    price_type,
    brand,
    location,
    servings
  )
  VALUES(
    '$item',
    '$price',
    '$price_type',
    '$brand',
    '$location',
    '$servings'
  )";
  // echo $query;
  mysqli_query($link, $query);
}

?>
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