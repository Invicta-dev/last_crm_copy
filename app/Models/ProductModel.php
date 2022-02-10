<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductModel extends Model
{

    protected $table      = 'products';
    protected $primaryKey = 'product_code ';



    protected $allowedFields = ['product_code', 'product_name', 'product_price', 'ingredients', 'description', 'quantity', 'created_at', 'updated_at'];
    public function isExist($prd_code)
    {
        $builder = $this->db->table('products');
        $builder->where('product_code', $prd_code);
        $query = $builder->get()->getRowArray();
        return $query;
    }
    // public function editProduct($prd_code)
    // {
    //     $builder = $this->db->table('products');
    //     $builder->select('*');
    //     $builder->join('batch_number', 'batch_number.prd_code = products.product_code');
    //     $builder->where('product_code', $prd_code);
    //     $query = $builder->get()->getResultArray();
    //     print_r($query);
    // }
     //get product name for dropdown in order page
    public function getproductName($match)
    {
        $builder = $this->db->table('products');
        // $builder->select('product_name');
        $builder->like('product_name', $match, 'both'); // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
        $query = $builder->get()->getResultArray();
        // foreach ($query->getResult() as $row) {
        //     echo $row->vendor_name;
        // }
        return $query;
    }
    public function getprodcode($match)
    {
        $builder = $this->db->table('products');
        // $builder->select('product_code');
        $builder->like('product_code',$match,'both');
        $row = $builder->get()->getResultArray();
        return $row;
    }
}
