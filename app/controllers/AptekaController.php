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
        $prods = \R::findAll('products');
        debug($prods);
        if ($_POST) {
            if (!empty($_POST['name'])) {
                if ('5' == '5') {
                    $prod = \R::dispense('products');
                    $prod['name'] = $_POST['title'];
                    $prod['date'] = date('d/m/Y');
                    \R::store($prod);
                    redirect();
                }
            } else {
                $_SESSION['error'] = "Fill the input.";
            }

        }

        $products = \R::findAll('products');

        $this->set(compact('products'));

    }

}