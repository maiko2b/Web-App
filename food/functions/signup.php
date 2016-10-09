<?php
include "db.php";

extract($_POST);

	$fname = str_replace("'","`",$fname); 
	$fname = mysql_real_escape_string($fname);
	
	$lname = str_replace("'","`",$lname); 
	$lname = mysql_real_escape_string($lname); 
	        
	$username = str_replace("'","`",$username); 
	$username = mysql_real_escape_string($username); 

	$password = str_replace("'","`",$password); 
	$password = mysql_real_escape_string($password);
	$password = md5($password);
	
	$gender = str_replace("'","'",$gender);
	
	$email = str_replace("'","'",$email);
	
	$bdate = str_replace("'","'",$bdate);

$sql = "INSERT INTO `tbluser`(`fname`, `lname`, `gender`,`address`,`country`,`email`,`phone`,`bdate`) VALUES ('$fname','$lname','$gender','$address','$country','$email','$phone','$bdate')";
$result = mysql_query($sql);

 if($result)
	{
		$a = mysql_query("SELECT * FROM `tbluser` WHERE `fname` = '$fname' ");
		$aa = mysql_fetch_array($a);
		
		if($a)
		{
			$aaa = $aa['user_Id'];
			$sql = "INSERT INTO `tblaccount`(`username`, `password`, `user_Id`) VALUES('$username','$password',$aaa)";
			$res = mysql_query($sql);
			
			if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'alert("Successfully Registered")';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="0;url=../samplehome.php" />';
                            }

		}
			
		
	}




?>