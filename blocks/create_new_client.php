<div class="right_block">
	<div id="chenge_client" class="client">
	
		<h2>Изменение карты клиента<br> №: <?php echo $client_array['id']; ?> </h2>
		<div class="checli">
			<form method="POST" action="/корзина/client.php?id=<?php echo $client_array['id'] ?>">
			<?php
				if(isset($_POST['save'])){
					
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

					echo '<span style = "color: green; font-weught: cold;">'. 'Карта клиента измененS.' . '<hr>' . '</span>';
					echo("<meta http-equiv='refresh' content='0'>");//перезагрузка страницы 
					
				}
				
			?>
				<table border="1" class="table">
					<tr>
						<td>Фамилия</td>
						<td><input type="text" name="surname" placeholder="Фамилия" value="<?php echo $client_array['surname'] ?>"></td>
					</tr>
					<tr>
						<td>Имя</td>
						<td><input type="text" name="name" placeholder="Имя" value="<?php echo $client_array['name'] ?>"></td>
					</tr>
					<tr>
						<td>Отчество</td>
						<td><input type="text" name="patronymic" placeholder="Фамилия" value="<?php echo $client_array['patronymic'] ?>"></td>
					</tr>
					<tr>
						<td>Дата рождения</td>
						<td><input type="text" name="date_birth" placeholder="Имя" value="<?php echo $client_array['date_birth'] ?>"></td>
					</tr>
					<tr>
						<td>Пол</td>
						<td><input type="text" name="gender" placeholder="Фамилия" value="<?php echo $client_array['gender'] ?>"></td>
					</tr>
					<tr>
						<td>Телефон</td>
						<td><input type="text" name="phone" placeholder="Имя" value="<?php echo $client_array['phone'] ?>"></td>
					</tr>
					<tr>
						<td>Второй телефон</td>
						<td><input type="text" name="second_phone" placeholder="Фамилия" value="<?php echo $client_array['second_phone'] ?>"></td>
					</tr>
					<tr>
						<td>Третий телефон</td>
						<td><input type="text" name="third_phone" placeholder="Имя" value="<?php echo $client_array['third_phone'] ?>"></td>
					</tr>
					<tr>
						<td>Дата создания</td>
						<td><input type="text" name="date_creation" placeholder="Фамилия" value="<?php echo $client_array['date_creation'] ?>"></td>
					</tr>
					<tr>
						<td>Дата последнего изменения</td>
						<td><input type="text" name="date_update" placeholder="Имя" value="<?php echo $client_array['date_update'] ?>"></td>
					</tr>
				</table>
				<input type="submit" name="save" value="Сохранить" style="height: inherit; width: inherit">
				<input type="submit" name="out" value="Выйти">
			</form>
		</div>
	</div>
</div>