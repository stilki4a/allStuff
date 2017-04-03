<?php

include_once 'header.php';



if (isset($_GET['name'])) {
    $id = $_GET['name'];

    $obZaglavie="";
    $obCena = "";
    $obLokacia = "";


    try {
        $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                $pstmt = $db->prepare("select o.obqva_name,o.obqva_opisanie,o.picture_name,o.price,o.phone,l.location_name,u.user_email,u.user_name,user_id, c.cat_name
                                                  FROM obqva o join locations l 
                                                  ON o.fk_location_id = l.location_id
                                                  join users u 
                                                  ON u.user_id = o.fk_user_id
                                                  JOIN categories c ON o.fk_cat_id = c.cat_id
                                                    WHERE obqva_id ='$id'");
                    if ($pstmt->execute()) {

            
            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
//                            var_dump($row);


                $obZaglavie = $row['obqva_name'];
                $obCena = $row['price'];
                $obLokacia = $row['location_name'];
                $categoriq = $row['cat_name'];
                $opisanieOb = $row['obqva_opisanie'];
                $snimka = $row['picture_name'];
                $email = $row['user_email'];
                $phone = $row['phone'];
                $userName = $row['user_name'];


            }
?>

    
<div id="wrrbig">
   
        
        <div id="rows">
            <div class="obname">
             <input type="button" value="НАЗАД" ONCLICK="history.back(-1)" class='back'>
              
           	   <h1>  Разглеждате обява:<?= $obZaglavie ?></h1>
            </div>
           
            <div class="bigpic"> <img src='<?= $snimka ?>' alt=""
                                      onmouseover="bigImg(this)" onmouseout="normalImg(this)"></div>
            <div class="obsto">
	             <div class="picright">Категория:<?= $categoriq ?> </div>
	            <div class="picright">Град:<?= $obLokacia ?></div>
	            <div class="picright">Цена:<?= $obCena ?> </div>
	          
	            <div class= "picright">Обявата е качена от: <?= $userName ?></div>
	            <div class= "picright">Обадете се: <?= $phone ?></div>
	             <div class="picright" id="text"> Описание: <?= $opisanieOb ?> </div>
       		</div>
       		
       		<div id="email"><h2>Изпратете съобщение</h2>
       			
       		        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">

						
					<div class="mess" >
		                <label for="from" class="label"> От: </label>
		                <input type="text" name="from" id="from" value="">
		              </div >
		              
		              <div class="mess">
		                <label for="to" class="label"> До: </label>
		                <input type="text" name="to" id="to" value="<?=$email?>" >
		              </div>
		              
		              <div class="mess">
		                <label for="subject" id="sub"> Тема: </label>
		                <input type="text" name="sub" id="subject">
		              </div>
		              
		              
		                 <div class="mess">
		                    <textarea placeholder="СЪОБЩЕНИЕ" name="message" cols="30" rols="7"></textarea>
		                 </div>   
		                    <div id="send">
		                		<input type="submit" id="upload" name="submit" value="ИЗПРАТИ" >
		                	</div>
					
               
           		 </form>
             </div>
             
       		</div>
    </div>


    <?php


        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    if (isset($_POST['submit'])){
    	$to=($_POST['to']);
    	$headers="FROM:".($_POST['from'])."\r\n)";
    	$subject=($_POST['sub']);
    	$txt=($_POST['message']);
    	mail($to,$subject,$txt,$headers);
    }

}

?>
<script src="./assets/js/forimg.js"></script>

</div>
<?php 
require_once 'footer.php';
?>






