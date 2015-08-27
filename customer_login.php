<?php
session_start();
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string(md5($_POST['password']));
$bool     = true;

mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("spare_parts") or die("Cannot connect to database");
$query          = mysql_query("Select * from users WHERE username='$username' ");
$exists         = mysql_num_rows($query); //Checks if username exists
$table_users    = "";
$table_password = "";
$table_type     = "";
$table_user_id  = -1;
if ($exists > 0) //IF there are no returning rows or no existing username
    {
    while ($row = mysql_fetch_assoc($query)) // display all rows from query
        {
        $table_users    = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
        $table_password = $row['password']; // the first password row is passed on to $table_password, and so on until the query is finished
        $table_type     = $row['type']; // 
        $table_user_id  = $row['id'];
    }
    if (($username == $table_users) && ($password == $table_password) && ($table_type == 'customer')) {
        // if($password == $table_password)
        // {
        $_SESSION['userid'] = $table_user_id;
        $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
        $_SESSION['type'] = $table_type;
        $_SESSION['cart'] = array();
        $_SESSION['cart_total'] = 0;
        header("location: index.php"); // redirects the user to the authenticated home page
        //  }
    } else {
        Print '<script>alert("Incorrect Password!");</script>';
        Print '<script>window.location.assign("login.php");</script>';
    }
} else {
    Print '<script>alert("Incorrect username!");</script>';
    Print '<script>window.location.assign("login.php");</script>';
}
?>