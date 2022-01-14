<?php

namespace app\controllers;

class AptekaController extends AppController {

    public $layout = 'apteka';

    public function indexAction() {
        if (isset($_SESSION['user'])) {
            if ($_SESSION['user']['role'] == 'apteka') {
                if ($_POST) {
                    $treatmentId = $_POST['treatment'];
                    $patientId = $_POST['patient'];
                    $treatment = \R::findOne('treatment', 'id = ? AND patient_id = ?', [$treatmentId, $patientId]);
                    $treatment['status'] = 'paid';
                    \R::store($treatment);
                }
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

    public function checkAction() {
        if ($this->isAjax()) {
            echo $_POST['id'];
        }
    }

}