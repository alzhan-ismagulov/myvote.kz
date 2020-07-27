<?php
    function debug($arr, $die = false){
        echo '<pre>' . print_r($arr, true) . '</pre>';
        if($die) die;
    }

//    Дерево в HTML
    function comments_to_string($comments){
        foreach ($data as $item){
            $string .= comments_to_template($item);
        }
        return $string;
    }

    function comments_to_template($comments){
        ob_start();
        include 'comment_template.php';
        return ob_get_clean();
    }

    function redirect($http = false){
        if($http){
            $redirect = $http;
        }else{
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }
        header("Location: $redirect");
        exit;
    }

    function h($str){
        return htmlspecialchars($str, ENT_QUOTES);
    }

    function alertMessage()
    {
        if (isset($_SESSION['error'])) {
            echo '<div id="messageBox" class="alert alert-danger alert-dismissible" role="alert">';
            echo $_SESSION['error'];
            unset($_SESSION['error']);
//                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
            echo '</div>';
        } else {
            if (isset($_SESSION['success'])) {
                echo '<div id="messageBox" class="alert alert-success alert-dismissible" role="alert">';
                echo $_SESSION['success'];
                unset($_SESSION['success']);
//                echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
                echo '</div>';
            }
        }
    }

    function mapTree($dataset){
        $tree = array();
        foreach ($dataset as $id => &$node){
            if(!$node['parent']){
                $tree[$id] = &$node;
            } else {
                $dataset[$node['parent']]['childs']['id'] = &$node;
            }
        }
        return $tree;
    }
    function restrictArea(){
        if (!isset($_SESSION['user'])){
            $_SESSION['error'] = 'Вам нужно войти в систему';
            redirect('/');
        }
    }