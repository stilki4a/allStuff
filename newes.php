<?php
 $arr= array("Област Благоевград","Област Бургас","Област Варна","Област Велико Търново","Област Видин","Област Враца",
     "Област Габрово","Област Добрич","Област Кърджали","Област Кюстендил","Област Ловеч","Област Монтана","Област Пазарджик","Област Перник",
      "Област Плевен","Област Пловдив","Област Разград","Област Русе","Област Силистра","Област Сливен","Област Смолян",
     "Област Софийска","Област София","Област Стара Загора","Област Търговище","Област Хасково","Област Шумен","Област Ямбол");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>new</title>
</head>
<body>
        <div>
            <h3>Добави обява</h3>
        </div>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="">Заглавие: </label></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td><label for="">Рубрика: </label></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td><label for="">Текст: </label></td>
                    <td><textarea name="" id="" cols="30" rows="10"></textarea> </td>
                </tr>
                <tr>
                    <td><label for="">Снимки: </label></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td>Местоположение: </td>
                    <td>
                        <select>
                            <option value="$i">----Изберете Град---</option>
                            <?php
                            for ($i = 0; $i <count($arr); $i++){
                            ?>
                            <?php
                          echo '<option value="$i">'.$arr[$i].'</option>';

                            }
                            ?>

                        </select>
                        <!--<input type="radio" name=""> Частно лице-->
                        <!--<input type="radio" name="">Търговец-->
                    </td>
                </tr>
                <tr>
                    <td><label for="">Вашето име: </label></td>
                    <td><input type="text"></td>
                </tr>
                <tr>
                    <td><label for="">Телефон: </label></td>
                    <td><input type="text"></td>
                </tr>
            </table>
            <input type="submit" value="Upload">
        </form>
</body>
</html>