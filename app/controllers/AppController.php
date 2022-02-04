<?php

namespace app\controllers;

use framework\core\App;
use framework\widgets\language\Language;

class AppController extends \framework\core\base\Controller {
    public $menu;

    public $layout = 'def2';

    public function __construct($route) {
        parent::__construct($route);
        new \app\models\Main;
        App::$app->setProperty('langs', Language::getLanguages());
        App::$app->setProperty('lang', Language::getLanguage(App::$app->getProperty('langs')));
        
        if ($route['controller'] === 'Apteka') {
            if (isset($_SESSION['user'])) {
                if ($_SESSION['user']['role'] === 'pharmacist') {

                } else {
                    redirect('/');
                }
            } else {
                redirect('/');

            }
        }
    }

    // public function chek
}