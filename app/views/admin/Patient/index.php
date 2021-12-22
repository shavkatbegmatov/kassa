<div class="panel panel-default">
    <div class="panel-heading">Users</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отцество</th>
                <th>Адрес</th>
                <th>ИНФЛ</th>
                <th>Поспорт Серия</th>
                <th>Дата рождения</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><?php echo $user['first_name'] ?></td>
                    <td><?php echo $user['last_name'] ?></td>
                    <td><?php echo $user['middle_name'] ?></td>
                    <td><?php echo $user['address'] ?></td>
                    <td><?php echo $user['infl'] ?></td>
                    <td><?php echo $user['passport'] ?></td>
                    <td><?php echo $user['birth_date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>