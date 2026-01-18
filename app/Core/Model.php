<?php

namespace App\Core;

abstract class Model
{
    protected static string $table;
    
    public static function getTable(): string
    {
        if (isset(static::$table)) {
           return static::$table;
        }
        $path = explode('\\', static::class);
        return strtolower(array_pop($path)) . 's'; // simple pluralization
    }

    public static function all()
    {
        $db = Application::getInstance()->db;
        return $db->query("SELECT * FROM " . static::getTable())->fetchAll();
    }
    
    public static function find($id)
    {
        $db = Application::getInstance()->db;
        return $db->query("SELECT * FROM " . static::getTable() . " WHERE id = :id", ['id' => $id])->fetch();
    }
    
    public static function create(array $data)
    {
        $db = Application::getInstance()->db;
        $table = static::getTable();
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_map(fn($k) => ":$k", array_keys($data)));
        
        $db->query("INSERT INTO $table ($columns) VALUES ($placeholders)", $data);
        return $db->pdo->lastInsertId();
    }
}
