<div class="container">
	<a class="btn btn-success" href='/ingredient/create'">Добавить</a>
	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
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
					<a class="btn btn-primary" href="/ingredient/update/<?= $value['id'] ?>">Изменить</a>
					<a class="btn btn-danger" href="/ingredient/delete/<?= $value['id'] ?>">Удалить</a>
				</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>