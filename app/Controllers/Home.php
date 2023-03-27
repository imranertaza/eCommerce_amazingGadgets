<?php

namespace App\Controllers;

class Home extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index(){
        $table = DB()->table('products');
        $table->join('product_description', 'product_description.product_id = products.product_id ');
        $table->join('product_special', 'product_special.product_id = products.product_id ');
        $data['products'] = $table->where('products.status','Active')->get()->getResult();


        $data['home_menu'] = true;
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Home/index');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }
}
