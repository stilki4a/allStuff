<?php
$wrong="";
$wellcome="";
if (isset($_POST['login'])){

    $username=htmlentities($_POST['username']);
    $pass=($_POST['pass']);


    $userPasWrong=true;

    $handle= fopen('pit.txt','r+');

    while(!feof($handle)){
        $row=fgets($handle);
        $date=explode("-",$row);
        if(($date[0] == $username) && ($date[1]==$pass)){
            $userPasWrong=false;
            session_start();
            $_SESSION['Hallousername']="Здравей"." ".$date[0]."!";
            fclose($handle);
            header('Location:?page=homepage',true,302);

            break;
        }


    }

    if($userPasWrong){
        $wrong = "Грешен потребител или  парола!";

    }


    fclose($handle);

}

if (isset($_POST['submit'])){

    $email=$_POST['mail'];

    $username=htmlentities($_POST['username']);
    $pass=($_POST['pass']);
    $loginMail=($_POST['mail']);

    $existingUser=false;

    $handle= fopen('pit.txt','a+');

    while(!feof($handle)){
        $row=fgets($handle);
        $date=explode("-",$row);
        if($date[0] == $username){
            echo "Съществува потребител с такова потребителско име!";
            $existingUser=true;
            break;
        }
    }
    if($existingUser==false){
        $wellcome="";
        if($_POST['pass']===$_POST['Repeat']){
            $newUser = PHP_EOL . $username . "-" . $pass . "-".$loginMail;
            
            fwrite($handle, $newUser);
            session_start();
            $_SESSION['Hallousername']="Здравей"." ".$username."!";

            mkdir('./dir/'.$username);

            header('Location:?page=homepage',true,302);
        }else{
            echo "Парола и Повтори парола не са еднакви!";
        }
    }

    fclose($handle);
}else {

    $email="";
    $username="";
    $pass="";
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

        </form>
    </div>
</div>
</div>

