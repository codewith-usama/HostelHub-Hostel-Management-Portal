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
  $db = new mysqli('localhost', 'root', '', 'project');
?>
<!DOCTYPE html>
<html>
<head>
  <title>VIEW COMPLAINTS | HOSTEL MANAGMENT SYSTEM</title>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Warden Home Page</h2>
</div>
<div class="content">
<table>
    <tr>
      <th>Complaint ID</th>
      <th>Roll No</th>
      <th>Facility Name</th>
      <th>Comments</th>
    </tr>
    <?php
        $id=$_SESSION['hostel_id'];
        $query = "SELECT * FROM complaints inner join facilities on  complaints.facility_id=facilities.facility_id WHERE complaints.hostel_id='$id'";
        $results = $db->query($query);
        if($results->num_rows > 0)
        {
          while($row = $results->fetch_assoc())
          {
            echo "<tr>";
            //echo "Roll No: " . $row['roll_no']. " - hostel ID:".$row['hostel_id']."- Due Date: ". $row['due_date']." Status: ".$row['status'];
            echo "<td>".$row['complain_ticket']."</td>";
            echo "<td>".$row['roll_no']."</td>";
            echo "<td>".$row['facility_name']."</td>";
            echo "<td>".$row['comments']."</td>";
            echo "</tr>";
          }
        }
    ?>
</div>
</body>
</html>
