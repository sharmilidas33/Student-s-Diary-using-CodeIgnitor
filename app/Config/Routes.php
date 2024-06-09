<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// Student Module Route
// $routes->get('/student','\Modules\Student\Controllers\StudentController::index');
// $routes->get('/student/call1','\Modules\Student\Controllers\StudentController::call1');
// $routes->get('/student/call2','\Modules\Student\Controllers\StudentController::call2');
// $routes->get('/student/call3','\Modules\Student\Controllers\StudentController::call3');

//creating group for better readibility
// $routes->group("student", ["namespace" => "\Modules\Student\Controllers"], function ($routes) {

//     // welcome page
//     $routes->get("/", "StudentController::index");

//     // call methods
//     $routes->get("/call1", "StudentController::call1");
//     $routes->get("/call2", "StudentController::call2");
//     $routes->get("/call3", "StudentController::call3");

// });

// Including all module routes
$modules_path = ROOTPATH . "Modules/";
$modules = scandir($modules_path);

foreach ($modules as $module){
    if($module === "." || $module === ".."){
        continue;
    }

    if(is_dir($modules_path) . '/' . $module){
        $routes_path = $modules_path . $module . '/Config/Routes.php';

        if(file_exists($routes_path)){
            require $routes_path;
        } else{
            continue;
        }
    }
}



