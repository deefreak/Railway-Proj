<?php
    include('functions.php');
?>

<html>
	<head>
		<link rel="stylesheet" href="style.css">
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
</body>
</html>