<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use App\Models\FavoriteModel;

class Order extends BaseController
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
            $table = DB()->table('order');
            $data['order'] = $table->where('customer_id',$this->session->cusUserId)->get()->getResult();

            $data['menu_active'] = 'order';
            $data['page_title'] = 'My Order';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/menu');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/order',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

}
