<?php

class Activity extends AbstractModel {
    public $id, $name, $description, $startDate, $endDate, $location, $latitude, $longitude, $category, $picture;

    public function __construct($activityID) {
        parent::__construct();
        $this->id = intval($activityID);

        $activityQuery = self::$db->prepare('SELECT * FROM activities WHERE id = ?');
        $activityQuery->execute(array($this->id));
        if($activityQuery->rowCount() == 0) {
            throw new NoSuchException('Activity doesn\'t exist.');
        } else {
            $actInfo = $activityQuery->fetch(PDO::FETCH_ASSOC);
            $this->name = $actInfo['name'];
            $this->startDate = $actInfo['start_date'];
            $this->endDate = $actInfo['end_date'];
            $this->location = $actInfo['location'];
            $this->latitude = $actInfo['latitude'];
            $this->longitude = $actInfo['longitude'];
            $this->category = $actInfo['category'];
            $this->picture = $actInfo['picture'];
            $this->description = $actInfo['description'];
        }
    }

    protected function validate() { return FALSE; }
    protected function add() { return FALSE; }
    protected function update() { return FALSE; }

    // Factory methods
    public static function getAll() {
        self::init();
        $activityQuery = self::$db->query('SELECT id FROM activities ORDER BY start_date DESC');
        $activities = array();
        while($row = $activityQuery->fetch(PDO::FETCH_ASSOC)) {
            $activities[] = new Activity($row['id']);
        }
        return $activities;
    }


}