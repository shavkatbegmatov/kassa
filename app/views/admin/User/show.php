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
                <div style="font-size: 3rem; font-weight: bold"><?php echo $user['name']; ?></div>
                <div><?php echo $user['login']; ?></div>
                <div><?php echo $user['email']; ?></div>
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
                    Name:
                </td>
                <td>
                    <?php echo $user['name']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Login:
                </td>
                <td>
                    <?php echo $user['login']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email:
                </td>
                <td>
                    <?php echo $user['email']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Role:
                </td>
                <td>
                    <?php echo $user['role']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Status:
                </td>
                <td>
                    <?php echo $user['status']; ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
