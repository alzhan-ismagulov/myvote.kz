<?php

namespace app\controllers;

use app\models\User;
use myvote\libs\Pagination;

class UserController extends AppController {

    public $layout = 'user';

    public function indexAction()
    {
        restrictArea();
        $page = isset($_GET['page']) ? (int)$_GET['page'] :1;
        $perpage = 20;
        $count = \R::count('petitions');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();
        $user_id = $_SESSION['user']['id'];
        $petitions = \R::getAll("SELECT * FROM `petitions` WHERE `user` = ? ORDER BY `petitions`.`id` LIMIT $start, $perpage",
            [$user_id]);
        $this->setMeta('Личный кабинет');
        $this->set(compact('petitions', 'pagination', 'count'));
    }

    public function editAction()
    {
        restrictArea();
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
            $user->attributes['status'] = $_SESSION['user']['status'];
            $password = h($_POST['password']);
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->modified = date('Y-m-d H:i:s');
            $ip = $_SERVER['REMOTE_ADDR'];
            $user->attributes['ip'] = $ip;
            if (\R::store($user)) {
                $_SESSION['success'] = 'Ваш профиль обновлен!';
                redirect(PATH . 'user/profile');
            } else {
                $_SESSION['error'] = 'Не удалось обновить профиль!';
                redirect('');
            }
        }
        $user_id = $_SESSION['user']['id'];
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
            throw new \Exception('Страница не найдена', 404);
        }

        $this->setMeta("Редактирование пользователя");
        $this->set(compact('user'));
    }

    public function viewPetitionAction()
    {
        restrictArea();
        $petition_id = $_GET['id'];
        $user = $_SESSION['user']['id'];
        $petition = \R::getRow("SELECT
                                            `petitions`.`id`,
                                            `petitions`.`title`,
                                            `petitions`.`description`,
                                            `petitions`.`text`,
                                            `petitions`.`destination`,
                                            `petitions`.`user` = `users`.`id`,
                                            `petitions`.`created`,
                                            `petitions`.`modified`,
                                            `petitions`.`status`,
                                            `petitions`.`image`,
                                            `users`.`id` = $user
                                FROM `petitions` 
                                JOIN `users`
                                ON `petitions`.`user` = `users`.`id`
                                WHERE `petitions`.`id` = $petition_id
                                AND `users`.`id` = $user
                                LIMIT 1");

        $users = \R::getAll("SELECT * FROM `users`");
        if (!$petition) {
            $_SESSION['error'] = 'Просмотр чужих петиций не доступен в личном кабинете.';
            redirect(PATH . 'petitions');
        } else {
            $countVouting = \R::count('vote', 'petition_id = ?', [$petition_id]);
            $this->setMeta("Петиция №{$petition_id}");
            $this->set(compact('petition', 'users', 'countVouting'));
        }
    }

    public function profileAction()
    {
        restrictArea();
        $user_id = $_SESSION['user']['id'];
        $user = \R::getRow('SELECT `users`.* 
                                FROM `users`
                                WHERE `users`.`id` 
                                LIKE ? 
                                LIMIT 1', [$user_id]);
        if (!$user){
            throw new \Exception('Страница не найдена', 404);
        }

        $this->set(compact('user'));
        $this->setMeta('Профиль пользователя');
    }

    public function signupAction(){
        $user = new User();
        $user->signup();
        $this->setMeta('Регистрация');
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new User();
            if($user->login()){
                if(User::isAdmin()){
                    $_SESSION['success'] = 'Вы успешно авторизованы';
                    redirect(ADMIN);
                } else {
                    $_SESSION['success'] = 'Вы успешно авторизованы';
                    redirect(PATH . 'user');
                }
            }else{
                $_SESSION['error'] = 'Логин/пароль введены неверно';
                redirect('/');
            }
        }
        $this->setMeta('Вход');
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect('/');
    }

    public function activationAction()
    {
        $user = new User();
        $user->activation();
    }

    public function recoverAction()
    {
        $user = new User();
        $user->recover();
        $this->setMeta('Восстановление пароля');
    }

    public function updatepassAction()
    {
        $user = new User();
        $user->updatepass();
        $this->setMeta('Обновление пароля');
    }
}