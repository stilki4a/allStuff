<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AllStuff.bg</title>
    <link rel="stylesheet" href="./assets/css/ressets.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/stylereglog.css" type="text/css" />


</head>
<body>
<div id="wrapper">
    <header>

        <div id="logo">
            <h2><a href="./index.php">AllStuff.bg</a></h2>


            <div class="buton" id="obqva">


                <a  href="./newes.php">Добави обява</a>
                <input type="image" src="./assets/images/plus2.png" alt="Submit">

            </div>
            <div class="buton">

                <a  href="./registraton.php">Моят профил</a>
            </div>

        </div>

        <div id="underhome">
        <div>
        <?php 
        if(isset($_SESSION['Hallousername'])){
       	
       	 	session_start();
        	echo $_SESSION['Hallousername'];
        }
       	
        
        ?>
        </div>

            <div id="search">
                <input type="text" name="search" value="Search..." size="150">
                <input type="image" src="./assets/images/lupa2.png" alt="Submit">
            </div>
        </div>
    </header>