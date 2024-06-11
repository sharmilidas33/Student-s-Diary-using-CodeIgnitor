<?php

$routes->group("student", ["namespace" => "\Modules\Student\Controllers"], function ($routes) {
 
    // list students
    $routes->get("/", "StudentController::index");
 
    // add student + post data
    $routes->match (["get","post"],"add-student","StudentController::addStudent");

    // edit student + put data
    $routes->match (["get","put","post"],"edit-student/(:num)","StudentController::editStudent/$1");

    // delete student
    $routes->match(["delete","post"],"delete-student/(:num)", "StudentController::deleteStudent/$1");
 
});

$routes->group("api", ["namespace" => "\Modules\Student\Controllers"], function ($routes) {

    $routes->resource("student",["controller"=>"ApiController"]);

});