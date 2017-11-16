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

$sql = "SELECT DoctorName from Doctors";
$doctors = mysql_query($sql);

mysqli_close($conn);
?>

<!doctype HTML>
<html>

<head>
    <title>KHALSA CLINIC</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="LOGO1.ico">
    <link rel="stylesheet" type="text/css" href="Khalsa.css">
    <script src="khalsa.js" defer></script>
</head>

<body>
    <header id="current_page" class="one">
        <h3>HOME</h3>
    </header>
    <input id="Search" type="text" value="Search" onkeypress="search(event)">
    <img id="searchI" src="SearchI.png" width="20" height="20" alt="Search" onclick="search()">
    <header>
        <img id="head" src="header_img.png">

    </header>
    <nav>
        <a class="one" href="">Home</a>
        <a class="two" href="Products.html">Products</a>
        <a class="three" href="">Doctors</a>
        <a class="four" href="">Medicine</a>
    </nav>
    <a href="login.html">
        <input id="login" type="button" value="LOGIN">
    </a>
    <main>
        <p></p>
        <img id="bookF" src="appointment2.png">
        <form action="">
            First Name:
            <input class="formI" type="text" maxlength="16" onclick="this.select()" required>
            <br> Last Name:
            <input class="formI" type="text"  maxlength="16" onclick="this.select()" required>
            <br> Date:
            <input class="formI" type="date" onclick="this.select()">
            <br> Mobile No:
            <input class="formI" type="tel" pattern="[0-9]{10}" onclick="this.select()" required>
            <br> Doctor Name:
            <?php echo "<select class='formI' name='doctors' required>";
			while($row = mysql_fetch_array($doctors)) {
				echo "<option value='".$row['DoctorName']."'>".$row['DoctorName']."</option>";
				}
			echo "</select>"
			?>
            <br> Timing:
            <select class="formI" name="time" required>
                <option value="1000">10:00</option>
                <option value="1030">10:30</option>
                <option value="1100">11:00</option>
                <option value="1130">11:30</option>
                <option value="1200">12:00</option>
                <option value="1230">12:30</option>
                <option value="0100">01:00</option>
                <option value="0130">01:30</option>
                <option value="0200">02:00</option>
            </select>
            <br> MSP Number:
                    <input class="formI" type="text" name="msp" pattern="[0-9]{10}" maxlength="10" required>
                    <br>
            <input class="formI" type="Submit" value="Submit">
            <input id="ab" class="formI" onclick="app()" type="button" value="Cancel">

        </form>
    </main>
    <footer>
        Khlasa Clinic &copyCopyright2017
    </footer>
</body>

</html>