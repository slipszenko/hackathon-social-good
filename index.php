<?php
require('vendor/autoload.php');

require('config.php');

FacebookSession::setDefaultApplication($config['fb']['id'], $config['fb']['secret']);


$helper = new FacebookRedirectLoginHelper('your redirect URL here');
$loginUrl = $helper->getLoginUrl();


?>
<a href="<?=$loginUrl?>">Facebook Login</a>

Hello, world