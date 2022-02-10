<?php

namespace App\Controllers\Auth;

use App\Models\RoleModel;
use App\Models\SupervisorModel;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Models\CustomerModel;
use App\Models\BatchModel;
use CodeIgniter\Controller;



class Dashboard extends Controller
{

    protected $userModel;
    protected $roleModel;
    protected $supervisorModel;
    protected $productModel;
    protected $batchModel;
    protected $customerModel;

    public function __construct()
    {

        helper('form', 'url');
        $this->userModel = new UserModel();
        $this->roleModel = new RoleModel();
        $this->supervisorModel = new SupervisorModel();
        $this->productModel = new ProductModel();
        $this->batchModel = new BatchModel();
        $this->customerModel = new CustomerModel();
    }
    public function index()
    {
        if (session()->has('logged_user')) :
            return view('Dashboard/dashboard');
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
        $data['user_supervisor'] = $this->supervisorModel->findAll();
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


                // if (!empty($this->request->getVar('leader'))) {

                //     $supervisor_id = $this->supervisorModel->get_supervisor_id($this->request->getVar('leader'));
                // }



                $role_exist = $this->roleModel->where('role_name', $this->request->getVar('role'))->first();

                if ($role_exist) {
                    $role_id = $role_exist['role_id'];
                } else {
                    // $this->roleModel->insert(['role_name' => $this->request->getVar('role')]);
                    // $role_id = $this->roleModel->insert_id();
                    $role_id = $this->roleModel->getRoleId($this->request->getVar('role'));
                    $role_id = $role_id['role_id'];
                }


                if ($this->request->getVar('role') == 'supervisor') {
                    $role_exist = $this->supervisorModel->where('name', $this->request->getVar('username'))->first();
                    if ($role_exist) {
                        $supervisor_id = $role_exist['id'];
                    } else {
                        $this->supervisorModel->insert(['name' => $this->request->getVar('username')]);
                        $supervisor_id = $this->supervisorModel->get_insert_id();
                        $supervisor_id = $supervisor_id['id'];
                    }
                } else if ($this->request->getVar('role') == 'admin') {
                    $supervisor_id = 2; //This is hardcoded in database
                } else if ($this->request->getVar('role') == 'customer service') {
                    $supervisor_id = 1; // This is hardcoded in database
                } else {
                    $supervId = $this->supervisorModel->where('name', $this->request->getVar('leader'))->first();
                    $supervisor_id = $supervId['id'];
                }


                $form_data = [

                    'username' => $this->request->getVar('username'),
                    'fullname' => $this->request->getVar('fullName'),
                    'uniid' => $uniid,
                    'password' => $pwd,
                    'phone' => $this->request->getVar('phone'),
                    'role_id' => $role_id,
                    'supervisor_id' => $supervisor_id,



                ];


                $where = ['username' => $this->request->getVar('username'), 'role_id' => $role_id];
                $if_exist = $this->userModel->where($where)->first();
                if (!$if_exist) {
                    $this->userModel->insert($form_data);
                    if ($this->request->getVar('role') == 'supervisor') {
                        echo  $this->userModel->insert_id();
                        exit;
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
            $data['supervisors'] = $this->supervisorModel->findAll();
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
            $supervisor_id = $this->request->getVar('leader');
            if ($this->request->getVar('role') == '1') {
                $supervisor_exist = $this->supervisorModel->get_supervisor_id($this->request->getVar('username'));

                if (empty($supervisor_exist)) {
                    $this->supervisorModel->insert(['name' => $this->request->getVar('username')]);
                    $supervisor_id = $this->supervisorModel->get_insert_id();
                    $supervisor_id = $supervisor_id['id'];
                } else {
                    $supervisor_id = $supervisor_exist['id'];
                }
            } else {
                $supervisor_id = $this->request->getVar('supervisor');
            }
            if ($this->request->getVar('role') == '3') {
                $supervisor_exist = $this->supervisorModel->get_supervisor_id($this->request->getVar('username'));
                if ($supervisor_exist && ($supervisor_exist['id'] != '2' || $supervisor_exist['id'] != '1')) {

                    $this->userModel->changeSupervisor($supervisor_exist['id']);
                    $supervisor_id = NUll;
                    $this->supervisorModel->delete($supervisor_exist['id']);
                }
            }
            if ($this->request->getVar('role') == '2') {
                $supervisor_id = 2; //This is hardcoded in database
            }
            if ($this->request->getVar('role') == '4') {
                $supervisor_id = 4; //This is hardcoded in database
            }


            $data = [
                'username' => $this->request->getVar('username'),
                'fullname' => $this->request->getVar('fullname'),
                'supervisor_id' => $supervisor_id,
                'phone' => $this->request->getVar('phone'),
                'role_id' => $role_id
            ];


            if ($this->userModel->update($id, $data)) {
                return redirect()->to(base_url() . '/user');
            }
        }
        echo "im out";
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
        return view('Dashboard/add-product');
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
            return view('Dashboard/customers-edit');
        }
    }
    public function getRawData()
    {
        $data['customers'] = $this->customerModel->findAll();
        return view('Dashboard/registry', $data);
    }
    public function placeOrder()
    {
        return view('Dashboard/add-customer-order');
    }
    public function editRegistryCustomer()
    {
        $data = [];
        $cust_name = $this->request->getVar('customerName');
        $brk_string = (explode(" ", $cust_name));

        if ($this->request->getVar('status') == 'Callback') {

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
                'call_back_time' =>  date("h:i:s A", strtotime($this->request->getVar('callback_time')))

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
        return view('Dashboard/assign_customer');
    }
}
