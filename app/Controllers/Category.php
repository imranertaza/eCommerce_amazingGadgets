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
        $categoryWhere = !empty($this->request->getGetPost('category'))? 'category_id = '.$this->request->getGetPost('category'): 'category_id = '.$cat_id;

        $data['optionval'] = array();
        $data['brandval'] = array();
        $data['ratingval'] = array();

        $where = "$categoryWhere ";
        $data['products'] = $this->categoryproductsModel->where($where)->query()->paginate(9);
        $data['pager'] = $this->categoryproductsModel->pager;
        $data['links'] = $data['pager']->links('default','custome_link');

//        print $this->categoryproductsModel->getLastQuery();
//        die();

        $table = DB()->table('cc_product_category');
        $data['parent_Cat'] = $table->where('parent_id',$cat_id)->get()->getResult();

        $data['prod_cat_id'] = $cat_id;
        $data['page_title'] = 'Category products';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Category/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer', $data);
    }

    public function url_generate(){

        $prod_cat_id = $this->request->getPost('prod_cat_id');
        $cat = $this->request->getPost('cat');
        $shortBy = $this->request->getPost('shortBy');
        $category = $this->request->getPost('category');
        $options = $this->request->getPost('options[]');
        $brand = $this->request->getPost('manufacturer[]');
        $rating = $this->request->getPost('rating[]');
        $price = $this->request->getPost('price');



        $vars = array();
        if (!empty($brand)) {
            $menu = '';
            foreach ($brand as $key => $brVal) {
                $menu .= $brVal . ',';
            }
            $vars ['manufacturer'] = rtrim($menu,',');
        }

        if (!empty($options)) {
            $option = '';
            foreach ($options as $key => $optVal) {
                $option .= $optVal.',' ;
            }
            $vars ['option'] = rtrim($option, ',');
        }

        if (!empty($category)){
            $vars ['category'] = $category;
        }

        if (!empty($shortBy)){
            $vars ['shortBy'] = $shortBy;
        }

        if (!empty($price)){
            $vars ['price'] = $price;
        }

        if (!empty($rating)) {
            $rat = '';
            foreach ($rating as $key => $ratVal) {
                $rat .= $ratVal . ',';
            }
            $vars ['rating'] = rtrim($rat,',');
        }

        $querystring = http_build_query($vars);
//        print $querystring;
//        die();
//        return redirect()->to('category/'.$prod_cat_id.'?'.$querystring);
        return redirect()->to('products/search?cat='.$cat.'&'.$querystring);

    }


}
