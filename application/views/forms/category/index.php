<div class="container">
    <a class="btn btn-success m-1" href='/category/create'>Добавить</a>
    <table class="table text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 1; ?>
        <?php foreach ($vars as $value): ?>
            <tr>
                <?php foreach ($value as $k => $v): ?>
                    <?php if ($k == 'name'): ?>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $v ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <td class="w-25">
                    <a class="btn btn-link" href="/category/update/<?= $value['id'] ?>">Изменить</a>
                    <a type="button" id="<?= $value['name'] ?>" class="btn btn-danger delete-button"
                       href="/category/delete/<?= $value['id'] ?>" >
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
            if(confirm(`Вы уверены, что хотите удалить категорию "${value}"?`)) {
                window.location = url;
            }
            return false;
        })
    });
</script>