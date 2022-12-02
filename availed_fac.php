<?php 
  session_start(); 

  if (!isset($_SESSION['roll_no'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: student_login.php');
  }
  $db = new mysqli('localhost', 'root', '', 'project');
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
	<h2>Rent Status</h2>
</div>
<div class="content">
  <table>
    <tr>
      <th>Facility ID</th>
      <th>Facility Name</th>
      <th>Facility Cost</th>
    </tr>
    <?php
        $id=$_SESSION['roll_no'];
        $query = "SELECT * FROM facilities_availed inner join facilities on  facilities_availed.facility_id=facilities.facility_id WHERE facilities_availed.roll_no='$id'";
        $results = $db->query($query);
        if($results->num_rows > 0)
        {
          while($row = $results->fetch_assoc())
          {
            echo "<tr>";
            //echo "Roll No: " . $row['roll_no']. " - hostel ID:".$row['hostel_id']."- Due Date: ". $row['due_date']." Status: ".$row['status'];
            echo "<td>".$row['facility_id']."</td>";
            echo "<td>".$row['facility_name']."</td>";
            echo "<td>".$row['facility_cost']."</td>";
            echo "</tr>";
          }
        }
    ?>
</div>
</body>
</html>
