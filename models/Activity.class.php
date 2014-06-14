<?php

class Activity extends AbstractModel {
    public $id, $name, $location, $category, $picture;

    public function __construct($activityID = null) {
        parent::__construct();
        $this->id = intval($activityID);

        $activityQuery = self::$db->prepare('SELECT * FROM activities WHERE id = ?');
        $activityQuery->execute(array($this->id));
        if($activityQuery->rowCount() == 0) {
            throw new NoSuchException('Activity doesn\'t exist.');
        } else {
            $actInfo = $activityQuery->fetch(PDO::FETCH_ASSOC);
            $this->name = $actInfo['name'];
            $this->location = $actInfo['location'];
            $this->category = $actInfo['category'] == 1;
            $this->picture = $actInfo['picture'];
        }
    }

    protected function validate() { return FALSE; }
    protected function add() { return FALSE; }
    protected function update() { return FALSE; }

    // Factory methods
    public static function getAll() {
        self::init();
        $activityQuery = self::$db->query('SELECT id FROM activities ORDER BY id DESC');
        $activities = array();
        while($row = $activityQuery->fetch(PDO::FETCH_ASSOC)) {
            $activities[] = new Activity($row['id']);
        }
        return $activities;
    }
}