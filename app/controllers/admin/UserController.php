<?php

namespace app\controllers\admin;

use app\models\User;
use framework\core\base\View;

class UserController extends AppController {

    public function showAction() {
        $alias = $this->route['alias'];
        $user = \R::findOne('user', 'id = ?', [$alias]);
        $this->set(compact('user'));
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
    }

    public function deleteAction() {
        $alias = $this->route['alias'];
        $user = \R::findOne('user', 'id = ?', [$alias]);
        \R::trash($user);
        redirect();
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
    }

    public function updateAction() {
        $alias = $this->route['alias'];
        $user = \R::findOne('user', 'id = ?', [$alias]);
        if ($_GET['checked'] === "true") {
            $user['status'] = 1;
        } else {
            $user['status'] = 0;
        }
        \R::store($user);
        redirect();
    }

    public function loginAction() {
        if (!empty($_POST)) {
            $user = new User();
            if (!$user->login(true)) {
                $_SESSION['error'] = 'Ник/пароль введены неверно!';
            }
            if (User::isAdmin()) {
                redirect(ADMIN);
            } else {

            }
        }

        if (User::isAdmin()) {
            redirect(ADMIN);
        }

        $this->layout = 'login';
    }

}