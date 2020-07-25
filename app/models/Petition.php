<?php

namespace app\models;

use myvote\libs\Pagination;

class Petition extends AppModel
{
    public $attributes = [
        'title' => '',
        'description' => '',
        'text' => '',
        'user' => '',
        'destination' => ''
    ];

    public function create()
    {
        restrictArea();
        if (!empty($_POST)) {
            $petition = new Petition();
            $data = $_POST;
            $petition->load($data);
            if (!$petition->checkUniquePetition()) {
                $_SESSION['error'] = 'Петиция с таким названием уже существует';
                redirect();
            } else {
                $petition = \R::dispense('petitions');
                $petition->title = $_POST['title'];
                $petition->description = $_POST['description'];
                $petition->text = $_POST['text'];
                $petition->destination = $_POST['destination'];
                $petition->user = $_SESSION['user']['id'];

                $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['userfile']['name'])); // расширение
                // картинки
                $types = array("image/gif", "image/png", "image/jpeg", "image/pjpeg", "image/x-png"); // массив допустимых расширений
                if ($_FILES['userfile']['size'] > 1048576) {
                    $_SESSION['error'] = "Ошибка. максимальный размер файла 1Мб!";
                    redirect();
                }
                if ($_FILES['userfile']['error']) {
                    $_SESSION['error'] = "Ошибка. Добавьте фотографию для петиции";
                    redirect();
                }
                if (!in_array($_FILES['userfile']['type'], $types)) {
                    $_SESSION['error'] = "Dopustimye sarshireniya - .gif, .jpg, .png";
                    redirect();
                }
                $uploaddir = WWW . '/images/';
                $new_name = md5(time()) . ".$ext";
                $uploadfile = $uploaddir . $new_name;
                $petition->image = $new_name;
                move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
                if (\R::store($petition)) {
                    $_SESSION['success'] = 'Петиция подана успешно. Ожидайте одобрения администратором';
                } else {
                    $_SESSION['error'] = 'Петиция была создана неверно';
                }
                redirect(PATH . 'petitions');
            }
        }
    }

    public function edit()
    {
        restrictArea();
        if (!empty($_POST)) {
            $petition = new Petition();
            $data = $_POST;
            $petition->load($data);
            if (!$petition->checkUniquePetition()) {
                $_SESSION['error'] = 'Петиция с таким названием уже существует. Измените название петиции';
                redirect();
            } else {
                $petition_id = $_POST['id'];
                $petition = \R::findOne('petitions', 'id = ?', [$petition_id]);
                $petition->title = $_POST['title'];
                $petition->description = $_POST['description'];

                $petition->text = $_POST['text'];
                $petition->destination = $_POST['destination'];
                $petition->modified = date('Y-m-d H:i:s');
                if (\R::store($petition)) {
                    $_SESSION['success'] = 'Ваш петиция обновлена!';
                    redirect(PATH . 'user/viewPetition?id=' . $petition['id']);
                } else {
                    $_SESSION['error'] = 'Не удалось обновить петицию!';
                    redirect('');
                }
            }
        }
    }

    public function deleteAction()
    {
        restrictArea();
        $petition_id = $this->$_SESSION['id'];
        $petitions = \R::load('petitions', $petition_id);
        $petitions->status = 'Удалена';
        \R::store($petitions);
        $_SESSION['success'] = 'Петиция удалена';
        redirect(ADMIN . '/petitions');
    }

    public function checkUniquePetition()
    {
        $petition = \R::findOne('petitions', 'title = ?', [$this->attributes['title']]);
        if ($petition) {
            if ($petition->title == $this->attributes['title']) {
                $this->errors['unique'][] = 'Петиция с таким названием уже существует';
            }
            return false;
        }
        return true;
    }
}