<?php

namespace Model;

class Event extends ActiveRecord{
    protected static $table = 'events';
    protected static $rowsDB = ['id', 'name', 'description','capacity', 'category_id', 'day_id', 'time_id', 'speaker_id'];

    public $id;
    public $name;
    public $description;
    public $capacity;
    public $category_id;
    public $day_id;
    public $time_id;
    public $speaker_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->name = $args['name'] ?? '';
        $this->description = $args['description'] ?? '';
        $this->capacity = $args['capacity'] ?? '';
        $this->category_id = $args['category_id'] ?? '';
        $this->day_id = $args['day_id'] ?? '';
        $this->time_id = $args['time_id'] ?? '';
        $this->speaker_id = $args['speaker_id'] ?? '';
    }
    public function validate() {
        if(!$this->name) {
            self::$alerts['error'][] = 'The Event Name is required';
        }
        if(!$this->description) {
            self::$alerts['error'][] = 'The Event Description is required';
        }
        if(!$this->category_id  || !filter_var($this->category_id, FILTER_VALIDATE_INT)) {
            self::$alerts['error'][] = 'Choose a category';
        }
        if(!$this->day_id  || !filter_var($this->day_id, FILTER_VALIDATE_INT)) {
            self::$alerts['error'][] = 'Choose the Event day';
        }
        if(!$this->time_id  || !filter_var($this->time_id, FILTER_VALIDATE_INT)) {
            self::$alerts['error'][] = 'Choose the Event time';
        }
        if(!$this->capacity  || !filter_var($this->capacity, FILTER_VALIDATE_INT)) {
            self::$alerts['error'][] = 'Add a number of Available Spots or Event Capacity';
        }
        if(!$this->speaker_id || !filter_var($this->speaker_id, FILTER_VALIDATE_INT) ) {
            self::$alerts['error'][] = 'Select the person in charge of the Event or the Speaker';
        }
        return self::$alerts;
    }

}