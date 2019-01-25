<?php


namespace app\models\repositories;

use app\models\User;


class UserRepository extends Repository
{
  public function getTableName() :string
  {
    return 'users';
  }

  function getRecordClass()
  {
    return User::class;
  }
}