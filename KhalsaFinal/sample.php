

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
$password = md5($_POST['password']);	

	
$servername = "localhost";   // database variables
$username = "root";
$psw = "root";
$dbname = "KhalsaClinic";

// Create connection
$conn = mysqli_connect($servername, $username, $psw, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Patients (Fname,Lname,Gender,Dob,Address,PostalCode,ContactNumber,Email,MSP,Password)
VALUES ('$fname','$lname','$gender','$dob','$address','$pcode','$cnumber','$email','$msp','$password')";

if (mysqli_query($conn, $sql)) {
    $result ="Account Created";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

