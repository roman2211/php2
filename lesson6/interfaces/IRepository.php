<?php


namespace app\interfaces;

interface IRepository
{
  function getOne(int $id);
  function getAll();
  function getTableName() : string ;
}