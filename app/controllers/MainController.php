<?php

namespace app\controllers;

use myvote\base\Controller;
use myvote\Cache;

class MainController extends AppController
{
    public function indexAction()
    {
        $this->setMeta('Главная страница', 'Сайт петиций Республики Казахстан', 'Казахстан, петиция, петиции, сайт петиций, подать петицию, посмотреть петиции, политика в 
Казахстане, создать петицию, голосование за петицию');
    }
}