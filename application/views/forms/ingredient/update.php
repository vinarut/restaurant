<div class="container">
    <form action="/ingredient/update/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-2" for="idIngredient">Новое название ингредиента</label>
            <input type="text" class="form-control" id="idIngredient" placeholder="Ингредиент"
                   name="ingredient" autocomplete="off" value="<?=$vars['ingredient']?>">
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-success" value="Изменить" />
            <a type="button" class="btn btn-secondary" href="/ingredient">Назад</a>
        </div>
    </form>
</div>
