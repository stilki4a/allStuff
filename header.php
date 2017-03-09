<?php
$arr= array("Благоевград","Бургас","Варна","Велико Търново","Видин","Враца",
    "Габрово","Добрич","Кърджали","Кюстендил","Ловеч","Монтана","Пазарджик","Перник",
    "Плевен","Пловдив","Разград","Русе","Силистра","Сливен","Смолян",
	"София","Ст.Загора","Търговище","Хасково","Шумен","Ямбол");

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
            <h2><a href="?page=homepage">AllStuff.bg</a></h2>


            <button name="obqva" class="buton" id="obqva" >
            
		     <a name="obqva" href="?page=newes" >Добави обява</a>

            </button>
            <div class="buton">

                <a  href="?page=registration">Моят профил</a>
            </div>
        </div>

        <div id="underhome">
            <div id="hallo">
                <?php
                session_start();
                if(isset($_SESSION['Hallousername'])){

                    echo $_SESSION['Hallousername'];
                
                ?>
                

                    <a href="?page=Logout" name="logout">Изход</a>
                
                <?php 
                }
                ?>
                
            </div>
            

          

                <label for="grad"> </label>

                <select id="grad" name="grad">
                    <option value="$i">  Изберете Град</option>
                    <?php
                    for ($i = 0; $i <count($arr); $i++){

                        echo '<option value="$i">'.$arr[$i].'</option>';
                    }
                    ?>
                </select>

                <input id="search" type="text" name="search" value="Search..." size="80">
                <div id="lupa">
                    <input  name="lupa" type="image" src="./assets/images/lupa2.png" alt="Submit">
                </div>
           
        </div>
    </header>