<?php

abstract class AbstractModel {
    protected static $db, $config;
    
    public function __construct() {
        $this->init();
    }

    // Set up this way so that static methods can have the same access to these variables
    protected static function init() {
        global $db, $config;
        self::$db = $db;
        self::$config = $config;
    }

    // Set up functions for saving models
    public function save() {
        $this->validate();
        try {
            if(isset($this->id)) {
                $this->update();
            } else {
                $this->add();
            }
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
    protected abstract function validate();
    protected abstract function update();
    protected abstract function add();
}