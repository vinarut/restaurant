<div class="container">
    <form action="/dish/delete/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-4">Удалить блюдо "<?=$vars['dish']?>"?</label>
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-danger" name="delete" value="Удалить"/>
            <a type="button" class="btn btn-secondary" href="/dish">Отмена</a>
        </div>
    </form>
</div>