<?php
define('MYSQL_SERVER' , 'localhost');
define('MYSQL_USER' , 'root');
define('MYSQL_PASSWORD' , '');
define('MYSQL_DB', 'asocial');

$mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
if ($mysqli->connect_error) {
    die("<span class='message'>
            <div class='message__icon'><i class='fa fa-excapable'></i></div>
            <div>Сервер не отвечает. Проверьте подключение к интернету</div>
        </span>");
}
if (!$mysqli->set_charset("utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", $mysqli->error);
    exit();
}