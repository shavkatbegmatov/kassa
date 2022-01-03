<?php

namespace app\controllers\admin;

// use app\models\User;
use framework\core\base\View;

class PatientController extends AppController {

    public function indexAction() {
        $patients = \R::findAll('patients');
        $this->set(compact('patients'));
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
    }

    public function detailedAction() {
        $alias = $this->route['alias'];
        debug($alias);
        $patient = \R::findOne('patients', 'id = ?', [$alias]);
        // $undo_url = $this->undo_url;
        // $this->set(compact('user', 'undo_url'));
        $this->set(compact('patient'));
        View::setMeta('Dash - Главная страница', 'Desc', 'Keys');
    }
}