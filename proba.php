<?php

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


        $pstmt = $db->prepare("Select o.obqva_id,o.obqva_zagl,o.price,l.location_name,p.picture_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id
                                             left outer JOIN pictures p ON o.obqva_id = p.fk_obqva_id
                                             WHERE obqva_id ='$id;'");
        if ($pstmt->execute()) {

            echo "<div id='figuura'>";
            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
//                            var_dump($row);


                $obZaglavie = $row['obqva_zagl'];
                $obCena = $row['price'];
                $obLokacia = $row['location_name'];
            }
?>


<div id="wrraper">
    <div id="topmail">

        <input type="button" value="НАЗАД" ONCLICK="history.back(-1)" id="back">
        <h1 id="men">Свържете се с мен</h1>
    </div>
    <div id="infoUser">
        <div class="up">
            <img src="" alt="pik">
        </div>
        <div id="rows">
            <p>Име на Обявата:
            <h1> <?= $obZaglavie ?></h1></p>
            <p>Град: <?= $obLokacia ?></p>
            <p>Цена:<?= $obCena ?> </p>

        </div>
    </div>


    <?php


        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
?>
