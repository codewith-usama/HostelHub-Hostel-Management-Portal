<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Login Page</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<p style="text-align:center;">

      <a class="btn btn-primary" href="student_login.php" role="button">Student Login</a>
      <a class="btn btn-primary" href="warden_login.php" role="button">Warden Login</a>

  	</p>
  </form>
</body>
</html>