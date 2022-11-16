<?php

namespace App\Infra\Database;

interface DB {
    public function connect();
    public function close();
    public function findOne(?string $sql, array $params);
    public function findAll(?string $sql, array $params);
    public function execute(?string $sql, array $params);
    public function update(?string $sql, array $params);
    public function beginTransaction();
    public function commit();
    public function rollback();
    public function getLastInsertedId();
}
