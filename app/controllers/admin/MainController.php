<?php

namespace app\controllers\admin;

class MainController extends AppController
{
    public function indexAction()
    {
        $countPetitions = \R::count('petitions');
        $countUsers = \R::count('users');
        $this->setMeta('Панель управления');
        $this->set(compact('countPetitions', 'countUsers'));
    }
}