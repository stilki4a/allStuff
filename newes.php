 
 <?php 
 if (isset($_POST['submitUpload'])){
 	
 	
 	$nameOb=$_POST['zaglavie'];
 	$kateg=$_POST['kategoriq'];
 	$opisanie=$_POST['opisanie'];
 	$image=null.PHP_EOL;
 	$mestopol=$_POST['mestopol'];
 	$contactName=$_POST['contactName'];
 	$phone=$_POST['phone'];
 
  	 $all =$nameOb.PHP_EOL.$kateg.PHP_EOL.
  			$opisanie.PHP_EOL.$image.PHP_EOL.$mestopol.PHP_EOL.$contactName.PHP_EOL.$phone;

  			
  			mkdir("./dir/neli/$nameOb");

  			
  			
  	$handle=fopen("./dir/neli/$nameOb/file.txt",'a+');

  		fwrite($handle, $all);
 	fclose($handle);
 	$nesto=file_get_contents('upload3.txt');
 	var_dump($nesto);
 	
 }
 ?>
 
 <div id="obqvaout">
 <div id="wrr">
        <h2>Добави обява</h2>

        <form action="./newes.php" method="post">
            <link rel="stylesheet" href="../AllStuff/assets/css/stylereglog.css" type="text/css" />

            <div class="regtext">
                <label for="">Заглавие: </label>
                <input name="zaglavie" type="text" value="" size="23">
            </div>

            <div class="regtext">
                <label  for="">Категория: </label>
                <select  name="kategoriq" id="kategoriq">

                    <option value="avtomovili">Автомобили</option>
                    <option value="">Машини и инструменти</option>
                    <option value="">Електроника</option>
                    <option value="jivotni">Животни</option>
                    <option value="">Дом и градина</option>
                    <option value="">Недвижими имоти</option>
                    <option value="moda">Мода</option>
                    <option value="">За бебето и детето</option>
                    <option value="">Спорт, хоби, книги</option>
                </select>
            </div>

            <div class="regtext">
                <label for="">Описание: </label>
                <textarea name="opisanie" id="" cols="44" rows="6" ></textarea>
            </div>

            <div class="regtext">
                <label for="img">Снимки: </label>
                <input id="img" type="text" size="23">
            </div>

            <div class="regtext">
                <label >Местоположение: </label>

                <select name="mestopol">
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
                <input size="23" type="text" name="contactName">
            </div>

            <div class="regtext">
                <label for="">Телефон: </label>
                <input  type="text" size="23" name="phone">
            </div>
            <div>
                <input type="submit" name="submitUpload" value="Upload">
            </div>

        </form>
    </div>
 </div>
 </div>
