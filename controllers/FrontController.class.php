<?php

class FrontController extends AbstractController {

    public function home() {
        self::$smarty->display('front/home.tpl');
    }
}