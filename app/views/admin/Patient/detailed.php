<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><a href="<?php echo $_SESSION['undo_url']; ?>" class=""><i class="fas fa-caret-left"></i>Back</a></div>
            <?php debug($_SESSION['undo_url']); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="panel panel-default">
            <div class="panel-heading">Аккаунт</div>
            <div class="panel-body">
                <div style="font-size: 3rem; font-weight: bold"><?php echo $patient['first_name']; ?></div>
                <div><?php echo $patient['address']; ?></div>
                <div><?php echo $patient['birth_date']; ?></div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        Salom
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Users</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>--</th>
                <th>---</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    ФИО:
                </td>
                <td>
                    <?php echo $patient['last_name']; ?> <?php echo $patient['first_name']; ?> <?php echo $patient['middle_name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Адрес:
                </td>
                <td>
                    <?php echo $patient['address']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    ИНФЛ:
                </td>
                <td>
                    <?php echo $patient['infl']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Паспорт:
                </td>
                <td>
                    <?php echo $patient['passport']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Дата рождения:
                </td>
                <td>
                    <?php echo $patient['birth_date']; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
