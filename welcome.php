<?php 
   include('functions.php');
   if(!isLoggedIn()){
      $_SESSION['msg'] = "You must log in first";
      header('location: login.php');
      
   }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style type="text/css">
   body { background-image: url('https://images.unsplash.com/photo-1535535112387-56ffe8db21ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80') !important; } /* Adding !important forces the browser to overwrite the default style applied by Bootstrap */
</style>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<!-- logged in user information -->
		<div class="profile_info">

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
		<div align="CENTER" >
			<div>
			<h2 style="font-style: italic;"><br><a href="http://localhost/proj1/check_availability.php">Book a New Ticket</a><br>
			<br><a href="http://localhost/proj1/show_past_bookings.php">Show all Past Bookings</a><br>
			</h2>
			</div>
		</div>	
	</div>
	
</body>
</html>