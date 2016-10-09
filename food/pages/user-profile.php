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
  
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
<!--Bootstrap CSS-->

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
  
</head>
<div class="container">
  <ul class="nav nav-tabs navbar-fixed-top" role="tablist"> 

    <li ><a href="../samplehome.php">Home</a></li>
    <li class=""><a href="../pages/recipe.php">Recipe</a></li>
    <li class=""><a href="../pages/home.php">Forum</a></li>
    <li><a href="ask-question.php"> Post a Question</a></li>
    <li class="active"><a href="../pages/user-profile.php">user profile</a></li>
      
           <ul class="nav navbar-nav navbar-right">
             

                         <li><a href="user-profile.php" ><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
                        <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

		 <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">

                </ul>
     			
                </ul>		
			
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </ul>
  </div>
</nav>
     

<div class="container">


                 <div class="container" style="margin:8% auto;width:700px;">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"></h3>
            <center><h2>User Profile</h2>
               </div> 
                 <div class="panel-body">
            <table class="table table-stripped">

  
      <?PHP

                           $dbhost = 'localhost'; // connecting to database
                          $dbuser = 'root';
                          $dbpass = '';
   
                           $conn = mysql_connect($dbhost, $dbuser, $dbpass);
                          $squery = "SELECT * from tbluser where user_Id='$userid' ";   //displaying 
                          mysql_select_db('dbforum');
                          $fname=$_SESSION['fname'];
                         $retval = mysql_query($squery,$conn);
                          
                           if(! $retval ) {
                           die('Could not get data: ' . mysql_error()); 
                           }
   
                            if($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {    // fetching data
                    
                             echo 
                                  "FIRSTNAME : {$row['fname']} <br> ".      
                                  "LASTNAME : {$row['lname']} <br> ".
                                  "GENDER : {$row['gender']} <br> ".
                                  "ADDRESS : {$row['address']} <br> ".
                                  "COUNTRY : {$row['country']} <br> ".
                                  "EMAIL : {$row['email']} <br> ".
                                  "BIRHDATE : {$row['bdate']} <br> ".
                                  "<br>"."<br>"."<br>";
?>

<h2> TOPICS POSTED </h2>
                                  <?php
$squery = "SELECT * from tblpost where user_Id='$userid' ";                          // displaying your posted topics
                          mysql_select_db('dbforum');
                          $fname=$_SESSION['fname'];
                         $retval = mysql_query($squery,$conn);
   
                           if(! $retval ) {
                           die('Could not get data: ' . mysql_error()); 
                           }
   
                            while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
                    
                             echo "Category: {$row['title']}  <br> ".
                                  "POST: {$row['content']}  <br> ".
                                  "<br>"."<br>"."<br>";
}


                                   
   }                          


   

                            ?> 
                              <!-- sharing recipes -->
                             
 <div class="panel panel-success">
                  
                      <h3>Share Recipe</h3>       
                   <div class="panel-body">

                       <label>Recipe</label>
                 <form method="POST" action="add-recipe-function.php" enctype="multipart/form-data">  
                 <input type="text" class="form-control" name="content" required style="width:50%">   
                 
                      <input type="file" name="myimage">
                     <input type="submit" class="btn btn-success pull-right" name="submit_image" value="Upload">
  
                     </form>
                  </div>


</div>







</body>
</html>