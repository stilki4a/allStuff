
<?php
            require_once 'nav.php';

//        if (isset($_GET['submitGrad']) && $_GET['grad'] >= 1) {
//            $locationId = $_GET['grad'];
//
//            $pstmt = $db->prepare("SELECT * FROM obqva WHERE fk_location_id = $locationId");
//
//
//        }else{
            $pstmt = $db->prepare("Select o.obqva_id,o.obqva_name,o.price,l.location_name,o.picture_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id 
                                             ORDER BY obqva_id DESC");
//        }
            if ($pstmt->execute()) {

                echo "<div class ='figuura'>";
                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<div class ='profile'>";
                    echo "<div class ='link'>";
                    echo " <a href='./proba.php?name=$row[obqva_id]'>";
                    echo "<img src='$row[picture_name]'alt='snimkataa'>";
                    echo "<h2 class='obname'>$row[obqva_name]</h2>";
                    echo "</a></div>";
                    echo "</div>";

                }
                echo "</div>";
            }




//                }
//            catch (PDOException $e) {
//                echo $e->getMessage();
//            }
//

            ?>

</div>


