<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsFunction
 */


// Function to go through the template replacing all content groups with the appropriate pieces of content
function smarty_function_reverser($params, $template) {
    global $router;
    if(isset($params['options'])) {
        return $router->generate($params['name'], $params['options']);
    } else {
        return $router->generate($params['name']);
    }
}