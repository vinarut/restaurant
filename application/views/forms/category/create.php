<div class="container">
	<form action="/category/create" method="post">
		<div class="form-group">
<!--			<label for="idCategory" class="col-sm-2 col-form-label">Категория</label>-->
			<input type="text" class="form-control" id="idCategory" placeholder="Категория"
				   name="category" autocomplete="off">
		</div>
		<div class="btn-group">
			<input type="submit" class="btn btn-success" value="Добавить" name="addCategory"/>
			<a type="button" class="btn btn-secondary" href="/category">Назад</a>
		</div>
	</form>
</div>
