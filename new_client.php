<?php

require("config.php");
if(isset($_POST['create_new_client'])){
	
	mysqli_query($connection, "INSERT INTO `clients` (`surname`, `name`, `patronymic`, `date_birth`, `gender`, `date_creation`, `date_update`, `phone`, `second_phone`, `third_phone`) VALUES ('', '', '', '', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '', '', '')");
	echo("<meta http-equiv='refresh' content='0'; url://>");//перезагрузка страницы 
}

?>
<meta