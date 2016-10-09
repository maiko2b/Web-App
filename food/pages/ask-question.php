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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--Script-->

</head>
<div class="container">
<ul class="nav nav-tabs navbar-fixed-top" role="tablist"> 
    <li ><a href="../samplehome.php">Home</a></li>
    <li class=""><a href="../pages/recipe.php">Recipe</a></li>
    <li class=""><a href="../pages/home.php">Forum</a></li>
    <li class="active"><a href="#quest"> Post a Question</a></li>
   <ul class="nav navbar-nav navbar-right">
               


                         <li><a href="../pages/user-profile.php"><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>  
                        <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

		 <!-- Collect the nav links, forms, and other content for toggling -->
          
                  
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
    	<h4>ASK QUESTION</h4>
    	
        
    <div class="my-quest" id="quest">
            <div> 
                <form method="POST" action="question-function.php">
                        
                         <label>Category</label>
                        <select name="category" class="form-control">
                            <option></option>
                            <?php 

                              include "../functions/db.php";
                     $id = $_GET['post_id'];
                            $sel = mysql_query("SELECT * from category");

                                if($sel==true){
                                    while($row=mysql_fetch_assoc($sel)){
                                        extract($row);
                                        echo '<option value='.$cat_id.'>'.$category.'</option>';
                                    }
                                }
                            ?>
                        </select>
                        <label>Topic Title</label>
                        <input type="text" class="form-control" name="title"required>
                        <label>Content</label>
                        <textarea name="content"class="form-control">
                        </textarea>
                       <br>
                        <input type="hidden" name="userid" value=<?php echo $userid; ?>>
                        <input type="submit" class="btn btn-success pull-right" value="Post">
                   </form><br>
                <hr>
              </div>
        </div>



</body>
</html>