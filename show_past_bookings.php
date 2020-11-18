<?php
    include('functions.php');

    if(!isUSer()){
        $_SESSION['msg'] ="You must log in first";
        header('location: login.php');
    }
?>



<html>
	<head>
		<link rel="stylesheet" href="style.css">
	</head>
<body>
<div align="CENTER">
<h2> All Past Bookings By You</h2>
</div>
<?php

$username = $_SESSION['user']['username'];

$query = "SELECT * from bookinghistory where username='$username'";
$result = mysqli_query($db,$query);

while($row = mysqli_fetch_array($result)){
    echo '<div style="border: 5px solid #aaa;width:40%;margin-left:auto;margin-right:auto">';
    $pnr = $row[3];
    $train_number = $row[1];
    $doj = $row[2];
    $doj1 = str_replace('-','',$doj);
    $ticket_table_name = "ticket".$train_number.$doj1;
    echo "<table style='width:40%;margin-left:auto;margin-right:auto'>
<thead style='border:1px solid black'><td style='border:1px solid black'>PNR</td>
<td style='border:1px solid black'>Train Number</td><td style='border:1px solid black'>Date of Journey</thead>
";
    echo "
    <tr style='border:1px solid black'><td style='border:1px solid black'>".$row[3]."</td>
    <td style='border:1px solid black'>".$row[1]."</td><td style='border:1px solid black'>".$row[2]."</td></tr>
    ";
     echo " </table";

    echo "<table style='width:40%;margin-left:auto;margin-right:auto'>
<thead style='border:1px solid black'><td style='border:1px solid black'>Passenger Name</td>
<td style='border:1px solid black'>Berth Number</td><td style='border:1px solid black'>Berth Type</td><td style='border:1px solid black'>Coach no.</td><td style='border:1px solid black'>Age</td><td style='border:1px solid black'>Gender</td></thead>
";

    $query1 = "SELECT * from $ticket_table_name where pnr=$pnr";
    $result1 = mysqli_query($db,$query1);
    while($row1 = mysqli_fetch_array($result1)){
        echo "
    <tr style='border:1px solid black'><td style='border:1px solid black'>".$row1[3]."</td>
    <td style='border:1px solid black'>".$row1[4]."</td><td style='border:1px solid black'>".$row1[5]."</td><td style='border:1px solid black'>".$row1[6]."</td><td style='border:1px solid black'>".$row1[7]."</td>
    <td style='border:1px solid black'>".$row1[8]."</td></tr>
    ";
    }
    echo "</table";

    echo "</div>";
    echo "</br>";

}



?>
</body>
</html>