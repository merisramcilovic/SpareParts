<?php
if(isset($_SESSION['type'])){
if($_SESSION['type']!='admin'){

	header("location: login.php"); // redirects if user is not logged in

}
}

?>
<html>
<head>
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../css/add.css" rel="stylesheet" type="text/css">
</head>
<body>
<script>
$('input[type="file"]').change(function(){
$(this).closest('.browse-wrap').next('.upload-path').text(this.value);
});
</script>
<div id="forma">
<a href="../index.php"> <align = "center">Back to Home</a><br/><br/>
<form  class="form-group" action="add_part.php" method="POST" enctype="multipart/form-data">
<h2  align="center">Add item</h2>

<p>Select category of part<select name="category" class="form-control"></p>
<option value="1">Engine</option>
<option value="2">Pumps</option>
<option value="3">Lights</option>
<option value="4">Tires</option>
<option value="5">Wheels</option>
<option value="6">Windows</option>
<option value="7">Mirrors</option>
<option value="8">Exhaust</option>
<option value="9">Doors</option>
<option value="10">Turbochargers</option>
</select>	
<p>Name of part<input name="name"  class="form-control" type="text"></p>
<p>Description<input name="description" class="form-control" type="text"></p>
<p>Manufacturer<select name="manufacturer"  class="form-control"></p>
<option value="1">BOSCH</option>
<option value="2">Valeo</option>
<option value="3">Magnetti Mareli</option>
<option value="4">CARELLO</option>
<option value="5">GM</option>
<option value="6">DENSO</option>
</select>


<p>Condition<select name="condition"  class="form-control"></p>
<option value="1">New</option>
<option value="2">Used</option>
</select>

<p>Warranty<input name="warranty"  class="form-control" type="checkbox">    </p>
<p>Select image to upload:<input type="file" name="ImageFile" class="upload" title="Choose an image to upload">
<p>Price<input name="price"  class="form-control" type="decimal"></p>
<p>Serial number<input name="serial_number"  class="form-control" type="text"></p>
<p>Units in stock<input name="units_in_stock"  class="form-control" type="number"></p>

<button  align="center" type ="submit" class="btn btn-default">Add</button>
</form>
</div>		
</body>
</html>
