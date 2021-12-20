<?php

namespace app\controllers\admin;

use app\models\User;
use framework\core\base\View;

class UsersController extends AppController {

    public function indexAction() {
        $users = \R::findAll('user');
        $roles = \R::findAll('roles');
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
        $this->set(compact('users', 'roles'));
    }

}