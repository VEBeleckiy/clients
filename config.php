<?php

$connection = mysqli_connect('localhost', 'root', '', 'mysqli_db');

if($connection == false){
	echo('Не удалось полключиться к базе данных! <br>');
	echo(mysqli_connect_error());
	exit();
}


if(isset($_POST['save']) || isset($_POST['remove'])){//блок изменения карты клиента
	
	$clients = mysqli_query($connection, "SELECT * FROM `clients` ORDER BY `id` DESC");
	while ($client = mysqli_fetch_assoc($clients)) {
		if( isset($_GET['id'])){
			if($_GET['id'] == $client['id']){
				$client_array = array();
				$client_array = $client;// для формы "Изменение карты клиента"
			}
		}
	}
	
	if(isset($_POST['save'])){//если нажали сохранить

	$id =(int)$client_array['id'];
	$surname = $_POST['surname'];
	$name =$_POST['name'];
	$patronymic =$_POST['patronymic'];
	$date_birth =$_POST['date_birth'];
	$gender =$_POST['gender'];
	$phone =$_POST['phone'];
	$second_phone =$_POST['second_phone'];
	$third_phone =$_POST['third_phone'];

	mysqli_query($connection, "UPDATE `clients` SET `surname` = '$surname',`name` = '$name', `patronymic` = '$patronymic', `date_birth` = '$date_birth', `gender` = '$gender', `phone` = '$phone', `second_phone` = '$second_phone', `third_phone` = '$third_phone', `date_update` = NOW() WHERE `clients`.`id` = $id");

	//echo("<meta http-equiv='refresh' content='0'>");//перезагрузка страницы 

}
	//удаление клиента
	if(isset($_POST['remove'])){
		$id =(int)$client_array['id'];
		mysqli_query($connection, "DELETE FROM `clients` WHERE `clients`.`id` = $id");
		$_GET['id'] = null;
		$_POST['create_new_client'] = null;
		//echo("<meta http-equiv='refresh' content='0;URL=/index.php'>");//перезагрузка страницы 
	}
}

//создание нового клиента
if(isset($_POST['create_new_client'])){
	
	mysqli_query($connection, "INSERT INTO `clients` (`surname`, `name`, `patronymic`, `date_birth`, `gender`, `date_creation`, `date_update`, `phone`, `second_phone`, `third_phone`) VALUES ('', '', '', '', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '', '', '')");
	
}

if(isset($_POST['search_by_surname']) || isset($_POST['search_by_phone'])){//проверяем на наличе запросов поиска по фамилии или телефону
	$search_by_surname = $_POST['search_by_surname'];
	$search_by_phone = $_POST['search_by_phone'];
	if($search_by_surname == ''){
		$clients = mysqli_query($connection, "SELECT * FROM `clients` WHERE `phone` = '$search_by_phone' ");
	}
	if($search_by_phone == ''){ 
		$clients = mysqli_query($connection, "SELECT * FROM `clients` WHERE `surname` = '$search_by_surname' ");
		 }

}else{
	$clients = mysqli_query($connection, "SELECT * FROM `clients` ORDER BY `id` DESC");
	}
	while ($client = mysqli_fetch_assoc($clients)) {
		$clients_array[] = $client;//массив для постраения таблицы
		$clients_surname[] = $client['surname'];//массив для search_by_surname
		$clients_phone[] = $client['phone'];//массив для search_by_phone
		if( isset($_GET['id'])){
			if($_GET['id'] == $client['id']){
				$client_array = array();
				$client_array = $client;// для формы "Изменение карты клиента"
			}
		}
	}
?>


