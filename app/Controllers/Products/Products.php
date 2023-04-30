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

        $table = DB()->table('cc_products');
        $table->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id ');
        $data['products'] = $table->where('cc_products.product_id',$product_id)->get()->getRow();

        //image
        $imgTable = DB()->table('cc_product_image');
        $data['proImg'] = $imgTable->where('product_id',$product_id)->where('Product_option_id',null)->get()->getResult();

        //related product
        $relatedProduct = array();
        $relTable = DB()->table('cc_product_related');
        $relPro = $relTable->where('product_id',$product_id)->get()->getResult();
        foreach ($relPro as $rVal){
            $tableSear = DB()->table('cc_products');
            $rowPro = $tableSear->where('product_id',$rVal->related_id)->get()->getRow();
            array_push($relatedProduct,$rowPro);
        }
        $data['relProd'] = $relatedProduct;

        //related product  2 products view
        $relatedProduct2 = array();
        $relTable = DB()->table('cc_product_related');
        $relPro2 = $relTable->where('product_id',$product_id)->orderBy('product_id','DESC')->limit(2)->get()->getResult();
        foreach ($relPro2 as $rVal2){
            $tableSear2 = DB()->table('cc_products');
            $rowPro2 = $tableSear2->where('product_id',$rVal2->related_id)->get()->getRow();
            array_push($relatedProduct2,$rowPro2);
        }
        $data['relProdSide'] = $relatedProduct2;

        //reviews
        $reviewTable = DB()->table('cc_product_feedback');
        $data['review'] = $reviewTable->where('product_id',$product_id)->where('status','Active')->get()->getResult();



        $data['page_title'] = 'Product Detail';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Product/detail');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }

    public function review(){
        $data['product_id'] = $this->request->getPost('product_id');
        $data['customer_id'] = $this->session->cusUserId;
        $data['feedback_star'] = $this->request->getPost('rating');
        $data['feedback_text'] = $this->request->getPost('feedback_text');

        $this->validation->setRules([
            'product_id' => ['label' => 'Product', 'rules' => 'required'],
            'feedback_star' => ['label' => 'Rating', 'rules' => 'required'],
            'feedback_text' => ['label' => 'Message', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() .'</div>');
            return redirect()->to('detail/'. $data['product_id']);
        } else {

            $table = DB()->table('cc_product_feedback');
            $table->insert($data);
            $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Successfully submitted review</div>');
            return redirect()->to('detail/'. $data['product_id']);
        }
    }


}
