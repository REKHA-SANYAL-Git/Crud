<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CatModel;

class CatController extends BaseController
{
    public function index()
    {
        $catModel = new CatModel();
        $categories = $catModel->select('id, c_name')->findAll();

        // echo "<pre>";
        // print_r($catModel);
        // exit;

        return view('list_categories', [
            "categories" => $categories,
        ]);
    }

    public function search()
    {
        $catModel = new CatModel();
        $q = $this->request->getGet('q');

        if (empty($q)) {
            $categories = $catModel->select('id, c_name')->findAll();
        } else {
            $s = preg_replace('/\s+/', ' ', $q);
            $s = explode(' ', $s);

            $categories = $catModel->select('id, c_name')->like('c_name', $s[0])->findAll();
        }

        return view('list_categories', [
            "categories" => $categories,
            "q" => $q
        ]);
    }

    public function create()
    {
        helper('form');
        if ($this->request->getMethod() === 'get') {
            return view('create_cat');
        } else {
            $catModel = new CatModel();

            //insert
            $data = [
                'c_name' => $this->request->getPost('c_name'),
            ];

            $res = $catModel->addCat($data);
            if ($res) {
                session()->setFlashdata('msg', 'Category added successfully');
                return redirect()->to('list_categories');
            } else {
                return redirect()->to('list_categories/create');
            }
        }
    }

    public function edit($id)
    {
        helper('form');
        $catModel = new CatModel();
        $categories = $catModel->select('id, c_name')->where('id', $id)->first();

        if ($this->request->getMethod() === 'get') {
            return view('edit_cat', [
                'categories' => $categories
            ]);
        } else {
            $catEdit = [
                'c_name' => $this->request->getPost('c_name'),
            ];
            $res = $catModel->editCat($id, $catEdit);
            if ($res) {
                session()->setFlashdata('msg', 'Category edited successfully');
                return redirect()->to('list_categories');
            }
            return redirect()->to('list_categories');
        }
    }

    public function delete($id)
    {
        $catModel = new CatModel();
        $catDel = $catModel->deleteCat($id);

        if ($catDel) {
            session()->setFlashdata('msg', 'Category deleted successfully');
            return redirect()->to('list_categories');
        } else {
            return redirect()->to('list_categories');
        }
    }
}
