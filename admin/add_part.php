<?php
function generateRandomString($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$target_dir = "../image_uploads/";
	$imageFileType =  substr($_FILES['ImageFile']['name'], strrpos($_FILES['ImageFile']['name'], '.')+1);
	$target_file = $target_dir  . generateRandomString(6) . '.' . $imageFileType;
	$uploadOk = 1;
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["ImageFile"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["ImageFile"]["size"] > 500000) { // 500 kb
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["ImageFile"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["ImageFile"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	if (empty($_POST['warranty'])){
		$warranty = 0;
	}else{
		$warranty = 1;
	}
	
	$category = mysql_real_escape_string($_POST['category']);
	$name = mysql_real_escape_string($_POST['name']);
	$manufacturer = mysql_real_escape_string($_POST['manufacturer']);
	$condition = mysql_real_escape_string($_POST['condition']);
	$price = mysql_real_escape_string($_POST['price']);
	$serial_number = mysql_real_escape_string($_POST['serial_number']);
	$units_in_stock = mysql_real_escape_string($_POST['units_in_stock']);
	$description = mysql_real_escape_string($_POST['description']);
	
	
	mysql_connect("localhost" , "root" , "") or die (mysql_error());  //connect to server
	mysql_select_db("spare_parts") or die ("Cannot connect to database");  //connect to database
	//$query = mysql_query("Select * from  ");
	

	//INSERT INTO `item_type` (name, manufacturer,`condition`,warranty,image,price) VALUES ("$name", "$name","$name","$name","$name",1.0)

	$result=mysql_query("INSERT INTO `item_type` (name, manufacturer,`condition`,warranty,image,price,serial_number,units_in_stock,`desc`) VALUES ('$name', '$manufacturer','$condition',$warranty,'$target_file',$price,'$serial_number','$units_in_stock','$description')");
	if(!$result){
		// $result === false // GRESKA
		$error = mysql_error();
		Print sprintf('<script>alert("Error: %s");</script>', $error);
		Print '<script>window.location.assign("add.php");</script>';
	}else{
		Print '<script>alert("Successfully added!");</script>';
		Print '<script>window.location.assign("../index.php");</script>';
	}
}
?>