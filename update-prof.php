<?php
    include('functions.php');

    if(!isUSer()){
        $_SESSION['msg'] ="You must log in first";
        header('location: login.php');
    }
else{
    $username = $_SESSION['user']['username'];
    $query = "SELECT * from bookingagents where username='$username'";
    $result = mysqli_query($db,$query);
    $row = mysqli_fetch_array($result);
    $name=$row[1];
    $creditcard=$row[2];
    $address=$row[3];
    $email=$row[5];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
	<h2>Update Profile</h2>
</div>
<form method="post" action="update-prof.php">
    <?php echo display_error(); ?>
    <div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>">
	</div>
    <div class="input-group">
		<label>CreditCard</label>
		<input type="text" name="creditcard" value="<?php echo $creditcard; ?>" readonly>
	</div>
    <div class="input-group">
		<label>Address</label>
		<input type="text" name="address" value="<?php echo $address; ?>">
	</div>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>" readonly>
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
<!--
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
-->
	<div class="input-group">
		<button type="submit" class="btn" name="update_btn">Update</button>
	</div>
<!--
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
-->
</form>
</body>
</html>