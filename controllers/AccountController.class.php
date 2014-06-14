<?php

use Facebook as F;

class AccountController extends AbstractController {

    public static function facebookRedirect() {
        $helper = new F\FacebookRedirectLoginHelper(
            'http://inspira-t.projectcatalan.com'.
            self::$router->generate('facebookRedirect')
        );
        try {
            $session = $helper->getSessionFromRedirect();
        } catch(FacebookRequestException $ex) {
            // When Facebook returns an error
            die($ex->getMessage());
        } catch(\Exception $ex) {
            // When validation fails or other local issues
            die($ex->getMessage());
        }
        if($session) {
            // Logged in
            $_SESSION['user'] = serialize($session);

            $request = new F\FacebookRequest($session, 'GET', '/me');
            $response = $request->execute();
            $userObj = $response->getGraphObject();
            try {
                $user = User::getByFacebookID($userObj->getProperty('id'));
            } catch(NoSuchException $e) {
                // Register a new user
                $user = null;
            }
            //$_SESSION['userID'] = $user->id;

            header('Location: ' . self::$router->generate('home'));
        } else {
            echo 'Login error (who cares, this is a hack together...)';
        }
    }

    public static function logout() {
        unset($_SESSION['user']);
        header('Location: ' . self::$router->generate('home'));
    }
}