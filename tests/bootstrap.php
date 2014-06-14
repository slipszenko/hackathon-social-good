<?php
// Load settings
require('includes/config.php');

// Connect to the database, setup autoloader, etc.
require('includes/header.php');
unset($db); // Remove the main DB connection

// Override the database connection with the test database
$db = new PDO('mysql:host=' . $config['testdatabase']['host'] . ';dbname=' . $config['testdatabase']['name'],
    $config['testdatabase']['user'],
    $config['testdatabase']['pass'],
    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
);

// Replace all tables with empty DB
$dbResetQuery = $db->prepare(file_get_contents('startdb.sql'));
$dbResetQuery->execute();