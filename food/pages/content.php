  <?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
  }
  else
  {
    header("Location:../samplehome.php");
  }
$username=$_SESSION['username'];
$userid = $_SESSION['user_Id'];

?>
<html>
<head>
	<title></title>
<!--stylesheet-->
<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/global.css">
<!--stylesheet--> 


	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
<!--Bootstrap CSS-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!--Script-->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<!--nav -- >

 <div class="container">

  

		 <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">

                <ul class="nav navbar-nav navbar-left">
                   <li><a href="home.php">Forum</a></li>
                    <li><a href="home.php#quest"> Post a Question</a></li>
                    <li><a href="recipe.php">Recipe</a></li>
                </ul>
     				
					 <ul class="nav navbar-nav navbar-right">
                         <li><a href="#" ><span class="glyphicon glyphicon-user"></span> <?php echo $username;?></a></li>
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
                
                            <?php
				
                include "../functions/db.php";
                     $id = $_GET['post_id'];
                     
                
                $sql = mysql_query("SELECT * from tblpost as tp join category as c on tp.cat_id=c.cat_id where tp.post_Id='$id' ");
                if($sql==true){
                  while($row=mysql_fetch_assoc($sql)){
                    extract($row);
                    if($user_Id==009){
                       echo "<label>Topic Title: </label> ".$title."<br>";
                       echo "<label>Topic Category: </label> ".$category."<br>";
                       echo "<label>Date time posted: </label> ".$datetime;
                       echo "<p class='well'>".$content."</p>";
                       echo "<label>Posted By: </label> Admin";
                    }
                    else{
                      $sel = mysql_query("SELECT * from tbluser where user_Id='$user_Id' ");
                      while($row=mysql_fetch_assoc($sel)){
                        extract($row);
                        echo "<label>Topic Title: </label> ".$title."<br>";
                       echo "<label>Topic Category: </label> ".$category."<br>";
                       echo "<label>Date time posted: </label> ".$datetime;
                       echo "<p class='well'>".$content."</p>";
                       echo '<label>Posted By: </label>'.$fname.' '.$lname;
                      }
                      
                    }
                    
         
                }
                }
                
              
                    
              ?>
			 
              <br><label>Comments</label><br>
              <div id="comments">
			  
              <?php 
              $postid= $_GET['post_id'];
              $sql = mysql_query("SELECT * from tblcomment as c join tbluser as u on c.user_Id=u.user_Id where post_Id='$postid' order by datetime");
              $num = mysql_num_rows($sql);
              if($num>0){
              while($row=mysql_fetch_assoc($sql)){
                    echo "<label>Comment by: </label> ".$row['fname']." ".$row['lname']."<br>";
                     echo '<label class="pull-right">'.$row['datetime'].'</label>';
                     echo "<p class='well'>".$row['comment']."</p>";
              }

            }

              ?>
            </div>
              </div>
          </div>
          <hr>
		   <div class="container">
            <div class="col-sm-5 col-md-5 sidebar">
          <h3>Comment</h3>
          <form method="POST">
            <textarea type="text" class="form-control" id="commenttxt"></textarea><br>
            <input type="hidden" id="postid" value="<?php echo $_GET['post_id']; ?>">
            <input type="hidden" id="userid" value="<?php echo $_SESSION['user_Id']; ?>">
            <input type="submit" id="save" class="btn btn-success pull-right" value="Comment">
          </form>
        </div>
    </div>

		
</body>
<script>

$("#save").click(function(){
var postid = $("#postid").val();
var userid = $("#userid").val();
var comment = $("#commenttxt").val();
var datastring = 'postid=' + postid + '&userid=' + userid + '&comment=' + comment;
if(!comment){
  alert("Please enter some text comment");
}
else{
  $.ajax({
    type:"POST",
    url: "../functions/addcomment.php",
    data: datastring,
    cache: false,
    success: function(result){
      document.getElementById("commenttxt").value=' ';
      $("#comments").append(result);
    }
  });
}
return false;
})

</script>
</html>