<?php
session_start();
?>
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
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/search_box.css" rel="stylesheet">


<!-- Custom CSS -->
<link href="css/shop-homepage.css" rel="stylesheet">

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
<div id="right">
<form class="navbar-form navbar-left" role="search">
<div class="form-group">
<input type="text" class="form-control" placeholder="Search">
</div>
<button type="search" class="btn btn-default">Search</button>
<div>
<p align="right">
<a href="customer_cart.php" class="btn btn-default" style="float: right">My Cart</a>
</p>
</div>
</form>



</div>


<ul class="nav navbar-nav navbar-right">
<?php
if(isset($_SESSION['user'])){
print '<li><a href="logout.php">Logout</a></li>';
}else{
print '<li><a href="login.php">Login</a></li>';
print '<li><a href="register.php">Register</a></li>';
}
?>
</ul>

<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

<!-- Page Content -->
<div class="container">

<div class="row">

<div class="col-md-3">
<p class="lead">Auto parts</p>
<div class="list-group">
<a href="#" class="list-group-item">Interior</a>
<a href="#" class="list-group-item">Exterior</a>
<a href="#" class="list-group-item">Replacement</a>
<a href="#" class="list-group-item">Performance</a>
<a href="#" class="list-group-item">Suspension</a>
<a href="#" class="list-group-item">Tires & Wheels</a>

</div>
</div>

<div class="col-md-9">

<div class="row">

<?php
mysql_connect("localhost", "root", "") or die (mysql_error()); 
mysql_select_db("spare_parts") or die ("Cannot connect to database"); 
$query = mysql_query("SELECT * FROM `item_type`");

while($row = mysql_fetch_array($query)){
print '<div class="col-sm-4 col-lg-4 col-md-4">';						
print '<div class="thumbnail">';
print '<img src="' . substr($row['image'] , 3) . '" alt="">';	
print '<div class="caption">';
print '<h4 class="pull-right">$' . $row['price'] . '</h4>';
print '<h4><a href="customer_details.php?part='. $row['id'] .'">' . $row['name'] . '</a>';
print '</h4><p>' . $row['desc'] . '</p>';
print '</div></div></div>';

}


?>

</div>

</div>

</div>

</div>
<!-- /.container -->

<div class="container">

<hr>

<!-- Footer -->
<footer>
<div class="row">
<div class="col-lg-12">
<p>Copyright &copy; Auto Parts 2015</p>
</div>
</div>
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>