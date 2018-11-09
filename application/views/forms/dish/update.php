<div class="container">
    <form action="/dish/update/<?=$vars['id']?>" method="post">
        <div class="form-group">
            <label class="label font-weight-bold mt-2" for="inputDish">Новое название блюда</label>
            <input type="text" class="form-control" id="inputDish" placeholder="Блюдо" autocomplete="off" name="dish" >
            <label class="label font-weight-bold mt-2" for="inputPrice">Новая цена</label>
            <input type="text" class="form-control" id="inputPrice" placeholder="Цена" name="price" autocomplete="off">
            <label class="label font-weight-bold mt-2" for="selectIdCategory">Новая категория</label>
            <select class="form-control" id="selectIdCategory" name="id_category">
                <?php foreach ($vars['categories'] as $value): ?>
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
            <input type="submit" class="btn btn-success" value="Изменить" />
            <a type="button" class="btn btn-secondary" href="/dish">Назад</a>
        </div>
    </form>
</div>
