<?php

namespace App\Models;

use CodeIgniter\Model;


class NotifyModel extends Model
{

    protected $table      = 'notify';
    protected $primaryKey = 'id';



    protected $allowedFields = ['notify_to', 'note_from','oor_id', 'status', 'created_at'];

    public function getNotification()
    {
        $builder=$this->db->table('notify');
        $builder->select('*');
        $builder->where('status',1);
        $query=$builder->countAllResults();
        return $query;
    }

    public function notification_details()
    {
        $builder=$this->db->table('notify n');
        $builder->select('n.oor_id as ord_id,u.*');
        $builder->join('users u','u.id=n.note_from');
        $builder->where('n.status',1);
        $query= $builder->get()->getResultArray();
        return $query;
    }
}
