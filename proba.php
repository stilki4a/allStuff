<?php
include_once 'header.php';

if (isset($_GET['name'])) {
    $id = $_GET['name'];

    $obZaglavie="";
    $obCena = "";
    $obLokacia = "";

    define('DB_HOST', 'localhost');
    define('DB_NAME', 'all_stuff');
    define('DB_USER', 'root');
    define('DB_PASS', '');

    try {
        $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $pstmt = $db->prepare("select o.obqva_name,o.obqva_opisanie,o.picture_name,o.price,l.location_name,u.user_name,user_id, c.cat_name
                                                  FROM obqva o join locations l 
                                                  ON o.fk_location_id = l.location_id
                                                  join users u 
                                                  ON u.user_id = o.fk_user_id
                                                  JOIN categories c ON o.fk_cat_id = c.cat_id
                                                    WHERE obqva_id ='$id'");
                    if ($pstmt->execute()) {

            echo "<div id='figuura'>";
            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
//                            var_dump($row);


                $obZaglavie = $row['obqva_name'];
                $obCena = $row['price'];
                $obLokacia = $row['location_name'];
                $categoriq = $row['cat_name'];
                $opisanieOb = $row['obqva_opisanie'];
                $snimka = $row['picture_name'];


            }
?>


<div id="wrrbig">
    <div id="topmail">

        <input type="button" value="НАЗАД" ONCLICK="history.back(-1)" id="back">
    </div>
    <div id="info">
        <div id="rows">
            <div class="obname"><h1>  Разглеждате обява:<?= $obZaglavie ?></h1></div>
            <div >Град:<?= $obLokacia ?></p>
            <p>Цена:<?= $obCena ?> </p>
            <p>Категория:<?= $categoriq ?> </p>
            <p> <img src='<?= $snimka ?>' alt=""></p>
            <p>Описание:<?= $opisanieOb ?> </p>
        </div>
    </div>


    <?php


        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>
