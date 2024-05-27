<?php

namespace Core;

class App {

    
    public function run($routes) {
        $filtered_url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
        $url = ($filtered_url !== null) ? '/' . $filtered_url :  '/';
        $url = ($url !== '/') ? rtrim($url, '/') : $url;
        $route_found = false;
    

        foreach($routes as $path => $dataset) {
            $route_pattern = '#^'.preg_replace('/{id}/', '([\w-]+)', $path).'$#';

            if(preg_match($route_pattern, $url, $matches)) {                
                [$controller, $action] = explode('@', $dataset);            
                require __DIR__.'/../src/controllers/'.$controller.'.php';
                $controller_instance = new $controller();
                $controller_instance->$action();

                $route_found = true;
            }
        }

        if(!$route_found) {
            echo "Route not found";
        }
    }
}