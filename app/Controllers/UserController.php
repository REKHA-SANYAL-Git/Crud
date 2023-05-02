<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new User();
        $users = $userModel->select('id, f_name, l_name, email, salery')->findAll();

        return view('index', [
            "users" => $users,
        ]);
    }

    public function create()
    {
        helper('form');
        if ($this->request->getMethod() === 'get') {
            return view('create_user');
        } else {
            if ($this->validate([
                'f_name' => 'required|alpha|min_length[3]|max_length[49]',
                'l_name' => 'required|alpha|min_length[3]|max_length[49]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'salery' => 'required|numeric',
                'password' => 'required|min_length[8]|max_length[255]',
                'conf_password' => 'required|matches[password]',
            ], [
                'f_name' => [
                    'required' => 'Firstname is required'
                ]
            ])) {
                $userModel = new User();
                //$userModel->insert(); // It returns last inserted row id
                $userModel->save([
                    'f_name' => $this->request->getPost('f_name'),
                    'l_name' => $this->request->getPost('l_name'),
                    'email' => $this->request->getPost('email'),
                    'salery' => $this->request->getPost('salery'),
                    'password' => $this->request->getPost('password'),
                    'conf_password' => $this->request->getPost('conf_password'),
                ]); // It returns boolean value

                session()->setFlashdata('msg', 'Yeee ami ese gachi');
                return redirect()->to('users/create');
            } else {
                return view('create_user');
            }
        }
    }


    public function edit($id)
    {
        helper('form');
        $userModel = new User();
        $user = $userModel->select('id, f_name, l_name, email, salery')->where('id', $id)->first();

        if ($this->request->getMethod() === 'get') {
            return view('edit_user', [
                'user' => $user
            ]);
        } else {
            if ($this->validate([
                'f_name' => 'required|alpha|min_length[3]|max_length[49]',
                'l_name' => 'required|alpha|min_length[3]|max_length[49]',
                'email' => 'required|valid_email',
                'salery' => 'required|numeric',
            ], [
                'f_name' => [
                    'required' => 'Firstname is required'
                ]
            ])) {
                if ($this->request->getPost('email') !== $user['email']) {
                    if ($userModel->where('email', $this->request->getPost('email'))->countAllResults() === 0) {
                        $userModel->update($id, [
                            'f_name' => $this->request->getPost('f_name'),
                            'l_name' => $this->request->getPost('l_name'),
                            'email' => $this->request->getPost('email'),
                            'salery' => $this->request->getPost('salery'),
                        ]);
                    } else {
                        session()->setFlashdata('msg', 'erom makup paser barir mayta koreche');
                        return redirect()->to('/');
                    }
                } else {
                    $userModel->update($id, [
                        'f_name' => $this->request->getPost('f_name'),
                        'l_name' => $this->request->getPost('l_name'),
                        'salery' => $this->request->getPost('salery'),
                    ]);
                }

                session()->setFlashdata('msg', 'Yeee amr makup complete');
                return redirect()->to('/');
            } else {
                return view('edit_user', [
                    'user' => $user
                ]);
            }
        }
    }


    public function delete($id)
    {
        $userModel = new User();
        $userModel->delete($id);

        session()->setFlashdata('msg', 'Yee ami mar khey more gachi');
        return redirect()->to('/');
    }
}
