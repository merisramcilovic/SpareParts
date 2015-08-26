<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/register.css" rel="stylesheet" type="text/css">
	<title>Car Spare Parts</title>
</head>
<body>
	<h2  align="center">Registration</h2>
	<div id="form">
		<a href="index.php">Click here to go back</a><br/><br/>
		<form  class="form-group" action="customer_register.php" method = "post"> 
			Name: <input type ="text" name="name" class="form-control" required="required" /> <br/>
			Surname: <input type ="text" name="surname"  class="form-control" required="required" /> <br/>
			Email: <input type ="text" name="email"  class="form-control" required="required" /> <br/>
			Username: <input type ="text" name="username" class="form-control" required="required" /> <br/>
			Password: <input type ="password" name="password" class="form-control" required="required" /> <br/>
			<button type ="submit" class="btn btn-default">Register</button>
		</form>
	</div>
</body>
</html>

