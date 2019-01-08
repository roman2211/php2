<?php

class PieceProduct extends Product
{
  private static $profit = 0;
  
  public function getType() {
    return '<h3>Это обычный товар - никаких скидок. Может цифровой лучше?</h3>';
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
