<?php

namespace App\Controllers;

use App\Models\ExistingCustomerModel;
use App\Models\CustomerModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use monken\Tablesigniter;
use App\Models\NotifyModel;




class CustomerReportsController extends BaseController
{
    protected $customerModel;
    protected $existingCustomers;
    protected $userModel;
    protected $productModel;
    protected $notifyModel;
    public $globalVariable;

    public function __construct()
    {
        $this->existingCustomers = new ExistingCustomerModel();
        $this->CustomerModel = new CustomerModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->notifyModel = new NotifyModel();
        
    }

    public function index()
    {

        $data['existing_customer'] = $this->existingCustomers->findAll();
        $data['userRole'] = $this->userModel->select('id,username')->where('role_id', '3')->get()->getResultArray();
        $data['supervisor'] = $this->userModel->select('supervisor_id,username')->where('role_id', '1')->get()->getResultArray();
        $data['products'] = $this->productModel->select('product_code,product_name')->get()->getResultArray();
       //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/reports', $data);
    }
    public function filterReportDataNew()
    {
        if ($this->request->isAJAX()) {

            $formInput = $this->request->getPost();
            // print_r($formInput);
            $cust_id = $formInput['retention_cust_id'];
            $createDateStart = $formInput['retention_cdate_from'];
            $createDateEnd = $formInput['retention_cdate_to'];
            $lastOrderSdate = $formInput['retention_lastOrder_from'];
            $lastOrderEdate = $formInput['retention_lastOrder_to'];
            $supervisor = $formInput['retention_supervisor'];
            $product = $formInput['retention_product'];
            $agent = $formInput['retention_agent'];
            $data = $this->userModel->select('id,username')->where('role_id', '3')->get()->getResultArray();
            $output = '';
            if (!empty($cust_id)) {

                //search customers with customer id
                $cust_data = $this->existingCustomers->getBycustId($cust_id);
                $output .= '<table class="table table-striped table-hover table-bordered" id="sample_3">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="group-checkable" data-set="#sample_3.checkboxes" />
                        </th>
                        <th> Customer ID </th>
                        <th> Customer Name </th>
                        <th> Assign agent </th>
                        <th> Previously assigned </th>
                        <th> Total Order Amount</th>
                        <th> Last updated </th>
                        <!-- <th> Action </th> -->
                    </tr>
                </thead>
                <tbody>';
                // form_open(base_url('assign_agents'), 'id="assignAgents"');
                foreach ($cust_data as $cust) :
                    $output .= '
                    <tr>
                    <td>
                    <input type="checkbox" class="checkboxes" />
                   </td>
                      <td>' . $cust['customer_id'] . '</td>
                      <td>' . $cust['name'] . "  " . $cust['lname'] . '</td>
                      <td>
                      <select class="tableFieldAgent form-control input-small select2-multiple">
                          <option></option>';
                    foreach ($data as $agent) :
                        $output .= '<option value="' . $agent["username"] . '">' . $agent['username'] . '</option>';
                    endforeach;
                    $output .= '
                      </select>
                  </td>
                  <td>';
                    foreach ($data as $agent) :
                        if ($cust['agent_id'] == $agent['id']) {
                            $output .= $agent['username'];
                        }
                    endforeach;

                    $output .= ' </td>
                  <td> 300 </td>
                  <td>' . $cust['modified'] . '</td>
                    </tr>';

                endforeach;
                $output .= form_close();
                $output .= '</tbody></table>';
                echo  $output;
            } else if (!empty($createDateStart) && !empty($createDateEnd)) {
                //search customer by created date
                $cust_data = $this->existingCustomers->getbycreatedDate($createDateStart, $createDateEnd);
                $output .= '<table class="table table-striped table-hover table-bordered" id="sample_3">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="group-checkable" data-set="#sample_3.checkboxes" />
                        </th>
                        <th> Customer ID </th>
                        <th> Customer Name </th>
                        <th> Assign agent </th>
                        <th> Previously assigned </th>
                        <th> Total Order Amount</th>
                        <th> Last updated </th>
                        <!-- <th> Action </th> -->
                    </tr>
                </thead>
                <tbody>';
                // form_open(base_url('assign_agents'), 'id="assignAgents"');
                foreach ($cust_data as $cust) :
                    $output .= '
                    <tr>
                    <td>
                    <input type="checkbox" class="checkboxes" />
                   </td>
                      <td>' . $cust['customer_id'] . '</td>
                      <td>' . $cust['name'] . "  " . $cust['lname'] . '</td>
                      <td>
                      <select class="tableFieldAgent form-control input-small select2-multiple">
                          <option></option>';
                    foreach ($data as $agent) :
                        $output .= '<option value="' . $agent["username"] . '">' . $agent['username'] . '</option>';
                    endforeach;
                    $output .= '
                      </select>
                  </td>
                  <td>';
                    foreach ($data as $agent) :
                        if ($cust['agent_id'] == $agent['id']) {
                            $output .= $agent['username'];
                        }
                    endforeach;

                    $output .= ' </td>
                  <td> 300 </td>
                  <td>' . $cust['modified'] . '</td>
                    </tr>';

                endforeach;
                $output .= form_close();
                $output .= '</tbody></table>';
                echo  $output;
            } else if (!empty($lastOrderSdate) && !empty($lastOrderEdate)) {
                //search customer by order placed date
            } else if (!empty($supervisor)) {
                //search  by supervisor
            } else if (!empty($product)) {
                //search by product
            } else if (!empty($agent)) {
                //search by agent
            } else {
                $query = $this->existingCustomers->findAll();
                // echo $query['customer_id'];
                // exit;


                //table output as ajax response
                $output .= '<table class="table table-striped table-hover table-bordered" id="sample_3">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="group-checkable" data-set="#sample_3.checkboxes" />
                        </th>
                        <th> Customer ID </th>
                        <th> Customer Name </th>
                        <th> Assign agent </th>
                        <th> Previously assigned </th>
                        <th> Total Order Amount</th>
                        <th> Last updated </th>
                        <!-- <th> Action </th> -->
                    </tr>
                </thead>
                <tbody>';
                // form_open(base_url('assign_agents'), 'id="assignAgents"');
                foreach ($query as $cust) :
                    $output .= '
                    <tr>
                    <td>
                    <input type="checkbox" class="checkboxes" />
                   </td>
                      <td>' . $cust['customer_id'] . '</td>
                      <td>' . $cust['name'] . "  " . $cust['lname'] . '</td>
                      <td>
                      <select class="tableFieldAgent form-control input-small select2-multiple">
                          <option></option>';
                    foreach ($data as $agent) :
                        $output .= '<option value="' . $agent["username"] . '">' . $agent['username'] . '</option>';
                    endforeach;
                    $output .= '
                      </select>
                  </td>
                  <td>';
                    foreach ($data as $agent) :
                        if ($cust['agent_id'] == $agent['id']) {
                            $output .= $agent['username'];
                        }
                    endforeach;

                    $output .= ' </td>
                  <td> 300 </td>
                  <td>' . $cust['modified'] . '</td>
                    </tr>';

                endforeach;
                $output .= form_close();
                $output .= '</tbody></table>';
                return $output;
            }
        }
    }

