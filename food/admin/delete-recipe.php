<?php
include "../functions/db.php";
  if(isset($_GET['image_id'])){
		$id = $_GET['image_id'];
	}
	if(empty($id)){
		header("location:index.php");
	}

	$run = mysql_query("DELETE FROM tblimg WHERE image_id = '$id'")
	or die(mysql_error());  	

	header("Location:recipes.php");
	
?>