<?php

namespace app\controllers;

use app\models\User;

class RecoverController extends AppController
{
    public function indexAction()
    {
        $user = new User();
        $user->recover();
    }
}