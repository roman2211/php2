<?php

    include 'offer.php';

    class Offer_sub extends CatalogOffer{
        var $subcategory;

        function __construct($id, $name, $price, $category, $description, $image, $subcategory){
            parent::__construct($id, $name, $price, $category, $description, $image);
            $this->subcategory=$subcategory;
            $this->showGoods();
        }

        function showGoods(){
            echo "<h4>id</h4><br>".$this->id."<br><h4>Товар</h4><br>".$this->name."<br><h4>Категория</h4><br>".$this->category
                ."<br><h4>Фото</h4><br>".$this->image."<br><h4>Описание</h4><br>".$this->description."<br><h4>Цена</h4><br>".$this->price."<br><h4>Подкатегория</h4><br>".$this->subcategory;
        }

    }

    new Offer_sub(1 , "Тестовый товар", 1000, "Тестовая категория", "Тестовое описание","Фото" ,"Подкатегория 1");