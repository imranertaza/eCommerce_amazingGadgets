<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Email_send extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Email_send';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
        $this->permission = new Permission();
    }

    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {




            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Email_send/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function email_send_action(){
        $data['subject'] = $this->request->getPost('subject');
        $data['message'] = $this->request->getPost('message');
        $data['user'] = $this->request->getPost('user');

        $this->validation->setRules([
            'subject' => ['label' => 'Subject', 'rules' => 'required'],
            'message' => ['label' => 'Message', 'rules' => 'required'],
            'user' => ['label' => 'User', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('email_send');
        } else {

//            $to= 'dnationsoftbd5@gmail.com';
//            $to= 'dnationsoftdm8@gmail.com';
//            $subject = $data['subject'];
//            $message= $data['message'];
//            email_send($to,$subject,$message);

            if ($data['user'] == 'subscribe'){
                $subscrib = get_all_data_array('cc_newsletter');
                foreach ($subscrib as $sub){
                    $to = $sub->email;
                    $subject = $data['subject'];
                    $message= $data['message'];
                    email_send($to,$subject,$message);
                }
            }

            if ($data['user'] == 'customer'){
                $customer = get_all_data_array('cc_customer');
                foreach ($customer as $cus){
                    $to = $cus->email;
                    $subject = $data['subject'];
                    $message= $data['message'];
                    email_send($to,$subject,$message);
                }
            }


            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('email_send');
        }
    }




}
