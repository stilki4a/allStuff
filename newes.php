
 <?php

// session_start();
 if(!(isset($_SESSION['username']))){
 	header('Location:?page=registration',true, 302);
 }else{
	 if (isset($_POST['submitUpload'])){

	 	
	 	//$username=$_SESSION['username'];
	 	if(!(isset($_COOKIE["count"]))){
	 		$count=1;
	 		setcookie("count",$count, time()+10*365*24*60*60);
	 		
	 	}
	 	if((isset($_COOKIE["count"]))){
	 		
	 		$count=$_COOKIE["count"];
	 		$count+=1;
	 		setcookie("count",$count, time()+10*365*24*60*60);
	 	}
	 	
	 	
	 	$usernamefolder=$_SESSION['username'];

	 	$nameOb=$_POST['zaglavie'];
	 	$kateg=$_POST['kategoriq'];
	 	$opisanie=$_POST['opisanie'];

	 	$mestopol=$_POST['mestopol'];
	 	$contactName=$_POST['contactName'];
	 	$phone=$_POST['phone'];
	 	
	 

	  	 $all =$nameOb.PHP_EOL.$kateg.PHP_EOL.
	  			$opisanie.PHP_EOL.$mestopol.PHP_EOL.$contactName.PHP_EOL.$phone;


	  			mkdir("./dir/$usernamefolder/obqva.$count");



	  	$handle=fopen("./dir/$usernamefolder/obqva.$count/$nameOb.txt",'a+');

	  		fwrite($handle, $all);
	 	fclose($handle);


	 	if (isset($_FILES['image1'])) {
	 		$fileOnServerName = $_FILES['image1']['tmp_name'];
	 		$fileOriginalName = $_FILES['image1']['name'];

	 		if (is_uploaded_file($fileOnServerName)) {
	 			if (move_uploaded_file($fileOnServerName,
	 					"./dir/$usernamefolder/obqva.$count/$fileOriginalName")) {
	 					echo "Bravo, ti uspq! ";
	 			} else {
	 			 echo "Tuka si grozen! Smeni!";
	 			}
	 		}
	 		else {
	 			echo "Tuka si grozen! Smeni!";
	 		}
	 	}
	 	
// 	 	$obqvaArr=file("./dir/$usernamefolder/obqva.$count/$nameOb.txt");
	 	
// 	 	$obqvaString=implode('',$obqvaArr);
// 	 	echo $obqvaString;

     }
	 	
}
 

 ?>

 <div id="obqvaout">
 <div id="wrr">
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

                    <option value="avtomobili">Автомобили</option>
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
                <input name="image1" id="img1" type="file"  accept="image/*" />
				<input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
				 <input name="image2" id="img2" type="file"  accept="image/*" />
				<input type='hidden' name='MAX_FILE_SIZE' value='8000000' />
				 <input name="image3" id="img3" type="file"  accept="image/*" />
				<input type='hidden' name='MAX_FILE_SIZE' value='8000000' />

            </div>

            <div class="regtext">
                <label >Местоположение: </label>

                    <?php

	                    echo "<select name='mestopol'   id='mestopol' >";
	                    echo "<option >"."-Изберете Град-"."</option>";
	                    for($in=0; $in<count($arr); $in++){
	                    	echo "<option value=$arr[$in]>".$arr[$in]."</option>";
	                    }
	                    echo "</select>";


                        ?>


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
                <input type="submit" id="upload" name="submitUpload" value="Запиши" >
            </div>

        </form>
     
    </div>
 </div>
 </div>