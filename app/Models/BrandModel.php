<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'brands';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['b_name'];

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

    public function getBrands()
    {
        $this->select('id,b_name');
        $result = $this->findAll();
        return $result;
    }

    public function addBrands($data)
    {
        if ($this->save($data)) {
            // echo $this->save($data);
            //exit;
            return true;
        } else {
            return false;
        }
    }

    public function editBrand($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteBrand($id)
    {
        return $this->where('id', $id)->delete();
    }
}
