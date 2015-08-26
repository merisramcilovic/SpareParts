<html>
<body>

<form method="post" action="">
Name:<input type="text" name="name" value="<?php echo $row['name']; ?>" /><br />
Image<input type="file" name="ImageFile" class= "upload"value="<?php echo $row['image']; ?>" /><br /><br />
Price:<input type="text" name="price" value="<?php echo $row['price']; ?>" /><br />
Description:<input type="text" name="description" value="<?php echo $row['description']; ?>" /><br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
</body>
</html>


{
$id=$_GET['id'];
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$image=$_POST['image'];
$price=$_POST['price'];
$description=$_POST['description'];


$result=mysql_query("update item_type set name='$name', image='$image' ,price='$price' , 'description=$desc' where id='$id'");
if($result)
{   
Print '<script>alert("Incorrect username!");</script>'; 
header('location:admin/edit.php');
}
}
$query=mysql_query("select * from item_type where id='$id'");
$row=mysql_fetch_array($query);
?>
<form method="post" action="">
Name:<input type="text" name="name" value="<?php echo $row['name']; ?>" /><br />
Image<input type="file" name="ImageFile" class= "upload"value="<?php echo $row['image']; ?>" /><br /><br />
Price:<input type="text" name="price" value="<?php echo $row['price']; ?>" /><br />
Description:<input type="text" name="description" value="<?php echo $row['description']; ?>" /><br /><br />
<br />
<input type="submit" name="submit" value="update" />
</form>
<?php
}
?>
</body>
</html>