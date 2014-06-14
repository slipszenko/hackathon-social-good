<?php

class APIV1Controller extends AbstractController {

    public static function conference() {
        $response = '<?xml version="1.0"?>';
        $response .= '<Response><Dial><Conference>Room Inspira-t</Conference></Dial></Response>';
        header('Content-type: text/xml');
        echo $response;
    }
}