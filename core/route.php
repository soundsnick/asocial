<?php
    class route{
        public static function page($url){
            $page = explode('/', $url)[1];
            if($page == null) $page = 'index';
            if(file_exists('views/'.$page.'_view.php')){
                return $page;
            }
            else header("Location: /404");
        }
        public static function action($url){
            if(isset(explode('/', $url)[2])){
                $action = explode('/', $url)[2];
                return $action;
            }
            else return null;
        }
        public static function parameters($url){
            if(isset(explode('/', $url)[3])){
                $action = explode('/', $url)[3];
                return $action;
            }
            else return null;
        }
    }
    $url = $_SERVER['REQUEST_URI'];
    $route = new route;
    $page = $route->page($url);
    $action = $route->action($url);
?>