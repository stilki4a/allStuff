<?php
$arr= array("Област Благоевград","Област Бургас","Област Варна","Област Велико Търново","Област Видин","Област Враца",
    "Област Габрово","Област Добрич","Област Кърджали","Област Кюстендил","Област Ловеч","Област Монтана","Област Пазарджик","Област Перник",
    "Област Плевен","Област Пловдив","Област Разград","Област Русе","Област Силистра","Област Сливен","Област Смолян",
    "Област Софийска","Област София","Област Стара Загора","Област Търговище","Област Хасково","Област Шумен","Област Ямбол");

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
    <link rel="stylesheet" href="./assets/css/footercss.css" type="text/css" />


</head>
<body>
<div id="wrapper">
    <header>

        <div id="logo">
            <h2><a href="?page=homepage">AllStuff.bg</a></h2>


            <div class="buton" id="obqva">


                <a name="obqva" href="?page=newes">Добави обява</a>
                <input type="image" src="./assets/images/plus2.png" alt="Submit">

            </div>
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