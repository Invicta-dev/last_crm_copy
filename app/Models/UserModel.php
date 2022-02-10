<?php

namespace App\Models;

use CodeIgniter\Model;


class UserModel extends Model
{

    protected $table      = 'users';
    protected $primaryKey = 'id';



    protected $allowedFields = ['id', 'username', 'fullname', 'password', 'role_id', 'supervisor_id', 'phone', 'uniid', 'updated_at'];
    public function verifyEmail($email)
    {
        $builder = $this->db->table('users');
        $builder->select("uniid,role,username");
        $builder->where("email", $email);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }
    public function updatedTime($uniid)
    {
        $builder = $this->db->table('users');
        $builder->where('uniid', $uniid);

        if ($builder->update(['updated_at' => date('Y-m-d h:i:s')])) {
            return true;
        } else {
            return false;
        }
    }
    public function verifyToken($token = null)

    {
        $builder = $this->db->table('users');
        $builder->select("username,email,uniid,updated_at");
        $builder->where('uniid', $token);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRowArray();
        } else {
            return false;
        }
    }

    //Reset password
    public function insertData($data = null)
    {
        $builder = $this->db->table('users');
        $builder->where('uniid', $data['token']);
        if ($builder->update(['password' => $data['password']])) {
            return true;
        } else {
            return false;
        }
    }
    public function changeSupervisor($id = null)
    {
        echo $id;
        $builder = $this->db->table('users');
        $builder->where('supervisor_id', $id);

        if ($builder->update(['supervisor_id' => NULL])) {
            return true;
        } else {
            return false;
        }
    }
    public function get_supervisor()
    {
        $builder = $this->db->table('roles');
        $builder->select('role_id ');
        $builder->where('role_name', 'Supervisor');
        $query = $builder->get()->getResultArray();
        $role_id_array = array_column($query, 'role_id'); //to get only the values from the array

        $builder = $this->db->table('users');
        $builder->select('id,supervisor_id,username');
        $builder->whereIn('role_id', $role_id_array);
        $supervisor_array = $builder->get()->getResultArray();

        return $supervisor_array;
        // $builder = $this->db->table('users');
        // $builder->select('*');
        // $builder->join('roles', 'role.id = users.id');
        // $query = $builder->get();
    }
    public function agentsBelongTosuprv($superv_id)
    {
        $builder = $this->db->table('users');
        $builder->select('id');
        $builder->where('supervisor_id', $superv_id);
        $query = $builder->get()->getResultArray();
        $user_id_array = array_column($query, 'id');
        return $user_id_array;
    }
    public function getUserExceptSuperv($superv_userId, $supervUniqueId)
    {

        $builder = $this->db->table('users');
        $builder->select('id');
        $where = ['supervisor_id' => $supervUniqueId, 'id !=' => $superv_userId];
        $builder->where($where);
        $query = $builder->get()->getResult();
        $result = array_column($query, 'id');
        return $result;
    }
}
