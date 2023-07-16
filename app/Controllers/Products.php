<?php

namespace App\Controllers;

use App\Models\CategoryproductsModel;
use App\Models\ProductsSearchModel;

class Products extends BaseController {

    protected $validation;
    protected $session;
    protected $categoryproductsModel;
    protected $productsSearchModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->categoryproductsModel = new CategoryproductsModel();
        $this->productsSearchModel = new ProductsSearchModel();
    }

    public function search(){
        $cat_id = $this->request->getGetPost('cat');
        $keyword = $this->request->getGetPost('keywordTop');
        $data['top_category'] = $cat_id;
        $data['keywordTop'] = $keyword;


        $shortBy = !empty($this->request->getGetPost('shortBy'))?$this->request->getGetPost('shortBy'):'';
        if ($shortBy == 'price_asc'){
            $shortBy = "`cc_products.price` ASC";
        }
        if ($shortBy == 'price_desc'){
            $shortBy = "`cc_products.price` DESC";
        }
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

//            print_r($allOption);
//            die();
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

        if (empty($cat_id)){
            $where = "$allOption AND $allbrand AND $allrating AND $firstPrice AND $lastPrice";
        }

        $searchModel = empty($cat_id) ? 'productsSearchModel' : 'categoryproductsModel';

        if(empty($this->request->getGetPost('option'))) {
            $data['products'] = $this->$searchModel->where($where)->query()->orderBy($shortBy)->paginate(9);
        }else{
            $data['products'] = $this->$searchModel->where($where)->all_join()->orderBy($shortBy)->paginate(9);
        }

        if (!empty($keyword)){
            $data['products'] = $this->$searchModel->where($where)->like('cc_products.name',$keyword)->query()->orderBy($shortBy)->paginate(9);
        }

        $data['pager'] = $this->$searchModel->pager;
        $data['links'] = $data['pager']->links('default','custome_link');

//        print $this->$searchModel->getLastQuery();

//        print_r($data['products']);
//        die();

        $table = DB()->table('cc_product_category');
        $data['parent_Cat'] = $table->where('parent_id',$cat_id)->get()->getResult();

        $table = DB()->table('cc_product_category');
        $data['main_Cat'] = $table->where('parent_id',null)->get()->getResult();


        $data['prod_cat_id'] = $cat_id;
        $data['page_title'] = 'Category products';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Category/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer', $data);
    }


}
