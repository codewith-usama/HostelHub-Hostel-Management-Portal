<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Warden Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="shortcut icon" href="favicon.ico">
</head>
<body>
  <div class="header">
  	<h2>Warden Login</h2>
  </div>

  <form method="post" action="admin_portal.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_admin">Login</button>
  	</div>
		<!--
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p> -->
  </form>
</body>
</html>
