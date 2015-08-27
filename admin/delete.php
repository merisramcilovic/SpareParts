<?php
session_start(); //starts the session

if (!isset($_SESSION['user'])) { //checks if user is logged in
    header("location: login.php"); // redirects if user is not logged in
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    mysql_connect("localhost", "root", "") or die(mysql_error()); //Connect to server
    mysql_select_db("spare_parts") or die("Cannot connect to database"); //Connect to database
    $id     = $_GET['item'];
    mysql_query("DELETE FROM item_type WHERE id=$id");

    header("location: ../index.php");
}
?>