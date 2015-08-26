<?php
session_start(); //starts the session
if($_SESSION['user']){ //checks if user is logged in
}
else{
header("location:login.php"); // redirects if user is not logged in
}
if($_SERVER['REQUEST_METHOD'] == "GET")
{
mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
mysql_select_db("spare_parts") or die("Cannot connect to database"); //Connect to database
$id = $_GET['id'];
$result=mysql_query("DELETE FROM item_type WHERE id='$id'");

if(!$result){

$error = mysql_error();
Print sprintf('<script>alert("Error: %s");</script>', $error);
Print '<script>window.location.assign("delete.php");</script>';
}else{
Print '<script>alert("Successfully deleted!");</script>';
Print '<script>window.location.assign("../index.php");</script>';
}

}
?>