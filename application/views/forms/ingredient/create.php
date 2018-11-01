<div class="container">
	<form action="/ingredient/create" method="post">
		<div class="form-group">
			<label for="ingredient" class="label">Ингредиент</label>
			<input type="text" class="form-control" id="ingredient" placeholder="Название ингредиента"
			       name="ingredient" autocomplete="off">
		</div>
		<div class="btn-group special">
			<input type="submit" class="btn btn-success" value="Добавить" name="addIngredient"/>
			<a type="button" class="btn btn-secondary" href='/ingredient'>Назад</a>
		</div>
	</form>
</div>
