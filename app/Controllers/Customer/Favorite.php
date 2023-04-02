<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Favorite extends BaseController
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
            $wishProduct = array();
            $table = DB()->table('customer_wishlist');
            $pro = $table->where('customer_id',$this->session->cusUserId)->get()->getResult();
            foreach ($pro as $val){
                $tableSear = DB()->table('products');
                $rowPro = $tableSear->where('product_id',$val->product_id)->get()->getRow();
                array_push($wishProduct,$rowPro);
            }
            $data['allProd'] = $wishProduct;


            $data['page_title'] = 'Favorite';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/favorite',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

}
