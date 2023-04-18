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
        $category = get_lebel_by_value_in_theme_settings('home_category');
        $table = DB()->table('cc_products');
        $table->join('cc_product_to_category', 'cc_product_to_category.product_id = cc_products.product_id')->where('cc_products.status','Active');
        $data['products'] = $table->where('cc_product_to_category.category_id',$category)->limit(4)->get()->getResult();
//        $data['products'] = $table->where('status','Active')->limit(4)->get()->getResult();

        $featLimit = get_lebel_by_value_in_theme_settings('featured_products_limit');
        $data['prodFeat'] = $table->where('status','Active')->where('featured','1')->orderBy('product_id','DESC')->limit($featLimit)->get()->getResult();

        $featLimit = get_lebel_by_value_in_theme_settings('featured_products_limit');
        $tabPopuler = DB()->table('cc_product_category_popular');
        $data['populerCat'] = $tabPopuler->limit(12)->get()->getResult();

        $data['home_menu'] = true;
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Home/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }


}
