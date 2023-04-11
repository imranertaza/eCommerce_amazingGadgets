<?php namespace App\Controllers\Cart;
use App\Controllers\BaseController;
use App\Libraries\Mycart;

class Cart extends BaseController {

    protected $validation;
    protected $session;
    protected $cart;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->cart = new Mycart();
    }

    public function index()
    {
        $data['page_title'] = 'Cart';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Cart/index');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }

    public function addToCart(){

        $product_id = $this->request->getPost('product_id');
        $qty = $this->request->getPost('qtyall');

        $name = get_data_by_id('name','cc_products','product_id',$product_id);
        $price = get_data_by_id('price','cc_products','product_id',$product_id);
        $specialprice = get_data_by_id('special_price','cc_product_special','product_id',$product_id);
        if (!empty($specialprice)){
            $price = $specialprice;
        }
        $data = array(
            'id' => $product_id,
            'name' => strval($name),
            'qty' => $qty,
            'price' => $price
        );
        $this->cart->insert($data);
        print 'Successfully add to cart';
    }

    public function updateToCart(){
        $rowid = $this->request->getPost('rowid');
        $qty = $this->request->getPost('qty');
        $data = array(
            'rowid' => $rowid,
            'qty'   => $qty
        );
        $this->cart->update($data);
        print 'Successfully update to cart';
    }

    public function removeToCart(){
        $rowid = $this->request->getPost('rowid');
        $this->cart->remove($rowid);

        if (empty($this->cart->contents())){
            unset($_SESSION['coupon_discount']);
        }

        print 'Successfully remove to cart';
    }


}
