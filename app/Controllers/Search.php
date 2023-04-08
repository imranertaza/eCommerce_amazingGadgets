<?php

namespace App\Controllers;

use App\Models\CategoryproductsModel;
use App\Models\ProductsModel;

class Search extends BaseController {

    protected $validation;
    protected $session;
    protected $categoryproductsModel;
    protected $productsModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->categoryproductsModel = new CategoryproductsModel();
        $this->productsModel = new ProductsModel();

    }

    public function index(){
        $table = DB()->table('products');
        $data['products'] = $table->where('status','Active')->limit(4)->get()->getResult();


        $data['prodFeat'] = $table->where('status','Active')->where('featured','1')->orderBy('product_id','DESC')->limit(8)->get()->getResult();

        $tabPopuler = DB()->table('product_category_popular');
        $data['populerCat'] = $tabPopuler->limit(12)->get()->getResult();

        $data['home_menu'] = true;
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Home/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }

    public function search_action(){
        $top_category = $this->request->getPost('top_category');
        $keywordTop = $this->request->getPost('keywordTop');
        $table = DB()->table('products');
        if(!empty($top_category)){
            $data['products'] = $this->categoryproductsModel->where('product_to_category.category_id',$top_category)->like('products.name', $keywordTop)->query()->paginate(9);
            $data['pager'] = $this->categoryproductsModel->pager;
        }else{
            $data['products'] = $this->productsModel->like('name', $keywordTop)->paginate(9);
            $data['pager'] = $this->productsModel->pager;
        }


        $data['links'] = $data['pager']->links('default','custome_link');

        $data['keywordTop'] = $keywordTop;
        $data['top_category'] = $top_category;

        $data['page_title'] = 'Search';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Search/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');

    }


}
