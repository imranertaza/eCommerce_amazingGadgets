<?php

namespace App\Controllers;

class Featuredproducts extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index(){
        $table = DB()->table('products');
        $data['products'] = $table->where('status','Active')->where('featured','1')->get()->getResult();

        $data['page_title'] = 'Featured Products';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Featuredproducts/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }
}
