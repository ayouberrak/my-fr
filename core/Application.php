<?php

namespace Core;

class Application extends Container
{
    public Router $router;
    public Database $db;
    public View $view;
    public string $basePath;

    public function __construct(string $basePath)
    {
        self::$instance = $this;
        $this->basePath = $basePath;
        
        $this->loadEnvironment();
        
        $this->db = new Database();
        $this->view = new View();
        $this->router = new Router();
        
        // Bind Core Classes
        $this->singleton(Database::class, fn() => $this->db);
        $this->singleton(Router::class, fn() => $this->router);
        $this->singleton(View::class, fn() => $this->view);
    }

    protected function loadEnvironment(): void
    {
        $dotenv = \Dotenv\Dotenv::createImmutable($this->basePath);
        $dotenv->safeLoad();

        if ($_ENV['APP_DEBUG'] === 'true') {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        }
    }

    public function run(): void
    {
        echo $this->router->resolve();
    }
}
