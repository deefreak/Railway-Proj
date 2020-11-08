<?php
    include('../functions.php');


if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

?>

<html>
<head>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div align="CENTER">
	<h2>List of all Scheduled Trains</h2>
</div>
<?php
$query = "SELECT * from trainsavailable";
$result = mysqli_query($db,$query);

echo "<table style='width:50%;margin-left:auto;margin-right:auto'>
<thead><td style='border:1px solid black'>Train_Number</td><td style='border:1px solid black'>Date of Journey</td><td style='border:1px solid black'>Train_Name</td><td style='border:1px solid black'>AC Seats Left</td><td style='border:1px solid black'>SL Seats Left</td></thead>
";

while($row = mysqli_fetch_array($result)){
    echo "
<tr><td style='border:1px solid black'>".$row[0]."</td><td style='border:1px solid black'>".$row[1]."</td><td style='border:1px solid black'>".$row[2]."</td><td style='border:1px solid black'>".$row[3]."</td><td style='border:1px solid black'>".$row[4]."</td></tr>
";
}

echo "</table>";


?>
</body>
</html>