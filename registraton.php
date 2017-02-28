
<?php include './header.php'?>

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
			fclose($handle);
			$wellcome="Здравей"." ".$username;
			header('Location:allstuff.html',true,302);

		}
	}
	if($userPasWrong){
		$wrong= "wrong user or pass";
			
	}
	

	fclose($handle);

}

if (isset($_POST['submit'])){
	
	$email=$_POST['mail'];
	
	$username=htmlentities($_POST['username']);
	$pass=($_POST['pass']);
	$existingUser=false;
	
	$handle= fopen('pit.txt','a+');
	
	while(!feof($handle)){
		$row=fgets($handle);
		$date=explode("-",$row);
		if($date[0] == $username){
			echo "This username already exist. Thray with anader one, please!";
			$existingUser=true;
			break;
		}
	}
	if($existingUser==false){
		if($_POST['pass']===$_POST['Repeat']){
			$newUser = PHP_EOL . $username . "-" . $pass . "-";
			echo "Welcome";
			fwrite($handle, $newUser);
			$wellcome="Здравей"." ".$username;
			header('Location:allstuff.html',true,302);
		}else{
			echo "Pass and Repeat pass isn't equel";
		}
	}
	
	fclose($handle);
}else {
	
	$email="";
	$username=" ";
	$pass=" ";
}



?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="./assets/css/stylereglog.css" type="text/css" />
		
		<title>registration</title>
	</head>
	
<body>
	<div id="wrrap">
	<div id="reglog">
	
		<div id="login">
			<h2>Вход </h2>
			<form action="./registraton.php" method="post">
	
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
				<div id="wrong>
				<?=$wrong;?>
				</div>
		
			</form>
		</div>
	
	
	
		
		<div id="regist" >
	 		<h2>Регистрация </h2>
	 		<form action="./registraton.php" method="post">
	 			
	 		
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
<?php include './footer.php'?>
