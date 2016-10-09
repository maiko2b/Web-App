<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../index.php");
  }
$username=$_SESSION['username'];
$userid = $_SESSION['user_Id'];

?>
<html>
<head>
	<title></title>
	
<!--CSS-->
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/global.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
     <script src="../js/jquery.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>	
    <script src="../js/bootstrap.min.js"></script>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="">DOTA 2</a>
    </div>
    <ul class="nav navbar-nav">
      <li class=""><a href="#"></a></li>
      <li><a href="home.php">Forum</a></li> 	
    </ul>
		 <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-left">
                    <li><a href="home.php#quest"> Post a Question</a></li>
                </ul>
     				
					 <ul class="nav navbar-nav navbar-right">
					   

                         <li><a href="user-profile.php" ><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
                        <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                </ul>		
			
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </ul>
  </div>
</nav>


<div class="container">

                 <div class="container" style="margin:8% auto;width:1000px;">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                    <button class="btn btn-success" onclick="">Edit Profile</button>
                    
                </div> 
                 <div class="panel-body">
            <table class="table table-stripped">
  
      <?PHP

                           $dbhost = 'localhost';
                          $dbuser = 'root';
                          $dbpass = '';
   
                           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                          $squery = "SELECT * from tbluser where user_Id='$userid' ";
                          mysql_select_db('dbforum');
                          $fname=$_SESSION['fname'];
                         $retval = mysql_query($squery,$conn);
   
                           if(! $retval ) {
                           die('Could not get data: ' . mysql_error()); 
                           }
   
                            if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                    
                             echo "USER ID : {$row['user_Id']}  <br> ".
                                  "FIRSTNAME : {$row['fname']} <br> ".
                                  "LASTNAME : {$row['lname']} <br> ".
                                  "GENDER : {$row['gender']} <br> ".
                                  "ADDRESS : {$row['address']} <br> ".
                                  "COUNTRY : {$row['country']} <br> ".
                                  "EMAIL : {$row['email']} <br> ".
                                  "BIRHDATE : {$row['bdate']} <br> ";
                                   
   }                          
   

                            ?> 

                           


</div>
  

</body>
</html>