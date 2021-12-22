<?php

namespace app\controllers\admin;

// use app\models\User;
use framework\core\base\View;

class PatientController extends AppController {

    public function indexAction() {
        $users = \R::findAll('patients');
        $this->set(compact('users'));
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
    }
}