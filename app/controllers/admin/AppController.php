<?php

namespace app\controllers\admin;

use app\models\Main;
use app\models\User;
use framework\core\base\Controller;
use framework\core\App;
use framework\widgets\language\Language;

class AppController extends Controller {
    public $layout = 'dashboard';

    public function __construct($route) {
        parent::__construct($route);
        new \app\models\Main;
        
        App::$app->setProperty('langs', Language::getLanguages());
        App::$app->setProperty('lang', Language::getLanguage(App::$app->getProperty('langs')));

        if (!User::isAdmin() && $route['action'] != 'login') {
            redirect(ADMIN . '/user/login');
        }

        new Main();
    }
}