<?php

namespace App\Core;

class Application extends Container
{
    public Router $router;
    public Database $db;
    public string $basePath;

    public function __construct(string $basePath)
    {
        self::$instance = $this;
        $this->basePath = $basePath;
        
        $this->loadEnvironment();
        
        $this->db = new Database();
        $this->router = new Router();
        
        // Bind Core Classes
        $this->singleton(Database::class, fn() => $this->db);
        $this->singleton(Router::class, fn() => $this->router);
    }

    protected function loadEnvironment(): void
    {
        $dotenv = \Dotenv\Dotenv::createImmutable($this->basePath);
        $dotenv->safeLoad();
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }
}
