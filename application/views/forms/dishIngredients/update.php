<div class="container">
    <form action="/dishIngredients/update/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-4" for="inputWeight">Изменить массу</label>
            <input type="text" class="form-control" id="inputWeight" placeholder="Масса ингредиента" name="weight"
                   autocomplete="off" value="<?=$vars['weight']?>">
        </div>
        <div class="btn-group">
            <input type="submit" class="btn btn-success" value="Изменить" />
            <a type="button" class="btn btn-secondary" href="/dishIngredients">Назад</a>
        </div>
    </form>
</div>
