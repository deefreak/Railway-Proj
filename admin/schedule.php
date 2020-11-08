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
<h2> List of all Trains </h2>
</div>
<?php
$query = "SELECT * from trains";
$result = mysqli_query($db,$query);
echo "<table style='width:40%;margin-left:auto;margin-right:auto'>
<thead style='border:1px solid black'><td style='border:1px solid black'>Id</td><td style='border:1px solid black'>Train_Number</td><td style='border:1px solid black'>Train_Name</td></thead>
";

while($row = mysqli_fetch_array($result)){
    echo "
<tr style='border:1px solid black'><td style='border:1px solid black'>".$row[0]."</td><td style='border:1px solid black'>".$row[1]."</td><td style='border:1px solid black'>".$row[2]."</td></tr>
";
}

echo "</table>";


?>

<div class="header">
	<h2>Schedule Train</h2>
</div>
<form method="post" action="insert_new_train.php">
    <?php echo display_error(); ?>
    <div class="input-group">
		<label>Train Number</label>
		<input type="text" name="trainno" value="">
	</div>
    
	<div class="input-group">
		<label>Date of Journey</label>
		<input type="date" name="date" value="">
	</div>
	<div class="input-group">
		<label>Number of AC Coaches</label>
		<select name="acCoaches" id="user_type">
		<?php
			for($i=1;$i<=8;$i++){
				?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
			}
		?>

		</select> 
	</div>
	<div class="input-group">
		<label>Number of Sleeper Coaches</label>
		<select name="sleeperCoaches" id="user_type">
		<?php
			for($i=1;$i<=20;$i++){
				?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
				<?php
			}
		?>

		</select> 
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="schedule_train_btn">Schedule</button>
    </div>
    <p>
	 <a href="home.php">Back to Admin Page</a>

	</p>
	<p>
	 <a href="show_scheduled_trains.php">Show Scheduled Trains List</a>

	</p>
</form>
</body>
</html>


