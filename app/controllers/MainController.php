<?php

namespace app\controllers;

use myvote\base\Controller;
use myvote\Cache;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Главная страница', 'Описание', 'Ключевые слова');
    }
}