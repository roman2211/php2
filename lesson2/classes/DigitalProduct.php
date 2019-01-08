<?php

class DigitalProduct extends Product
{
  private static $profit = 0;
  
  public function getType() {
    return '<h3>Это цифровой товар - цены пополам!</h3>';
  }

    public function getDigitalPrice() {
    return $this->getPrice() / 2;
  }
  
  public function getSalePrice() {
    return $this->getDigitalPrice();
  }

  public function getTotalCost() {
    return $this->getNum() * $this->getDigitalPrice();
  }
  
  public function getProfit() {
    return self::$profit += $this->getTotalCost();
  }
  
  public function getTotalProfit() {
    return self::$totalProfit;
  }

}
