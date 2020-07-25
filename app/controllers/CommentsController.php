<?php

namespace app\controllers;

use app\models\Comments;

class CommentsController extends AppController
{
    public function createAction()
    {
        $comments = new Comments();
        $comments->create();
    }

    public function showAction()
    {
        $comments = new Comments();
        $comments->showComments();
    }
}