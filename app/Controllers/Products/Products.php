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
        $data['products'] = $table->where('products.product_id',$product_id)->get()->getRow();

        //image
        $imgTable = DB()->table('product_image');
        $data['proImg'] = $imgTable->where('product_id',$product_id)->where('Product_option_id',null)->get()->getResult();

        //related product
        $relatedProduct = array();
        $relTable = DB()->table('product_related');
        $relPro = $relTable->where('product_id',$product_id)->get()->getResult();
        foreach ($relPro as $rVal){
            $tableSear = DB()->table('products');
            $rowPro = $tableSear->where('product_id',$rVal->related_id)->get()->getRow();
            array_push($relatedProduct,$rowPro);
        }
        $data['relProd'] = $relatedProduct;

        //related product  2 products view
        $relatedProduct2 = array();
        $relTable = DB()->table('product_related');
        $relPro2 = $relTable->where('product_id',$product_id)->orderBy('product_id','DESC')->limit(2)->get()->getResult();
        foreach ($relPro2 as $rVal2){
            $tableSear2 = DB()->table('products');
            $rowPro2 = $tableSear2->where('product_id',$rVal2->related_id)->get()->getRow();
            array_push($relatedProduct2,$rowPro2);
        }
        $data['relProdSide'] = $relatedProduct2;






        $data['page_title'] = 'Product Detail';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Product/detail');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }


}
