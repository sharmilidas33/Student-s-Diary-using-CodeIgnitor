<?php

namespace Modules\Student\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\Student\Models\StudentModel;

class StudentController extends BaseController
{
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
    public function addStudent()
    {
        if ($this->request->getMethod() == "POST") {
            // print_r($this->request->getVar());
            $name= $this->request->getVar('name');
            $email= $this->request->getVar('email');
            $phone_number= $this->request->getVar('phone_number');
            $image= $this->request->getFile('profile_image');

            $profile_image= "";
            if(isset($image) && !empty($image->getPath())){
                $file_name= $image->getName();

                if($image->move("images",$file_name)){
                    $profile_image= "/images/".$file_name;
                }
            }

            $data=[
                "name" => $name,
                "email" => $email,
                "phone_number" => $phone_number,
                "profile_image" => $profile_image
            ];

            // object of StudentModel
            $student_obj = new StudentModel();

            $session = session();

            if($student_obj->insert($data)){
                $session->setFlashdata("success","Student has been added successfully");
            } else{
                $session->setFlashdata("error","Student creation failed");
            }

            return redirect("student");
        }
        return view("\Modules\Student\Views\student_add");  
    }

    // edit student
    public function editStudent($id){
        $student_obj = new StudentModel();
        $student = $student_obj->where("id",$id)->first();

        if($this->request->getMethod()== "PUT"){
            $name= $this->request->getVar('name');
            $email= $this->request->getVar('email');
            $phone_number= $this->request->getVar('phone_number');
            $image= $this->request->getFile('profile_image');

            $profile_image= $student['profile_image'];
            if(isset($image) && !empty($image->getPath())){
                $file_name= $image->getName();

                if($image->move("images",$file_name)){
                    $profile_image= "/images/".$file_name;
                }
            }

            $data=[
                "name" => $name,
                "email" => $email,
                "phone_number" => $phone_number,
                "profile_image" => $profile_image
            ];

            $session = session();

            if($student_obj->update($id,$data)){
                $session->setFlashdata("success","Student has been updated successfully");
            } else{
                $session->setFlashdata("error","Failed to update student's information");
            }

            return redirect("student");
        }
        // print_r($student);
        return view("\Modules\Student\Views\student_edit",[
            "student"=>$student
        ]);
    }

    // delete student
    public function deleteStudent($id){
        $student_obj= new StudentModel();
        $student_obj-> delete($id);

        $session= session();

        $session->setFlashdata("success","Student has been deleted successfully"); 
        
        return redirect("student");
    }
}
