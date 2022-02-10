<?php

namespace App\Models;

use CodeIgniter\Model;


class RoleModel extends Model
{

    protected $table      = 'roles';
    protected $primaryKey = 'role_id';



    protected $allowedFields = ['role_name'];
    public function getRoleId($name)
    {
        $builder = $this->db->table('roles');
        $builder->insert(['role_name' => $name]);
        $builder->select('role_id');
        $builder->orderBy('role_id', 'DESC');
        $result = $builder->get()->getRowArray();
        return $result;
    }
}
