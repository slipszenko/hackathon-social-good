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
            
            self::$smarty->display('front/home.tpl');
        }
    }
}