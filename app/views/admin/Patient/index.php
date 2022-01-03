<div class="panel panel-default">
    <div class="panel-heading">Users</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Отчество</th>
                <th>Адрес</th>
                <th>ПИНФЛ</th>
                <th>Серия и номер паспорта</th>
                <th>Дата рождения</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?php echo $patient['id'] ?></td>
                    <td><a href="/admin/patients/detailed/<?php echo $patient['id'] ?>"><?php echo $patient['first_name'] ?></a></td>
                    <td><?php echo $patient['last_name'] ?></td>
                    <td><?php echo $patient['middle_name'] ?></td>
                    <td><?php echo $patient['address'] ?></td>
                    <td><?php echo $patient['infl'] ?></td>
                    <td><?php echo $patient['passport'] ?></td>
                    <td><?php echo $patient['birth_date'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>