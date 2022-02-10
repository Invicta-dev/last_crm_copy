<?php

namespace App\Models;

use CodeIgniter\Model;


class ProductOrdersModel extends Model
{

    protected $table      = 'product_orders_relation';
    protected $primaryKey = 'id';



    protected $allowedFields = ['order_id','product_id','qty'];

    public function getOrderedProd($ord_id)
    {
        $builder=$this->db->table('product_orders_relation ordPrd');
        $builder->select('*');
        $builder->join('products','products.product_code= ordPrd.product_id ');
        $builder->where('ordPrd.order_id',$ord_id);
        $query=$builder->get()->getResultArray();
        return $query;
    }
}