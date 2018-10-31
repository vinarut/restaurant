<div class="container">
	<a class="btn btn-success" href='/dish/create'">Добавить</a>

	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Price</th>
			<th>Photo</th>
			<th>Id category</th>
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
					<a class="btn btn-primary" href="/dish/update/<?= $value['id'] ?>">Изменить</a>
					<a class="btn btn-danger" href="/dish/delete/<?= $value['id'] ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>