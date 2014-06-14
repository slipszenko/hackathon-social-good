<?php

class Messages {
    private static function initMessages() {
        if(!isset($_SESSION['messages'])) {
            $_SESSION['messages'] = array();
        }
    }

    public static function getMessages() {
        self::initMessages();
        $messages = $_SESSION['messages'];
        $_SESSION['messages'] = array();
        return $messages;
    }

    public static function addErrorMessage($text) {
        self::addMessage('error', $text);
    }

    public static function addSuccessMessage($text) {
        self::addMessage('success', $text);
    }

    public static function addWarningMessage($text) {
        self::addMessage('warning', $text);
    }

    public static function addInfoMessage($text) {
        self::addMessage('info', $text);
    }

    private static function addMessage($class, $text) {
        self::initMessages();
        $_SESSION['messages'][] = array(
            'class' => $class,
            'text' => $text
        );
    }
}