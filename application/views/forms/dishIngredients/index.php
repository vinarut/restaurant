<div class="container">
	<a class="btn btn-success m-1" href='/dishIngredients/create'>Добавить</a>
	<table class="table">
		<thead>
		<tr>
			<th>#dish</th>
			<th>#ingredient</th>
			<th>Weight</th>
			<th class="text-center">Actions</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($vars as $key => $value): ?>
			<tr>
				<?php foreach ($value as $k => $v): ?>
					<td><?php echo $v ?></td>
				<?php endforeach; ?>
				<td class="w-25 text-center">
					<a class="btn btn-link" href="/dishIngredients/update/<?= $value['id_dish'].':'
					.$value['id_ingredient'] ?>">Изменить</a>
					<a class="btn btn-danger" href="/dishIngredients/delete/<?= $value['id_dish'].':'
					.$value['id_ingredient'] ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>