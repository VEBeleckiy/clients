<?php
$fArg = $_POST['fArg'];
$operation = $_POST['operation'];
$sArg = $_POST['sArg'];

function clean($value = "") {
    $value = trim($value);/* для удаления пробелов из начала и конца строки.  */
    $value = stripslashes($value);/*для удаления экранированных символов*/
    $value = strip_tags($value);/* для удаления HTML и PHP тегов */
    $value = htmlspecialchars($value);/* преобразует специальные символы в HTML-сущности ('&' преобразуется в '&amp;' и т.д.) */
    
    return $value;
}
function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}

if(!empty($fArg) && !empty($operation) && !empty($sArg)) {

    if(check_length($fArg, 1, 25) && check_length($operation, 1, 1) && check_length($sArg, 1, 25)) {
        echo "Ответ<br/>";
		switch($operation){
			case '+':
				$resul = $fArg + $sArg;
				break;
			case '-':
				$resul = $fArg - $sArg;
				break;
			default:
				echo "Операция не поддерживается";
				break;
		}
		echo($fArg. ''.  $operation. ''.  $sArg. '='. ''.$resul);
    } else { // добавили сообщение
        echo "Введенные данные некорректные";
    }
} else { // добавили сообщение
    echo "Заполните пустые поля";
}

echo "<br/>".$name."<br />".$surname."<br />".$email."<br />".$message."<br />";