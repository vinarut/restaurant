<div class="container">
    <form action="/category/delete/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-4">Удалить категорию "<?=$vars['category']?>"?</label>
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-danger" value="Удалить" name="delete" />
            <a type="button" class="btn btn-secondary" href="/category">Отмена</a>
        </div>
    </form>
</div>