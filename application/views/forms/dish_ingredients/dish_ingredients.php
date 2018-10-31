<div class="container">
	<a class="btn btn-success" href='/dish_ingredients/create'">Добавить</a>
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
					<a class="btn btn-primary" href="/dish_ingredients/update/<?= $value['id'] ?>">Изменить</a>
					<a class="btn btn-danger" href="/dish_ingredients/delete/<?= $value['id'] ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>