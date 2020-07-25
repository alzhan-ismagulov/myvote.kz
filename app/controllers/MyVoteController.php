<?php


namespace app\controllers;

use myvote\libs\Pagination;

class MyVoteController extends AppController
{
    public function indexAction()
    {
        restrictArea();
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 10;
        $count = \R::count('petitions');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $this->layout = 'user';
        $user = $_SESSION['user']['id'];
        $votes = \R::getAll("SELECT 
                                            `vote`.`id`,
                                            `petition_id` = `petitions`.`id`,
                                            `petitions`.`title`,
                                            `petitions`.`created`
                                            FROM `vote` 
                                            JOIN `petitions`
                                            ON `petition_id` = `petitions`.`id`
                                            WHERE `user_id` = $user
                                            ORDER BY `petitions`.`created`
                                            LIMIT $start, $perpage");
        $petition = \R::getRow("SELECT `petitions`.`id` FROM `petitions`");

        if (!$votes){
            $_SESSION['error'] = 'Вы ещё нигде не проголосовали';
            $this->setMeta("Мои голосования");
            $this->set(compact('votes', 'petition', 'pagination', 'page', 'perpage'));
        } else {
            $this->setMeta("Мои голосования");
            $this->set(compact('votes', 'petition', 'pagination', 'page', 'perpage'));
        }
    }
}