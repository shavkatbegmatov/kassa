<style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 25px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  /* -webkit-transition: .4s; */
  /* transition: .4s; */
}

.slider:before {
  position: absolute;
  content: "";
  height: 17px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  /* -webkit-transition: .4s; */
  /* transition: .4s; */
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>

<div class="panel panel-default">
    <div class="panel-heading">Users</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Роль</th>
                <th>Статус</th>
                <th>Удалить</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['id'] ?></td>
                    <td><a href="/admin/user/show/<?php echo $user['id'] ?>"><?php echo $user['name'] ?></a></td>
                    <td>
                        <?php if ($user['role'] != 'admin'): ?>
                            <select name="role">
                                <?php foreach ($roles as $role): ?>
                                    <?php if ($role['type'] == $user['role']): ?>
                                        <option value="<?php echo $role['type'] ?>" selected style="background: black; color: white;"><?php echo $role['name'] ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo $role['type'] ?>" style="background: black; color: white;"><?php echo $role['name'] ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        <?php else: ?>
                            Администратор
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($user['status'] == 1): ?>
                            <label class="switch">
                                <input type="checkbox" id="<?php echo $user['id'] ?>" checked>
                                <span class="slider"></span>
                            </label>
                        <?php else: ?>
                            <label class="switch">
                                <input type="checkbox" id="<?php echo $user['id'] ?>">
                                <span class="slider"></span>
                            </label>
                        <?php endif; ?>
                    </td>
                    <td><a style="cursor: pointer;" onclick="ask('/admin/user/delete/<?php echo $user['id'] ?>')">Удалить</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    function ask(url) {
        let res = confirm('Вы действительно хотите удалить пользователя');

        if (res) {
            window.location = url;
        }
    }

    $('input[type=checkbox]').change(function() {

        window.location = '/admin/user/update/' + $(this).attr('id') + '?checked=' + $(this).prop('checked');

    });
</script>