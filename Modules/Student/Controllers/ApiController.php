<?php

namespace Modules\Student\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use Modules\Student\Models\StudentModel;

class ApiController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $student_obj = new StudentModel();
        $students= $student_obj->findAll();

        $data= $this->respond([
            "status"=>true,
            "message"=>"Students List",
            "data"=>$students
        ]);

        print_r($data);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        $student_obj= new StudentModel();
        $student= $student_obj->find($id);

        return $this->respond([
            "status"=>true,
            "message"=>"Single Student data",
            "data"=>$student
        ]);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */

    public function create()
    {
        $name = $this->request->getVar("name");
        $email = $this->request->getVar("email");
        $phone_number = $this->request->getVar("phone_number");
        $image= $this->request->getFile('profile_image');

        $profile_image= "";
        if(isset($image) && !empty($image->getPath())){
            $file_name= $image->getName();

            if($image->move("images",$file_name)){
                $profile_iamge= "/image/".$file_name ;
            }
        }

        $data=[
            "name" => $name,
            "email" => $email,
            "phone_number" => $phone_number,
            "profile_image" => $profile_image
        ];

        $student_obj= new StudentModel();

        if($student_obj->insert($data)){
            return $this->respond(array(
                "status"=>1,
                "message"=>"Single has been created"
            ));
        } else{
            return $this->respond(array(
                "status"=>0,
                "message"=>"Failed to create student"
            ));
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        $name = $this->request->getVar("name");
        $email = $this->request->getVar("email");
        $phone_number = $this->request->getVar("phone_number");
        $image= $this->request->getFile('profile_image');

        $profile_image= "";
        if(isset($image) && !empty($image->getPath())){
            $file_name= $image->getName();

            if($image->move("images",$file_name)){
                $profile_iamge= "/image/".$file_name ;
            }
        }

        $data=[
            "name" => $name,
            "email" => $email,
            "phone_number" => $phone_number,
            "profile_image" => $profile_image
        ];

        $student_obj= new StudentModel();

        if($student_obj->update($id,$data)){
            return $this->respond(array(
                "status"=>1,
                "message"=>"Single has been created"
            ));
        } else{
            return $this->respond(array(
                "status"=>0,
                "message"=>"Failed to update student"
            ));
        }
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $name = $this->request->getVar("name");
        $email = $this->request->getVar("email");
        $phone_number = $this->request->getVar("phone_number");
        $image= $this->request->getFile('profile_image');

        $profile_image= "";
        if(isset($image) && !empty($image->getPath())){
            $file_name= $image->getName();

            if($image->move("images",$file_name)){
                $profile_iamge= "/image/".$file_name ;
            }
        }

        $data=[
            "name" => $name,
            "email" => $email,
            "phone_number" => $phone_number,
            "profile_image" => $profile_image
        ];

        $student_obj= new StudentModel();

        if($student_obj->update($id,$data)){
            return $this->respond(array(
                "status"=>1,
                "message"=>"Single has been created"
            ));
        } else{
            return $this->respond(array(
                "status"=>0,
                "message"=>"Failed to update student"
            ));
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $student_obj = new StudentModel();

        $student_obj->delete($id);

        return $this->respond(array(
            "status"=>1,
            "message"=>"Student deleted"
        ));
    }
}
