
    <?php
include_once 'header.php';

    if ((isset($_GET['submitGrad']) && $_GET['grad'] >= 1) && empty($_GET['search'])) {
        $locationId = $_GET['grad'];

        $pstmt = $db->prepare("Select o.obqva_id,o.obqva_name,o.price,l.location_name,o.picture_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id 
                                             WHERE l.location_id='$locationId'");


        if ($pstmt->execute()) {

        echo "<div id='figuura'>";
            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<div id='profile'>";
                echo "<div id='link'>";
                echo " <a href='./proba.php?name=$row[obqva_id]'>";
                echo "<img src='$row[picture_name]'alt='snimkataa'>";
                echo "<h2>$row[obqva_name]</h2>";
                echo "</a></div>";
            echo "</div>";

            }
        echo "</div>";
        }
    }
    if ((isset($_GET['submitGrad']) && $_GET['grad'] == 0) && !empty($_GET['search'])) {
        $term =$_GET['search'];

        $pstmt = $db->prepare("SELECT * FROM obqva WHERE obqva_name LIKE '$term%'");


        if ($pstmt->execute()) {

            echo "<div id='figuura'>";
            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div id='profile'>";
                echo "<div id='link'>";
                echo " <a href='./proba.php?name=$row[obqva_id]'>";
                echo "<img src='$row[picture_name]'alt='snimkataa'>";
                echo "<h2>$row[obqva_name]</h2>";
                echo "</a></div>";
                echo "</div>";

            }
            echo "</div>";
        }
    }

    if ((isset($_GET['submitGrad']) && $_GET['grad'] == 0) && empty($_GET['search'])) {


        $pstmt = $db->prepare("Select o.obqva_id,o.obqva_name,o.price,l.location_name,o.picture_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id 
                                             ORDER BY obqva_id DESC");


        if ($pstmt->execute()) {

            echo "<div id='figuura'>";
            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div id='profile'>";
                echo "<div id='link'>";
                echo " <a href='./proba.php?name=$row[obqva_id]'>";
                echo "<img src='$row[picture_name]'alt='snimkataa'>";
                echo "<h2>$row[obqva_name]</h2>";
                echo "</a></div>";
                echo "</div>";

            }
            echo "</div>";
        }
    }

    ?>


