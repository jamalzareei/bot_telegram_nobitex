<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class MainService
{

    public static function controllers()
    {
        // $classes = array_filter(get_declared_classes(), function ($class) {
        //     $isController = substr($class, -10) == 'Controller';
        //     $isNotPlainController = $isController && substr($class, -11) != '\Controller';
        //     return $isNotPlainController;
        // });

        // //Optional: to clear controller name from its namespace
        // $controllers=array_map(function ($controller){
        //     return last(explode('\\',$controller));
        // },$classes);

        // //Optional: to reset keys of array to start from 0,1,2,...etc
        // $controllers = array_values($controllers);

        // return $controllers;
/////////////////////////////////////////////////////////////
        // $classes = get_declared_classes();

        // foreach ($classes as $class) {
        //     if (is_subclass_of($class, 'App\Http\Controllers\Controller')) {
        //         echo $class . '<br />';
        //         $methods = get_class_methods($class);
        //         foreach ($methods as $method)
        //             echo '--- ' . $method . '<br />';
        //     }
        // }
        ///////////////////////////////////////////////////////////////
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
