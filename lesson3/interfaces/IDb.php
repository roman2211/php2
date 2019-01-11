<?php
namespace app\interfaces;

interface IDb
{
    public function queryOne(string $sql, array $params = []);
    public function queryAll(string $sql, array $params = []);

}