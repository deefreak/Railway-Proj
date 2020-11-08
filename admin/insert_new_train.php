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
	<h2>List of all Trains</h2>
</div>
<?php
$query = "SELECT * from trains";
$result = mysqli_query($db,$query);

echo "<table style='width:50%;margin-left:auto;margin-right:auto'>
<thead><td style='border:1px solid black'>Id</td><td style='border:1px solid black'>Train_Number</td><td style='border:1px solid black'>Train_Name</td></thead>
";

while($row = mysqli_fetch_array($result)){
    echo "
<tr><td style='border:1px solid black'>".$row[0]."</td><td style='border:1px solid black'>".$row[1]."</td><td style='border:1px solid black'>".$row[2]."</td></tr>
";
}

echo "</table>";


?>

<div class="header">
	<h2>Insert a new Train</h2>
</div>
<form method="post" action="insert_new_train.php">

    <?php echo display_error(); ?>
    <div class="input-group">
		<label>Train Number</label>
		<input type="text" name="trainno" value="">
	</div>
    <div class="input-group">
		<label>Train Name</label>
		<input type="text" name="trainname" value="">
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="insert_train_btn">Insert</button>
    </div>
    <p>
	 <a href="home.php">Back to Admin Page</a>
	</p>
	<p>
	 <a href="schedule.php">Schedule a Train</a>
	</p>
</form>
</body>
</html>
