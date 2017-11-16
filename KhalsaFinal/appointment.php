<?php
$PatientFname = $_POST['PatientFname'];   // register form attributes
$PatientLname = $_POST['PatientLname'];
$date = $_POST['bookdate'];
$cnumber = $_POST['Cnumber'];
$Doctor = $_POST['Doctor'];
$time = $_POST['timing'];
$Mspnumber = $_POST['MspNumber'];
	
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $pass = "";
    $dbname = "c9";
    $dbport = 3306;

$day = date("D", strtotime($date));
$now = date('Y-m-d');

if($date < $now) {
     $pastdate = "Please select valid date";
}

else if($day == 'Sat' || $day == 'Sun'){
    $weekend = "Clinic closed on Weekends";
}
else {
$conn = mysqli_connect($servername, $username, $psw, $dbname, $dbport);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO Appointment (PatientFname,PatientLname,bookdate,Cnumber,DoctorName,Timing,MspNumber)
VALUES ('$PatientFname','$PatientLname','$date','$cnumber','$Doctor','$time','$Mspnumber')";

if (mysqli_query($conn, $sql)) {
    $result ="Appointment Booked Successfully";
} else {
	$errormsg = "Appointment already booked, please select some other date-time / Couldn't create an appointment";
}

    mysqli_close($conn);
}


?>

<!doctype HTML>
<html>

<head>
    <title>KHALSA CLINIC</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="LOGO1.ico">
    <link rel="stylesheet" type="text/css" href="Khalsa.css">
    <script type="text/javascript" src="khalsa.js"></script>
    <script src="jquery-3.2.1.min.js"></script>
    	<script>
			$(function () {
     $('#datepicker').datetimepicker({  
         minDate:new Date()
      });
 });

			</script>
</head>

<body onload="smooth_scroll_form(5,'F')">
    <header id="current_page" class="one">
        <h3>HOME</h3>
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
        <a class="one" href="#">Home</a>
        <a class="two" href="Products.html">Products</a>
        <a class="three" href="">Doctors</a>
        <a class="four" href="">Medicine</a>
    </nav>
    <main>
        
        <img id="bookF" src="appointment2.png">
        <form action="appointment.php" method="post" id="appointment_form">
            <br>
            <label for="myname"> First Name: </label>
            <input class="formI"  name ="PatientFname" type="text" maxlength="16" required>
            <label for="myname"> Last Name: </label>
            <input class="formI" name ="PatientLname" type="text" maxlength="16"  required>
            <br>
            <label for="myname">Book Date: </label>
            <input class="formI" name="bookdate" type="date" >
            <label for="myname">Mobile No: </label>
            <input class="formI" name= "Cnumber" type="tel" pattern="[0-9]{10}"  required>
            <br>
            <label for="myname">Doctor Name: </label>
            <select class="formI" name="Doctor" required>
            <option value="Alan Wilkins">Alan Wilkins</option>
                <option value="Suzzane Clarke">Suzzane Clarke</option>
                <option value="Micheal Jones">Micheal Jones</option>
                <option value="Mclaren Scott">Mclaren Scott</option>
                <option value="Peter Park">Peter Park</option>
            
            </select>
			<label for="myname"> Timing: </label>
                <select class="formI" name="timing" required>
                <option value="10:00">10:00</option>
                <option value="10:30">10:30</option>
                <option value="11:00">11:00</option>
                <option value="11:30">11:30</option>
                <option value="12:00">12:00</option>
                <option value="12:30">12:30</option>
                <option value="13:00">13:00</option>
                <option value="13:30">13:30</option>
                <option value="14:00">14:00</option>
			</select>
            <br>
            <label for="myname"> MSP No: </label>
            <input class="formI" name="MspNumber" type="text" pattern="[0-9]{10}" maxlength="10" required>
            <br> 
            <input class="formI" type="Submit" value="Submit">
            <input id="ab" class="formI" onclick="app()" type="button" value="Cancel">
                    			<p><?php 
				if(isset($pastdate)){
					echo $pastdate;
				}
				else if(isset($weekend)) {
						echo $weekend;
					} 
			else if(isset($result)) {
				echo $result;
			}
				else {
					echo $errormsg;
				}
				?></p>

        </form>

    </main>
    <footer>
        Khalsa Clinic &copyCopyright2017
    </footer>
</body>

</html>