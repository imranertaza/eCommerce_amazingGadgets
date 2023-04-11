<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Coupon extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Coupon';

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

            $table = DB()->table('cc_coupon');
            $data['coupon'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Coupon/index', $data);
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
            return redirect()->to(site_url('admin'));
        } else {

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Coupon/create');
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {
        $data['name'] = $this->request->getPost('name');
        $data['code'] = $this->request->getPost('code');
        $data['discount'] = $this->request->getPost('discount');
        $data['total_useable'] = $this->request->getPost('total_useable');
        $data['date_start'] = $this->request->getPost('date_start');
        $data['date_end'] = $this->request->getPost('date_end');

        $data['discount_on'] = $this->request->getPost('discount_on');
        $data['for_subscribed_user'] = $this->request->getPost('for_subscribed_user');
        $data['for_registered_user'] = $this->request->getPost('for_registered_user');

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
            'code' => ['label' => 'Code', 'rules' => 'required'],
            'discount' => ['label' => 'Discount', 'rules' => 'required'],
            'total_useable' => ['label' => 'Total Useable', 'rules' => 'required'],
            'date_start' => ['label' => 'Start Date', 'rules' => 'required'],
            'date_end' => ['label' => 'End Date', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('coupon_create');
        } else {


            $table = DB()->table('cc_coupon');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('coupon_create');
        }
    }

    public function update($coupon_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_coupon');
            $data['coupon'] = $table->where('coupon_id', $coupon_id)->get()->getRow();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Coupon/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {
        $coupon_id = $this->request->getPost('coupon_id');
        $data['name'] = $this->request->getPost('name');
        $data['code'] = $this->request->getPost('code');
        $data['discount'] = $this->request->getPost('discount');
        $data['total_useable'] = $this->request->getPost('total_useable');
        $data['date_start'] = $this->request->getPost('date_start');
        $data['date_end'] = $this->request->getPost('date_end');

        $data['discount_on'] = $this->request->getPost('discount_on');
        $data['for_subscribed_user'] = $this->request->getPost('for_subscribed_user');
        $data['for_registered_user'] = $this->request->getPost('for_registered_user');

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
            'code' => ['label' => 'Code', 'rules' => 'required'],
            'discount' => ['label' => 'Discount', 'rules' => 'required'],
            'total_useable' => ['label' => 'Total Useable', 'rules' => 'required'],
            'date_start' => ['label' => 'Start Date', 'rules' => 'required'],
            'date_end' => ['label' => 'End Date', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('coupon_update/' . $coupon_id);
        } else {


            $table = DB()->table('cc_coupon');
            $table->where('coupon_id', $coupon_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('coupon_update/' . $coupon_id);

        }
    }

    public function delete($coupon_id){


        $table = DB()->table('cc_coupon');
        $table->where('coupon_id', $coupon_id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('coupon');
    }

}
