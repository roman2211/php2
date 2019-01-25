<?php


namespace app\models\repositories;

use app\models\Cart;


class CartRepository extends Repository
{
  public function getTableName() :string
  {
    return 'cart';
  }

  function getRecordClass()
  {
    return Cart::class;
  }
}