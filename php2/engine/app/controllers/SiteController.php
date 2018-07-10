<?php

namespace app\controllers;

use app\models\User;
use system\components\Controller;

class SiteController extends Controller {

    public function actionIndex() {

        $user = new User();

        if (isset($_POST['User'])) {
            $user->load($_POST);
            var_dump($user);
        }

        $this->render('index', [
            'message' => 'site/index',
        ]);
    }

}