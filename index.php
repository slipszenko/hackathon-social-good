<?php
// Load settings
require('includes/config.php');

// Connect to the database, setup autoloader, etc.
require('includes/header.php');

// Set up the router
$router = new AltoRouter();

// Front router
$router->map('GET', '/', 'Front#home', 'home');

$router->map('GET|POST', '/account/facebookRedirect/', 'Account#facebookRedirect', 'facebookRedirect');
$router->map('GET|POST', '/account/logout/', 'Account#logout', 'logout');
$router->map('GET|POST', '/stuff/', 'Front#stuff', 'stuff');

$router->map('GET|POST', '/activities/', 'Front#activities', 'activities');
$router->map('GET|POST', '/activities/[i:id]', 'Front#activityprofile', 'activityprofile');
$router->map('GET|POST', '/profile/[i:id]', 'Front#userProfile', 'profile');
$router->map('GET|POST', '/wall/', 'Front#wall', 'wall');
$router->map('GET', '/register/', 'Front#register', 'registerform');
$router->map('POST', '/register/', 'Front#register', 'registerparse');


$router->map('GET|POST', '/api/v1/conference', 'APIV1#conference', 'apiConference');

// Catch all error route
$router->map('GET|POST', '*', 'ErrorPages#show404', 'show404');

// Match the request and dispatch it
$match = $router->match();
$dispatchParts = explode('#', $match['target']);
$match['controller'] = $dispatchParts[0] . 'Controller';
$match['view'] = $dispatchParts[1];
$reflectionMethod = new ReflectionMethod($match['controller'], $match['view']);
$reflectionMethod->invokeArgs(new $match['controller'](), $match['params']);

// Close database connection, etc.
require('includes/footer.php');