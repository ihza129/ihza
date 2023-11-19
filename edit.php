<?php
require './config/db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];

    $query = "UPDATE products SET name = '$name', price = '$price' WHERE id = '$id'";
    mysqli_query($db_connect, $query);
    header("Location: index.php");
}

$id = $_GET['id'];
$query = "SELECT * FROM products WHERE id = '$id'";
$result = mysqli_query($db_connect, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width-device-width, initial-scale=1.0">
<title>Edit Produk</title>
</head>
<body>
<h1>Edit Produk</h1>
<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?=$row['id']; ?>">
    <label for="name">Nama produk:</label>
    <input type="text" name="name" id="name" value="<?=$row['name']; ?>" required>
    <br>
    <label for="price">Harga:</label>
    <input type="number" name="price" id="price" value="<?=$row['price']; ?>" required>
    <br>
    <input type="submit" name="submit" value="Simpan">
</form>
</body>
</html>