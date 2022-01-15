<?php

namespace app\controllers;

class AptekaController extends AppController {

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

    public function addAction() {
        if ($_POST) {
            $prod = \R::dispense('products');
            $prod['name'] = $_POST['title'];
            $prod['date'] = date('d/m/Y');
            \R::store($prod);

            redirect();
        }

        $products = \R::findAll('products');

        $this->set(compact('products'));

    }

}