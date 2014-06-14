<?php

class ErrorPagesController extends AbstractController {

    public static function show404() {
        self::$smarty->display('errors/404.tpl');
        die();
    }
}