<?php 
  session_start(); 

  if (!isset($_SESSION['roll_no'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: student_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['roll_no']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['roll_no'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['roll_no']; ?>
		<br></br><br></br>
	
	</strong></p>
		
		<p>
      <a class="btn btn-primary" href="rent_status.php" role="button">Check Rent Status</a>
	  <br></br>
      <a class="btn btn-primary" href="availed_fac.php" role="button">Check Facilities Availed</a>
	  <br></br>
	  <a class="btn btn-primary" href="complaint_html.php" role="button">Register Complain</a>
	  <br></br>
	  <a class="btn btn-primary" href="add_rem_facilities.php" role="button">Add Remove Facilities</a>
	  <br></br>	  <br></br>
		
	</p>
    	<p> <a href="student_portal.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>