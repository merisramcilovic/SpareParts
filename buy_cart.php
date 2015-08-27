<?php

session_start();

if(!isset($_SESSION['user'])){
    header('location: index.php');
}

mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
mysql_select_db("spare_parts") or die("Cannot connect to database"); //connect to database

$json = json_encode( array_values($_SESSION['cart']) );

mysql_query("INSERT INTO `orders` (`user_id`, `items`, `total`, `done`) VALUES (".$_SESSION['userid'].", '$json', '".$_SESSION['cart_total']."', false )");

$_SESSION['cart'] = array();
$_SESSION['cart_total'] = 0;

header('location: index.php');

?>