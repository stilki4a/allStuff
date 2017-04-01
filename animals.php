
<?php
require_once 'nav.php';
?>
<div class="obsti">
    <?php

    try {
        $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $pstmt = $db ->prepare("SELECT obqva_id,obqva_name,picture_name,price FROM obqva WHERE fk_cat_id =1");


        if ($pstmt->execute()) {


            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='pics'>";
                echo " <a href='./proba.php?name=$row[obqva_id]'>";
                echo"<img src='$row[picture_name]'alt='snimkataa'>";
                echo"<div class='name'><h2>$row[obqva_name]</h2></div>";

                echo "</a>";

                echo "<div class='price'><spam>$row[price].lv</spam></div>";

                echo"</div>";


            }

        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

    ?>
</div>
</div>
