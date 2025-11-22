<?php

namespace Model;

class Time extends ActiveRecord{
    protected static $table = 'time';
    protected static $rowsDB = ['id', 'time'];

    public $id;
    public $time;
}