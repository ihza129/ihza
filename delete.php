<?php
require './config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM products WHERE id = '$id'";
    mysqli_query($db_connect, $query);
    header("Location: index.php");
}
?>