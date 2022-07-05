<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class MainService
{

    public static function controllers()
    {
        $controllers = [];

        foreach (Route::getRoutes()->getRoutes() as $route)
        {
            $action = $route->getAction();
    
            if (array_key_exists('controller', $action))
            {
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
                $controllers[] = $action['controller'];
            }
        }
    
        return $controllers;
    }
}
