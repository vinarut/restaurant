<div class="container">
    <form action="/ingredient/delete/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-4">Удалить игредиент "<?=$vars['ingredient']?>"?</label>
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-danger" value="Удалить" name="delete" />
            <a type="button" class="btn btn-secondary" href="/ingredient">Отмена</a>
        </div>
    </form>
</div>