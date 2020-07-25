<?php

namespace app\controllers;

use app\models\Petition;
use app\models\User;
//use Couchbase\UserSettings;

class PetitionController extends AppController
{
    public $layout = 'user';

    public function createAction()
    {
        $petition = new Petition();
        $petition->create();
    }

    public function editAction()
    {
        $petition = new Petition();
        $user = $_SESSION['user']['id'];
        $petition->edit();
        $petition_id = $_GET['id'];
        $petition = \R::getRow('SELECT
                                        `petitions`.`id`,
                                        `petitions`.`title`,
                                        `petitions`.`description`,
                                        `petitions`.`text`,
                                        `petitions`.`destination`,
                                        `petitions`.`user`,
                                        `petitions`.`created`,
                                        `petitions`.`modified`,
                                        `petitions`.`status`
                                FROM `petitions`
                                WHERE `petitions`.`id` = ?
                                AND `petitions`.`user` = ?
                                LIMIT 1', [$petition_id, $user]);
        if (!$petition){
            $_SESSION['error'] = 'Вашей петиции с таким номером не найдено';
            redirect('/');
        }
        if ($petition['status']== 'Одобрена'){
            $_SESSION['error'] = 'Ваша петиция уже одобрена. Редактирование запрещено.';
            redirect();
        }

        $this->setMeta("Редактирование петиции");
        $this->set(compact('petition'));
    }

    public function deleteAction()
    {
        $petition_id = $_GET['id'];
        $petitions = \R::load('petitions', $petition_id);
        $petitions->status = 'Удалена';
        \R::store($petitions);
        $_SESSION['success'] = 'Петиция удалена';
        redirect();
    }
}