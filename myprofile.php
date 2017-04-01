<?php
    include_once ('header.php');
    
    require_once 'nav.php';
    
        $usernamefolder = $_SESSION['username'];
        $username = $_SESSION['username'];

try {
        $db = new PDO ("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<div>
        <h1> Мои обяви</h1>

    <?php
    $pstmt = $db->prepare("Select o.obqva_id,o.obqva_name,o.price,l.location_name,o.picture_name,o.fk_user_id,u.user_name
                                             From obqva o
                                             JOIN locations l
                                             ON l.location_id = o.fk_location_id 
                                             JOIN users u
                                             ON u.user_id = o.fk_user_id
                                             WHERE user_name like '$username'
                                             ORDER BY obqva_id DESC");
    if ($pstmt->execute()) {

        echo "<div id='figuura'>";
        while ($row = $pstmt->fetch(PDO::FETCH_ASSOC)) {
        	
            echo "<div id='profile'>";
            echo "<div id='link'>";
            echo " <a href='./proba.php?name = $row[obqva_id]'>";
            echo "<img src = '$row[picture_name]'alt='snimkataa'>";
            echo "<h2>$row[obqva_name]</h2>";
            echo "</a></div>";
            
             $obID = $row['obqva_id'];
             
            echo "<form action='' method='post'>
					    <input type='submit' name='delete' value='Изтрий' id='deleteOb'>
					    <input type='hidden' name='ob_id' id='ob_id' value='$obID' >
                   </form>";
            
            echo "<form action='update.php' method='post'>
            		
           		 	<button name='update' class='update' id='update' value='$obID' >
           		 		Редактирай обявата
            
           			 </button>
           			 </form>";
            echo "</div>";
        }
    }

    if (isset($_POST['delete'])){
        $value = $_POST['ob_id'];
        echo $value."id na obqvata e ";
        $pstmt = $db->exec("DELETE FROM obqva WHERE obqva_id ='$value'");
//         da se proveri za neshto po dobro ne mi haresva
        echo "<meta http-equiv=\"refresh\" content=\"0\">";
    }
    
    
    
    ?>



</div>

 <?php

} catch (PDOException $e) {
    echo $e->getMessage();

}
 ?>
<div>
    <script src="assets/"></script>
</div>