<?php
/**
 * Smarty plugin
 * 
 * @package Smarty
 * @subpackage PluginsFunction
 */


// Function to go through the template replacing all content groups with the appropriate pieces of content
function smarty_function_messages($params, $template) {
    $messageHTML = '';
    foreach(Messages::getMessages() as $message) {
        $messageHTML .= '<div class="alert alert-' . $message['class'] . '">' . $message['text'] . '</div>';
    }
    return $messageHTML;
}