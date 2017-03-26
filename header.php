<?php


define('DB_HOST', 'localhost');
define('DB_NAME', 'all_stuff');
define('DB_USER', 'root');
define('DB_PASS', '');


       $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
       $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AllStuff.bg</title>
    <link rel="stylesheet" href="./assets/css/ressets.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/stylereglog.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/proba.css" type="text/css">
    


</head>
<body>
<div id="wrapper">
    <header>

        <div id="logo">
            <h2><a href="index.php?page=homepage">AllStuff.bg</a></h2>


            <button name="obqva" class="buton" id="obqva" >
            
		     <a name="obqva" href="index.php?page=newes" >Добави обява</a>

            </button>
            <div class="buton">

                <a  href="index.php?page=registration">Моят профил</a>
            </div>

            <div id="hallo">
                <?php
                session_start();
                if(isset($_SESSION['Hallousername'])){

                    echo $_SESSION['Hallousername'];

                    ?>


                    <a href="index.php?page=Logout" name="logout">Изход</a>

                    <?php
                }
                ?>

            </div>

        </div>

        <div id="underhome">
<!--            <div id="hallo">-->
<!--                --><?php
//                session_start();
//                if(isset($_SESSION['Hallousername'])){
//
//                    echo $_SESSION['Hallousername'];
//
//                ?>
<!--                -->
<!---->
<!--                    <a href="?page=Logout" name="logout">Изход</a>-->
<!--                -->
<!--                --><?php //
//                }
//                ?>
<!--                -->
<!--            </div>-->
            

          


            <form action="search.php" method="get">
                <select id="grad" name="grad">
                    <option value="">  Изберете Град</option>
                    <?php
                    $pstmt = $db->prepare("SELECT location_id, location_name FROM locations ORDER BY location_id;");
                    if ($pstmt->execute()) {
                        while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                            $locationSiti = $row['location_name'];


                            echo "<option name='graD' value='$row[location_id]'> $locationSiti</option>";
                        }
                    }
                    ?>
                </select>

               <input id="search" type="search" name="search" placeholder="Search..." size="150">
               
<!--                    <input  name="lupa" type="image" src="./assets/images/lupa2.png" alt="Submit">-->
                <input type="submit" value="Търси" name="submitGrad" id="lupa">
                </form>
        </div>
    </header>