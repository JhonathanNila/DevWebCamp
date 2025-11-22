<?php

namespace Model;

class Category extends ActiveRecord{
    protected static $table = 'categories';
    protected static $rowsDB = ['id', 'name'];

    public $id;
    public $name;
}