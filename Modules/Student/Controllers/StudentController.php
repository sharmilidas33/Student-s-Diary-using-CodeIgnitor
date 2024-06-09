<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Student\Models\StudentModel;

class StudentController extends BaseController
{
    // public function index()
    // {
    //     $data=[
    //         "name"=>"Sharmili",
    //         "role"=>"Software Developer",
    //     ];
    //     return view("\Modules\Student\Views\index",$data);
    //     // echo "<h1>Welcome, Sharmili.</h1>";
    // }

    // public function call1()
    // {
    //     echo "<h1>This is Call 1.</h1>";
    // }

    // public function call2()
    // {
    //     echo "<h1>This is Call 2.</h1>";
    // }

    // public function call3()
    // {
    //     echo "<h1>This is Call 3.</h1>";
    // }

    // list students
    public function index(){
        $student_obj = new StudentModel();
        $students= $student_obj->findAll();
        // echo "<pre>";
        // print_r($students);
        return view("\Modules\Student\Views\student_index",[
            "students"=>$students
        ]);
    }
    // insert student
    public function addStudent(){

    }
    // edit student
    public function editStudent($id){

    }
    // delete student
    public function deleteStudent($id){

    }
}
