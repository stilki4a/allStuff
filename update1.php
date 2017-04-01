<?php


include_once ('header.php');
//require_once 'nav.php';
$userId=$_SESSION['userid'];
$username=$_SESSION['username'];

$emtyOb="";
$wrongPic="";

//echo $obIdForDell;
try {

if (isset($_POST['updateOb'])) {

	if (isset($_FILES['image1'])) {
		$fileOnServerName = $_FILES['image1']['tmp_name'];
		$fileOriginalName = $_FILES['image1']['name'];



		$username = $_SESSION['username'];

		 $nameOb = $_POST['zaglavie'];

		$kateg = $_POST['kategoriq'] + 0;
		$opisanie = $_POST['opisanie'];

		$mestopo = $_POST['mestopol'] + 0;
		$price = $_POST['price'];
		$phone = $_POST['phone'];
		$obIdForUpdate=$_POST['obforupdate'];


		if ((empty($nameOb)) && (empty($opisanie)) && (empty($price)) && (empty($phone)) && ($fileOriginalName == '')) {
			$emtyOb = "Опитвате се да качите празна обява";
		} else {


			if (is_uploaded_file($fileOnServerName)) {
				if (move_uploaded_file($fileOnServerName,
						"./dir/$username/$fileOriginalName")) {
						//echo "Bravo, ti uspq! ";
				} else {
					$wrongPic = "Грешка при качване на снимката";
				}

			} else {
				//echo "e tuka se chupq!";
			}


			$picPath = "./dir/$username/$fileOriginalName";

			$db->exec("SET NAMES utf8;");
			$db->exec("SET character_set_results=utf8;");

			$pstmt = $db->prepare("UPDATE obqva SET obqva_name=?,obqva_opisanie=?,fk_location_id=?,
                                  fk_cat_id=?, phone=?,price=?,picture_name=?
						 			WHERE obqva_id=?");

			if ($pstmt->execute(array($nameOb, $opisanie, $mestopo, $kateg, $phone, $price,$picPath, $obIdForUpdate))) {
			}

		}
	}
}

} catch (PDOException $e) {
	echo $e->getMessage();
}
header('Location:myprofile.php',true,302);
