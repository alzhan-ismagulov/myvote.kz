<?php

namespace app\controllers\admin;
use myvote\libs\Pagination;

class FeedbackController extends AppController
{
    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 20;
        $count = \R::count('feedback');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $feedback = \R::getAll("SELECT
                                        `feedback`.`id`,               
                                        `feedback`.`name`,               
                                        `feedback`.`last_name`,               
                                        `feedback`.`email`,               
                                        `feedback`.`created`
                                        FROM `feedback` 
                                        ORDER BY `feedback`.`id`
                                        LIMIT $start, $perpage");
//        if (!$feedback){
//            throw new \Exception('Страница не найдена', 404);
//        }

        $this->setMeta("Страница отзывов");
        $this->set(compact('feedback', 'count', 'pagination'));
    }

    public function viewAction()
    {
        $feedback_id = $this->getRequestID();
        $feedback = \R::getRow("SELECT 
                                        `feedback`.`id`,               
                                        `feedback`.`name`,               
                                        `feedback`.`last_name`,               
                                        `feedback`.`text`,               
                                        `feedback`.`email`,               
                                        `feedback`.`created`
                                        FROM `feedback`
                                        WHERE `feedback`.`id` = $feedback_id
                                LIMIT 1");
        if (!$feedback){
            throw new \Exception('Страница не найдена', 404);
        }
        $this->setMeta("Отзыв №{$feedback_id}");
        $this->set(compact('feedback'));
    }

    public function deleteAction()
    {
        $feedback_id = $this->getRequestID();
        $feedback = \R::load('feedback', $feedback_id);
//        debug($feedback);
        \R::trash($feedback);
        $_SESSION['success'] = 'Отзыв удален';
        redirect(PATH. 'admin/feedback');
    }
}