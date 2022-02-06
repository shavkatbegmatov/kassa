<?php

namespace app\controllers;

class PharmacistController extends AppController {
    
    public function indexAction() {
        if (!empty($_POST)) {
            $treatmentId = $_POST['treatment'];
            $patientId = $_POST['patient'];
            $treatment = \R::findOne('treatment', 'id = ? AND patient_id = ?', [$treatmentId, $patientId]);
            $treatment['status'] = 'paid';
            \R::store($treatment);
        }
    }

    public function addAction() {
        if (!empty($_POST)) {
            if (!empty($_POST['product_name'])) {
                $prods = \R::findOne('products', 'name = ?', [$_POST['product_name']]);

                if (!isset($prods)) {
                    $prod = \R::dispense('products');
                    $prod['name'] = $_POST['product_name'];
                    $prod['manufacturer_id'] = $_POST['manufacturer'];
                    // $prod['date'] = date('d/m/Y');
                    \R::store($prod);
                    redirect();
                } else {
                    $_SESSION['error'] = "It is must be unique";
                    $_SESSION['unique'] = $_POST['product_name'];

                }
            } else {
                $_SESSION['error'] = "Fill the input.";
            }

        }

        $products = \R::findAll('products');
        $manufacturers = \R::findAll('manufacturers');
        $this->set(compact('products', 'manufacturers'));
    }


    public function changeAction() {
        if (!empty($_POST)) {
            if (!empty($_POST['product_name'])) {
                $prods = \R::findOne('products', 'name = ?', [$_POST['product_name']]);

                if (!isset($prods)) {
                    $prod = \R::load('products', $_GET['id']);
                    $prod['name'] = $_POST['product_name'];
                    $prod['manufacturer_id'] = $_POST['manufacturer'];
                    // $prod['date'] = date('d/m/Y');
                    \R::store($prod);
                    redirect();
                } else {
                    $_SESSION['error'] = "It is must be unique";
                    $_SESSION['unique'] = $_POST['product_name'];

                }
            } else {
                $_SESSION['error'] = "Fill the input.";
            }

        }

        $products = \R::findAll('products');
        $manufacturers = \R::findAll('manufacturers');
        $this->set(compact('products', 'manufacturers'));
    }

    
    public function addManufacturerAction() {
        if (!empty($_POST)) {
            if (!empty($_POST['company_name'])) {
                $prods = \R::findOne('products', 'name = ?', [$_POST['company_name']]);

                if (!$prods) {
                    $prod = \R::dispense('manufacturers');
                    $prod['name'] = $_POST['company_name'];
                    $prod['country'] = $_POST['company_country'];
                    // $prod['date'] = date('d/m/Y');
                    \R::store($prod);
                    redirect();
                } else {
                    $_SESSION['error'] = "It is must be unique";
                    $_SESSION['unique'] = $_POST['company_name'];

                }
            } else {
                $_SESSION['error'] = "Fill the input.";
            }

        }

        $products = \R::findAll('products');
        $manufacturers = \R::findAll('manufacturers');
        $this->set(compact('products', 'manufacturers'));
    }

    public function purchaseAction() {
        if (!empty($_POST)) {
            $prod = \R::xdispense('storage_actions');
            $product = \R::findOne('products', 'name = ?', [$_POST['product_name']]);
            if ($product) {
                $prodId = $product['id'];
            } else {
                $_SESSION['error'] = 'Бунақа товар йўқ!';
                redirect();
            }
            $prod['product_id'] = $prodId;
            $prod['count'] = $_POST['count'];
            $prod['price'] = $_POST['price'];

            // $prod['date'] = date('Y-m-d H:i:s');
            \R::store($prod);
            redirect();
        }
        $storageActions = \R::findAll('storage_actions');

        $this->set(compact('storageActions'));
    }

    public function sellAction() {
        if (!empty($_POST)) {
            $product = \R::xdispense('storage_actions');
            $prodId = \R::findOne('products', 'name = ?', [$_POST['product_name']])['id'];
            $product['count'] = (0 - abs($_POST['count']));
            $product['product_id'] = $prodId;
            $product['price'] = $_POST['price'];

            \R::store($product);
        }
    }

    public function getCountAction() {
        $this->layout = 'none';
        if (!empty($_POST)) {
            $prodId = \R::findOne('products', 'name = ?', [$_POST['name']])['id'];
            $count = \R::getRow("SELECT SUM(count) FROM storage_actions WHERE id = :id", [':id' => $prodId]);
        } else {
            $count = 'Не найдет POST';
        }

        $this->set(compact('count'));
    }

}