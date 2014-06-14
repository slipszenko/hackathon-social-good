<?php

abstract class AbstractController {
    protected static $db, $smarty, $config, $router, $match, $user;
    
    public function __construct() {
        global $smarty, $config, $router, $match;
        self::$smarty = $smarty;
        self::$config = $config;
        self::$router = $router;
        self::$match = $match;

        // If the user is set, try to create them
        if(isset($_SESSION['userID'])) {
            $userID = intval($_SESSION['userID']);
            self::$user = new User($userID);
            self::$smarty->assign('user', self::$user);
        }
    }
}