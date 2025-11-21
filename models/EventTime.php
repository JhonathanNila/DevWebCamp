<?php

namespace Model;

class EventTime extends ActiveRecord{
    protected static $table = 'events';
    protected static $rowsDB = ['id', 'category_id', 'day_id', 'time_id'];

    public $id;
    public $category_id;
    public $day_id;
    public $time_id;
}