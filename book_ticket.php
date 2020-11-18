<?php

include('functions.php');


if(!isUSer()){
    $_SESSION['msg'] ="You must log in first";
    header('location: login.php');
}
if(!isset($_SESSION['train_number'])){
    header('location: check_availability.php');
}

$no_of_pass = $_SESSION['no_of_pass'];

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
<form method="post" action="book_ticket.php">
    <?php echo display_error(); ?>
    <?php for($i=0;$i<$no_of_pass;$i++){ ?>
        <div class="input-group">
            <label>Passenger<?php echo $i+1?> Details</label>
            <input type="text" name="passenger_name[]" value="" placeholder="Passenger Name" required>
            <input type="text" name="passenger_age[]" value="" placeholder="Passenger Age" required>
            <select name="passenger_gender[]">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    <?php } ?> 
    <div class="input-group">
		<button type="submit" class="btn" name="book_ticket_btn">Book Ticket</button>
	</div>   
	<p>
		<a href="check_availability.php">Back</a>
	</p>

</form>
</body>
</html>


