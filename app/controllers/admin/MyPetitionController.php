<?php

namespace app\controllers\admin;

use myvote\libs\Pagination;
use app\models\Petition;

class MyPetitionController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 20;
        $count = \R::count('petitions');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $user_id = $_SESSION['user']['id'];
        $petitions = \R::getAll("SELECT * FROM `petitions` WHERE `user` = ? ORDER BY `petitions`.`id` LIMIT $start, $perpage",
            [$user_id]);
        $this->setMeta('Список моих петиций');
        $this->set(compact('petitions', 'pagination', 'count'));
    }
}