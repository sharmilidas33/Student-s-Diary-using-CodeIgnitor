<?php

$routes->group("student", ["namespace" => "\Modules\Student\Controllers"], function ($routes) {
 
    // list students
    $routes->get("/", "StudentController::index");
 
    // add student + post data
    $routes->match (["get","post"],"add-student","StudentController::addStudent");

    // edit student + put data
    $routes->match (["get","put"],"edit-student/(:num)","StudentController::editStudent/$1");

    // delete student
    $routes->delete("delete-student/(:num)", "StudentController::deleteStudent/$1");
 
});