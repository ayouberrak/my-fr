<?php

namespace Core;

class Application extends Container
{
    public Router $router;
    public Database $db;
    public View $view;
    public Session $session;
    public string $basePath;
    protected array $globalMiddleware = [];

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
        $this->singleton(Logger::class, fn() => new Logger());
        $this->singleton(Session::class, fn() => new Session());
        
        // Initialize Session
        $this->session = $this->resolve(Session::class);
    }

    protected function loadEnvironment(): void
    {
        $dotenv = \Dotenv\Dotenv::createImmutable($this->basePath);
        $dotenv->safeLoad();

        if ($_ENV['APP_DEBUG'] === 'true') {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);

            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        } else {
            ini_set('display_errors', 0);
            error_reporting(0);
        }
    }

    public function run(): void
    {
        try {
            // Run Global Middleware
            $this->globalMiddleware = [
                new SecurityHeadersMiddleware(),
                new CsrfMiddleware(),
            ];

            foreach ($this->globalMiddleware as $middleware) {
                $middleware->execute();
            }

            echo $this->router->resolve();
        } catch (\Throwable $e) {
            // Log the error
            if ($this->isBound(Logger::class)) {
                $this->resolve(Logger::class)->error($e->getMessage() . "\n" . $e->getTraceAsString());
            }

            // Show Whoops if Debug is On
            if ($_ENV['APP_DEBUG'] === 'true') {
                 // Whoops is already registered as a handler, so it should have caught this.
                 // But if we caught it here, we might need to re-throw or handle it manually if Whoops failed.
                 throw $e; 
            } else {
                // Show Custom 500 Page
                http_response_code(500);
                echo $this->view->render('errors.500', ['error' => $e->getMessage()]);
            }
        }
    }
    
    // Helper to check binding (simple version, assuming array check)
    public function isBound($key) {
        return isset($this->instances[$key]) || isset($this->bindings[$key]);
    }
}
