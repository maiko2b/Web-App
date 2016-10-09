<?php


$host = 'localhost';  
$user = 'root';   
$pass = ''; 
extract($_POST);
mysql_connect($host, $user, $pass);

mysql_select_db('dbforum');  //connecting to database 

$upload_image=$_FILES["myimage"]["name"];  //image name

$folder="/photo";  // folder name where image will be store

move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder".$_FILES["myimage"]["name"]);

$insert_path="INSERT INTO tblimg VALUES(NULL,'$upload_image','$folder','$content')";  //inserting path to database

$var=mysql_query($insert_path);
header("Location:recipes.php");


?>

