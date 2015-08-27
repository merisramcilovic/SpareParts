<?php

session_start();


if(!isset($_SESSION['user'])){
    header('location: login.php');
}else{
    if($_SESSION['type']!='admin'){
        header('location: login.php');
    }
}

mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
mysql_select_db("spare_parts") or die("Cannot connect to database"); //connect to database

$id = $_GET['order'];

mysql_query("UPDATE `orders` SET done=true WHERE id=$id");

header('location: orders.php');
?>