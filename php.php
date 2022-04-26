<?php
    require './functions.php';

    $params = explode('/',$_SERVER['PATH_INFO']);

    if ($params[1] == 'api' && $params[2] == 'redis') {
        echo (!isset($params[3])) ? index() : delete($params[3]);
    }

    else echo error('Error 500');


?>