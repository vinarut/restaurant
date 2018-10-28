<div class="container">
	<div class="row">
		<form action="index.php" method="post" class="col-lg-12">
			<div class="form-group">
				<label class="label" for="inputDish">Блюдо</label>
				<input type="text" class="form-control" id="inputDish" placeholder="Блюдо"
					   name="dish">
				<label class="label" for="inputPrice">Цена</label>
				<input type="text" class="form-control" id="inputPrice" placeholder="Цена"
					   name="price">
				<label class="label" for="inputIdCategory">Категория</label>
				<input type="text" class="form-control" id="inputIdCategory" placeholder="Id категории"
					   name="id_category">
			</div>
			<div class="btn-group">
				<input type="submit" class="btn btn-success btn-md col-lg-12" value="Добавить" />
			</div>
		</form>
	</div>
</div>