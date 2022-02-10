<?php

namespace App\Controllers;


use App\Models\ExistingCustomerModel;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\CustomerModel;
use App\Models\NotifyModel;



class CustomerController extends Controller
{
    protected $existingCustomers;
    protected $userModel;
    protected $notifyModel;
    public $globalVariable;
    

    public function __construct()
    {
        helper('form', 'url');
        $this->existingCustomers = new ExistingCustomerModel();
        $this->userModel = new UserModel();
        $this->customerModel = new CustomerModel();
        $this->notifyModel = new NotifyModel();
    }
    public function getCustomers()
    {
        $data['existing_customers'] = $this->existingCustomers->findAll();
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/customer', $data);
    }
    public function addCustomer()
    {
        if ($this->request->getMethod() == 'post') {
            //form data
            $fromResp = [
                'customer_id' => $this->request->getvar('cust_id'),
                'title' => $this->request->getvar('title'),
                'name' => $this->request->getvar('fname'),
                'lname' => $this->request->getvar('lname'),
                'agent_id' => $this->request->getvar('agent'),
                'address' => $this->request->getvar('address1'),
                'add2' => $this->request->getvar('address2'),
                'state' => $this->request->getvar('county'),
                'country' => $this->request->getvar('country'),
                'city' => $this->request->getvar('town'),
                'zip_code' => $this->request->getvar('post_code'),
                'email' => $this->request->getvar('inputEmail'),
                'phone' => $this->request->getvar('PhoneNum'),
                'do_not_call' => !empty($this->request->getvar('dnc')) ? 1 : 0,
                'remark' => $this->request->getvar('remark'),

            ];
            //check if customer exist with same customer name and phone number
            $check_if_custExist = $this->existingCustomers->CheckForexistance($fromResp['name'], $fromResp['phone']);

            if ($check_if_custExist === 0) {
                if ($this->existingCustomers->insert($fromResp)) {
                    session()->setFlashdata('success', 'Successfully added customer');
                } else {
                    session()->setFlashdata('error', 'Sorry! Somthing went wrong try again');
                }
                return redirect('add-customer');
            } else {
                session()->setFlashdata('error', 'Exist! User already exist ');
                return redirect('add-customer');
            }
        } else {


            $data['autoGenId'] = $this->existingCustomers->getNextAutoId();
            $data['userRole'] = $this->userModel->select('id,username')->where('role_id', '3')->get()->getResultArray();
           //global variable
            $this->globalVariable=$this->notifyModel->getNotification();
            $data['global']=$this->globalVariable;
            $data['notifications']=$this->notifyModel->notification_details();
            return view('Dashboard/create-customer', $data);
        }
    }
    //search existing customer by keyword
    public function searchByKeyword()
    {
        if ($this->request->getMethod() == 'post') {
            $cust_id = $this->request->getvar('custCode');
            $cust_fname = $this->request->getvar('fname');
            $cust_lname = $this->request->getvar('lname');
            $cust_phone = $this->request->getvar('phone');
            $id = $this->request->getvar('id');
            $cust_post_code = $this->request->getvar('post_code');
            $data = [];


            if (!empty($cust_id)) {
                $data['Searchresult'] = $this->existingCustomers->like('customer_id', $cust_id)->get()->getRowArray();
                  //global Variable
                  $this->globalVariable=$this->notifyModel->getNotification();
                  $data['global']=$this->globalVariable;
                  $data['notifications']=$this->notifyModel->notification_details();
                return view('Dashboard/add-customer-order', $data);
            } else if (!empty($cust_fname)) {
                $fname['cust_name'] = $this->existingCustomers->like('name', $cust_fname)->get()->getResultArray();
                $count = count($fname['cust_name']);
                if ($count > 1) {

                    session()->setFlashdata($fname);
                    return redirect('customer');
                } else {
                    $data['Searchresult'] = $this->existingCustomers->like('name', $cust_fname)->get()->getRowArray();
                      //global Variable
                      $this->globalVariable=$this->notifyModel->getNotification();
                      $data['global']=$this->globalVariable;
                      $data['notifications']=$this->notifyModel->notification_details();
                    return view('Dashboard/add-customer-order', $data);
                }
            } else if (!empty($cust_lname)) {

                $fname['cust_name'] = $this->existingCustomers->like('lname', $cust_lname)->get()->getResultArray();
                $count = count($fname['cust_name']);
                if ($count > 1) {

                    session()->setFlashdata($fname);
                    return redirect('customer');
                } else {
                    $data['Searchresult'] = $this->existingCustomers->like('lname', $cust_lname)->get()->getRowArray();
                    //global Variable
                    $this->globalVariable=$this->notifyModel->getNotification();
                    $data['global']=$this->globalVariable;
                    $data['notifications']=$this->notifyModel->notification_details();
                    return view('Dashboard/add-customer-order', $data);
                }
            } else if (!empty($cust_phone)) {
                $data['Searchresult'] = $this->existingCustomers->like('phone', $cust_phone)->get()->getRowArray();
                 //global Variable
                 $this->globalVariable=$this->notifyModel->getNotification();
                 $data['global']=$this->globalVariable;
                 $data['notifications']=$this->notifyModel->notification_details();
                return view('Dashboard/add-customer-order', $data);
            } else if (!empty($cust_post_code)) {
                $data['Searchresult'] = $this->existingCustomers->like('zip_code', $cust_post_code)->get()->getRowArray();
                  //global Variable
                  $this->globalVariable=$this->notifyModel->getNotification();
                  $data['global']=$this->globalVariable;
                  $data['notifications']=$this->notifyModel->notification_details();
                return view('Dashboard/add-customer-order', $data);
            } else {
                return redirect('customer');
            }
        }

          //on click of add order in customer page
        $cust_id = session()->get('id');
        $data['Searchresult'] = $this->existingCustomers->where('customer_id', $cust_id)->get()->getRowArray();
        $uri = current_url(true);
        $id=$uri->getSegment(3);
         $data['customers_details']=$this->existingCustomers->where('customer_id',$id)->get()->getRowArray();
        // session()->destroy('id');
        //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/add-customer-order', $data);
    }
    public function addOrder($id)
    {
        //we are fetching agent id to assign agent to customer on placement of order
        $agent_id = session()->get('userId');
        // echo $id;

        $data = $this->customerModel->where('id', $id)->get()->getResultArray();
        $data['agent_id'] = $agent_id;
        //Generate customer id before adding leads to existing customers table
        $genId = $this->existingCustomers->getNextAutoId();


        $inset_data = [
            'customer_id' => $genId,
            'title' => $data[0]['title'],
            'name' => $data[0]['first_name'],
            'lname' => $data[0]['last_name'],
            'agent_id' => $data['agent_id'],
            'address' => $data[0]['address1'],
            'add2' => $data[0]['address2'],
            'state' => $data[0]['county'],
            'country' => '',
            'city' => $data[0]['town'],
            'zip_code' => $data[0]['postcode'],
            'email' => '',
            'phone' => $data[0]['phone'],

        ];
        // print_r($inset_data);
        // exit;
        if ($this->existingCustomers->insert($inset_data)) {
            //also update the status in leads to added
            $leadId = $data[0]['id'];
            $data = ['status' => 'Added'];
            $this->customerModel->update($leadId, $data);
            session()->setFlashdata('success', 'Customer registered successfully');
            return redirect('customer');
        } else {
            session()->setFlashdata('error', 'Something went wrong');
            return redirect('registry');
        }



        //We are adding customers from Fresh leads

        // return view('Dashboard\add-order');
    }
        //To fetch customer and order detail from customer having same first name
       public function matchingCust()
        {
            session()->set('id', $this->request->getvar('id'));
            echo "search-customer";
        }
    
}
