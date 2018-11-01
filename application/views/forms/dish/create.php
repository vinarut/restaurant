<div class="container">
	<form action="/dish/create" method="post">
		<div class="form-group">
			<label class="label" for="inputDish">Блюдо</label>
			<input type="text" class="form-control" id="inputDish" placeholder="Блюдо" name="dish"
			       autocomplete="off">
			<label class="label" for="inputPrice">Цена</label>
			<input type="text" class="form-control" id="inputPrice" placeholder="Цена" name="price"
			       autocomplete="off">
			<label class="label" for="inputIdCategory">Категория</label>
			<input type="text" class="form-control" id="inputIdCategory" placeholder="Id категории" name="id_category"
			       autocomplete="off">
		</div>
		<div class="btn-group">
			<input type="submit" class="btn btn-success" name="addDish" value="Добавить"/>
			<a type="button" class="btn btn-secondary" href="/dish">Назад</a>
		</div>
	</form>
</div>