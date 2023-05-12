<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\CatModel;
use App\Models\BrandModel;
use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $products = $productModel->getProducts();

        return view('products', [
            "Products" => $products,
        ]);
    }


    public function create()
    {


        if ($this->request->getMethod() === 'get') {
            helper('form');
            $p_brand = array();
            $p_cat = array();
            $p_brandmodel = new BrandModel();
            $p_CatModel = new CatModel();
            $brand_options = array();
            $cat_options = array();

            $p_brands = $p_brandmodel->select('id, b_name')->findAll();
            $p_cats = $p_CatModel->select(' id, c_name')->findAll();

            foreach ($p_brands as $p_brand) {
                $brand_options[$p_brand['id']] =  $p_brand['b_name'];
            }
            foreach ($p_cats as $p_cat) {
                $cat_options[$p_cat['id']] = $p_cat['c_name'];
            }
            return view('create_product', [
                "brand_options" => $brand_options,
                "cat_options" => $cat_options,
            ]);
        } else {

            $productModel = new ProductModel();
            //print_r($this->request);
            //echo "Product submitted";
            //exit();
            //insert
            $productData = [
                'p_name' => $this->request->getPost('p_name'),
                'b_id' => $this->request->getPost('b_id'),
                'c_id' => $this->request->getPost('c_id'),
                'm_no' => $this->request->getPost('m_no'),
                'quantity' => $this->request->getPost('quantity'),
                'price' => $this->request->getPost('price'),

            ];
            $result = $productModel->addProduct($productData);
            if ($result) {
                session()->setFlashdata('msg', 'Product added successfully');
                return redirect()->to('products');
            } else {
                return redirect()->to('products/create');
            }
        }
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $Products = $productModel->select('id,p_name,m_no')->where('id', $id)->first();

        if ($this->request->getMethod() === 'get') {
            return view('edit_product', [
                'Products' => $Products
            ]);
        } else {
            // $data =
            //     $productModel->update($id, [
            //         'p_name' => $this->request->getPost('p_name'),
            //         'm_no' => $this->request->getPost('m_no')

            //     ]);
            $productEdit =  [
                'p_name' => $this->request->getPost('p_name'),
                'm_no' => $this->request->getPost('m_no')

            ];

            $result = $productModel->editProduct($id, $productEdit);
            if ($result) {
                session()->setFlashdata('msg', 'Products edited successfully');
                return redirect()->to('products');
            } else {
                return redirect()->to('products/edit');
            }
        }
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $productdel = $productModel->deleteProduct($id);
        // print_r($productdel);
        // exit;
        if ($productdel) {
            session()->setFlashdata('msg', 'Products deleted successfully');
            return redirect()->to('products');
        } else {
            return redirect()->to('products');
        }
    }
}
