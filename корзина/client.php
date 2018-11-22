<?php
require("../config.php");

if(isset($_POST['create_new_client'])){
	
	mysqli_query($connection, "INSERT INTO `clients` (`surname`, `name`, `patronymic`, `date_birth`, `gender`, `date_creation`, `date_update`, `phone`, `second_phone`, `third_phone`) VALUES ('', '', '', '', '', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '', '', '')");
	
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Клиент</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
<?php require_once "../blocks/header.php" ?>

<div class="left_block">
	<div class="clients_list">
		<h2>Список клиентов.</h2>
		<div class="list">
			
			<table class="striped" border="1">
				<tr class="header">
					<td>Id</td>
					<td>Name</td>
					<td>Birth</td>
					<td>Gender</td>
					<td>Phone</td>
					<td>Second Phone</td>
					<td>Third Phone</td>
					<td>date_creation</td>
					<td>date_update</td>
				</tr>
			<?php
				$clients = mysqli_query($connection, "SELECT * FROM `clients` ORDER BY `id` LIMIT 20");
				while ($client = mysqli_fetch_assoc($clients)) {
						if( isset($_GET['id'])){
							if($_GET['id'] == $client['id']){
								$client_array = array();
								$client_array = $client;
							}
						}		
			?>
					<tr>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['id'] ?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['surname'] , mb_substr($client['name'], 0, 1, 'utf-8'), mb_substr($client['patronymic'], 0, 1, 'utf-8')?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['date_birth'] ?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['gender'] ?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['phone'] ?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['second_phone'] ?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['third_phone'] ?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['date_creation'] ?></a></td>
					<td><a href="client.php?id=<?php echo $client['id'] ?>"><?php echo $client['date_update'] ?></a></td>
					</tr>
			<?php
				}

			?>
			</table>
		</div>
		
		<form method="POST" action="/корзина/client.php">
			<input type="submit" name="create_new_client" value="Создать карту нового клиента">
		</form>
	</div>
	
	<div class="search_klients">
		<h2>Поиск клиентов</h2>
		<div class="search_phone">
			<h3>По телефону</h3>
			<input type="text" name="serch_phone" placeholder="№ телефона">
		</div>

		<input type="submit" name="" value="Поиск" class="button">

		<div class="search_surname">
			<h3>По фамилии</h3>
			<input type="text" name="serch_surname" placeholder="Фамилия">
		</div>
	</div>
</div>

<?php
	if(isset($_GET['id']) || isset($_POST['create_new_client'])){
		
		require_once "../blocks/update_client.php" ;
	}
?>



<!---->


<?php require_once "../blocks/footer.php" ?>

</body>
</html>
