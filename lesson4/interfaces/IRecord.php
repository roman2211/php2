<?php

namespace app\interfaces;

interface IRecord
{
    static function getOne(int $id);

    static function getAll();

    static function getTableName() : string ;
}