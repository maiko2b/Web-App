<?php
  session_start();
  if (isset($_SESSION['uname'])&&$_SESSION['uname']!=""){
  }
  else
  {
    header("Location:index.php");
  }
$uname=$_SESSION['uname'];

?>
<html>
<head>
	<title></title>

	<!--Custom CSS-->
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    
</head>
<body>
	<!-- Navigation -->
    <ul class="nav nav-tabs navbar-fixed-top" role="tablist">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="home.php"></a>
            </div>
            <div class="navbar-header">
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	
                <ul class="nav navbar-nav navbar-left">
                   <li><a href="home.php"> Dashboard</a></li>
                    <li><a href="post.php"> Topics</a></li>
                    <li><a href="user.php"> Users</a></li>
                    <li class="active"><a href="category.php">Category</a></li>


                </ul>
              <ul class="nav navbar-nav navbar-right">
                    <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?php echo $uname;?></a></li>
                <li ><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
               
        </ul>

                
                
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
     <div class="container" style="margin:8% auto;width:900px;">
           
           <h2>Category</h2>

           <hr>
         <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Recipe</h3>

                </div> 
                 <div class="panel-body">
                   <form method="POST">
                   
                        <label>Category</label>
                        <?php include "../functions/db.php";
                        $image_id = $_GET['image_id'];
                        $sel = mysql_query("SELECT * from tblimg where image_id='$image_id' ");
                        while($row=mysql_fetch_assoc($sel)){
                          extract($row);
                         echo  '<input type="text" class="form-control" name="recipe" required style="width:50%" value='.$content.'>';
                        }

                        ?>
                        
        
                        <input type="submit" name="submit"class="btn btn-success pull-right" value="Edit">
                   </form>
                </div>
    </div>


    <?php 
    if(isset($_POST['submit'])){
      $recipe = $_POST['content'];
      $image_id = $_GET['image_id'];
      $update = mysql_query("UPDATE tblimg set content='$content' where image_id='$image_id'");
      header("Location:recipe.php");
    }




    ?>
	</body>
</htmls