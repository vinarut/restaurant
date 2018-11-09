<div class="container">
    <a class="btn btn-success m-1" href='/dishIngredients/create'>Добавить</a>
    <table class="table text-center">
        <thead>
        <tr>
            <th>Блюдо</th>
            <th>Ингредиент</th>
            <th>Масса</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($vars as $value): ?>
            <tr>
                <?php foreach ($value as $k => $v): ?>
                    <?php if ($k != 'id_dish' && $k != 'id_ingredient'): ?>
                        <td><?php echo $v ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <td class="w-25">
                    <a class="btn btn-link" href="/dishIngredients/update/<?= $value['id_dish'].':'.
                    $value['id_ingredient'] ?>">Изменить</a>
                    <a class="btn btn-danger" href="/dishIngredients/delete/<?= $value['id_dish'].':'.
                    $value['id_ingredient'] ?>">Удалить</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>