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

        $shortBy = !empty($this->request->getGetPost('shortBy'))?$this->request->getGetPost('shortBy'):'';
        $categoryWhere = !empty($this->request->getGetPost('category'))? 'category_id = '.$this->request->getGetPost('category'): 'category_id = '.$cat_id;

        $brand = explode(',', $this->request->getGetPost('manufacturer'));
        $options = explode(',', $this->request->getGetPost('option'));
        $price = explode(',', $this->request->getGetPost('price'));
        $rating = explode(',', $this->request->getGetPost('rating'));

        $data['optionval'] = array();
        if(empty($this->request->getGetPost('option'))) {
            $allOption = '1=1';
        }else {
            $optionWhere ='';
            foreach ($options as $valOp){
                $optionWhere .= 'option_value_id = '.$valOp. ' OR ';
            }
            $allOption = '('.rtrim($optionWhere, ' OR ').')';
            $data['optionval'] = $options;
        }

        $data['brandval'] = array();
        if(empty($this->request->getGetPost('manufacturer'))){
            $allbrand ='1=1';
        }else {
            $brandWhere ='';
            foreach ($brand as $valBr){
                $brandWhere .= 'brand_id = '.$valBr. ' OR ';
            }
            $allbrand = '('.rtrim($brandWhere, ' OR ').')';
            $data['brandval'] = $brand;
        }

        if(empty($this->request->getGetPost('price'))) {
            $firstPrice = '1=1';
            $lastPrice = '1=1';
        }else {
            $firstPrice = 'cc_products.price >= '.$price[0];
            $lastPrice = 'cc_products.price <= '.$price[1];
        }
        $data['fstprice'] = !empty($price[0]) ? $price[0] : 5;
        $data['lstPrice'] = !empty($price[1]) ? $price[1] : 6000;

        $data['ratingval'] = array();
        if(empty($this->request->getGetPost('rating'))){
            $allrating ='1=1';
        }else {
            $ratingWhere ='';
            foreach ($rating as $valRati){
                $ratingWhere .= 'average_feedback = '.$valRati. ' OR ';
            }
            $allrating = '('.rtrim($ratingWhere, ' OR ').')';
            $data['ratingval'] = $rating;
        }

        $where = "$categoryWhere AND $allOption AND $allbrand AND $allrating AND $firstPrice AND $lastPrice";

//        print $where;
//        die();

        $data['products'] = $this->categoryproductsModel->where($where)->all_join()->orderBy($shortBy)->paginate(9);
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
        return redirect()->to('category/'.$prod_cat_id.'?'.$querystring);

    }


}
