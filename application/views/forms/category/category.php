<div class="container">
	<div class="row">
		<form action="" method="post" class="col-lg-12">
			<div class="form-group">
				<label class="label" for="inputCategory">Категория</label>
				<input type="text" class="form-control" id="inputCategory" placeholder="Категория"
					   name="category">
			</div>
			<div class="btn-group">
				<input type="submit" class="btn btn-success btn-md col-lg-12" value="Добавить" name="addCategory"/>
			</div>
		</form>
		<table class="table-dark table-striped col-lg-12">
			<tbody>
            <?php foreach ($vars as $key => $value): ?>
				<tr>
		        <?php foreach ($value as $k => $v): ?>
					<td><?php echo $v ?></td>
		        <?php endforeach; ?>
				</tr>
            <?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>