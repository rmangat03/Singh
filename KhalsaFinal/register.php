<?php
$fname = $_POST['fname'];   // register form attributes
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$pcode = $_POST['pcode'];
$cnumber = $_POST['cnumber'];
$email = $_POST['email'];
$msp = $_POST['msp'];
	

	
$servername = getenv('IP');
    $username = getenv('C9_USER');
    $pass = "";
    $dbname = "c9";
    $dbport = 3306;


// Create connection
$conn = mysqli_connect($servername, $username, $psw, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Patients (Fname,Lname,Gender,Dob,Address,PostalCode,ContactNumber,Email,MSP)
VALUES ('$fname','$lname','$gender','$dob','$address','$pcode','$cnumber','$email','$msp')";

if (mysqli_query($conn, $sql)) {
    $result ="Account Created";
} else {
	$errormsg = "Error Occured";
   
}

mysqli_close($conn);
?>
       <!doctype html>
       <html>
        
        <head>
            <title>KHALSA CLINIC</title>
            <meta charset="UTF-8">
            <link rel="shortcut icon" href="LOGO1.ico">
            <link rel="stylesheet" type="text/css" href="Khalsa.css">
            <script src="khalsa.js" defer></script>    
        </head>
        
        <body>
            <header id="current_page" class="five">
                <h3>Register</h3>
            </header>
            <input id="Search" type="text" value="Search" onkeypress="search(event)">
            <img id="searchI" src="SearchI.png" width="20" height="20" alt="Search" onclick="search()">
            <header>
                <img id="head" src="header_img.png">
            </header>
    <a href="login.html">
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
                <h4 id="register_h4"><?php if(isset($result)) echo $result; 
					
					else {
						echo $errormsg;
					}
					
					?></h4>
					
    <form action="register.php" method="post">
            <label for="myname">First Name: </label>
            <input name="fname" class="formI" type="text" required>
            <br>
            <label for="myname">Last Name: </label>
            <input name="lname" class="formI" type="text" required>
            <br> 
            <label for="myname">Gender: </label>
            <input class="formI" type="radio" name="gender" value="male" checked> Male
            <input class="formI" type="radio" name="gender" value="female"> Female
            <br>
            <label for="myname"> DOB: </label>
            <input class="formI" type="date" name="dob" required>
            <br>
            <label for="myname">Address: </label>
            <input class="formI" name="address" type="text" required>
            <br>
            <label for="myname">Postal Code: </label>
            <input class="formI" name="pcode" pattern="[A-Za-z0-9]{6}" maxlength="6" type="text" required>
            <br>
            <label for="myname"> Contact No: </label>
            <input class="formI" name="cnumber" type="text" pattern="[0-9]{10}" maxlength="10" required>
            <br>
            <label for="myname">Email: </label>
            <input class="formI" name="email" type="email" required>
            <br>
            <label for="myname">MSP No: </label>
            <input class="formI" name="msp" type="text" pattern="[0-9]{10}" maxlength="10" required>
            <br>
            
            <input class="formI" type="submit" value="REGISTER">
            <p><?php if(isset($result)) echo $result; 
						else {
						echo $errormsg;
					} ?></p>
        </form>
                
            </main>
            <footer>
                Khalsa Clinic &copyCopyright2017
            </footer>
        </body>
</html>        
     