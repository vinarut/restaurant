<div class="container">
    <a class="btn btn-success m-1" href='/ingredient/create'>Добавить</a>
    <table class="table text-center">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($vars as $key => $value): ?>
            <tr>
                <?php foreach ($value as $k => $v): ?>
                    <td><?php echo $v ?></td>
                <?php endforeach; ?>
                <td class="w-25">
                    <a class="btn btn-link" href="/ingredient/update/<?= $value['id'] ?>">Изменить</a>
                    <a class="btn btn-danger delete-button" href="/ingredient/delete/<?= $value['id'] ?>"
                       id="<?= $value['name'] ?>">
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
            if(confirm(`Вы уверены, что хотите удалить ингредиент "${value}"?`)) {
                window.location = url;
            }
            return false;
        })
    });
</script>