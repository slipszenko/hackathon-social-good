<?php
require('vender/autoload.php');

require('config.php');

FacebookSession::setDefaultApplication($config['fb']['id'], $config['fb']['secret']);
?>

Hello, world