<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Customers extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Customers';

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
            return redirect()->to(site_url('Admin/Login'));
        } else {

            $table = DB()->table('customer');
            $data['customer'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Customers/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create(){
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('Admin/Login'));
        } else {

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Customers/create');
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {
        $data['firstname'] = $this->request->getPost('firstname');
        $data['lastname'] = $this->request->getPost('lastname');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');
        $data['password'] = $this->request->getPost('password');
        $data['con_password'] = $this->request->getPost('con_password');

        $this->validation->setRules([
            'firstname' => ['label' => 'First Name', 'rules' => 'required'],
            'lastname' => ['label' => 'Last Name', 'rules' => 'required'],
            'email' => ['label' => 'Email', 'rules' => 'required'],
            'phone' => ['label' => 'Phone', 'rules' => 'required|min_length[10]|max_length[12]'],
            'password' => ['label' => 'Password', 'rules' => 'required|min_length[6]|max_length[30]'],
            'con_password' => ['label' => 'Confirm Password', 'rules' => 'required|min_length[6]|max_length[30]|matches[password]'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Customers/create');
        } else {
            $check = is_exists('customer','phone',$data['phone']);
            $check2 = is_exists('customer','email',$data['email']);
            if (($check == true) && ($check2 == true)) {
                $data2['firstname'] = $this->request->getPost('firstname');
                $data2['lastname'] = $this->request->getPost('lastname');
                $data2['email'] = $this->request->getPost('email');
                $data2['phone'] = $this->request->getPost('phone');
                $data2['password'] = SHA1($this->request->getPost('password'));
                $data2['createdBy'] = $this->session->adUserId;


                $table = DB()->table('customer');
                $table->insert($data2);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to('/Admin/Customers/create');
            }else{
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Email Or Phone already exists <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to('/Admin/Customers/create');
            }
        }
    }

    public function update($customer_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('Admin/Login'));
        } else {

            $table = DB()->table('customer');
            $data['customers'] = $table->where('customer_id', $customer_id)->get()->getRow();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Customers/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {
        $customer_id = $this->request->getPost('customer_id');
        $data['firstname'] = $this->request->getPost('firstname');
        $data['lastname'] = $this->request->getPost('lastname');
        $data['email'] = $this->request->getPost('email');
        $data['phone'] = $this->request->getPost('phone');
        if (!empty($this->request->getPost('password'))) {
            $data['password'] = SHA1($this->request->getPost('password'));

            if ($this->request->getPost('password') != $this->request->getPost('con_password')){
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Password and Confirm Password do not match <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to('/Admin/Customers/update/' . $customer_id);
            }
        }
        $data['updatedBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'firstname' => ['label' => 'First Name', 'rules' => 'required'],
            'lastname' => ['label' => 'Last Name', 'rules' => 'required'],
            'email' => ['label' => 'Email', 'rules' => 'required'],
            'phone' => ['label' => 'Phone', 'rules' => 'required|min_length[10]|max_length[12]'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Customers/update/' . $customer_id);
        } else {
            $check = is_exists_update('customer','phone',$data['phone'],'customer_id',$customer_id);
            $check2 = is_exists_update('customer','email',$data['email'],'customer_id',$customer_id);
            if (($check == true) && ($check2 == true)) {
                $table = DB()->table('customer');
                $table->where('customer_id', $customer_id)->update($data);

                $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to('/Admin/Customers/update/' . $customer_id);
            }else{
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Email Or Phone already exists <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to('/Admin/Customers/update/'. $customer_id);
            }

        }
    }

    public function general_action()
    {
        $customer_id = $this->request->getPost('customer_id');
        $data['father_name'] = $this->request->getPost('father_name');
        $data['mother_name'] = $this->request->getPost('mother_name');
        $data['age'] = $this->request->getPost('age');
        $data['nid'] = $this->request->getPost('nid');
        $data['address'] = $this->request->getPost('address');
        $data['updatedBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'address' => ['label' => 'Address', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Customers/update/' . $customer_id);
        } else {

            $table = DB()->table('customer');
            $table->where('customer_id', $customer_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Customers/update/' . $customer_id);

        }
    }

    public function image_action(){
        $customer_id = $this->request->getPost('customer_id');

        if (!empty($_FILES['pic']['name'])) {
            $target_dir = FCPATH . '/uploads/customer/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //old image unlink
            $old_img = get_data_by_id('pic', 'customers', 'customer_id', $customer_id);
            if (!empty($old_img)) {
                $imgPath = $target_dir . '' . $old_img;
                if (file_exists($imgPath)) {
                    unlink($target_dir . '' . $old_img);
                }
            }

            //new image uplode
            $pic = $this->request->getFile('pic');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'customers_' . $pic->getName();
            $this->crop->withFile($target_dir . '' . $namePic)->fit(250, 150, 'center')->save($target_dir . '' . $news_img);
            unlink($target_dir . '' . $namePic);
            $data['pic'] = $news_img;

            $table = DB()->table('customer');
            $table->where('customer_id', $customer_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Customers/update/' . $customer_id);
        } else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">No image selected!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Customers/update/' . $customer_id);
        }

    }

    public function delete($customer_id){

        $target_dir = FCPATH . '/uploads/customer/';
        //old image unlink
        $old_img = get_data_by_id('pic', 'customers', 'customer_id', $customer_id);
        if (!empty($old_img)) {
            $imgPath = $target_dir . '' . $old_img;
            if (file_exists($imgPath)) {
                unlink($target_dir . '' . $old_img);
            }
        }


        $table = DB()->table('customer');
        $table->where('customer_id', $customer_id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Customers');
    }

}
