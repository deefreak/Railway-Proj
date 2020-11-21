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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand"><?php echo $_SESSION['user']['name'];?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="welcome.php"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="update-prof.php">Update Profile</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="check_availability.php">Book Tickets</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="show_past_bookings.php">Show Past Bookings</a>
	  </li>
	  <li class="nav-item active">
	  <a class="nav-link" href="index.php?logout='1'" style="color: red;">logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="header">
	<h2>Update Profile</h2>
</div>
<form method="post" action="update-prof.php">
    <?php echo display_error(); ?>
    <div class="input-group">
		<label>Name</label>
		<input type="text" name="name" value="<?php echo $name; ?>" required>
	</div>
    <div class="input-group">
		<label>CreditCard</label>
		<input type="text" name="creditcard" value="<?php echo $creditcard;?>" readonly>
	</div>
    <div class="input-group">
		<label>Address</label>
		<input type="text" name="address" value="<?php echo $address; ?>" required>
	</div>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>" readonly>
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>" required>
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
	<div class="input-group">
		<button type="submit" class="clear" name="clear_btn">Clear</button>
	</div>
-->
<!--
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
-->
</form>
</body>
</html>