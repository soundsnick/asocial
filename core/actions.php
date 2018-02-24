<?php 
if(isset($action) && $action != null){
    switch($action){
        case 'msg':
            if(isset($msg[$route->parameters($url)])){
                $message = $components_messagers->msg($msg[$route->parameters($url)], null);
            }
            break;
    }
}
?>