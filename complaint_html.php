
<!DOCTYPE html>
<html>
<head>
	<title>COMPLAINTS | HOSTEL MANAGMENT SYSTEM</title>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Initiate A Complaint</h2>
</div>
<div class="content">
<form method="post" action="complaint_back.php">
    <label>Facility ID</label><br>
    <input type="number" name="facility_id">
    <label>Enter your Complaint</label><br>
    <textarea name="complaint" rows="6"></textarea>
    <input type="submit" name="submit">
</form>
</div>
</body>
</html>
