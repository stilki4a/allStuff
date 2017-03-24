<?php
$wrong="";
$wellcome="";
$diffPass = "";


define('DB_HOST', 'localhost');
define('DB_NAME', 'all_stuff');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Login
    if (isset($_POST['login'])) {

        $username = htmlentities(trim($_POST['username']));
        $pass = htmlentities(trim($_POST['pass']));


        $pstmt = $db->prepare("SELECT user_name,user_pass FROM users");

        if ($pstmt->execute()) {
            $userPasWrong = true;
            while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                if ($username === $row['user_name'] && $pass === $row['user_pass']){
                    $userPasWrong = false;
                    session_start();
                    $_SESSION['Hallousername'] = "Здравей" . " " . $username. "!";
                    $_SESSION['username'] = $username;
                     header('Location:?page=homepage', true, 302);
                    break;
                }
                if($userPasWrong = true){
                    $wrong = "Грешен потребител или  парола!";
                }
            }
        }
    }






//        Registration

    if (isset($_POST['submit'])) {
    	
        $email = htmlentities(trim($_POST['mail']));
        $username = htmlentities(trim($_POST['username']));
        $pass = htmlentities(trim($_POST['pass']));
        $repPass = htmlentities(trim($_POST['Repeat']));

        if ($pass !== $repPass) {
            $diffPass ="Различни пароли";
        } else {

            $pstmt = $db->prepare("SELECT user_name,user_email FROM users");

            if ($pstmt->execute()) {

                while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
                    if ($email === $row['user_email'] || $username === $row ['user_name']) {
                        echo "Име или емайл е зает";
                        break;
                    } else {


                        $pstmt = $db->prepare("INSERT INTO users (user_id,user_name,user_email,user_pass,user_rep_pass)
                                            VALUES (null,'$username','$email','$pass','$repPass');");

                        if ($pstmt->execute()) {

                            session_start();
                            $_SESSION['Hallousername'] = "Здравей" . " " . $username . "!";
                            $_SESSION['username'] = $username;
                            mkdir("./dir/$username");
                            header('Location:?page=homepage', true, 302);
                        }
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


?>

<div id="wrrap">
<div id="reglog">

    <div id="login">
        <h2>Вход </h2>
        <form action="?page=registration" method="post">

            <div class="regtext">
                <label for="username"> Username:</label>
                <input id="username" type="text" name="username" size="15" >

            </div>

            <div class="regtext">
                <label for="pass"> Password:</label>
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
                <label for="username"> Username:</label>
                <input id="username" type="text" name="username" size="15" >
            </div>

            <div class="regtext">
                <label for="pass"> Password:</label>
                <input id="pass" type="password" name="pass" size="15" required="required">

            </div>

            <div class="regtext">
                <label for="reapeat pass">Repeat Password: </label>
                <input id="repeat pass" type="password" name="Repeat" size="15" required="required">

            </div>

            <div id="submit">
                <input type="submit" name="submit" value="Запиши"/>
            </div>
              <div id="exist">
              
            </div>

        </form>
        <p><?= $diffPass; ?></p>

    </div>
</div>
</div>

