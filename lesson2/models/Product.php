<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;
    public $vendor_id;

    public function getTableName():string
    {
        return 'products';
    }

    public function insert()
    {
        
    }
}