<?php

namespace app\controllers;

use app\models\Comments;
use app\models\Petition;
use app\models\Vote;
use myvote\libs\Pagination;

class PetitionsController extends AppController
{
    public function indexAction()
    {
        $petition = new Petition();
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 10;
        $count = \R::count('petitions');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $petitions = \R::getAll("SELECT 
                                        `petitions`.`id`, 
                                        `petitions`.`title`,  
                                        `petitions`.`description`,  
                                        `petitions`.`user` = `users`.`name`, 
                                        `petitions`.`created`, 
                                        `petitions`.`status`, 
                                        `petitions`.`image`,
                                        `users`.`surname`,
                                        `users`.`name`,
                                        `users`.`middle_name` 
                                        FROM `petitions`
                                        JOIN `users`
                                        ON `petitions`.`user` = `users`.`id`
                                        WHERE `petitions`.`status` = 'Одобрена'
                                        GROUP BY `petitions`.`id`
                                        ORDER BY `petitions`.`id`
                                        DESC
                                        LIMIT $start, $perpage");
        $this->setMeta('Список петиций');
        $this->set(compact('petitions', 'pagination', 'count'));
    }

    public function viewAction()
    {
        $petition_id = $this->getRequestID();
        $petition = \R::getRow("SELECT 
                                        `petitions`.`id`,
                                        `petitions`.`destination`,
                                        `petitions`.`title`,
                                        `petitions`.`description`,
                                        `petitions`.`text`,
                                        `petitions`.`created`,
                                        `petitions`.`modified`,
                                        `petitions`.`image`,
                                        `petitions`.`user` = `users`.`name`,
                                        `users`.`surname`,
                                        `users`.`name`,
                                        `users`.`middle_name`
                                    FROM `petitions` JOIN `users`
                                    ON `petitions`.`user` = `users`.`id` 
                                    WHERE `petitions`.`id` = $petition_id
                                    LIMIT 1");
        $users = \R::getRow("SELECT `users`.* from `users` ");
        if (!$petition){
            throw new \Exception('Страница не найдена', 404);
        }

        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 20;
        $count = \R::count('comments');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $comments = \R::getAll("SELECT
                                    `comments`.`id`,
                                    `comments`.`user_id` = `users`.`name`,
                                    `comments`.`petition_id`,
                                    `comments`.`created`,
                                    `comments`.`text`,
                                    `comments`.`parent`,
                                    `users`.`name`
                                    FROM `comments` JOIN `users`
                                    ON `comments`.`user_id` = `users`.`id`
                                    WHERE `comments`.`petition_id` = $petition_id
                                    ORDER BY `comments`.`id`, `comments`.`created`
                                    LIMIT $start, $perpage");
        $users = \R::getRow("SELECT `users`.* from `users` ");
        $countVouting = \R::count('vote', 'petition_id = ?', [$petition_id]);

        $this->setMeta("Просмотр петиции");
        $this->set(compact('petition', 'users', 'comments', 'countVouting'));
    }

    public function voteAction()
    {
        $vote = new Vote();
        $vote->voting();
    }
}