<?php

namespace App\Controllers\Web;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Dashboard extends BaseController
{

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;
        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) {
            return redirect()->to(site_url('Login'));
        } else {

            $data['menu_view'] = true;
            echo view('Web/header',$data);
            echo view('Web/Customer/dashboard');
            echo view('Web/footer');
        }
    }

}
