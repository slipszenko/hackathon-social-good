<?php
function main_autoloader($className) {
    if(!class_exists($className, FALSE)) {
        if(stripos($className, 'Controller') !== FALSE
            && file_exists('controllers/' . $className . '.class.php')) {
            // Class is a controller
            require('controllers/' . $className . '.class.php');
        } elseif(stripos($className, 'Exception') !== FALSE
            && file_exists('exceptions/' . $className . '.class.php')) {
            // Class is a controller
            require('exceptions/' . $className . '.class.php');
        } elseif(file_exists('models/' . $className . '.class.php')) {
            // Class is a model
            require('models/' . $className . '.class.php');
        } elseif(file_exists('classes/' . $className . '.class.php')) {
            // Any other class
            require('classes/' . $className . '.class.php');
        }
    }
}
spl_autoload_register('main_autoloader');