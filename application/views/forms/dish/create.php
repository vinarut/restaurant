<div class="container">
	<form action="/dish/create" method="post">
		<div class="form-group">
			<label class="label font-weight-bold mt-2" for="inputDish">Блюдо</label>
			<input type="text" class="form-control" id="inputDish" placeholder="Блюдо" name="dish"
			       autocomplete="off">
			<label class="label font-weight-bold mt-2" for="inputPrice">Цена</label>
			<input type="text" class="form-control" id="inputPrice" placeholder="Цена" name="price"
			       autocomplete="off">
			<label class="label font-weight-bold mt-2" for="selectIdCategory">Категория</label>
            <select class="form-control" id="selectIdCategory" name="id_category">
                <?php foreach ($vars as $key => $value): ?>
                    <?php foreach ($value as $k => $v): ?>
                        <?php if ($k == 'id'): ?>
                            <option value=<?=$value['id'];?>>
                                <?php echo $value['name']; ?>
                            </option>
                        <?php break; endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </select>
		</div>
		<div class="btn-group">
			<input type="submit" class="btn btn-success" name="addDish" value="Добавить"/>
			<a type="button" class="btn btn-secondary" href="/dish">Назад</a>
		</div>
	</form>
</div>