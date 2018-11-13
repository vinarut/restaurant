<div class="container">
    <form action="/category/update/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-2" for="idCategory">Новое название категории</label>
            <input type="text" class="form-control" id="idCategory" placeholder="Категория"
                   name="category" autocomplete="off" value="<?=$vars['category']?>">
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-success" value="Изменить" />
            <a type="button" class="btn btn-secondary" href="/category">Назад</a>
        </div>
    </form>
</div>