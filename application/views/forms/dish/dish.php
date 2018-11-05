<div class="container">
	<a class="btn btn-success m-1" href='/dish/create'">Добавить</a>

	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Price</th>
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
					<a class="btn btn-link" href="/dish/update/<?= $value['id'] ?>">Изменить</a>
					<a class="btn btn-danger" href="/dish/delete/<?= $value['id'] ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>