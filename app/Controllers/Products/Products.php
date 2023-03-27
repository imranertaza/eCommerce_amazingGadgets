<?php namespace App\Controllers\Products;

use App\Controllers\BaseController;

class Products extends BaseController {

    protected $validation;
    protected $session;
    protected $cart;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->cart = \Config\Services::cart();
    }

    public function detail($product_id)
    {

        $table = DB()->table('products');
        $table->join('product_description', 'product_description.product_id = products.product_id ');
        $table->join('product_special', 'product_special.product_id = products.product_id ');
        $data['products'] = $table->where('products.product_id',$product_id)->get()->getRow();

        $data['page_title'] = 'Product Detail';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Product/detail');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }


}
