<?php


include_once ('header.php');

$userId=$_SESSION['userid'];
$username=$_SESSION['username'];

if (isset($_POST['update'])){
	$obIdForUpdate = $_POST['update'];

	$emtyOb="";
	$wrongPic="";
	
	
	try {

        $pstmt = $db->prepare("Select o.obqva_id,o.obqva_name,o.price,l.location_name,o.picture_name,o.phone,o.obqva_opisanie,c.cat_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id
											 JOIN categories c ON fk_cat_id=c.cat_id
                                             WHERE o.obqva_id= ?");

        if ($pstmt->execute(array($obIdForUpdate))) {

            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {


                $obZaglavie = $row['obqva_name'];
                $obCena = $row['price'];
                $obLokacia = $row['location_name'];
                $categoriq = $row['cat_name'];
                $opisanieOb = $row['obqva_opisanie'];
                $snimka = $row['picture_name'];

                $phone = $row['phone'];


            }


            echo "	
			<div class='obqvaout'>
 			<div class='wrr'>	
				<h2>Редактирай обява $obZaglavie</h2>
		
		<form enctype='multipart/form-data' action='update1.php' method='post'>
		 <link rel='stylesheet' href='../AllStuff/assets/css/stylereglog.css' type='text/css' />
		
		
		<div class='regtext'>
		<label for=''>Заглавие: </label>
		<input name='zaglavie' type='text' value=$obZaglavie >
		</div>
		
		<div class='regtext'>
		<label  for=''>Категория: </label>
		<select  name='kategoriq' id='kategoriq' value=$categoriq>";


            $pstmt = $db->prepare("SELECT cat_id, cat_name FROM categories;");


            if ($pstmt->execute()) {
                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                    $categories = $row['cat_name'];

                    //                        echo "".$row['cat_id'];

                    echo "<option value='$row[cat_id]'>$categories</option>";

                }
            }

            echo "</select>
		            </div>
		
		            <div class='regtext'>
		                <label for=''>Описание: </label>
		                <textarea name='opisanie' id='' cols='44' rows='6' >$opisanieOb</textarea>
		            </div>
		
		            <div class='regtext'>
		                <label for='img'>Снимки: </label>
		                <input name='image1' id='img' type='file'  accept='image/*' value=$snimka />
						<input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
		            </div>
		
		            <div class='regtext'>
		                <label >Местоположение: </label>
		
			                    <select name='mestopol'   id='mestopol' value=$obLokacia>";

            $pstmt = $db->prepare("SELECT location_id, location_name FROM locations ORDER BY location_id;");
            if ($pstmt->execute()) {
                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                    $locationSiti = $row['location_name'];


                    echo "<option value='$row[location_id]'> $locationSiti</option>";
                }
            }

            echo " </select>
		
		            </div>
		            <div class='regtext'>
		
		                <label for=''>Цена: </label>
		                <input  type='text' name='price' value=$obCena>
		            </div>
		
		            <div class='regtext'>
		                <label for=''>Телефон: </label>
		                <input  type='text'  name='phone' value=$phone>
		            </div>
		            <div>
		                <input type='submit' id='upload' name='updateOb' value='Редактирай' >
		                <input type='hidden' name='obforupdate' value=$obIdForUpdate>
		            </div>
		            <div>
		                <p>  $emtyOb </p>
		            </div>
		            <div>  $wrongPic </div>
		        </form>
			  </div>
			</di> ";

        


        }
    } catch (PDOException $e) {
            echo $e->getMessage();

        }

}
echo "</div>";
	
require_once 'footer.php';