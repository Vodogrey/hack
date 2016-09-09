<?php
define('MYSQL_SERVER','');//сервер
define('MYSQL_USER','');//главный пользователь БД
define('MYSQL_PASSWORD','');//паролль пользователя
define('MYSQL_DB','');//название БД к которой подключаемся

function db_connect(){
    $link = mysql_connect(MYSQLI_SERVER_PS_OUT_PARAMS, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
        or die("Error: ".mysql_error($link));
    if(!mysql_set_charset($link, "utf8")){
        printf("Error: ".mysql_error($link));
    }
    return $link;
}

?>