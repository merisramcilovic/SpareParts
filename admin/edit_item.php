<?php
    if(!isset($_GET['item'])){
        header('location: ../index.php');   
    }

    mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
    mysql_select_db("spare_parts") or die("Cannot connect to database"); //Connect to database
    $name = mysql_real_escape_string($_POST['name']);
    $description = mysql_real_escape_string($_POST['description']);
    $units_in_stock = mysql_real_escape_string($_POST['units_in_stock']);
    $price = mysql_real_escape_string($_POST['price']);

    $id = $_GET['item'];
    

    //UPDATE `item_type` SET name='blablabla', `desc`='fdfdsa', units_in_stock=321, price=700 WHERE id=34
    mysql_query("UPDATE `item_type` SET name='$name', `desc`='$description', units_in_stock=$units_in_stock, price=$price WHERE id=$id");

    header("location: ../index.php");
?>