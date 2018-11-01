<div class="container">
	<form action="/dish_ingredients/create" method="post">
		<div class="form-group">
		    <label class="label" for="inputIdDish">Id блюда</label>
		    <input type="text" class="form-control" id="inputIdDish" placeholder="Id блюда"
				   name="id_dish" autocomplete="off">
			<label class="label" for="inputIdIngredient">Id ингредиента</label>
			<input type="text" class="form-control" id="inputIdIngredient" placeholder="Id ингредиента"
			       name="id_ingredient" autocomplete="off">
			<label class="label" for="inputWeight">Масса</label>
			<input type="text" class="form-control" id="inputWeight" placeholder="Масса ингредиента"
			       name="weight" autocomplete="off">
		</div>
		<div class="btn-group">
			<input type="submit" class="btn btn-success" name="addDish_ingredients" value="Добавить"/>
			<a type="button" class="btn btn-secondary" href="/dish_ingredients">Назад</a>
		</div>
	</form>
</div>