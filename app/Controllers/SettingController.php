<?php

namespace App\Controllers;


use App\Models\CustomerModel;
use App\Models\NotifyModel;


class SettingController extends BaseController
{
    protected $customerModel;
    protected $notifyModel;
    public $globalVariable;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
        $this->notifyModel = new NotifyModel();
    }
    public function choose_setting()
    {

        if ($this->request->getMethod() == 'post') {
            $files = $this->request->getFile('importfile');
            $rules = array(
                'importfile' => 'uploaded[importfile]|ext_in[importfile,xls,csv,xlsx]'
            );
            if ($this->validate($rules)) {

                $targetPath = $files->getTempName();
                // echo $targetPath;

                /** Load $inputFileName to a Spreadsheet object **/
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetPath);
                $data = $spreadsheet->getActiveSheet()->toArray();
                array_shift($data); //used to skip the first elemt from arr which is header
                // print_r($data);
                $counter = 0;
                $form_data = [];
                $db_data = [];
                $result = [];
                foreach ($data as $row) {
                    //check for excel field length 
                    if (count($row) === 13) {
                        //check if customer exist
                        $phone_number = $row[9];
                        $check_existence = $this->customerModel->checkForCustomer($phone_number);
                        if ($check_existence == '') {
                            $form_data[] = [
                                'title' => $row[0],
                                'first_name' => $row[1],
                                'last_name' => $row[2],
                                'address1' => $row[3],
                                'address2' => $row[4],
                                'address3' => $row[5],
                                'status' => 'New',
                                'town' => $row[6],
                                'county' => $row[7],
                                'postcode' => $row[8],
                                'phone' => $row[9],
                                'age' => $row[10],
                                'ownership' => $row[11],
                                'mobility' => $row[12]
                            ];
                            $counter++;
                        }
                    } else {
                        session()->setFlashdata('error', 'file formate mismatch');
                        return redirect()->to(base_url('settings'));
                    }
                }

                //if customer data exit
                if (empty($form_data)) {
                    session()->setFlashdata('error', ' Customer data already exist');
                    return redirect()->to(base_url('settings'));
                } else {

                    if ($this->customerModel->insertBatch($form_data)) {
                        // echo "data uploaded successfully";
                        if ($counter == count($data)) {
                            session()->setFlashdata('success', 'Customers imported successfully');
                        } else {
                            session()->setFlashdata('success', 'Customers imported successfully \n' . ((count($data) - $counter) + 1) . ' Duplicate entries were found.');
                        }
                        return redirect()->to(base_url('settings'));
                    } else {
                        // echo " Failed to upload data";
                        session()->setFlashdata('error', 'something went wrong');
                        return redirect()->to(base_url('settings'));
                    }
                }
            } else {
                // echo "Invalid file format";
                session()->setFlashdata('error', 'Invalid file format');
                return redirect()->to(base_url('settings'));
            }
        } else {
            //global variable
        $this->globalVariable=$this->notifyModel->getNotification();
        $data['global']=$this->globalVariable;
        $data['notifications']=$this->notifyModel->notification_details();
            return view('Dashboard/setting',$data);
        }
    }
}
