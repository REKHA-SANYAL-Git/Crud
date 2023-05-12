<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BrandModel;

class BrandController extends BaseController
{
    public function index()
    {
        $brandModel = new BrandModel();
        $brands = $brandModel->getBrands();

        // echo "<pre>";
        // print_r($brands);
        // exit;

        return view('brand', [
            "brands" => $brands,
        ]);
    }

    public function search()
    {
        $brandModel = new BrandModel();
        $q = $this->request->getGet('q');

        if (empty($q)) {
            $brands = $brandModel->select('id, b_name')->findAll();
        } else {
            $s = preg_replace('/\s+/', ' ', $q);
            $s = explode(' ', $s);

            $brands = $brandModel->select('id, b_name')->like('b_name', $s[0])->findAll();
        }

        // echo "<pre>";
        // print_r($brands);
        // exit;


        return view('brand', [
            "brands" => $brands,
            "q" => $q
        ]);
    }

    public function create()
    {
        helper('form');
        if ($this->request->getMethod() === 'get') {
            return view('create_brand');
        } else {
            $brandModel = new BrandModel();

            //insert
            $brandData = [
                'b_name' => $this->request->getPost('b_name'),
            ];

            $result = $brandModel->addBrands($brandData);

            if ($result) {
                session()->setFlashdata('msg', 'BrandName added successfully');
                return redirect()->to('brand');
            }

            // return redirect()->to('brand/create');
        }
    }

    public function edit($id)
    {
        helper('form');
        $brandModel = new BrandModel();
        $brands = $brandModel->select('id, b_name')->where('id', $id)->first();

        if ($this->request->getMethod() === 'get') {
            return view(
                'edit_brand',
                ['brands' => $brands]
            );
        } else {

            $brandData = [
                'b_name' => $this->request->getPost('b_name'),
            ];
            $res = $brandModel->editBrand($id, $brandData);

            if ($res) {
                session()->setFlashdata('msg', 'Brand edited successfully');
                return redirect()->to('brand');
            }
            return redirect()->to('brand');
        }
    }


    public function delete($id)
    {
        $brandModel = new BrandModel();
        $brandDel   = $brandModel->deleteBrand($id);
        if ($brandDel) {
            session()->setFlashdata('msg', 'BrandName deleted successfully');
            return redirect()->to('brand');
        } else {
            return redirect()->to('brand');
        }
    }
}
