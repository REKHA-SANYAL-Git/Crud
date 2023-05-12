<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'p_name',
        'b_id',
        'c_id',
        'm_no',
        'quantity',
        'price'

    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    // public function get_brand_name($id)
    // {
    //     $db = \Config\Database::connect();
    //     $builder = $db->table('brand');
    //     $builder->select('b_name');
    //     $builder->where('id', $id);
    //     $query = $builder->get();
    //     $result = $query->getRow();
    //     return $result->name;
    // }

    public function getProducts()
    {
        $this->join('brands', 'brands.id=products.b_id', 'LEFT');
        $this->join('categories', 'categories.id=products.c_id', 'LEFT');
        $this->select('products.id,p_name,brands.b_name,categories.c_name,m_no,quantity,price');
        $this->orderBy('products.id', 'desc');
        $result = $this->findAll();
        //echo $this->getLastQuery();
        return $result;
    }
    public function addProduct($data)
    {
        if ($this->save($data)) {
            // echo $this->save($data);
            //exit;
            //echo $this->getLastQuery();
            return true;
        } else {
            return false;
        }
    }
    public function editProduct($id, $data)
    {
        return $this->update($id, $data);
    }
    public function deleteProduct($id)
    {
        return $this->where('id', $id)->delete();
    }
}
