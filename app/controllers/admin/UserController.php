<?php

namespace app\controllers\admin;

use app\models\User;
use framework\core\base\View;

class UserController extends AppController {

    public function deleteAction() {
        $alias = $this->route['alias'];
        $user = \R::findOne('user', 'id = ?', [$alias]);
        \R::trash($user);
        redirect();
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
        
        // $this->set(compact('test'));
    }

    public function updateAction() {
        $alias = $this->route['alias'];
        $user = \R::findOne('user', 'id = ?', [$alias]);
        debug($user);
        // debug("CH = " . $_GET['checked']);
        if ($_GET['checked'] === "true") {
            $user['status'] = 1;
            debug("c1");
        } else {
            $user['status'] = 0;
            debug("c0");
        }
        debug($user);
        \R::store($user);
        redirect();
        //exit();
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