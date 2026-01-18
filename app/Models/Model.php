<?php

namespace App\Models;

use Core\Application;

abstract class Model
{
    protected static string $table;
    
    public static function getTable(): string
    {
        if (isset(static::$table)) {
           return static::$table;
        }
        $path = explode('\\', static::class);
        return strtolower(array_pop($path)) . 's';
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

    public static function findBy(string $column, $value)
    {
        $db = Application::getInstance()->db;
        return $db->query("SELECT * FROM " . static::getTable() . " WHERE $column = :value", ['value' => $value])->fetch();
    }

    public static function where(string $column, $value)
    {
        $db = Application::getInstance()->db;
        return $db->query("SELECT * FROM " . static::getTable() . " WHERE $column = :value", ['value' => $value])->fetchAll();
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

    public static function update($id, array $data)
    {
        $db = Application::getInstance()->db;
        $table = static::getTable();
        $fields = '';
        foreach ($data as $key => $value) {
            $fields .= "$key = :$key,";
        }
        $fields = rtrim($fields, ',');
        $data['id'] = $id;
        
        return $db->query("UPDATE $table SET $fields WHERE id = :id", $data);
    }

    public static function delete($id)
    {
        $db = Application::getInstance()->db;
        return $db->query("DELETE FROM " . static::getTable() . " WHERE id = :id", ['id' => $id]);
    }
}
