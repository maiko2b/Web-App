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
    <li class="active"><a href="../pages/home.php">Forum</a></li>
    <li><a href="ask-question.php"> Post a Question</a></li>
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
    	<h4>Latest Discussion</h4>
    	<hr>
       <?php  include "../functions/db.php";

        $sel = mysql_query("SELECT * from category");
        while($row=mysql_fetch_assoc($sel)){
            extract($row);
           echo '<div class="panel panel-success">
                    <div class="panel-heading">
                    <h3 class="panel-title">'.$category.'</h3>
                    </div> 
                    <div class="panel-body">
                    <table class="table table-stripped">
                    <table class="table table-hover table-condensed">
                    <tr>
                    <th>Topic title</th>
                    <th></th>
                    <th>Action</th>
                    </tr>';
                    $sel1 = mysql_query("SELECT * from tblpost where cat_id='$cat_id' ");
                    while($row1=mysql_fetch_assoc($sel1)){
                        extract($row1);
                        echo '<tr>';
                        echo '<td>'.$title.'</td>';
                        echo '<td>'.$content.'</td>';
                        echo '<td><a href="content.php?post_id='.$post_Id.'"><button class="btn btn-success">View</button></td>';
                        echo '</tr>';
                    }


                echo '</table>
                    </div>
                </div>';
        }
        ?>
        
   


</body>
</html>