     
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

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
<!--Bootstrap CSS-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Script-->

</head>

<!--navigation --> 
<div class="container">
<ul class="nav nav-tabs navbar-fixed-top" role="tablist"> 
    <li ><a href="../samplehome.php">Home</a></li>
    <li class="active"><a href="../pages/recipe.php">Recipe</a></li>
    <li class=""><a href="../pages/home.php">Forum</a></li>
  <li><a href="ask-question.php"> Post a Question</a></li>
   <ul class="nav navbar-nav navbar-right">
             
                        <!-- user and logout-->
                         <li><a href="../pages/user-profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>  
                        <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                  
                </ul>
                    
                
                </ul>       
            
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </ul>
  </div>
</nav>




 <div class="container" style="margin:7% auto;">
        <h4>Shared Recipes!</h4>
        <hr>
   <?php
                            
                            include "../functions/db.php";

                    $select_path="select * from tblimg"; // display recipes
                    $var=mysql_query($select_path);

                    while($row=mysql_fetch_array($var))
                      {
                      $image_name=$row["image_name"];//image name 
                      $image_path=$row["image_path"];//image path
                      $content= $row['content'];
                      ?>
                      <div class="container">
 <div class="w3-container w3-section w3-border-top w3-border-bottom">
<img src="<?php echo $image_path; ?><?php echo $image_name; ?>" alt="<?php echo $image_name; ?>" height="250" width="300"> 

 <p> <?php echo $content; ?></p>  
  </div> 

</hr>
</div>  
<?php
}


?>
    
        


   



</body>
</html>

      