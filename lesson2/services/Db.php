<?php

namespace app\services;

use app\interfaces\IDb;
use app\traits\TSingltone;

class Db implements IDb
{
    public function queryOne(string $sql, array $params = [])
    {
        return [];
    }

    public function queryAll(string $sql, array $params = []){
        return [];
    }
}