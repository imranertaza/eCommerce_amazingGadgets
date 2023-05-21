<?php

namespace App\Controllers\Customer;

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
            $table = DB()->table('cc_order');
            $order = $table->where('customer_id',$this->session->cusUserId)->get()->getLastRow();

            $data['order'] = $table->where('customer_id',$this->session->cusUserId)->get()->getResult();

            $data['orderItem'] = array();
            if (!empty($order->order_id)) {
                $tableItem = DB()->table('cc_order_item');
                $data['orderItem'] = $tableItem->where('order_id', $order->order_id)->get()->getResult();
            }


            $data['page_title'] = 'Dashboard';
            $data['menu_active'] = 'dashboard';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/menu');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/dashboard');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

    public function addtoWishlist(){
        $data['product_id'] = $this->request->getPost('product_id');
        $data['customer_id'] = $this->session->cusUserId;
        $check = is_exists_double_condition('cc_customer_wishlist','product_id',$data['product_id'],'customer_id',$data['customer_id']);
        if ($check == true) {
            $table = DB()->table('cc_customer_wishlist');
            $table->insert($data);
            print 'Successfully add to Wishlist';
        }else{
            print 'Already exists';
        }
    }

}
