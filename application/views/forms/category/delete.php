<div class="container">
    <form action="/category/delete/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-2" for="idCategory">Удалить категорию</label>
            <input type="text" class="form-control" id="idCategory" value="<?=$vars['name']?>" readonly >
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-danger" value="Удалить" name="delete" />
            <a type="button" class="btn btn-secondary" href="/category">Назад</a>
        </div>
    </form>
</div>