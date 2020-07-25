<?php

namespace app\controllers;

use app\models\AppModel;
use myvote\App;
use myvote\base\Controller;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('comments', self::getComments());
    }

    public function getRequestID($get = true, $id = 'id')
    {
        if ($get){
            $data = $_GET;
        } else {
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Страница не найдена', 404);
        }
        return $id;
    }

    public static function getComments(){
        $comments = \R::getAssoc("SELECT * FROM comments");
        return $comments;
    }
}