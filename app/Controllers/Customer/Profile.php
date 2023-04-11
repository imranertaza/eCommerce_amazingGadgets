<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use App\Models\FavoriteModel;

class Profile extends BaseController
{

    protected $validation;
    protected $session;
    protected $favoriteModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->favoriteModel = new FavoriteModel();
    }

    public function index()
    {
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;
        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) {
            return redirect()->to(site_url('Login'));
        } else {
            $table = DB()->table('cc_customer');
            $data['customer'] = $table->where('customer_id',$this->session->cusUserId)->get()->getRow();

            $table = DB()->table('cc_address');
            $data['address'] = $table->where('customer_id',$this->session->cusUserId)->get()->getRow();

            $data['menu_active'] = 'profile';
            $data['page_title'] = 'Profile';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/menu');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/profile',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

    public function update_action(){
        $data['firstname'] = $this->request->getPost('firstname');
        $data['lastname'] = $this->request->getPost('lastname');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');

        $data['address_1'] = $this->request->getPost('address_1');
        $data['address_2'] = $this->request->getPost('address_2');
        $data['city'] = $this->request->getPost('city');
        $data['postcode'] = $this->request->getPost('postcode');


        $data['current_password'] = $this->request->getPost('current_password');
        $data['new_password'] = $this->request->getPost('new_password');
        $data['confirm_password'] = $this->request->getPost('confirm_password');

        $data['subscription'] = $this->request->getPost('subscription');

        $this->validation->setRules([
            'firstname' => ['label' => 'First name', 'rules' => 'required'],
            'lastname' => ['label' => 'Last name', 'rules' => 'required'],
            'email' => ['label' => 'Email', 'rules' => 'required'],
            'phone' => ['label' => 'Phone', 'rules' => 'required'],
            'postcode' => ['label' => 'Post code', 'rules' => 'required'],
            'city' => ['label' => 'City', 'rules' => 'required'],
            'address_1' => ['label' => 'Address line 1', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . '</div>');
            return redirect()->to('profile');
        } else {

            $cusData['firstname'] = $data['firstname'];
            $cusData['lastname'] = $data['lastname'];
            $cusData['email'] = $data['email'];
            $cusData['phone'] = $data['phone'];

            if (!empty($data['current_password'])){
                $check = is_exists_double_condition('cc_customer','customer_id',$this->session->cusUserId,'password',SHA1($data['current_password']));
                if ($check == false){
                    if ($data['new_password'] == $data['confirm_password']){
                        $cusData['password'] =  SHA1($data['new_password']);
                    }else{
                        $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">New password and confirm password not match </div>');
                        return redirect()->to('profile');
                    }
                }else{
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Current password not match </div>');
                    return redirect()->to('profile');
                }
            }

            $table = DB()->table('cc_customer');
            $table->where('customer_id',$this->session->cusUserId)->update($cusData);

            //address
            $addData['customer_id'] = $this->session->cusUserId;
            $addData['firstname'] = $data['firstname'];
            $addData['lastname'] = $data['lastname'];
            $addData['address_1'] = $data['address_1'];
            $addData['address_2'] = $data['address_2'];
            $addData['city'] = $data['city'];
            $addData['postcode'] = $data['postcode'];

            $check_address = is_exists('cc_address','customer_id',$this->session->cusUserId);
            if ($check_address == true){
                $tabAd = DB()->table('cc_address');
                $tabAd->insert($addData);
            }else{
                $tabAd = DB()->table('cc_address');
                $tabAd->where('customer_id',$this->session->cusUserId)->update($addData);
            }

            if (!empty($this->request->getPost('subscription'))){
                $newData['customer_id'] = $this->session->cusUserId;
                $newData['email'] = $data['email'];
                $newAd = DB()->table('cc_newsletter');
                $newAd->insert($newData);
            }


            $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Update successfully </div>');
            return redirect()->to('profile');

        }
    }

}
