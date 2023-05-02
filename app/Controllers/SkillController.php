<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\Request;

class SkillController extends BaseController
{
    public function index()
    {
        return view('skills');
    }

    public function edit($id)
    {
        if ($this->request->getMethod() === 'get') {
            return view('skills');
        } else {
        }
    }
}
