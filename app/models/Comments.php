<?php

namespace app\models;

use myvote\libs\Pagination;

class Comments extends AppModel
{
    public $attributes = [
        'user_id' => '',
        'petition_id' => '',
        'text' => '',
        'parent' => '',
    ];

    public $rules = [
        'required' => [
            ['user_id'],
            ['petition_id'],
            ['created'],
            ['text'],
        ],
        'email' => [
            ['email'],
        ],
        'lengthMax' => [
            ['text', 255],
        ]
    ];

    public function create()
    {
        $comments = \R::dispense('comments');
        $comments->user_id = $_POST['user_id'];
        $comments->petition_id = $_POST['petition_id'];
        $comments->text = $_POST['text'];
        if(!isset($_POST['replay'])){
            $comments->parent = 0;
        } else {
            $comments->parent = $_POST['replay'];
        }
        if(\R::store($comments)){
            $_SESSION['success'] = 'Комментарий оставлен';
            redirect(PATH . 'petitions');
        } else {
            $_SESSION['error'] = 'Комментарий не оставлен';
            redirect(PATH . 'petitions');
        }
    }

    public function showComments()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 5;
        $count = \R::count('comments');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $comments = \R::getAll("SELECT
                                    `comments`.`id`,
                                    `comments`.`user_id` = `users`.`id`,
//                                    `comments`.`petitions_id` = `petitions`.`id`,
                                    `comments`.`created`,                                 
                                    `comments`.`text`,                                 
                                    `comments`.`parent`,
                                    `users`.`id`,
                                    `petitions`.`id`                                 
                                    FROM `comments` AS c 
                                    JOIN `users` AS u 
                                    ON c.`user_id` = u.`id` 
                                    JOIN `petitions` AS p
                                    ON c.`petitions`.`id` = p.`id`
                                    WHERE `c`.`petition_id` = `p`.`id` 
                                    LIMIT $start, $perpage");
        $users = \R::getRow("SELECT `users`.* from `users` ");
        $petitions = \R::getRow("SELECT `petitions`.* from `petitions` ");

        $this->set(compact('petitions','users', 'pagination', 'count', 'comments'));
        debug($comments);
    }

    public function getIds($id){
        $comments = App::$app->getProperty('comments');
        $ids = null;
        foreach($comments as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= $k . ',';
                $ids .= $this->getIds($k);
            }
        }
        return $ids;
    }
}