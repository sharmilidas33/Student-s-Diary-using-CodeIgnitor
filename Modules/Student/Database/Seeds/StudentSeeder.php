<?php

namespace Modules\Student\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    public function run()
    {
        for($i=0; $i<50; $i++){
            $this->db->table("students")->insert($this->generateStudents());
        }
    }

    public function generateStudents()
    {
        $faker = Factory::create();

        return [
            "name" => $faker->name(),
            "email" => $faker->email,
            "phone_number" => $faker->phoneNumber,
            "profile_image"=> $faker->imageUrl(100, 100)
        ];
    }
}
