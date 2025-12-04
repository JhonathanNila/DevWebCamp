<?php

namespace Model;

class EventsAttendees extends ActiveRecord {
    protected static $table = 'events_attendees';
    protected static $rowsDB = ['id', 'event_id', 'attendee_id'];

    public $id;
    public $event_id;
    public $attendee_id;

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->event_id = $args['event_id'] ?? '';
        $this->attendee_id = $args['attendee_id'] ?? '';
    }
}