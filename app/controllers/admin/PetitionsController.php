<?php

namespace app\controllers\admin;

use myvote\libs\Pagination;

class PetitionsController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 20;
        $count = \R::count('petitions');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $petitions = \R::getAll("SELECT
                                `petitions`.`id`,
                                `petitions`.`title`,
                                `petitions`.`user` = `users`.`name`,
                                `petitions`.`created`,
                                `petitions`.`status`,
                                `users`.`surname`,
                                `users`.`name`,
                                `users`.`middle_name`,
                                `users`.`ip`
                                FROM `petitions`
                                JOIN `users`
                                ON `petitions`.`user` = `users`.`id`
                                GROUP BY `petitions`.`id`
                                ORDER BY `petitions`.`id`
                                LIMIT $start, $perpage");
        $users = \R::getRow("SELECT `users`.* from `users` ");


        $this->setMeta('Список петиций');
        $this->set(compact('petitions', 'pagination', 'count', 'users'));
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
                                            `petitions`.`status`,
                                            `petitions`.`image`,
                                            `petitions`.`user` = `users`.`name`,
                                            `users`.`surname`,
                                            `users`.`name`,
                                            `users`.`middle_name`
                                FROM `petitions` JOIN `users`
                                ON `petitions`.`user` = `users`.`id`
                                WHERE `petitions`.`id` = $petition_id
                                LIMIT 1");
        $users = \R::getRow("SELECT * FROM `users`");
        $countVouting = \R::count('vote', 'petition_id = ?', [$petition_id]);
        if (!$petition){
            throw new \Exception('Страница не найдена', 404);
        }
        $this->setMeta("Петиция №{$petition_id}");
        $this->set(compact('petition', 'users', 'countVouting'));
    }

    public function changeStatusAction()
    {
        $petition_id = $this->getRequestID();
        $status = ($_GET['status']);
        $petitions = \R::load('petitions', $petition_id);
        if (!$petitions){
            throw new \Exception('Страница не найдена', 404);
        }
        $petitions->status = $status;
        $petitions->modified = date("Y-m-d H:i:s");
        \R::store($petitions);
        $_SESSION['success'] = 'Изменения сохранены';
        redirect(ADMIN . '/petitions');
    }

    public function deleteAction()
    {
        $petition_id = $this->getRequestID();
        $petitions = \R::load('petitions', $petition_id);
        $petitions->status = 'Удалена';
        \R::store($petitions);
        $_SESSION['success'] = 'Петиция удалена';
        redirect(ADMIN . '/petitions');
    }

    public function trashAction()
    {
        restrictArea();
        $petition_id = $this->getRequestID();
        $petitions = \R::load('petitions', $petition_id);
        \R::trash($petitions);
        $_SESSION['success'] = 'Петиция удалена навсегда';
        redirect();
    }
}