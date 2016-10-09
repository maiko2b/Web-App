 	<script>
function myFunction() {
    alert("Please Register in order to view forum!");
}

</script>	


<div class="container">
  <ul class="nav nav-tabs navbar-fixed-top" role="tablist">
    <li class=""><a href="samplehome.php">Home</a></li>
    <li><a onclick="myFunction()">Forum</a></li> 
     <li><a href="#section3">Dishes</a></li>
    <li><a href="#section41">About us</a></li>

		<!-- login -->
<form class="navbar-form navbar-right" method="POST"role="search" action="pages/login.php">
					<div class="form-group">
					<input type="text" class="form-control" name="username"placeholder="Username">
					<input type="password" class="form-control" name="password"placeholder="Password">
					</div>
					<button type="submit" class="btn btn-success">Login</button>
					</form>


				<!--end-->
    </ul>
  </div>
</nav>