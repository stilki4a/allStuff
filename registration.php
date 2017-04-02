<?php
//session_start();
if(isset($_SESSION['userid'])){
	header('Location:myprofile.php', true, 302);
	
}else{

	$wrong="";
	$wellcome="";
	$diffPass = "";
	$prazniPoleta = '';
	
	
	try {
	    $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	    //------------------------Login-----------------------------------------
	    if (isset($_POST['login'])) {
	
	        $username = htmlentities(trim(sha1($_POST['username'])));
	        $pass = htmlentities(trim(sha1($_POST['pass'])));
	
	
	        $pstmt = $db->prepare("SELECT user_id,user_name,user_pass FROM users");
	
	        if ($pstmt->execute()) {
	            $userPasWrong = true;
	            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
	                if (sha1($username) === $row['user_name'] && sha1($pass) === $row['user_pass']){
	                    $userPasWrong = false;
	                   // session_start();
	                    $_SESSION['Hallousername'] = "Здравей" . " " . $username. "!";
	                    $_SESSION['username'] = $username;
	                    $_SESSION['userid'] = $row['user_id'];
	                     header('Location:?page=homepage', true, 302);
	                    break;
	                }
	                if($userPasWrong){
	                    $wrong = "Грешен потребител или  парола!";
	                }
	            }
	        }
	    }
	
	
	
	
	
	
	//        Registration
	
	    if (isset($_POST['submit'])) {
	    	
	        $email = htmlentities(trim(sha1($_POST['mail'])));
	        $username = htmlentities(trim($_POST['username']));
	        $pass = htmlentities(trim(sha1($_POST['pass'])));
	        $repPass = htmlentities(trim(sha1($_POST['Repeat'])));

	        if (strlen($email) === 0 ||strlen($username) < 6 || strlen($pass) < 6 || strlen($repPass) < 6 ){
	            $prazniPoleta = "Парола и име трябва да бъдат по поне 6 символа";
	        }else {
	            if (sha1($pass) !== sha1($repPass)) {
	                $diffPass = "Различни пароли";
	            } else {
	
	                $pstmt = $db->prepare("SELECT user_name,user_email FROM users");
	
	                if ($pstmt->execute()) {
	                    $existingEmail = false;
	                    while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
	                        if ($email === $row['user_email'] || $username === $row ['user_name']) {
	                            $existingEmail = true;
	                            $sameEmail = "Име или емайл е зает";
	                            break;
	
	                        }
	                    }
	                }
	                if (!$existingEmail) {
	
	                    $pstmt = $db->prepare("INSERT INTO users (user_id,user_name,user_email,user_pass,user_rep_pass)
	                                            VALUES (null,'$username','$email','$pass','$repPass')");
	                    if ($pstmt->execute()) {
	
	                       // session_start();
	                        $_SESSION['Hallousername'] = "Здравей" . " " . $username . "!";
	                        $_SESSION['username'] = $username;
	                        $_SESSION['userid'] = $row['user_id'];
	                        mkdir("./dir/$username");
	                        header('Location:?page=homepage', true, 302);
	                    }
	
	                }
	
	
	            }
	
	        }
	        
	    }else{
	        $email = '';
	        $username = '';
	        $pass = '';
	        $repPass = '';
	        $loginMail = '';
	
	    }
	}
	catch (PDOException $e) {
	    echo $e->getMessage();
	}

}
?>

<div id="wrrap">
<div id="reglog">

    <div id="login">
        <h2>Вход </h2>
        <form action="?page=registration" method="post">

            <div class="regtext">
                <label for="username"> Потребителско име:</label>
                <input id="username" type="text" name="username" size="15" >

            </div>

            <div class="regtext">
                <label for="pass"> Парола:</label>
                <input id="pass" type="password" name="pass" size="15" required="required">
            </div>


            <div>
                <input type="submit" name="login" value=" Вход"/>

            </div>
            <div id="wrong">
                <?=$wrong;?>
            </div>

        </form>
    </div>




    <div id="regist" >
        <h2>Регистрация </h2>
        <form action="?page=registration" method="post">


            <div class="regtext">
                <label for="mail">Email:</label>
                <input id="mail" type="email" name="mail"  value="<?= $email; ?>" size="15" maxlength="35"/>

            </div>

            <div class="regtext">
                <label for="username"> Потребителско име:</label>
                <input id="username" type="text" name="username" size="15" >
            </div>

            <div class="regtext">
                <label for="pass"> Парола:</label>
                <input id="pass" type="password" name="pass" size="15" required="required">

            </div>

            <div class="regtext">
                <label for="reapeat pass">Повтори паролата: </label>
                <input id="repeat pass" type="password" name="Repeat" size="15" required="required">

            </div>

            <div id="submit">
                <input type="submit" name="submit" value="Запиши"/>
            </div>
              <div id="exist">
              
            </div>

        </form>
        <p><?= $prazniPoleta; ?></p>
        <p><?= $diffPass; ?></p>

    </div>
</div>
</div>

