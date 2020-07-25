<?php

namespace app\controllers;

use myvote\libs\Pagination;

class SearchController extends AppController
{
    public function indexAction()
    {
        if (!$_POST) {
            $_SESSION['error'] = 'Вы ничего ещё не искали';
            redirect('/');
        } else {
            if (isset($_POST)) {
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $perpage = 10;
                $count = \R::count('petitions');
                $pagination = new Pagination($page, $perpage, $count);
                $start = $pagination->getStart();
                $query = h($_POST['search']);
//            debug($_POST);
                $petitions = \R::getAll('SELECT id, title FROM petitions WHERE title LIKE ? LIMIT 9', ["%{$query}%"]);
                if (!$petitions) {
                    $_SESSION['error'] = 'Ничего не найдено';
                    redirect('/');
                }
            }
        }

        $this->setMeta('Поиск петиций');
        $this->set(compact('petitions', 'pagination', 'count'));
    }
}