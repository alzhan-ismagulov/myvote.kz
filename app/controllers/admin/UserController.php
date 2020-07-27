<?php

namespace app\controllers\admin;

use app\models\User;
use myvote\libs\Pagination;

class UserController extends AppController
{
    public function loginAdminAction()
    {
        if (!empty($_POST)){
            $user = new User();
            if(!$user->login(true)){
                $_SESSION['error'] = 'Логин или пароль введены неверно';
            }
            if(User::isAdmin()){
                redirect(ADMIN);
            } else {
                redirect();
            }
        }
        $this->layout = 'login';
    }

    public function indexAction()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 20;
        $count = \R::count('users');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $users = \R::getAll("SELECT 
                                        `users`.`id`,  
                                        `users`.`login`,  
                                        `users`.`surname`, 
                                        `users`.`name`, 
                                        `users`.`middle_name`, 
                                        `users`.`email`, 
                                        `users`.`phone`, 
                                        `users`.`gender`, 
                                        `users`.`age`, 
                                        `users`.`profession`, 
                                        `users`.`city`, 
                                        `users`.`role`, 
                                        `users`.`status`, 
                                        `users`.`created`, 
                                        `users`.`modified`, 
                                        `users`.`ip`
                                        FROM `users`
                                        GROUP BY `users`.`id`
                                        ORDER BY `users`.`id`, `users`.`created`
                                        LIMIT $start, $perpage");
        $status = \R::getRow('SELECT `status`.*
                                  FROM `status`');

        $this->setMeta('Список пользователей');
        $this->set(compact('users', 'pagination', 'count', 'status'));
    }

    public function viewAction(){
        $user_id = $this->getRequestID();
        $user = \R::getRow('SELECT `users`.`id`,
                                        `users`.`login`,
                                        `users`.`surname`,
                                        `users`.`name`,
                                        `users`.`middle_name`,
                                        `users`.`email`,
                                        `users`.`phone`,
                                        `users`.`gender`,
                                        `users`.`age`,
                                        `users`.`profession`,
                                        `users`.`city`,
                                        `users`.`role`,
                                        `users`.`status`,
                                        `users`.`created`,
                                        `users`.`modified`,
                                        `users`.`ip`
                                FROM `users`
                                WHERE `users`.`id`
                                LIKE ?
                                LIMIT 1', [$user_id]);
        $status = \R::getAll("SELECT * FROM `status`");
        if (!$user){
            throw new \Exception('Страница не найдена', 404);
        }
        $this->setMeta("Пользователь №{$user_id}");
        $this->set(compact('user', 'status'));
    }

    public function changeStatusAction()
    {
        $user_id = $this->getRequestID();
        $status = ($_GET['status']);
        $users = \R::load('users', $user_id);
        if (!$users){
            throw new \Exception('Страница не найдена', 404);
        }
        $users->status = $status;
        $users->modified = date("Y-m-d H:i:s");
        \R::store($users);
        $_SESSION['success'] = 'Изменения сохранены';
        redirect(ADMIN . '/user');
    }

    public function changeRoleAction()
    {
        $user_id = $this->getRequestID();
        $role = ($_GET['role']);
        $users = \R::load('users', $user_id);
        if (!$users){
            throw new \Exception('Страница не найдена', 404);
        }
        $users->role = $role;
        $users->modified = date("Y-m-d H:i:s");
        \R::store($users);
        $_SESSION['success'] = 'Изменения сохранены';
        redirect(ADMIN . '/user');
    }

    public function editAction()
    {
        if(!empty($_POST)) {
            $login = $_SESSION['user']['login'];
            $user = \R::findOne('users', 'login = ?', [$login]);
            $user->login = $_SESSION['user']['login'];
            $user->surname = $_POST['surname'];
            $user->name = $_POST['name'];
            $user->phone = $_POST['phone'];
            $user->age = $_POST['age'];
            $user->profession = $_POST['profession'];
            $user->city = $_POST['city'];
            $password = h($_POST['password']);
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->modified = date('Y-m-d H:i:s');
            $ip = $_SERVER['REMOTE_ADDR'];
            $user->attributes['ip'] = $ip;
            if (\R::store($user)) {
                $_SESSION['success'] = 'Ваш профиль обновлен!';
                redirect(ADMIN . '/user/view?id='. $user['id']);
            } else {
                $_SESSION['error'] = 'Не удалось обновить профиль!';
                redirect('');
            }
        }

        $user_id = $this->getRequestID();
        $user = \R::getRow('SELECT `users`.`id`,
                                        `users`.`login`,
                                        `users`.`surname`,
                                        `users`.`name`,
                                        `users`.`middle_name`,
                                        `users`.`email`,
                                        `users`.`phone`,
                                        `users`.`gender`,
                                        `users`.`age`,
                                        `users`.`profession`,
                                        `users`.`city`,
                                        `users`.`role`,
                                        `users`.`status`,
                                        `users`.`created`,
                                        `users`.`modified`,
                                        `users`.`ip`
                                FROM `users`
                                WHERE `users`.`id`
                                LIKE ?
                                LIMIT 1', [$user_id]);
        if (!$user){
            throw new \Exception('1Страница не найдена', 404);
        }

        $this->setMeta("Редактирование пользователя");
        $this->set(compact('user'));
    }

    public function deleteAction()
    {
        $user_id = $this->getRequestID();
        $users = \R::load('users', $user_id);
        \R::trash($users);
        $_SESSION['success'] = 'Пользователь удален';
        redirect(ADMIN . '/user');
    }
}