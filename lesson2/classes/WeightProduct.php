<?php

require_once 'PieceProduct.php';

class WeightProduct extends PieceProduct 
{
  
  private static $profit = 0;
  
  public function getType() {
    return '<h3>Это весовой товар - никаких скидок! Покупаем по граммам и килограммам.</h3>';
  }
  
  public function getSalePrice() {
    return $this->getPrice();
  }

  public function getTotalCost() {
    return $this->getNum() * $this->getPrice();
  }
  
  public function getProfit() {
    return self::$profit += $this->getTotalCost();
  }
  
  public function getTotalProfit() {
    return self::$totalProfit;
  }
}
