<div class="container">
    <a class="btn btn-success m-1" href='/dish/create'>Добавить</a>
    <table class="table text-center">
        <thead>
        <tr>
            <th>Название</th>
            <th>Цена</th>
            <th>Категория</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($vars as $value): ?>
            <tr>
                <?php foreach ($value as $k => $v): ?>
                    <?php if ($k != 'id'): ?>
                        <td><?php echo $v ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <td class="w-25">
                    <a class="btn btn-link" href="/dish/update/<?= $value['id'] ?>">Изменить</a>
                    <a type="button" id="<?= $value['d_name'] ?>" class="btn btn-danger delete-button"
                       href="/dish/delete/<?= $value['id'] ?>">
                        Удалить
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $(".delete-button").on('click', function() {
            let url = $(this).attr('href');
            let value = $(this).attr('id');
            if(confirm(`Вы уверены, что хотите удалить блюдо "${value}"?`)) {
                window.location = url;
            }
            return false;
        })
    });
</script>