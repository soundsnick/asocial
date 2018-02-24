<?php
    function logged(){
        if(isset($_SESSION['auth']) && $_SESSION['auth'] != null){
            return true;
        }
        else return false;
    }
    $pageTitles = array(
        'login' => 'Войти'
    );
    $title = '';
    if(isset($pageTitles[$page])){
        $title = $pageTitles[$page];
    }
    $project = array(
        'name' => 'Monius',
        'title' => $title
    );
    $msg = array(
        'needAuth' => 'Вы должны войти чтобы увидеть эту страницу',
    );
?>