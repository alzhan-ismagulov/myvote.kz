<?php

namespace app\controllers;

use myvote\libs\Pagination;

class VoteListController extends AppController
{
    public $layout = 'user';

    public function indexAction()
    {
        if(!isset($_SESSION['user']['login'])){
            $_SESSION['error'] = 'Вам нужно авторизироваться';
            redirect('/');
        } else {
            $petition_id = $_GET['petition_id'];
            $user = $_SESSION['user']['id'];

            $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
            $perpage = 10;
            $count = \R::count('petitions');
            $pagination = new Pagination($page, $perpage, $count);
            $start = $pagination->getStart();

            $votes = \R::getAll("SELECT
                                            `vote`.`id`,
                                            `vote`.`petition_id` = `petitions`.`id`,
                                            `vote`.`user_id` = `users`.`id`,
                                            `vote`.`created`,
                                            `users`.`surname`,
                                            `users`.`name`,
                                            `users`.`middle_name`,
                                            `users`.`iin`,
                                            `users`.`email`,
                                            `users`.`phone`,
                                            `users`.`gender`,
                                            `users`.`age`,
                                            `users`.`profession`,
                                            `users`.`city`,
                                            `users`.`ip`,
                                            `petitions`.`title`,
                                            `petitions`.`user`
                                        FROM `vote`
                                        JOIN `users`
                                        ON `vote`.`user_id` = `users`.`id`
                                        JOIN `petitions`
                                        ON `vote`.`petition_id` = `petitions`.`id`
                                        WHERE `vote`.`petition_id` = $petition_id
                                        AND `petitions`.`user` = $user
                                        ORDER BY `vote`.`id`
                                        LIMIT $start, $perpage");
            if(!$votes){
                $_SESSION['error'] = 'Просмотр голосований чужих петиций не входит в Вашу задачу';
                redirect('/');
            } else {
//            $petitions = \R::getRow("SELECT * FROM `petitions` WHERE `petitions`.`id` =?", [$petition_id]);
            $count = \R::count('vote', 'petition_id = ?', [$petition_id]);

            $this->setMeta("Петиция №{$petition_id}");
            $this->set(compact('votes', 'pagination', 'page', 'perpage', 'petitions', 'count'));
            }
        }
    }
}