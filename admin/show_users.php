
<html>
    <head>
        <link rel="stylesheet" href="../style.css">
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

$query = "SELECT * from bookingagents";
$result = mysqli_query($db,$query);

echo "<table style='width:50%;margin-left:auto;margin-right:auto' >
<thead><td style='border:1px solid black'>Id</td><td style='border:1px solid black'>Name</td><td style='border:1px solid black'>Username</td><td style='border:1px solid black'>Email Id</td><td style='border:1px solid black'>User Type</td></thead>
";

while($row = mysqli_fetch_array($result)){
    echo "
<tr><td style='border:1px solid black'>".$row[0]."</td><td style='border:1px solid black'>".$row[1]."</td><td style='border:1px solid black'>".$row[4]."</td><td style='border:1px solid black'>".$row[5]."</td><td style='border:1px solid black'>".$row[7]."</td></tr>
";
}

echo "</table>";
echo "<br><a href='http://localhost/proj1/admin/home.php'>Back to Admin Page</a><br> ";

?>
</body>
</html>

