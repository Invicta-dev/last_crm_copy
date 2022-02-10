<?php

namespace App\Controllers\Auth;

use App\Models\RoleModel;
use App\Models\SupervisorModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\BatchModel;
use CodeIgniter\Controller;
use App\Models\NotifyModel;



class Dashboard extends Controller
{

    protected $userModel;
    protected $roleModel;
    protected $supervisorModel;
    protected $productModel;
    protected $batchModel;
    protected $customerModel;
    protected $notifyModel;
    public $globalVariable;
   

    public function __construct()
    {

        helper('form', 'url');
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->supervisorModel = new SupervisorModel();
        $this->productModel = new ProductModel();
        $this->batchModel = new BatchModel();
        $this->customerModel = new CustomerModel();
         $this->notifyModel = new NotifyModel();
       
    }
 
    public function index()
    {
        if (session()->has('username')) :
            // session()->set('unread',$this->notifyModel->getNotification());
           $this->globalVariable=$this->notifyModel->getNotification();
            $data['global']=$this->globalVariable;
            $data['notifications']=$this->notifyModel->notification_details();
            return view('Dashboard/dashboard',$data);
        else :
            return redirect()->to(base_url() . '/');
        endif;
    }
    public function logout()
    {
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url() . '/');
    }
    public function user()
    {
        $data['user_info'] = $this->userModel->findAll();
        $data['user_role'] = $this->roleModel->findAll();
        $data['user_supervisor'] = $this->userModel->get_supervisor();
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/user', $data);
    }
    public function addUser()
    {

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => [
                    'rules' => 'required|alpha',
                    'errors' => [
                        'required' => 'The First name field is required',
                        'alpha' => 'The First name should contain only alphabets'
                    ]
                ],
                'fullName' => [
                    'rules' => 'required|alpha_space',
                    'errors' => [
                        'required' => 'The Last name field is required',
                        'alpha' => 'The Last name should contain only alphabets'
                    ]

                ],
                'password' => [
                    'rules' => 'required|min_length[8]',
                    'errors' => [
                        'min_length' => 'password strength should be aleast 8 character long'
                    ]
                ],
                'confirmPassword' => [
                    'rules' => 'required|matches[password]',
                    'errors' => [
                        'required' => 'Confirm password field is required',
                        'matches' => 'Confirm password mismatch'
                    ]
                ],
                'phone' => [
                    'rules' => 'required|greater_than_equal_to[10]',
                    'errors' => [
                        'greater_than' => 'Phone number should be 10 character long'
                    ]
                ],
                'role' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'User role field is required'
                    ]
                ],
            ];
            if ($this->validate($rules)) {
                $pwd = password_hash($this->request->getVar('password'), PASSWORD_DEFAULT);
                $uniid = md5(str_shuffle('affjfukjbcdetyiolkrlpqrstuvwxyz' . time()));





                $role_exist = $this->roleModel->where('role_name', $this->request->getVar('role'))->first();

                if ($role_exist) {
                    $role_id = $role_exist['role_id'];
                } else {
                    $role_id = $this->roleModel->getRoleId($this->request->getVar('role'));
                    $role_id = $role_id['role_id'];
                }

                $form_data = [

                    'username' => $this->request->getVar('username'),
                    'fullname' => $this->request->getVar('fullName'),
                    'uniid' => $uniid,
                    'password' => $pwd,
                    'phone' => $this->request->getVar('phone'),
                    'role_id' => $role_id,
                    // 'supervisor_id' => $supervisor_id,



                ];


                $where = ['username' => $this->request->getVar('username'), 'role_id' => $role_id];
                $if_exist = $this->userModel->where($where)->first();
                if (!$if_exist) {
                    $this->userModel->insert($form_data);
                    $user_id = $this->userModel->insertID(); //get the last inserted id
                    if ($this->request->getVar('role') != 'agent') {
                        $role_exist = $this->supervisorModel->where('supervisor_user_id', $this->request->getVar('leader'))->first();
                        if ($role_exist) {
                            $supervisor_id = ['supervisor_id' => $role_exist['id']];
                            $this->userModel->update($user_id, $supervisor_id);
                        } else {
                            $this->supervisorModel->insert(['name' => $this->request->getVar('username'), 'supervisor_user_id' => $user_id]);
                            $supervisor_id = $this->supervisorModel->get_insert_id();

                            $supervisor_id = $supervisor_id['id'];
                            $supervisor_id = ['supervisor_id' => $supervisor_id];
                            $this->userModel->update($user_id, $supervisor_id);
                        }
                    } else {

                        $supervisor_id = ['supervisor_id' => $this->request->getVar('leader')];
                        $this->userModel->update($user_id, $supervisor_id);
                    }

                    echo "user added successfully";
                } else {
                    echo "user already exist";
                }
            } else {
                session()->setFlashData('validation', $this->validator);
                // $data['validation'] = $this->validator;
                return redirect()->back()->withInput();
            }
        } else {

            $data['supervisors'] = $this->userModel->get_supervisor();

            $this->globalVariable=$this->notifyModel->getNotification();
            $data['global']=$this->globalVariable;
            $data['notifications']=$this->notifyModel->notification_details();
            return view('Dashboard/add-user', $data);
        }
    }
    public function getPosition()
    {
        $table_data['role'] = $this->roleModel->findAll();
        $table_data['supervisor'] = $this->supervisorModel->findAll();

        echo json_encode($table_data);
    }
    public function EditUser()
    {

        if ($this->request->getMethod() == 'post') {
            $role_id = $this->request->getVar('role');
            $id = $this->request->getVar('userId');
            $formsupervisor_id = $this->request->getVar('supervisor');



            if ($role_id != '3') {

                $check_if_exist = $this->supervisorModel->checkForSupervisor($id);
                if (empty($check_if_exist)) { //add user to supervisor table
                    $get_user = $this->userModel->select('id ,username')->where('id', $id)->get()->getRow();
                    // echo $get_user->id;
                    // exit;
                    $insertData = ['supervisor_user_id' => $get_user->id, 'name' => $get_user->username];
                    $this->supervisorModel->insert($insertData);
                    $supervisor_id = $this->supervisorModel->insertID();
                    $supervisor_id = ['supervisor_id' => $supervisor_id, 'role_id' => $role_id];
                    $this->userModel->update($get_user->id, $supervisor_id);
                    session()->setFlashdata('success', 'User updated successfully');
                    return redirect()->to(base_url('user'));
                } else { //if user other then the agent exist

                    $roleId = $this->userModel->select('role_id')->where('id', $check_if_exist->supervisor_user_id)->get()->getRow();
                    if ($roleId->role_id == $role_id) {
                        // echo  "user already exist";
                        $update_existing_customer = ['phone' => $this->request->getVar('phone'), 'fullname' => $this->request->getVar('fullname')];
                        if ($this->userModel->update($id, $update_existing_customer)) {
                            session()->setFlashdata('success', 'Existing user updated successfully');
                            return redirect()->to(base_url('user'));
                        }
                    } else {
                        //if user is supervisor and promoted to admin or customer_service
                        if ($roleId->role_id == '1') {
                            // echo $roleId->role_id;
                            // exit;
                            $result_userId = $this->userModel->getUserExceptSuperv($check_if_exist->supervisor_user_id, $check_if_exist->id);
                            if (empty($result_userId)) {
                                $update_data = ['role_id' => $role_id];
                                $this->userModel->update($id, $update_data);
                            } else {
                                $update_agents = ['supervisor_id' => 0];
                                $this->userModel->update($result_userId, $update_agents);
                                $update_data = ['role_id' => $role_id];
                                $this->userModel->update($id, $update_data);
                            }
                        } else {
                            $update_data = ['role_id' => $role_id];
                            $this->userModel->update($id, $update_data);
                        }


                        // echo "user role updated";
                        session()->setFlashdata('success', 'User role updated successfully');
                        return redirect()->to(base_url('user'));
                    }
                }
            } else //if role is changed to agent
            {

                //if we want to assign supervisor to agent
                if (isset($formsupervisor_id) && $formsupervisor_id != $id) {
                    $supervId = $this->supervisorModel->select('id')->where('supervisor_user_id ', $formsupervisor_id)->get()->getRow();
                    $update_data = ['supervisor_id' => $supervId->id];
                    $this->userModel->update($id, $update_data);
                    session()->setFlashdata('success', 'Supervisor assigned successfully');
                    return redirect()->to(base_url('user'));
                } else { //else if we demote supervisor to agent

                    // echo "remove from supervisor table";
                    $check_if_exist = $this->supervisorModel->checkForSupervisor($id);
                    $user_id = $check_if_exist->supervisor_user_id;
                    $super_id = $check_if_exist->id;
                    // echo $super_id;
                    $query_data = $this->userModel->agentsBelongTosuprv($super_id);
                    $update_rows = ['supervisor_id' => 0];
                    $this->supervisorModel->delete($check_if_exist->id);
                    $data = ['supervisor_id' => 0, 'role_id' => $role_id];
                    if ($this->userModel->update($user_id, $data)) {
                        //if the supervisor  is demoted to agent then the agents assigned are reset 
                        $this->userModel->update($query_data, $update_rows);
                        echo "User updated successfully";
                        session()->setFlashdata('success', 'User updated successfully');
                        return redirect()->to(base_url('user'));
                    }
                }
            }
        }
    }
    public function RemoveUser()
    {
        $id = $this->request->uri->getSegment(2);
        $this->userModel->delete($id);
        echo json_encode(array("status" => TRUE));
    }
    public function getProducts()
    {
        $data['products'] = $this->productModel->findAll();
        //get batch data
        $data['batch_products'] = $this->batchModel->findAll();
        //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/products', $data);
    }
    public function addProducts()
    {

        if ($this->request->getMethod() == 'post') {
            $product_data = [
                'product_code' => $this->request->getVar('prdCode'),
                'product_name' => $this->request->getVar('prdName'),
                'product_price' => $this->request->getVar('prdPrice'),
                'description' => $this->request->getVar('desc'),
                'ingredients' => $this->request->getVar('ingrd')
            ];
            $checkForExistence = $this->productModel->isExist($this->request->getVar('prdCode'));
            if ($checkForExistence  == '') { //check 
                $this->productModel->insert($product_data);
                session()->setFlashdata('success', 'Product added successfully');
                return redirect()->to(base_url('add-product'));
            } else {
                session()->setFlashdata('error', 'Product Code already exist');
                return redirect()->to(base_url('add-product'));
            }
        }
        //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/add-product',$data);
    }
    public function delete_prd($prd_code = null)
    {
        // $uri = current_url(true);
        // echo  $prd_code = $uri->getSegment(3); //gets prd_code from get request
        if ($this->productModel->delete($prd_code)) {
            echo json_encode(array("status" => TRUE));
            session()->setFlashdata('success', "Product deleted successfully");
        } else {
            echo json_encode(array("status" => false));
            session()->setFlashdata('error', "Sorry! something went wrong");
        }
    }

    public function editProduct()
    {
        $prd_code = $this->request->getVar('product_code');

        $product_data = json_encode(array('product' => ($this->productModel->isExist($prd_code)), 'batches' => ($this->batchModel->getBatches($prd_code))));
        echo $product_data;
    }

    public function batchEntry()
    {
        if ($this->request->getMethod() == 'post') {
            $form_data = [
                'batch_num' => $this->request->getVar('batch'),
                'expiry' => $this->request->getVar('expiry'),
                'remaining_qty' => $this->request->getVar('qty'), //please change this
                'qty' => $this->request->getVar('qty'),
                'prd_code' => $this->request->getVar('product_code')
            ];
            // print_r($form_data);

            $this->batchModel->insert($form_data);
            echo json_encode(array("status" => TRUE));
        }
    }
    public function editProductFields()
    {
        $form_data = $this->request->getPost();
        $id = $this->request->getVar('product_code');
        // echo $this->request->getVar('prd_name');
        if ($this->productModel->update($id, $form_data)) {
            echo "Data updated successfully";
        }
    }


    public function editCustomer()
    {
        if ($this->request->getMethod() == "post") {
            $cust_id = $this->request->getVar();
            $customer_data = $this->customerModel->where('id', $cust_id)->first();
            echo json_encode($customer_data);
        } else {
            //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
            return view('Dashboard/customers-edit',$data);
        }
    }
    public function getRawData()
    {
        //Gets fresh lead customer
        $data['customers'] = $this->customerModel->findAll();
        //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/registry', $data);
    }
    public function placeOrder()
    { 
        //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/add-customer-order',$data);
    }
    public function editRegistryCustomer()
    {
        $data = [];
        $cust_name = $this->request->getVar('customerName');
        $brk_string = (explode(" ", $cust_name));

        if ($this->request->getVar('status') == 'Callback') {
            date_default_timezone_set('Asia/Kolkata');
            $data = [
                'title' => $brk_string[0],
                'first_name' => $brk_string[1],
                'last_name' => $brk_string[2],
                'note' => $this->request->getVar('note'),
                'status' => $this->request->getVar('status'),
                'town' => $this->request->getVar('town'),
                'county' => $this->request->getVar('county'),
                'postcode' => $this->request->getVar('postCode'),
                'call_back_date' =>  date("d-m-Y", strtotime($this->request->getVar('callback_date'))),
                'call_back_time' =>  date("h:i:s A", strtotime($this->request->getVar('callback_time'))),
                'updated_at' => date("Y-m-d h:i:s")

            ];
        } else {
            $data = [
                'title' => $brk_string[0],
                'first_name' => $brk_string[1],
                'last_name' => $brk_string[2],
                'note' => $this->request->getVar('note'),
                'status' => $this->request->getVar('status'),
                'town' => $this->request->getVar('town'),
                'county' => $this->request->getVar('county'),
                'postcode' => $this->request->getVar('postCode')

            ];
        }

        $raw_cust_id = $this->request->getVar('customerId');
        if ($this->customerModel->update($raw_cust_id, $data)) {
            echo "customer updated successfully";
        } else {
            echo "something went wrong ";
        }
    }
    public function viewRegistryCustomer()
    {
        $customer_id = $this->request->getVar('customerId');
        $customer_record = $this->customerModel->where('id', $customer_id)->first();
        echo json_encode($customer_record);
    }
    public function assignCustomerData()
    {
        //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
        return view('Dashboard/assign_customer',$data);
    }
}
