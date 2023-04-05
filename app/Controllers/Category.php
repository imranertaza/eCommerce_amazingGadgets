<?php

namespace App\Controllers;

use App\Models\CategoryproductsModel;

class Category extends BaseController {

    protected $validation;
    protected $session;
    protected $categoryproductsModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->categoryproductsModel = new CategoryproductsModel();
    }

    public function index($cat_id){

        $data['products'] = $this->categoryproductsModel->where('product_to_category.category_id',$cat_id)->query()->paginate(9);
        $data['pager'] = $this->categoryproductsModel->pager;
        $data['links'] = $data['pager']->links('default','custome_link');


        $data['prod_cat_id'] = $cat_id;
        $data['page_title'] = 'Category products';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Category/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }


}
