<?php

abstract class LoggedInAbstractController extends AbstractController {
    
    public function __construct() {
        parent::__construct();

        // Check that the user is logged in
        if(!isset($_SESSION['loggedInUser'])) {
            Messages::addInfoMessage('You must be logged in to view this page.');
            $loginLocation = self::$router->generate('login');
            header('Location: ' . $loginLocation . '?next=' . $_SERVER['REQUEST_URI']);
            die();
        }
    }
}