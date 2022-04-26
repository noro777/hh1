#!/usr/bin/php
<?php
require 'functions.php';

if(isset($argv[4])){
    addRedis($argv[3],$argv[4]);
    return;
}

delete($argv[3]);

?>