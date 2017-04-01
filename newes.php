
<?php
// session_start();

if(!(isset($_SESSION['username']))){
    header('Location:?page=registration',true, 302);
}else {

    $emtyOb='';
    $wrongPic='';

        try {
            $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


            if (isset($_POST['submitUpload'])) {

                if (isset($_FILES['image1'])) {
                    $fileOnServerName = $_FILES['image1']['tmp_name'];
                    $fileOriginalName = $_FILES['image1']['name'];



                    $usernamefolder = $_SESSION['username'];
                    $username = $_SESSION['username'];

                    $nameOb = $_POST['zaglavie'];
                    $kateg = $_POST['kategoriq'] + 0;
                    $opisanie = $_POST['opisanie'];

                    $mestopo = $_POST['mestopol'] + 0;
                    $price = $_POST['price'];
                    $phone = $_POST['phone'];


                    if ((empty($nameOb)) && (empty($opisanie)) && (empty($price)) && (empty($phone)) && ($fileOriginalName =='')) {
                        $emtyOb="Опитвате се да качите празна обява";
                    } else {


                        if (is_uploaded_file($fileOnServerName)) {
                            if (move_uploaded_file($fileOnServerName,
                                "./dir/$username/$fileOriginalName")) {
//                                echo "Bravo, ti uspq! ";
                            } else {
                                $wrongPic = "Грешка при качване на снимката";
                            }

                        } else {

                        }


                        $picPath = "./dir/$username/$fileOriginalName";
                        $db->exec("SET NAMES utf8;");
                        $db->exec("SET character_set_results=utf8;");
                        $pstmt = $db->exec("INSERT INTO obqva(obqva_id,obqva_name,obqva_opisanie,fk_user_id,fk_location_id,fk_cat_id,phone,price,picture_name)
                                            VALUES (null,'$nameOb','$opisanie',
                                            (SELECT user_id FROM users WHERE user_name ='$username'),$mestopo,$kateg,'$phone','$price','$picPath')");

                    }
                }
            }


            } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }



?>




<div class="obqvaout">
 <div class="wrr">
        <h2>Добави обява</h2>

        <form enctype='multipart/form-data' action="?page=newes" method="post">
         <link rel="stylesheet" href="../AllStuff/assets/css/stylereglog.css" type="text/css" />
           

            <div class="regtext">
                <label for="">Заглавие: </label>
                <input name="zaglavie" type="text" value="" size="23">
            </div>

            <div class="regtext">
                <label  for="">Категория: </label>
                <select  name="kategoriq" id="kategoriq">

                    <?php
                    $pstmt = $db->prepare("SELECT cat_id, cat_name FROM categories;");


                    if ($pstmt->execute()) {
                        while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                            $categories = $row['cat_name'];

//                        echo "".$row['cat_id'];

                            echo "<option value='$row[cat_id]'>$categories</option>";

                        }
                    }
                    ?>
                </select>
            </div>

            <div class="regtext">
                <label for="">Описание: </label>
                <textarea name="opisanie" id="" cols="44" rows="6" ></textarea>
            </div>

            <div class="regtext">
                <label for="img">Снимки: </label>
                <input name="image1" id="img1" type="file"  accept="image/*" />
				<input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
            </div>

            <div class="regtext">
                <label >Местоположение: </label>

	                    <select name='mestopol'   id='mestopol' >
                            <?php
                            $pstmt = $db->prepare("SELECT location_id, location_name FROM locations ORDER BY location_id;");
                            if ($pstmt->execute()) {
                                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                                    $locationSiti = $row['location_name'];


                                    echo "<option value='$row[location_id]'> $locationSiti</option>";
                                }
                            }
                            ?>
	                    </select>

            </div>
            <div class="regtext">

                <label for="">Цена: </label>
                <input size="23" type="text" name="price">
            </div>

            <div class="regtext">
                <label for="">Телефон: </label>
                <input  type="text" size="23" name="phone">
            </div>
            <div>
                <input type="submit" id="upload" name="submitUpload" value="Запиши" >
            </div>
            <div>
                <p> <?= $emtyOb ?> </p>
            </div>
            <div> <?= $wrongPic ?> </div>
        </form>
    </div>
 </div>
 </div>
