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
            $table = DB()->table('cc_order');
            $data['order'] = $table->where('customer_id',$this->session->cusUserId)->get()->getResult();

            $data['menu_active'] = 'order';
            $data['page_title'] = 'My Order';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/menu');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/order',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

    public function invoice($order_id){
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;
        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) {
            return redirect()->to(site_url('Login'));
        } else {
            $table = DB()->table('cc_order');
            $data['order'] = $table->where('order_id',$order_id)->get()->getRow();

            $tableItem = DB()->table('cc_order_item');
            $data['orderItem'] = $tableItem->where('order_id',$order_id)->get()->getResult();

            $data['menu_active'] = 'order';
            $data['page_title'] = 'Invoice';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/menu');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/invoice',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

}
