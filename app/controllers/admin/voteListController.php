<?php

namespace app\controllers\admin;

use myvote\libs\Pagination;

class voteListController extends AppController
{
    public function indexAction()
    {
        if(!isset($_SESSION['user']['login'])){
            $_SESSION['error'] = 'Вам нужно авторизироваться';
            redirect('/');
        } else {
            $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
            $perpage = 10;
            $count = \R::count('petitions');
            $pagination = new Pagination($page, $perpage, $count);
            $start = $pagination->getStart();

            $petition_id = $_GET['petition_id'];
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
                                        ORDER BY `vote`.`id`
                                        LIMIT $start, $perpage");
            $petition_id = $_GET['petition_id'];
            $petitions = \R::getRow("SELECT * FROM `petitions` WHERE `petitions`.`id` =?", [$petition_id]);
            $count = \R::count('vote', 'petition_id = ?', [$petition_id]);

            $this->setMeta("Петиция №{$petition_id}");
            $this->set(compact('votes', 'pagination', 'page', 'perpage', 'petitions', 'count'));
        }
    }
}