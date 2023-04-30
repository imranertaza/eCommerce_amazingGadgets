<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Reviews extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Reviews';

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

            $table = DB()->table('cc_product_feedback');
            $data['reviews'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Reviews/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function reviews_status_update(){
        $feedback_id = $this->request->getPost('feedback_id');
        $data['status'] = $this->request->getPost('status');

        $table = DB()->table('cc_product_feedback');
        $table->where('product_feedback_id', $feedback_id)->update($data);

        print '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

    public function delete($feedback_id){

        $table = DB()->table('cc_product_feedback');
        $table->where('product_feedback_id', $feedback_id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('reviews');
    }

}
