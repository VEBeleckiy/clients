<div id="chenge_client" class="client">
	
	<h2>Изменение карты клиента<br> №: <?php echo $client_array['id']; ?> </h2>
	<div class="checli">
		<form method="POST" action="/index.php?id=<?php echo $client_array['id'] ?>">

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
					<td><input type="Date" name="date_birth" placeholder="Имя" value="<?php echo $client_array['date_birth'] ?>"></td>
				</tr>
				<tr>
					<td>Пол</td>
					<td>
					<?php if($client_array['gender'] == "Мужчина"){
							?>
							<input type="radio" name="gender" value="Мужчина" id="man">
							<label for="man" style="text-decoration: underline">Мужчина</label><br>
							<input type="radio" name="gender" value="Женщина" id="woman">
							<label for="woman">Женщина</label><br>
							<?php
							}elseif($client_array['gender'] == "Женщина"){
							?>
							<input type="radio" name="gender" value="Мужчина" id="man">
							<label for="man">Мужчина</label><br>
							<input type="radio" name="gender" value="Женщина" id="woman">
							<label for="woman" style="text-decoration: underline">Женщина</label><br>
							<?php
							}else{
							?>
							<input type="radio" name="gender" value="Мужчина" id="man">
							<label for="man">Мужчина</label><br>
							<input type="radio" name="gender" value="Женщина" id="woman">
							<label for="woman">Женщина</label><br>
							<?php
							}
					?>
					</td>
				</tr>
				<tr>
					<td>Телефон</td>
					<td><input type="text" name="phone" placeholder="Имя" value="<?php echo $client_array['phone'] ?>"></td>
				</tr>
				<tr>
					<td>Второй телефон</td>
					<td><input type="text" name="second_phone" placeholder="89---------" value="<?php echo $client_array['second_phone'] ?>"></td>
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
			<input type="submit" name="save" value="Сохранить" >
			<a href="/index.php">Выйти</a>
			<input type="submit" name="remove" value="Удалить карту">
		</form>
	</div>
</div>
