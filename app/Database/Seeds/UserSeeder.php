<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $userModel = new User();
        $users = [];
        for ($i = 0; $i < 10; $i++) {
            array_push($users, [
                "f_name" => 'Firstname-' . $i,
                "l_name" => 'Lastname-' . $i,
                "email" => 'email' . $i . '@gmail.com',
                "salery" => rand(1.50, 3.75),
                "password" => password_hash('Pass@123', PASSWORD_BCRYPT, ['cost' => 10]),
            ]);
        }

        $userModel->insertBatch($users);
    }
}
