<?php
    include('functions.php');
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	</head>
<body>
<div align="CENTER">
<h2> List of all Trains </h2>
</div>
<?php
$query = "SELECT * from trains";
$result = mysqli_query($db,$query);
echo "<div class='container'>";
echo "<table class='table table-striped'>
<thead class='thead-dark'>
<tr>

<th scope='col'>Train_Number</th>
<th scope='col'>Train_Name</th>
</tr>
</thead>
<tbody>";


while($row = mysqli_fetch_array($result)){
	echo "
	<tr>	
	<td>".$row[0]."</td>
	<td>".$row[1]."</td>
	
	</tr>

	";
}

echo "</tbody>
</table>
</div>";
echo '<p style="color:blue;font-size:25px;"><center>
		<a href="admin/home.php">Back to main page</a>
	</p>';

?>
</body>
</html>