    public function filterReportData()
    {
        //     $data_table = new Tablesigniter();
        //     $data_table->setTable($this->existingCustomers->noticeFunction())
        //         ->setDefaultOrder('id', 'asc')
        //         ->setOutput(["id", "customer_id", "name", "lname"]);
        //     return $data_table->getDatatable();
        $params['draw'] = $_REQUEST['draw'];
        $start = $_REQUEST['start'];
        $length = $_REQUEST['length'];


        /* If we pass any extra data in request from ajax */
        //$value1 = isset($_REQUEST['key1'])?$_REQUEST['key1']:"";

        /* Value we will get from typing in search */
        $search_value = $_REQUEST['search']['value'];


        // count all data
        // $total_count = $this->existingCustomers->findAll();

        //get customer data with agent data
        $total_count = $this->existingCustomers->existingCustomerCount();



        // get per page data
        // $fetch_data = $this->existingCustomers->findAll($length, $start);
        $fetch_data = $this->existingCustomers->fetchExistingCustomers($length, $start);

        $data = array();
        if (!empty($fetch_data)) {
            foreach ($fetch_data as $row) {
                $sub_array = array();
                $userRole = $this->userModel->select('id,username')->where('role_id', '3')->get()->getResultArray();
                //created dom_field variable to store dropdown to be displayed along with data in the datatable
                $dom_field = '<select  id="agentName_' . $row['id'] . '" name="retention_agent[' . $row['id'] . ']" class="form-control input-medium select2-multiple">
                    <option></option>';
                foreach ($userRole as $agent) {
                    $dom_field .= '<option value="' . $agent['id'] . '">' . $agent['username'] . '</option>';
                }
                $dom_field .= '</select>';
                $sub_array[]  = '<input type="checkbox" class="rem_send" id="cust_' . $row['id'] . '" name="cust[' . $row['id'] .']"class="checkboxes" value="'.$row['id'].'"/>';
                $sub_array[] = $row['customer_id'];
                $sub_array[] = $row['name'];
                $sub_array[] = $row['lname'];
                $sub_array[] =  $dom_field;
                $sub_array[] = $row['username'];
                if($row['previous_agent_id'] == 0)
                {
                 $sub_array[] = "NA";
                }
                $sub_array[] = $row['email'];

                $data[] = $sub_array;
            }
        }



        $json_data = array(
            "draw" => intval($_POST['draw']),
            "recordsTotal" => count($total_count),
            "recordsFiltered" => count($total_count),
            "data" => $data   // total data array
        );

        echo json_encode($json_data);
    }
    public function filterOptReports()
    {
       
          $fdata= $this->request->getPost();//Post ajax call
          static $nestedArr;
          foreach($fdata as $data)
          {
             $nestedArr=$data;
          }
     
          $result= $this->existingCustomers->updateBatch($nestedArr,"id");

    }
}
