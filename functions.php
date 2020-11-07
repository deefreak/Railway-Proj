<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', 'deepak', 'railwayproj');

// variable declaration
$username = "";
$email    = "";
$name     = "";
$address  = "";
$creditcard = "";
$errors   = array(); 

if(isset($_POST['register_btn'])){
    register();
}

function register(){
    global $db,$errors,$username,$email;
    $name = e($_POST['name']);
    $creditCard = e($_POST['creditcard']);
    $address = e($_POST['address']);
    $username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$password_1  =  e($_POST['password_1']);
    $password_2  =  e($_POST['password_2']);

    
    if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
    }
    
    if(count($errors) == 0){
        $password = $password_1;

        if(isset($_POST['user_type'])){
            $user_type = e($_POST['user_type']);
            $query = "INSERT INTO bookingagents(name,creditCard,address,username,emailID,password,user_type)
                     values('$name','$creditCard','$address','$username','$email','$password','$user_type'  )";
            mysqli_query($db,$query);
            $SESSION['success'] = "New user Successfully Created!!";
            header('location: admin/home.php');        
        }
        else{
            $query = "INSERT INTO bookingagents(name,creditCard,address,username,emailID,password,user_type)
                     values('$name','$creditCard','$address','$username','$email','$password','user'  )";
            mysqli_query($db,$query);
            $logged_in_user_id = mysqli_insert_id($db);
            $_SESSION['user'] = getUserById($logged_in_user_id);
            $SESSION['success'] = "You are now logged in";
            header('location: welcome.php');        
        }
    }

}

function getUserById($id){
	global $db;
	$query = "SELECT * FROM bokingagents WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}


function e($val){
    global $db;
    return mysqli_real_escape_string($db,trim($val));
}

function display_error(){
    global $errors;
    if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header('location: login.php');
}

if(isset($_POST['login_btn'])){
    login();
}

function login(){
    global $db,$username,$errors;
    $username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
    }
    if (count($errors) == 0) {
		$query = "SELECT * FROM bookingagents WHERE username='$username' and password='$password' LIMIT 1";
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: welcome.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
    }
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

if(isset($_POST['insert_train_btn'])){
	insert_train();
}

function insert_train(){
	global $db;
	$trainno = e($_POST['trainno']);;
	$trainname = e($_POST['trainname']);

	$query = "INSERT INTO trains(trainno,name) values
				('$trainno','$trainname')";
	mysqli_query($db,$query);

	header('location: insert_new_train.php');			
}

?>