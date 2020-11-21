
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
<div align='CENTER'>
    <h2>
        List of All Booking Agents
    </h2>
</div>
<?php
    include('../functions.php');


if (!isAdmin()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../login.php');
}

$query = "SELECT * from bookingagents where user_type!='admin'";
$result = mysqli_query($db,$query);

echo "<table class='table table-striped'>
<thead class='thead-dark'>
<tr>
<th scope='col'>Name</th>
<th scope='col'>Username</th>
<th scope='col'>Email Id</th>
<th scope='col'>Address</th>
</tr>
</thead>
<tbody>";

while($row = mysqli_fetch_array($result)){
    echo "
    <tr>	
	<td>".$row[1]."</td>
	<td>".$row[4]."</td>
    <td>".$row[5]."</td>
    <td>".$row[3]."</td>
	</tr>";
}

echo "</tbody>
</table>";
echo "<br><center><a href='home.php'>Back to Admin Page</a><br> ";
//echo "<br><a href='home.php'>Back to Admin Page</a><br> ";

?>
</body>
</html>

