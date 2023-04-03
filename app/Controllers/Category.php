<?php

namespace App\Controllers;

class Category extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index($cat_id){

        $table = DB()->table('product_to_category');
        $table->join('products', 'products.product_id = product_to_category.product_id');
        $data['products'] = $table->where('product_to_category.category_id',$cat_id)->get()->getResult();

        $data['prod_cat_id'] = $cat_id;
        $data['page_title'] = 'Category products';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Category/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }


}
