<?php include './header.php'?>


<?php
 $arr= array("Област Благоевград","Област Бургас","Област Варна","Област Велико Търново","Област Видин","Област Враца",
     "Област Габрово","Област Добрич","Област Кърджали","Област Кюстендил","Област Ловеч","Област Монтана","Област Пазарджик","Област Перник",
      "Област Плевен","Област Пловдив","Област Разград","Област Русе","Област Силистра","Област Сливен","Област Смолян",
     "Област Софийска","Област София","Област Стара Загора","Област Търговище","Област Хасково","Област Шумен","Област Ямбол");

?>
     <div id="wrr">
            <h2>Добави обява</h2>
       
        <form action="" method="post">
        	<link rel="stylesheet" href="./assets/css/stylereglog.css" type="text/css" />
            
                <div class="regtext">
                    <label for="">Заглавие: </label>
                    <input name="zaglavie" type="text" value="" size="23">
                 </div>
                 
                 <div class="regtext">
                	<label  for="">Категория: </label>
                     <select  name="" id="">
                         
                         <option value="">Автомобили</option>
                         <option value="">Машини и инструменти</option>
                         <option value="">Електроника</option>
                         <option value="">Животни</option>
                         <option value="">Дом и градина</option>
                         <option value="">Недвижими имоти</option>
                         <option value="">Мода</option>
                         <option value="">За бебето и детето</option>
                         <option value="">Спорт, хоби, книги</option>
                     </select>
                   </div>
                   
                   <div class="regtext">
               		<label for="">Описание: </label>
                    <textarea name="opisanie" id="" cols="44" rows="6" value=""></textarea> 
                   </div>
                   
                   <div class="regtext">
	                	<label for="img">Снимки: </label>
	                   	<input id="img" type="text" size="23">
                   	</div>
                	
                	<div class="regtext">
	                    <label >Местоположение: </label>
	                    
	                        <select >
	                            <option value="$i">-Изберете Град-</option>
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
	                   	<input size="23" type="text">
                   	</div>
                   	
                	<div class="regtext">
	                    <label for="">Телефон: </label>
	                    <input  type="text" size="23">
	                 </div>
                    <div>
                        <input type="submit" name="sumbmitUpload" value="Upload">
                    </div>
	              
        	</form>
       </div>


<?php include './footer.php'?>