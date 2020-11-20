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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="header">
		<h2>Show Tickets</h2>
	</div>
	<form method="post" action="show_booked_tickets.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Train_Number</label>
			<input type="text" name="train_number" >
		</div>
		<div class="input-group">
			<label>Date Of Journey</label>
			<input type="date" name="doj">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="show_tickets_btn">See</button>
		</div>
	</form>
</body>

<?php echo "<br> 
<br><br>";?>

<body>
    <div align="CENTER">
	<h2>List of all Scheduled Trains</h2>
</div>
<?php
$query = "SELECT * from trainsavailable";
$result = mysqli_query($db,$query);

echo "<table class='table table-striped'>
<thead class='thead-dark'>
<tr>
<th scope='col'>Train_Number</th>
<th scope='col'>Train_Name</th>
<th scope='col'>Date Of Journey</th>
</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result)){

    echo "
    <tr>	
	<td>".$row[0]."</td>
	<td>".$row[2]."</td>
    <td>".$row[1]."</td>
	</tr>";
}

echo "</tbody>
</table>";


?>
</body>

</html>