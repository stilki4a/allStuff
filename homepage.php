<nav id="menu">
    <ul>
        <li><a href="?page=cars"><img class="icons" src="./assets/images/car-icon.png"><span>Автомобили</span></a></li>
<!--        <li><a href=""><img class="icons" src="./assets/images/instruments.png"><span>Машини и инструменти</span></a></li>-->
<!--        <li><a href=""><img class="icons" src="./assets/images/electro-icon.png"><span>Електроника</span></a></li>-->

    </ul>
    <ul>

        <li><a href="?page=animals"><img class="icons" src="./assets/images/Animals_icon.png"><span>Животни</span></a></li>
<!--        <li><a href=""><img class="icons" src="./assets/images/garden-icon.png"><span>Дом и градина</span></a></li>-->
<!--        <li><a href=""><img class="icons" src="./assets/images/home-icon.png"><span>Недвижими имоти</span></a></li>-->
    </ul>
    <ul>
        <li><a href="?page=moda"><img class="icons" src="./assets/images/dress-icon.png"><span>Мода</span></a></li>
<!--        <li><a href=""><img class="icons" src="./assets/images/baby-icon.png"><span>За бебето и детето</span></a></li>-->
<!--        <li><a href=""><img class="icons" src="./assets/images/sport-icon.png"><span>Спорт, хоби, книги</span></a></li>-->

    </ul>
</nav>

    <div>

            <?php

        if (isset($_GET['submitGrad']) && $_GET['grad'] >= 1) {
            $locationId = $_GET['grad'];

            $pstmt = $db->prepare("SELECT * FROM obqva WHERE fk_location_id = $locationId");


        }else{
            $pstmt = $db->prepare("Select o.obqva_id,o.obqva_name,o.price,l.location_name,o.picture_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id 
                                             ORDER BY obqva_id DESC");
        }
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




//                }
//            catch (PDOException $e) {
//                echo $e->getMessage();
//            }
//

            ?>

</div>


