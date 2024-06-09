<?php

namespace Framework;

use PDO;

class Database
{
    private ?PDO $pdo = null;

    public function __construct(
        private string $host,
        private string $dbName,
        private string $dbUser,
        private string $dbPassword)
    {
    }

    public function getDb(): PDO
    {
        if ($this->pdo === null) {
            $dsn = "mysql:host=$this->host;dbname=$this->dbName";

            $this->pdo = new PDO($dsn, $this->dbUser, $this->dbPassword, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        }

        return $this->pdo;
    }
}
