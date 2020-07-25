<?php


namespace app\models;


class Vote extends AppModel
{
    public $attributes = [
        'id' => '',
        'petition_id' => '',
        'user_id' => '',
    ];

    public function voting()
    {
        if($_POST){
            $vote = new Vote();
            $data = $_POST;
            $vote->load($data);
            $vote->save('vote');
        }
        $_SESSION['success'] = 'Вы проголосовали!';
        redirect(PATH.'petitions');
    }
}