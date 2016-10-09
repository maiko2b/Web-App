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
                <a class="navbar-brand" href="home.php"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            	
                <ul class="nav navbar-nav navbar-left">
                   <li><a href="home.php"> Dashboard</a></li>
                    <li><a href="post.php"> Topics</a></li>
                    <li><a href="user.php"> Users</a></li>
                    <li class=""><a href="category.php">Category</a></li>
                      <li class="active"><a href="recipes.php">Recipes</a></li>

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
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Recipe</h3>
                </div> 
                 <div class="panel-body">
                     <a href="add-recipe.php" class="pull-right btn btn-success">Add New</a><br><br>
                               
            <table class="table table-stripped">
                                <th>Name</th>
                                <th>Content</th>
                                 <th>Action</th>
                            <?php
                            
                            include "../functions/db.php";

                            $sql = "SELECT * from tblimg";
                            $run = mysql_query($sql);

                            while($row=mysql_fetch_array($run))
                            {
                                extract($row);
                                echo "<tr>";
                                echo "<td>".$image_name."</td>";
                                  echo "<td>".$image_path."</td>";
                                echo '<td> <a href="delete-recipe.php?image_id='.$image_id.'"><button class="btn btn-danger">Delete</button></a></td>';
                                echo "</tr>";
                            }
                           

                            ?>
                            </table>                 </div>
                </div>

            </div>
           
	</body>
</html>