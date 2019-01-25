<?php


namespace app\models\repositories;
use app\interfaces\IRepository;
use app\models\Record;
use app\services\Db;


abstract class Repository implements IRepository
{
  protected $db;

  public function __construct()
  {
    $this->db = $this->getDb();
  }

  public function getOne($id)
  {
    $tableName = $this->getTableName();


    $sql = "SELECT * FROM {$tableName} WHERE id = :id";
    return $this->db->queryObject($sql, $this->getRecordClass(), [":id" => $id])[0];
  }

  public function getAll()
  {
    $tableName = $this->getTableName();
    $sql = "SELECT * FROM {$tableName}";
    return $this->db->queryObject($sql, $this->getRecordClass());
  }

  public function save(Record $record) {
    $id = $record->id;
    if ($id === null) {
      $this->insert($record);
    } elseif ($record != $record->getOne($id)) {
      $objFromDb =$record->getOne($id);
      $params = [];
      $expression = [];
      foreach ($record as $key => $value) {
        foreach ($objFromDb as $dbKey => $dbValue) {
          if ($key == $dbKey && $key!= 'db' && $value !=$dbValue) {
            $params[":{$key}"] = $value;
            $expression[] = "$key = :$key";
          }
        }
      }
      $params[":id"] = $id;
      $this->update($params, $expression);
    }
  }

  function insert(Record $record)
  {
    $params = [];
    $columns = [];
    foreach ($record as $key => $value) {
      if ($key == 'db' ) {
        continue;
      }
      $params[":{$key}"] = $value;
      $columns[] = "`{$key}`";
    }
    $columns = implode(", ", $columns);
    $placeholders = implode(", ", array_keys($params));
    $tableName = $this->getTableName();
    $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
    $this->db->execute($sql, $params);
    $record->id = $this->db->getLastInsertId();
  }

  public function update(array $params, array $expression)
  {
    $tableName = $this->getTableName();
    $expression = implode(", ",array_values($expression));
    $sql = "UPDATE {$tableName} SET {$expression} WHERE id= :id";
    var_dump($sql);
    return $this->db->execute($sql, $params);
  }

  public function delete(Record $record)
  {
    $tableName = $this->getTableName();
    $sql = "DELETE FROM {$tableName} WHERE id = :id";
    return $this->db->execute($sql, [":id" => $record->id]);
  }

  protected function getDb(){
    return Db::getInstance();
  }
}