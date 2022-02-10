<?php

namespace App\Models;

use CodeIgniter\Model;


class SupervisorModel extends Model
{

    protected $table      = 'supervisors';
    protected $primaryKey = 'id';



    protected $allowedFields = ['name', 'supervisor_user_id'];
    public function get_supervisor_id($name)
    {
        $builder = $this->db->table('supervisors');
        $builder->select('id');
        $builder->where('name', $name);
        $query = $builder->get()->getRowArray();
        return $query;
    }
    public function get_insert_id()
    {
        $builder  = $this->db->table('supervisors');
        $builder->select('id');
        $builder->orderBy('id', 'DESC');
        $query = $builder->get()->getRowArray();
        return $query;
    }
    public function checkForSupervisor($id)
    {

        $builder = $this->db->table('supervisors');
        $builder->where('supervisor_user_id', $id);
        $query = $builder->get()->getRow();
        return $query;
    }
}
