<?php

namespace app\services;

use app\interfaces\IDb;
use app\interfaces\ILoggable;
use app\interfaces\INotified;
use app\traits\TSingltone;

class Db implements IDb
{
     private $config;

    private $conn = null;


    public function __construct($driver, $host, $login, $password, $database, $charset)
    {
        $this->config = [
            'driver' => $driver,
            'host' => $host,
            'login' => $login,
            'password' => $password,
            'database' => $database,
            'charset' => $charset
        ];
    }


    private function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->conn;
    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryObject($sql, $params =[], $className)
    {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);
        return $pdoStatement->fetchAll();
    }

    public function log()
    {

    }

    public function notify(){

    }

    public function getLastInsetId()
    {
        return $this->getConnection()->lastInsertId();
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function execute(string $sql, array $params = [])
    {
        $this->query($sql, $params);
        return true;
    }

    private function prepareDsnString()
    {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }
}