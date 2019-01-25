<?php


namespace app\interfaces;

interface IDb
{
  function execute (string $sql, array $params = []);
}