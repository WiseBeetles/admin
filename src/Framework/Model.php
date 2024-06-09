<?php

namespace Framework;

use PDO;

abstract class Model
{
    protected $table;
    protected array $errors = [];

    public function __construct(protected Database $database)
    {
    }

    public function setTable($table): void
    {
        $this->table = $table;
    }

    private function getTable()
    {
        if ($this->table !== null) {
            return $this->table;
        }

        $parts = explode("\\", get_class($this));

        return strtolower(array_pop($parts) . "s");
    }

    public function find(array $args): array
    {
        $conn = $this->database->getDb();
        $table = $this->getTable();

        $sql = $conn->query("
            SELECT * FROM {$table}
            WHERE {$args['field']} {$args['operator']} {$args['value']}
        ");
        $row = $sql->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    public function insert($data): bool
    {
        $table = $this->getTable();

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));

        $sql = "INSERT INTO {$table} ($columns)
                VALUES ($placeholders)";

        $conn = $this->database->getDb();
        $stmt = $conn->prepare($sql);
        $i = 1;

        foreach ($data as $value) {
            $type = match (gettype($value)) {
                "boolean" => PDO::PARAM_BOOL,
                "integer" => PDO::PARAM_INT,
                "NULL" => PDO::PARAM_NULL,
                default => PDO::PARAM_STR
            };

            $stmt->bindValue($i++, $value, $type);
        }

        return $stmt->execute();
    }
}
