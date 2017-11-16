<?php

    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $psw = "";
    $dbname = "c9";
    $dbport = 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $psw, $dbname, $dbport);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else {
	session_start();
	$username = trim($_POST['id']);
	$email = trim($_POST['email']);
	$password= trim($_POST['password']);

$sql = "SELECT * FROM Doctors WHERE email ='$email' and password ='$password'";

$result = mysqli_query($conn,$sql);
$count = mysqli_num_rows($result);
if($count==1){
	
	$_SESSION['login_user']=$email;
	
	if(isset($_SESSION['login_user'])){
		header("Location: welcome.php");
	}	
}
	else {
		$error = "Invalid Credentials";
	}
}
?>

<!doctype html>
<html>

<head>
    <title>KHALSA CLINIC</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="LOGO1.ico">
    <link rel="stylesheet" type="text/css" href="Khalsa.css">
    <script type="text/javascript" src="khalsa.js" defer></script>
</head>

<body>
    <header id="current_page" class="six">
        <h3>LOGIN</h3>

    </header>
    <input id="Search" type="text" value="Search" onkeypress="search(event)">
    <img id="searchI" src="SearchI.png" width="20" height="20" alt="Search" onclick="search()">
    <header>
        <img id="head" src="header_img.png">
    </header>
    <a href="">
        <div id="trigger_L">
        <input id="login" type="button" value="DOCTOR LOGIN">
        </div>
        </a>
        
        <a href="register.html">
            <div id="trigger_R">
        
                <input id="register" type="button" value="REGISTER">
                </div>
        </a>
    <nav>
        <a class="one" href="index.html">Home</a>
        <a class="two" href="Products.html">Products</a>
        <a class="three" href="">Doctors</a>
        <a class="four" href="">Medicine</a>
    </nav>
    
    <main id="login_register_main">
    <h4 id="login_h4">Doctor Login</h4>
    <form action="login.php" method="post">
    
    <label>Email : </label>
    <input class="formI" name="email" type="email" required>
    <br>
    <label> Password: </label>
    <input class="formI" name="password" type="password" required>
    <br>
    <input class="formI" type="Submit" value="Login">   
    <p><?php 
				if(isset($error)){
					echo $error;
				}
			 if(isset($success)) {
						echo $success;
					} 
				?></p>
    </form>
    </main>
    <footer>
        Khalsa Clinic &copyCopyright2017
    </footer>
</body>
</html>