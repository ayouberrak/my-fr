<?php

namespace Core\Database;

use PDO;
use PDOException;

class Database
{
    public PDO $pdo;

    public function __construct()
    {
        $dbConnection = $_ENV['DB_CONNECTION'] ?? 'mysql';
        $dbHost = $_ENV['DB_HOST'] ?? '127.0.0.1';
        $dbPort = $_ENV['DB_PORT'] ?? '3306';
        $dbName = $_ENV['DB_DATABASE'] ?? 'forge';
        $dbUser = $_ENV['DB_USERNAME'] ?? 'root';
        $dbPassword = $_ENV['DB_PASSWORD'] ?? '';

        $dsn = "$dbConnection:host=$dbHost;port=$dbPort;dbname=$dbName";

        try {
            $this->pdo = new PDO($dsn, $dbUser, $dbPassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    public function query(string $sql, array $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }
}
