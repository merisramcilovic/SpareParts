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
		<link href="css/shop-item.css" rel="stylesheet">
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
				if(!isset($_GET['part'])){
				    header('location: index.php');
				}
				$Part = $_GET['part'];
				mysql_connect("localhost", "root", "") or die (mysql_error()); 
				mysql_select_db("spare_parts") or die ("Cannot connect to database"); 
				$query = mysql_query("SELECT * FROM `item_type` WHERE id=$Part");
				$row = mysql_fetch_assoc($query);
				
            ?>
			<a href="admin/add.php" > Add </a>
			<a href="admin/delete.php?item=<?php print $row['id']; ?>" > Delete </a>
			<a href="admin/edit.php?item=<?php print $row['id']; ?>" > Edit </a>
			<div class="row">
				<div class="col-md-9">
					<div class="thumbnail">
						<img class="img-responsive" style="width:300px; height:300px;" src="<?php print substr($row['image'], 3); ?>" alt="">
						<div class="caption-full">
							<h4 class="pull-right">$<?php echo " Price:  " ;  print $row['price']; ?></h4>
							<h4><a href="#"><?php print $row['name']; ?></a>
							</h4>
							<?php print $row['desc']; ?>
						</div>
						<?php echo "   Pieces available:  " ; print $row['units_in_stock']; ?>
					</div>
				</div>
                <?php
                    if($_SESSION['type']='customer'){
                        print '<button type="button" class="btn btn-default"><a href="add_to_cart.php?item='.$row['id'].'">Add to Cart</a></button>';
                    }
                ?>
			</div>
		</div>
		<!-- /.container -->
	</body>
</html>