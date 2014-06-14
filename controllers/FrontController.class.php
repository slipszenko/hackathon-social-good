<?php

use Facebook as F;

class FrontController extends AbstractController {

    public function home() {
        if(!isset($_SESSION['user'])) {
            $helper = new F\FacebookRedirectLoginHelper(
                'http://inspira-t.projectcatalan.com'.
                self::$router->generate('facebookRedirect')
            );
            self::$smarty->assign('loginURL', $helper->getLoginUrl());
            self::$smarty->display('front/login.tpl');
        } else {
            $session = unserialize($_SESSION['user']);
            $request = new F\FacebookRequest($session, 'GET', '/me');
            $response = $request->execute();
            $user = $response->getGraphObject();

            self::$smarty->assign('name', $user->getProperty('name'));
            self::$smarty->display('front/home.tpl');
        }
    }

    public static function stuff() {
        self::$smarty->display('front/stuff.tpl');
    }

    public static function activities(){

    }

    public static function activityprofile($id){

    }

    public static function profile($id){

    }
}