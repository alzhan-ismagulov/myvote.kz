<?php

namespace app\controllers;
use app\models\Feedback;

class FeedbackController extends AppController
{
    public function createAction()
    {
        $feedback = new Feedback();
        $feedback->message();
    }
}