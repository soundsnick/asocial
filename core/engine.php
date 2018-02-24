<?php
    class engine{
        public static function render($page){
            $loginNeeded = array(
                '',
                'settings',
                'feed',
                'messages',
                'logout'
            );
            if(array_search($page, $loginNeeded) != null){
                if(logged()) require_once('views/'.$page.'_view.php');
                else header("Location: /login/msg/needAuth");
            }
            else require('views/'.$page.'_view.php');
        }
    }
    $engine = new engine;
?>