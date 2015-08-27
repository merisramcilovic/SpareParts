<?php
	session_start();

    if(!isset($_SESSION['user'])){
        header('location: login.php');
    }else{
        if($_SESSION['type']!='admin'){
            header('location: login.php');
        }
    }
?>
<html>
	<head>
		<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="../css/add.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
            <h1>Orders</h1>
			<table class="table table-striped table-bordered table-condensed" data-toggle="table">
                <thead>
                    <tr>
                        <th>User Fullname</th>
                        <th>User Email</th>
                        <th>User Phone</th>
                        <th>Part ID</th>
                        <th>Part Name</th>
                        <th>Part Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        
                        mysql_connect("localhost", "root", "") or die(mysql_error()); //connect to server
                        mysql_select_db("spare_parts") or die("Cannot connect to database"); //connect to database
                        $query = mysql_query("SELECT * FROM `orders` WHERE done = false");
                        if($query === FALSE) { 
                            die(mysql_error()); // TODO: better error handling
                        }
                        while($row = mysql_fetch_array($query)){
                            $q = mysql_query("SELECT * FROM `users` WHERE id= " .$row['user_id'] );
                            $user = mysql_fetch_assoc($q);
                            $json = $row['items'];
                            
                            $parts = json_decode($json);

                            for($r = 0; $r < count($parts); $r++){
                                print '<tr>';
                                print '<th>' . $user['name'] . ' ' . $user['surname']  . '</th>';
                                print '<th>' . $user['email'] . '</th>';
                                print '<th>' . $user['phone'] . '</th>';
                                for($col = 0; $col < count($parts[$r]); $col++){
                                    print '<th>' . $parts[$r][$col] . '</th>';
                                }
                                print '</tr>';
                            }
                            
                            print '<tr>';
                            print '<th><a href="feedback.php?order='.$row['id'].'">Finish Transaction</a></th>';
                            print '<th>-</th>';
                            print '<th>-</th>';
                            print '<th>-</th>';
                            print '<th>Total:</th>';
                            print "<th>". $row['total'] ."</th>";
                            print '</tr>';
                        }

                    ?>
                </tbody>
            </table>
		</div>
	</body>
</html>