<nav id="menu">
    <ul>
        <li><a href="?page=cars"><img class="icons" src="./assets/images/car-icon.png"><span>Автомобили</span></a></li>
        <li><a href=""><img class="icons" src="./assets/images/instruments.png"><span>Машини и инструменти</span></a></li>
        <li><a href=""><img class="icons" src="./assets/images/electro-icon.png"><span>Електроника</span></a></li>

    </ul>
    <ul>

        <li><a href="?page=animals"><img class="icons" src="./assets/images/Animals_icon.png"><span>Животни</span></a></li>
        <li><a href=""><img class="icons" src="./assets/images/garden-icon.png"><span>Дом и градина</span></a></li>
        <li><a href=""><img class="icons" src="./assets/images/home-icon.png"><span>Недвижими имоти</span></a></li>
    </ul>
    <ul>
        <li><a href="?page=moda"><img class="icons" src="./assets/images/dress-icon.png"><span>Мода</span></a></li>
        <li><a href=""><img class="icons" src="./assets/images/baby-icon.png"><span>За бебето и детето</span></a></li>
        <li><a href=""><img class="icons" src="./assets/images/sport-icon.png"><span>Спорт, хоби, книги</span></a></li>

    </ul>
</nav>

    <div>

            <?php

            define('DB_HOST', 'localhost');
            define('DB_NAME', 'all_stuff');
            define('DB_USER', 'root');
            define('DB_PASS', '');

            try {
                $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                    $pstmt = $db->prepare("Select o.obqva_id,o.obqva_zagl,o.price,l.location_name,o.picture_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id
                                             left outer JOIN pictures p ON o.obqva_id = p.fk_obqva_id");
                    if ($pstmt->execute()) {

                        echo "<div id='figuura'>";
                        while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<div id='profile'>";
                            echo "<div id='link'>";
                            echo " <a href='./proba.php?name=$row[obqva_id]'>";
                            echo"<img src='$row[picture_name]'alt='snimkataa'>";
                            echo"<h2>$row[obqva_zagl]</h2>";
                            echo "</a></div>";
                            echo"</div>";

                        
                        }
                        echo "</div>";
                    }
                }
            catch (PDOException $e) {
                echo $e->getMessage();
            }


            ?>

</div>


