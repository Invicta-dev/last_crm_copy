<?php

namespace App\Models;

use CodeIgniter\Model;



class ExistingCustomerModel extends Model
{

    protected $table      = 'existing_customers';
    protected $primaryKey = 'id';



    protected $allowedFields = ['id', 'customer_id', 'title', 'media_code', 'name', 'lname', 'agent_id','previous_agent_id','address', 'add2', 'state', 'country', 'city', 'zip_code', 'email', 'phone', 'company_id', 'do_not_call', 'remark', 'active', 'created', 'modified'];



    public function getNextAutoId()
    {
        $builder = $this->db->table('existing_customers');
        $builder->selectMax('id');
        $tem = $builder->get()->getRowArray();
        $count = $tem['id'];
        $count++;
        $prefix = '';
        return $prefix . str_pad($count, 4, '0', STR_PAD_LEFT);
    }
    public function CheckForexistance($name, $phone)
    {
        $builder = $this->db->table('existing_customers');
        $where = ['name' => $name, 'phone' => $phone];
        $builder->where($where);
        $query = $builder->get()->getResultArray();
        return count($query);
    }
    public function noticeFunction()
    {
        $builder = $this->db->table('existing_customers');
        return $builder;
    }
    // public function getBycustId($id)
    // {
    //     $builder = $this->db->table('existing_customers');
    //     $builder->where('customer_id', $id);
    //     $query = $builder->get()->getResultArray();
    //     return $query;
    // }
    // public function getbycreatedDate($start, $end)
    // {
    //     $formated_start = date("Y-m-d H:i:s", strtotime($start));
    //     $formated_end = date("Y-m-d H:i:s", strtotime($end));
    //     $builder = $this->db->table('existing_customers');
    //     $condition = ['created >=' => $formated_start, 'created <=' => $formated_end];
    //     $builder->where($condition);
    //     $query = $builder->get()->getResultArray();
    //     return $query;
    // }
    //search by keyword
    public function datatableSearch($keyword, $length, $start)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('existing_customers', 'existing_customers.agent_id = users.id ');
        $builder->like('existing_customers.customer_id ', $keyword);
        $builder->orLike('existing_customers.name', $keyword);
        $builder->orLike('existing_customers.lname', $keyword);
        $builder->orLike('existing_customers.email', $keyword);
        $query = $builder->get($length, $start)->getResultArray();
        return $query;
    }
    public function datatableSearchCount($keyword)
    {
        $builder = $this->db->table('users');
        $builder->select('*');
        $builder->join('existing_customers', 'existing_customers.agent_id = users.id ');
        $builder->like('existing_customers.customer_id ', $keyword);
        $builder->orLike('existing_customers.name', $keyword);
        $builder->orLike('existing_customers.lname', $keyword);
        $builder->orLike('existing_customers.email', $keyword);
        $query = $builder->get()->getResultArray();
        return $query;
    }
    
    public function existingCustomerCount()
    {
        $builder = $this->db->table('users u');
        $builder->select('*');
        $builder->join('existing_customers ec', 'ec.agent_id = u.id ');
        //External filter options in reports
        if (!empty($_POST['customer_id'])) {
            $builder->where("ec.customer_id", $_POST['customer_id']);
        }

        if (!empty($_POST['retention_start_date']) && !empty($_POST['retention_end_date'])) {

            $condition = ['created >' => $_POST['retention_start_date'], 'created <=' => $_POST['retention_end_date']];
            $builder->where($condition);
        }

        if (!empty($_POST['agentName'])) {
            //filter by agent
            $builder->where("ec.agent_id", $_POST['agentName']);
        }
        if (!empty($_REQUEST['search']['value'])) {
            $keyword = $_REQUEST['search']['value'];
            $builder->where('(ec.customer_id like "%' . $keyword . '%" or  ec.name like "%' . $keyword . '%" 
            or  ec.lname like "%' . $keyword . '%" or  ec.email like "%' . $keyword . '%")');
        }
        if (!empty($_POST['allotedTo2'])) {

            $subQuery = $this->db->table('users');
            $subQuery->select('id');
            $where = ['supervisor_id' => $_POST['allotedTo2'], 'role_id' => 3];
            $subQuery->where($where);

            $result = $subQuery->get()->getResultArray();
            if (!empty($result)) {
                $agent_id = array();
                foreach ($result as $values) {
                    $agent_id[] = $values['id'];
                }
            } else {
                $agent_id[] = '';
            }
            $builder->whereIn('agent_id', $agent_id);
        }

        $query = $builder->get()->getResultArray();
        // print_r($query);
        // exit;
        return $query;
    }
    public function fetchExistingCustomers($tbl_limit, $tbl_offset)
    {
        /* data.customer_id = $("#customers_select").val();
                        data.retention_start_date = $("#retention_start_date").val();
                        data.retention_end_date = $("#retention_end_date").val();
                        data.lastorder_start_date = $("#lastorder_start_date").val();
                        data.lastorder_end_date = $("#lastorder_end_date").val();
                        data.allotedTo2 = $("#allotedTo2").val();
                        data.agentName = $("#select2-agentName2-container").val();
                        data.product = $("#select2-prd2-container").val();
         */
        //$postdata =  $this->input->post();

        $builder = $this->db->table('users u');
        $builder->select('*');
        $builder->join('existing_customers ec', 'ec.agent_id = u.id ');
        //External filter options in reports
        if (!empty($_POST['customer_id'])) {
            $builder->where("ec.customer_id", $_POST['customer_id']);
        }
        if (!empty($_POST['product'])) {
            //filter by
        }
        if (!empty($_POST['agentName'])) {
            //filter by agent
            $builder->where("ec.agent_id", $_POST['agentName']);
        }
        if (!empty($_POST['retention_start_date']) && !empty($_POST['retention_end_date'])) {
            $start = date("Y-m-d", strtotime($_POST['retention_start_date']));
            $end = date("Y-m-d", strtotime($_POST['retention_end_date']));

            $condition = ['created >=' => $start, 'created <' => $end];
            $builder->where($condition);
        }
        if (!empty($_REQUEST['search']['value'])) {
            $keyword = $_REQUEST['search']['value'];
            $builder->where('(ec.customer_id like "%' . $keyword . '%" or  ec.name like "%' . $keyword . '%" 
            or  ec.lname like "%' . $keyword . '%" or  ec.email like "%' . $keyword . '%")');
        }
        if (!empty($_POST['allotedTo2'])) {
            //get agent ids that belong to the supervisor id
            $subQuery = $this->db->table('users');
            $subQuery->select('id');
            $where = ['supervisor_id' => $_POST['allotedTo2'], 'role_id' => 3];
            $subQuery->where($where);
            $result = $subQuery->get()->getResultArray();

            if (!empty($result)) {
                $agent_id = array();
                foreach ($result as $values) {
                    $agent_id[] = $values['id'];
                }
            } else {
                $agent_id[] = '';
            }
            $builder->whereIn('agent_id', $agent_id);
        }


        $query = $builder->get($tbl_limit, $tbl_offset)->getResultArray();
        return $query;
    }
}
