<?php

class View
{
    public static function render($view, $data = [])
    {
        $viewPath = self::getViewPath($view);
        
        if (!file_exists($viewPath)) {
            throw new Exception("View not found: {$view}");
        }
        
        extract($data);
        
        require $viewPath;
    }

    public static function renderWithLayout($view, $data = [], $layout = 'main')
    {
        $viewPath = self::getViewPath($view);
        $layoutPath = self::getLayoutPath($layout);
        
        if (!file_exists($viewPath)) {
            throw new Exception("View not found: {$view}");
        }
        
        if (!file_exists($layoutPath)) {
            throw new Exception("Layout not found: {$layout}");
        }
        
        extract($data);
        
        ob_start();
        require $viewPath;
        $content = ob_get_clean();
        
        require $layoutPath;
    }

    private static function getViewPath($view)
    {
        return __DIR__ . '/../../views/' . $view . '.php';
    }

    private static function getLayoutPath($layout)
    {
        return __DIR__ . '/../../views/layouts/' . $layout . '.php';
    }
}