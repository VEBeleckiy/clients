<?php
require("config.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Клиент</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php require_once "blocks/header.php" ?>

<div class="block">

    <div class="hat">
        <h2>Список клиентов.</h2>
        <form method="POST" action="/index.php" class="button">
            <input type="text" value="<?php echo $_POST['search_by_surname'] ?>" name="search_by_surname" placeholder="Поиск по фамилии" class="button_search" list="search_by_surname_list">
            <datalist id="search_by_surname_list">
                <?php
                foreach($clients_surname as $i) {
                    ?>
                    <option><?php echo($i); ?> </option>
                    <?php
                }
                ?>
            </datalist>
            <input type="submit" value="Найти" class="button_search">
            <input type="text" value="<?php echo $_POST['search_by_phone'] ?>" name="search_by_phone" placeholder="89*********" class="button_search" list="search_by_phone_list">
            <datalist id="search_by_phone_list">
                <?php
                foreach($clients_phone as $i) {
                    ?>
                    <option><?php echo($i); ?> </option>
                    <?php
                }
                ?>
            </datalist>
            <input type="submit" name="create_new_client" value="Создать карту нового клиента" id="button_create">
        </form>

    </div>

	<div class="clients_list">
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

				</tr><a href=""></a>
			<?php
				foreach($clients_array as $client){
			?>
					<tr>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['id'] ?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['surname'] , mb_substr($client['name'], 0, 1, 'utf-8'), mb_substr($client['patronymic'], 0, 1, 'utf-8')?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['date_birth'] ?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['gender'] ?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['phone'] ?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['second_phone'] ?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['third_phone'] ?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['date_creation'] ?></a></td>
					<td><a href="index.php?id=<?php echo $client['id'] ?>"><?php echo $client['date_update'] ?></a></td>
					</tr>
			<?php
				}
			?>
			</table>
		</div>
	</div>
</div>

<div class="block">
<?php
	if(isset($_GET['id']) || isset($_POST['create_new_client'])){
		
		require_once "blocks/update_client.php" ;
	}
?>
</div>

<!-- -->


<?php require_once "blocks/footer.php" ?>

</body>
</html>
