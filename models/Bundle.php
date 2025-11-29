<?php

namespace Model;

class Bundle extends ActiveRecord{
    protected static $table = 'bundles';
    protected static $rowsDB = ['id', 'name'];

    public $id;
    public $name;
}