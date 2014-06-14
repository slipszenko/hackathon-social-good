<?php

class User extends AbstractModel {
    public $id, $facebookID, $name, $description, $picture;

    public function __construct($userID = null) {
        parent::__construct();
        $this->id = intval($userID);

        $userQuery = self::$db->prepare('SELECT * FROM users WHERE id = ?');
        $userQuery->execute(array($this->id));
        if($userQuery->rowCount() == 0) {
            throw new NoSuchException('User doesn\'t exist.');
        } else {
            $userInfo = $userQuery->fetch(PDO::FETCH_ASSOC);
            $this->facebookID = $userInfo['facebook_id'];
            $this->name = $userInfo['name'];
            $this->description = $userInfo['location'];
            $this->picture = $userInfo['picture'];
        }
    }

    protected function validate() { return FALSE; }
    protected function add() { return FALSE; }
    protected function update() { return FALSE; }

    // Factory methods
    public static function getAll() {
        self::init();
        $userQuery = self::$db->query('SELECT id FROM users ORDER BY id DESC');
        $users = array();
        while($row = $userQuery->fetch(PDO::FETCH_ASSOC)) {
            $users[] = new User($row['id']);
        }
        return $users;
    }

    public static function getByFacebookID($fbID) {
        self::init();
        $userQuery = self::$db->prepare('SELECT id FROM users WHERE facebook_id = ?');
        $userQuery->execute(array($fbID));
        if($userQuery->rowCount() == 0) {
            throw new NoSuchException('No user for this Facebook ID');
        }
        $row = $userQuery->fetch(PDO::FETCH_ASSOC);
        return new User($row['id']);
    }
}