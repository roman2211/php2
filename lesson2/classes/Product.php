<?php

abstract class Product 
{
  private $name;
  private $price;
  private $num;

  protected static $totalProfit = 0;

  public function __construct($name, $price, $num) {
    $this->name = $name;
    $this->price = $price;
    $this->num = $num;
    self::$totalProfit += $this->getTotalCost();
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function getPrice() {
    return $this->price;
  }

  public function setPrice($price) {
    $this->price = $price;
  }
  
  public function getNum() {
    return $this->num;
  }

  public function setNum($num) {
    $this->num = $num;
  }
  
  public function getTotalProfit() {
    return self::$totalProfit += $this->getTotalCost();
  }

  public abstract function getTotalCost();
  
  public abstract function getType();
  
  public abstract function getSalePrice();
          
  public abstract function getProfit();

}
