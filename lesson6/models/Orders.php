<?php


namespace app\models;


class Order extends Record
{
  public $id;
  public $user;
  public $address;
  public $orderJson;
  public $status;

  static function getTableName(): string
  {
    return 'orders';
  }
}