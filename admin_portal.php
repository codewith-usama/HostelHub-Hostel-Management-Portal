<?php 
  session_start(); 

  if (!isset($_SESSION['hostel_id'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: warden_login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['hostel_id']);
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
	<h2>Warden Home Page</h2>
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
    <?php  if (isset($_SESSION['hostel_id'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['hostel_id']; ?></strong></p>
		<p>

		<br></br>
      <a class="btn btn-primary" href="register.php" role="button">Register New Student</a>
	  <br></br>
      <a class="btn btn-primary" href="view_complaint.php" role="button">View Complaints</a>
	  <br></br>
	  <a class="btn btn-primary" href="warden_facility_add.php" role="button">Add Facility</a>
	  <br></br>
	  <a class="btn btn-primary" href="bills.php" role="button">Billing</a>
	  <br></br>
	  <a class="btn btn-primary" href="view_admitted_students.php" role="button">View Admitted Students</a>
	  <br></br>	 
    	<p> <a href="admin_portal.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>

</body>
</html>