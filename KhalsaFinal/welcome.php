<?php 
session_start();
?>
 <html>
    
    <head>
        <title>KHALSA CLINIC</title>
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="LOGO1.ico">
        <link rel="stylesheet" type="text/css" href="Khalsa.css">
        <script type="text/javascript" src="khalsa.js" defer></script>    
    </head>
    
    <body>
        <div id="wrapper">
        <header id="current_page_welcome" class="one">
            <h3>Login as: <?php if(isset($_SESSION['login_user'])){
		  echo $_SESSION['login_user'];
	} ?> </h3>
            
        </header>
        <input id="Search" type="text" value="Search" onkeypress="search(event)" onclick="this.select()">
        <img id="searchI" src="SearchI.png" width="20" height="20" alt="Search" onclick="search()">
        <header>
            <img id="head" src="header_img.png">
        </header>
        <div id="trigger_R">
            <a href="logout.php">
                
                    <input id="register" type="button" value="LOG OUT">
            </a>
            </div>
        
        <main id="logout_main">
         
        </main>
        <footer>
            Khalsa Clinic &copyCopyright2017
        </footer>
    </div>
    </body>
    
    </html>