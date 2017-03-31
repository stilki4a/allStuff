<?php
//if(isset($_GET['logout'])){
	
//session_start();
session_destroy();
header('Location:homepage.php',true,302);
//}
?>