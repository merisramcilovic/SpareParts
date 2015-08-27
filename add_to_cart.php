<?php
session_start();

$id = $_GET['item'];

mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
mysql_select_db("spare_parts") or die("Cannot connect to database"); //Connect to database

$query = mysql_query("SELECT * FROM item_type WHERE id=$id AND units_in_stock > 0");
$row = mysql_fetch_assoc($query);

if(empty($row)){
    Print '<script>alert("There are no more parts in stock!");</script>';
    Print '<script>window.location.assign("index.php");</script>';
}else{
    mysql_query("UPDATE item_type SET units_in_stock = units_in_stock - 1 WHERE id=$id");
}


array_push($_SESSION['cart'], array($row['id'], $row['name'], $row['price']) );


header('location: customer_cart.php');
?>