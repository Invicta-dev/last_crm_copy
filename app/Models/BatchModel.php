<?php

namespace App\Models;

use CodeIgniter\Model;


class BatchModel extends Model
{

    protected $table      = 'batch_number';
    protected $primaryKey = 'batch_num';



    protected $allowedFields = ['batch_num', 'expiry', 'remaining_qty', 'qty', 'prd_code'];

    public function getBatches($prd_id)
    {
        $builder = $this->db->table('batch_number');
        $builder->select('*');
        $builder->where('prd_code', $prd_id);
        $query = $builder->get()->getResultArray();
        return $query;
    }
}
