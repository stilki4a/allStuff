<?php include "./header.php"; ?>

<?php

if (isset($_GET['page'])){
    $file = "./".$_GET['page'].".php";
    if (file_exists($file)){
        include $file;
    }else{
        include "./notfound.php";
    }
}else{
    include "./homepage.php";
}

?>

<?php include "./footer.php"; ?>