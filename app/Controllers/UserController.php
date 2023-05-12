<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        // if ($this->request->getMethod() === 'get') {
        //     echo '<pre>';
        //     print_r($_SERVER);
        //     echo '</pre>';
        // } else {
        //     echo '<h1>post</h1>';
        // }
        // if ($this->request->getMethod() === 'get') {
        //     echo '<pre>';
        //     print_r($this->request->getGet('q'));
        //     echo '</pre>';
        // } else {
        //     echo '<h1>post</h1>';
        // }
        $userModel = new User();
        $users = $userModel->select('id, f_name, l_name, email, salery')->findAll();

        return view('index', [
            "users" => $users,
        ]);
    }

    public function search()
    {
        // $q = $this->request->getGet('q') ?? 45; // if its returns a null value then the value become the right side declaration
        // ** ---------------------------- Column wise Search ---------------------------- **
        // $userModel = new User();
        // $col = $this->request->getGet('col');
        // $q = $this->request->getGet('q');

        // if (empty($col) || empty($q)) {
        //     $users = $userModel->select('id, f_name, l_name, email, salery')->findAll();
        // } else {
        //     $users = $userModel->select('id, f_name, l_name, email, salery')->like($col, $q)->findAll();
        // }

        // return view('index', [
        //     "users" => $users,
        //     "col" => $col,
        //     "q" => $q
        // ]);

        // ** ---------------------------- All Search ---------------------------- **
        $userModel = new User();
        $q = $this->request->getGet('q');
        if (empty($q)) {
            $users = $userModel->select('id, f_name, l_name, email, salery')->findAll();
        } else {
            $s = preg_replace('/\s+/', ' ', $q);
            $s = explode(' ', $s);

            $users = $userModel->select('id, f_name, l_name, email, salery')->like('f_name', $s[0])
                ->orLike('l_name', count($s) >= 2 ? $s[1] : $s[0])
                ->orLike('email', $s[0])
                ->orLike('salery', $q[0])
                ->findAll();
        }

        return view('index', [
            "users" => $users,
            "q" => $q
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
                    'required' => 'Firstname is required',
                    'alpha' => 'Firstname should only contain alphabetic letters',
                    'min_length' => 'Firstname must be at least 3 characters in length',
                    'max_length' => 'Firstname cannot exceed 49 characters in length'
                ],

                'l_name' => [
                    'required' => 'Lastname is required',
                    'alpha' => 'Lastname should only contain alphabetic letters',
                    'min_length' => 'Lastname must be at least 3 characters in length',
                    'max_length' => 'Lastname cannot exceed 49 characters in length'
                ],
                'email' => [
                    'required' => 'Email is required',
                    'valid_email' => 'You should give a valid email id'
                ],
                'salery' => [
                    'required' => 'Salary is required',
                    'numeric' => 'Salary can not be alphabetic letter or any special characters'
                ],
                'password' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be at least 8 characters in length',
                    'max_length' => 'Password cannot exceed 255 characters in length'
                ],
                'conf_password' => [
                    'required' => 'Confirm password must be given',
                    'matches' => 'Confirm password must be same as password'
                ]
            ])) {
                $userModel = new User();
                //$userModel->insert(); // It returns last inserted row id
                $userData = [
                    'f_name' => $this->request->getPost('f_name'),
                    'l_name' => $this->request->getPost('l_name'),
                    'email' => $this->request->getPost('email'),
                    'salery' => $this->request->getPost('salery'),
                    'password' => $this->request->getPost('password'),
                    'conf_password' => $this->request->getPost('conf_password'),
                ]; // It returns boolean value

                $userModel->addUser($userData);

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
                        return redirect()->to('users');
                    }
                } else {
                    $userEdit = [
                        'f_name' => $this->request->getPost('f_name'),
                        'l_name' => $this->request->getPost('l_name'),
                        'salery' => $this->request->getPost('salery'),
                    ];
                    $res = $userModel->editUser($id, $userEdit);

                    if ($res) {
                        session()->setFlashdata('msg', 'Yeee amr makup complete');
                        return redirect()->to('users/');
                    } else {
                        return view('edit_user', [
                            'user' => $user
                        ]);
                    }
                }
            }
        }
    }


    public function delete($id)
    {
        $userModel = new User();
        $userDel = $userModel->deleteUser($id);
        if ($userDel) {
            session()->setFlashdata('msg', 'Yee ami mar khey more gachi');
            return redirect()->to('users');
        } else {
            return redirect()->to('/');
        }
    }
}
