<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Dashboard extends BaseController
{

    protected $validation;
    protected $session;
    protected $permission;
    private $module_name = 'Dashboard';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->permission = new Permission();
    }

    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_order');
            $data['allOrder'] = $table->countAllResults();
            $data['pendingOrder'] = $table->countAllResults();
            $data['processingOrder'] = $table->countAllResults();
            $data['canceledOrder'] = $table->countAllResults();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Dashboard/index',$data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

}
