<?php
session_start();

$id = $_GET['item'];

mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
mysql_select_db("spare_parts") or die("Cannot connect to database"); //Connect to database

$query = mysql_query("SELECT * FROM item_type WHERE id=$id");
$row = mysql_fetch_assoc($query);



array_push($_SESSION['cart'], array(count($_SESSION['cart']), $row['name'], $row['price']) );


header('location: customer_cart.php');
?>