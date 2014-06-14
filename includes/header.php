<?php
// We will use session
session_start();

// Make sure that the abstract controller is always available
require('controllers/AbstractController.class.php');

// Set up a connection to the database
$db = new PDO('mysql:host=' . $config['database']['host'] . ';dbname=' . $config['database']['name'],
    $config['database']['user'],
    $config['database']['pass'],
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

// Import libraries through composer
require('vendor/autoload.php');

// Include the Smarty class for templating
$smarty = new Smarty;
$smarty->setTemplateDir('templating/templates');
$smarty->setCompileDir('templating/templates_c');
$smarty->setCacheDir('templating/cache');
$smarty->setConfigDir('templating/configs');

// Timezone must be set for strtotime() usage
date_default_timezone_set('Europe/London');

// Pull in the autoloaders for internal files
require('includes/autoloader.php');

// Add in the messages plug in
require('includes/smarty-plugins/function.messages.php');
$smarty->registerPlugin('function', 'messages', 'smarty_function_messages');
require('includes/smarty-plugins/function.reverser.php');
$smarty->registerPlugin('function', 'reverser', 'smarty_function_reverser');

Facebook\FacebookSession::setDefaultApplication($config['fb']['id'], $config['fb']['secret']);