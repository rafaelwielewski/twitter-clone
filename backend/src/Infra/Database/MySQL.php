<?php

namespace App\Infra\Database;

use \PDO;

/**
 * @codeCoverageIgnore
 */
class MySQL implements DB {

    private $conn = null;
    protected $transactionCount = 0;

    private static $instance;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        if (!$this->conn) {
            $host = $_ENV['MYSQL_HOST'];
            $database = $_ENV['MYSQL_DATABASE'];
            $username = $_ENV['MYSQL_USER'];
            $password = $_ENV['MYSQL_PASSWORD'];

            $this->conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        }
    }

    public function close()
    {
        // TODO    
    }

    public function findOne(?string $sql, array $params)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetch();

    }

    public function findAll(?string $sql, array $params)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function execute(?string $sql, array $params)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }

    public function update(?string $sql, array $params)
    {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
    }

    public function beginTransaction()
    {
        if (!$this->transactionCount++) {
            return $this->conn->beginTransaction();
        }
        $this->conn->exec('SAVEPOINT trans'.$this->transactionCount);
        return $this->transactionCount >= 0;
    }

    public function commit()
    {
        if (!--$this->transactionCount) {
            return $this->conn->commit();
        }
        return $this->transactionCount >= 0;
    }

    public function rollback()
    {
        if (!--$this->transactionCount) {
            return $this->conn->rollback();
        }
        return $this->transactionCount >= 0;
    }

    public function getLastInsertedId()
    {
        return $this->conn->lastInsertId();
    }

    public static function getInstance()
    {
        if(self::$instance === null) self::$instance = new self;
        return self::$instance;
    }

}
