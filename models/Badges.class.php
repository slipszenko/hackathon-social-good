<?php

class Badges extends AbstractModel {
    public $id, $name, $description, $picture;

    public function __construct($badgeID = null) {
        parent::__construct();
        $this->id = intval($badgeID);

        $badgeQuery = self::$db->prepare('SELECT * FROM badges WHERE id = ?');
        $badgeQuery->execute(array($this->id));
        if($badgeQuery->rowCount() == 0) {
            throw new NoSuchException('Badge doesn\'t exist.');
        } else {
            $badgeInfo = $badgeQuery->fetch(PDO::FETCH_ASSOC);
            $this->name = $badgeInfo['name'];
            $this->description = $badgeInfo['location'];
            $this->picture = $badgeInfo['picture'];
        }
    }

    protected function validate() { return FALSE; }
    protected function add() { return FALSE; }
    protected function update() { return FALSE; }

    // Factory methods
    public static function getAll() {
        self::init();
        $badgeQuery = self::$db->query('SELECT id FROM badges ORDER BY id DESC');
        $badges = array();
        while($row = $badgeQuery->fetch(PDO::FETCH_ASSOC)) {
            $badges[] = new Badge($row['id']);
        }
        return $badges;
    }
}