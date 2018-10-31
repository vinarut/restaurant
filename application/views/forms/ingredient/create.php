<div class="container">
	<form action="/ingredient/create" method="post" class="col-lg-12">
		<div class="form-group">
			<!--			<label for="ingredient" class="col-sm-2 col-form-label">Ингредиент</label>-->
			<input type="text" class="form-control" id="ingredient" placeholder="Название ингредиента"
			       name="ingredient" autocomplete="off">
		</div>
		<div class="btn-group special">
			<input type="submit" class="btn btn-success" value="Добавить" name="addIngredient"/>
			<input type="button" class="btn btn-secondary" value="Назад"
			       onclick="location.href='/ingredient'"/>
		</div>
	</form>
</div>
