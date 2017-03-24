<?php
//if(isset($_GET['logout'])){
	
//session_start();
session_destroy();
header('Location:?page=homepage',true,302);
//}
?>