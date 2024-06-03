<?php

namespace Core;
use Exception;

class Router
{
    public static function run($routes)
    {
        $url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
        $url = ($url !== null) ? rtrim('/' . $url, '/') :  '/';
        $route_found = false;


        foreach ($routes as $route => $dataset) {
            $route_pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $route) . '$#';

            if (preg_match($route_pattern, $url, $matches)) {
                [$controller, $action] = explode('@', $dataset);
                $namespace_path = "\\Source\\Controllers\\$controller";

                if (class_exists($namespace_path)) {
                    $controller_instance = new $namespace_path();
                    $controller_instance->$action();
                }
                else throw new Exception("Class $controller not found");
                
                $route_found = true;
            }
        }

        if (!$route_found) echo "Route not found";
    }
}
