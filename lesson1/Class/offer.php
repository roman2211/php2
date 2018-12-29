<?php

    class CatalogOffer{
        var $id;
        var $name;
        var $price;
        var $category;
        var $description;
        var $image;

        function __construct($id, $name, $price, $category, $description, $image){
            $this->id = $id;
            $this->name = $name;
            $this->price = $price;
            $this->category = $category;
            $this->description = $description;
            $this->image = $image;
        }
    }
