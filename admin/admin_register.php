<?php
	if($_SESSION['type']!='admin'){
		die('Must be an admin to register another admin.');
	}
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string(md5($_POST['password']));
		$name = mysql_real_escape_string($_POST['name']);
		$surname = mysql_real_escape_string($_POST['surname']);
		$email = mysql_real_escape_string($_POST['email']);
		$bool = true;
		
		mysql_connect("localhost" , "root" , "") or die (mysql_error());  //connect to server
		mysql_select_db("spare_parts") or die ("Cannot connect to database");  //connect to database
		$query = mysql_query("Select * from users ");
		while($row = mysql_fetch_array($query))
		{
		$table_users =$row['username'];
		if($username == $table_users)
		{
		$bool=false;
		Print '<script>alert("Username already exists!");</script>' ;
		Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
		
		
		}
		}
		if($bool)
		{
		mysql_query("INSERT INTO users (username, password,name,surname,email,type) VALUES ('$username', '$password','$name','$surname','$email','admin')");  // inserts value into table users
	        Print '<script>alert("Successfully Registered!");</script>';
			Print '<script>window.location.assign("register.php");</script>';
		}
	}
?>