<div class="container">
	<form action="/dish_ingredients/create" method="post">
		<div class="form-group">
		    <label class="label font-weight-bold mt-2" for="selectIdDish">Блюдо</label>
            <select class="form-control" id="selectIdDish" name="id_dish">
                <?php foreach ($vars['dishes'] as $key => $value): ?>
                    <?php foreach ($value as $k => $v): ?>
                        <?php if ($k == 'id'): ?>
                            <option value=<?=$value[$k];?>>
                                <?php echo $value['name']; ?>
                            </option>
                        <?php break; endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
			<label class="label font-weight-bold mt-2" for="selectIdIngredient">Ингредиент</label>
            <select class="form-control" id="selectIdIngredient" name="id_ingredient">
                <?php foreach ($vars['ingredients'] as $key => $value): ?>
                    <?php foreach ($value as $k => $v): ?>
                        <?php if ($k == 'id'): ?>
                            <option value=<?=$value[$k];?>>
                                <?php echo $value['name']; ?>
                            </option>
                        <?php break; endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
			<label class="label font-weight-bold mt-2" for="inputWeight">Масса</label>
			<input type="text" class="form-control" id="inputWeight" placeholder="Масса ингредиента"
			       name="weight" autocomplete="off">
		</div>
		<div class="btn-group">
			<input type="submit" class="btn btn-success" name="addDish_ingredients" value="Добавить"/>
			<a type="button" class="btn btn-secondary" href="/dish_ingredients">Назад</a>
		</div>
	</form>
</div>