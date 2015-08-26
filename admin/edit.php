
<html>
<body>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Spare Parts</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/shop-item.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">SpareParts</a>
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
<li>
<a href="#">About</a>
</li>
<li>
<a href="#">Services</a>
</li>
<li>
<a href="#">Contact</a>
</li>
</ul>		
<ul class="nav navbar-nav navbar-right">
<?php

	session_start(); //starts the session
	
if(isset($_SESSION['type'])){
if($_SESSION['type']!='admin'){

header("location: login.php"); // redirects if user is not logged in

}
}

if (! empty($_GET[ 'id' ]))
{
$id = $_GET['id'];
$_SESSION['id'] = $id;
$id_exists = true;
mysql_connect( "localhost","root"," ") or die(mysql_error());
mysql_select_db("spare_parts") or die ("Cannot connect to database"); 
$query = mysql_query("Select * from item_type Where id= '$id' ");

	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['user']; //assigns user value
	$id_exists = false;
	?>
if(isset($_SESSION['user'])){
print '<li><a href="logout.php">Logout</a></li>';
}else{
print '<li><a href="login.php">Login</a></li>';
print '<li><a href="register.php">Register</a></li>';
}
?>
</ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">
<?php
if(isset($_SESSION['type'])){
if($_SESSION['type']!='admin'){

header("location: login.php"); // redirects if user is not logged in

}
}

if (! empty($_GET[ 'id' ]))
{
$id = $_GET['id'];
$_SESSION['id'] = $id;
$id_exists = true;
mysql_connect( "localhost","root"," ") or die(mysql_error());
mysql_select_db("spare_parts") or die ("Cannot connect to database"); 
$query = mysql_query("Select * from item_type Where id= '$id' ");

?>
</table>
<br/>
<?php

if($id=exists)
{
Print  '
<form action="edit.php" method="POST">
Name: <input type="text" name="name"/><br/>
Description: <input type="text" name="description"/><br/>
Price: <input type="text" name="price"/><br/>
Units in stock: <input type="text" name="units_in_stock"/><br/>
Image: <input type="file" name="image"/><br/>

<input type="submit" value="Update"/>
</form>
';
}
else
{
Print '<h2 align="center">There is no data to be edited.</h2>';
}
?>
</body>
</html>

<?php

mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
mysql_select_db("spare_parts") or die("Cannot connect to database"); //Connect to database
$name = mysql_real_escape_string($_POST['name']);
$description = mysql_real_escape_string($_POST['description']);
$units_in_stock = mysql_real_escape_string($_POST['units_in_stock']);
$price = mysql_real_escape_string($_POST['price']);
$image = mysql_real_escape_string($_POST['image']);

$id = $_SESSION['id'];



mysql_query("UPDATE list SET name='$name', description='$description', units_in_stock='$units_in_stock', price='$price, image='$image' WHERE id='$id'") ;
header("location: ../index.php");
?>

