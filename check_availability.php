<?php

include('functions.php');

if(!isUSer()){
    $_SESSION['msg'] ="You must log in first";
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Book ticket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
	<h2>Book Ticket</h2>
</div>
<form method="post" action="check_availability.php">
    <?php echo display_error(); ?>
    <div class="input-group">
		<label>Train Number</label>
		<input type="text" name="train_number" value="" required>
	</div>
    <div class="input-group">
		<label>Date of Journey</label>
		<input type="date" name="doj" value="" required>
	</div>
    <div class="input-group">
		<label>Number Of Passengers</label>
		<input type="text" name="no_of_pass" value="" required>
	</div>
	<div class="input-group">
		<label>Choose Class</label>
		<select name="class" id="user_type">
            <option value="Sleeper">Sleeper</option>
            <option value="AC">AC</option>

        </select>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="check_availability_btn">Check Availability</button>
	</div>
	<p>
		<a href="welcome.php">Back to Home page</a>
	</p>
	<p>
		<a href="admin/show_scheduled_trains.php">Show All Released Trains</a>
	</p>
</form>
</body>
</html>