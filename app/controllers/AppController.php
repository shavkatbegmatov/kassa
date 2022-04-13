<?php

namespace app\controllers;

use framework\core\App;
use framework\widgets\language\Language;

class AppController extends \framework\core\base\Controller {
    public $menu;

    public function __construct($route) {
        parent::__construct($route);
        new \app\models\Main;
        App::$app->setProperty('langs', Language::getLanguages());
        App::$app->setProperty('lang', Language::getLanguage(App::$app->getProperty('langs')));
        
        if ($route['controller'] === 'Pharmacist') {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role'] === 'pharmacist') {

                } else {
                    redirect(SUB . '/');
                }
            } else {
                redirect(SUB . '/');

            }
        }

        if ($route['controller'] === 'Manager') {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role'] === 'manager') {

                } else {
                    redirect(SUB . '/');
                }
            } else {
                redirect(SUB . '/');

            }
        }
    }

    // public function chek
}