<?php include './header.php'?>


<?php
 $arr= array("Област Благоевград","Област Бургас","Област Варна","Област Велико Търново","Област Видин","Област Враца",
     "Област Габрово","Област Добрич","Област Кърджали","Област Кюстендил","Област Ловеч","Област Монтана","Област Пазарджик","Област Перник",
      "Област Плевен","Област Пловдив","Област Разград","Област Русе","Област Силистра","Област Сливен","Област Смолян",
     "Област Софийска","Област София","Област Стара Загора","Област Търговище","Област Хасково","Област Шумен","Област Ямбол");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./assets/css/ressets.css" type="text/css" />
	<link rel="stylesheet" href="./assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="./assets/css/stylereglog.css" type="text/css" />
 

    <title>applay new</title>
</head>
<body>
     <div id="wrr">
            <h2>Добави обява</h2>
       
        <form action="" method="post">
            
                <div class="regtext">
                    <label for="">Заглавие: </label>
                    <input name="zaglavie" type="text" value="">
                 </div>
                 
                 <div class="regtext">
                	<label for="">Категория: </label>
                    <input name="kategoria" type="text" value="">
                   </div>
                   
                   <div class="regtext">
               		<label for="">Описание: </label></td>
                    <textarea name="opisanie" id="" cols="30" rows="10" value=""></textarea> 
                   </div>
                   
                   <div class="regtext">
	                	<label for="">Снимки: </label>
	                   	<input type="text">
                   	</div>
                	
                	<div class="regtext">
	                    <label>Местоположение: </label>
	                    
	                        <select>
	                            <option value="$i">----Изберете Град---</option>
	                            <?php
	                            	for ($i = 0; $i <count($arr); $i++){
	                            ?>
	                            <?php
	                          		echo '<option value="$i">'.$arr[$i].'</option>';
	
	                            }
	                            ?>
	
	                        </select>
                        </div>
                     <div class="regtext">
                    
	               		<label for="">Вашето име: </label>
	                   	<input type="text">
                   	</div>
                   	
                	<div class="regtext">
	                    <label for="">Телефон: </label>
	                    <input type="text">
	                 </div>
                    <div>
                        <input type="submit" name="sumbmitUpload" value="Upload">
                    </div>
	              
        	</form>
       </div>
</body>

<?php include './footer.php'?>