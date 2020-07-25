<?php

namespace app\models;

use myvote\libs\Pagination;

class Feedback extends AppModel
{
    public $attributes = [
        'name' => '',
        'first_name' => '',
        'email' => '',
        'text' => '',
    ];

    public function message()
    {
        if ($_POST){
//            $feedback = new Feedback();
            $feedback = \R::dispense('feedback');
            $feedback->name = $_POST['name'];
            $feedback->last_name = $_POST['last_name'];
            $feedback->email = $_POST['email'];
            $feedback->text = $_POST['text'];
            $feedback->created = date('Y-m-d H:i:s');
            if (\R::store($feedback)) {
                $_SESSION['success'] = 'Сообщение отправлено!';
                redirect('/');
            } else {
                $_SESSION['error'] = 'Не удалось отправить сообщение!';
                redirect('/');
            }
        }
    }

    public function index()
    {
        $feedback = new Feedback();
    }
}