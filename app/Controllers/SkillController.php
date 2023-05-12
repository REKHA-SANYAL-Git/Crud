<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;
use App\Models\User;

class SkillController extends BaseController
{

    public function index()
    {
        return view('skills');
    }

    public function create()
    {
        helper('form');
        $user_options = array();
        $userskillModel = new User();
        $users = $userskillModel->select('id, f_name, l_name')->findAll();
        foreach ($users as $user) {
            $user_options[$user['id']] =  $user['f_name'] . " " . $user['l_name'];
        }

        return view('create_skill', [
            "user_options" => $user_options,
        ]);
    }

    public function edit($id)
    {
        if ($this->request->getMethod() === 'get') {
            return view('skills');
        } else {
        }
    }
}
