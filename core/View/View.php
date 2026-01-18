<?php

namespace Core\View;

use eftec\bladeone\BladeOne;

class View
{
    protected $blade;

    public function __construct()
    {
        $views = __DIR__ . '/../views';
        $cache = __DIR__ . '/../cache';

        if (!file_exists($cache)) {
            mkdir($cache, 0777, true);
        }

        // Initialize BladeOne
        // Mode::MODE_AUTO = 1 (Auto refresh cache if template changes)
        $this->blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG); 
        
        // Set custom extension (BladeOne defaults to .blade.php, we want .ayoub.php)
        $this->blade->setFileExtension('.ayoub.php');
    }

    public function render($view, $params = [])
    {
        return $this->blade->run($view, $params);
    }
}
