<?php

namespace App\Models;

use CodeIgniter\Model;


class CustomerModel extends Model
{

    protected $table      = 'customers';
    protected $primaryKey = 'id';



    protected $allowedFields = ['title', 'first_name', 'last_name', 'address1', 'address2', 'address3', 'status', 'call_back_date', 'call_back_time', 'note', 'town', 'country', 'postcode', 'phone', 'age', 'ownership', 'mobility', 'created_at', 'updated_at'];

    public  function checkForCustomer($contact)
    {
        $builder = $this->db->table('customers');
        $builder->where('phone', $contact);
        $query = $builder->get()->getRowArray();
        return $query;
    }
}
