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
        $data['products'] = $table->where('status','Active')->get()->getResult();


        $data['prodFeat'] = $table->where('status','Active')->where('featured','1')->orderBy('product_id','DESC')->limit(8)->get()->getResult();

        $tabPopuler = DB()->table('product_category_popular');
        $data['populerCat'] = $tabPopuler->limit(12)->get()->getResult();

        $data['home_menu'] = true;
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Home/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }


}
