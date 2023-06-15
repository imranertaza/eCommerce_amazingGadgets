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

    public function checkoption(){
        $product_id = $this->request->getPost('product_id');
        $table = DB()->table('cc_product_option');
        $check = $table->where('product_id',$product_id)->countAllResults();
        if (!empty($check)){
            print false;
        }else{
            print true;
        }
    }

    public function addToCart(){

        $product_id = $this->request->getPost('product_id');
        $qty = $this->request->getPost('qtyall');

        $size = $this->request->getPost('size');
        $color = $this->request->getPost('color');

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
            'price' => $price,
            'color' => $color,
            'size' => $size,
        );
        $this->cart->insert($data);
        print 'Successfully add to cart';
    }

    public function addtocartdetail(){
        $product_id = $this->request->getPost('product_id');
        $qty = $this->request->getPost('qty');

        $totalOptionPrice = 0;
        foreach(get_all_data_array('cc_option') as $vl) {
            $data[strtolower($vl->name)] = $this->request->getPost(strtolower($vl->name));

            $table = DB()->table('cc_product_option');
            $option = $table->where('option_value_id',$data[strtolower($vl->name)])->where('product_id',$product_id)->get()->getRow();

            if (!empty($option)) {
                if (empty($option->subtract)){
                    $totalOptionPrice = $totalOptionPrice + $option->price;
                }else{
                    $totalOptionPrice = $totalOptionPrice - $option->price;
                }
            }
        }

        $name = get_data_by_id('name','cc_products','product_id',$product_id);
        $price = get_data_by_id('price','cc_products','product_id',$product_id);
        $specialprice = get_data_by_id('special_price','cc_product_special','product_id',$product_id);
        if (!empty($specialprice)){
            $price = $specialprice;
        }

        $totalPrice = $price + $totalOptionPrice;
        $data = array(
            'id' => $product_id,
            'name' => strval($name),
            'qty' => $qty,
            'price' => $totalPrice,
        );

        foreach(get_all_data_array('cc_option') as $v) {
            $data[strtolower($v->name)] = $this->request->getPost(strtolower($v->name));
        }
        $this->cart->insert($data);
        print 'Successfully add to cart';
    }

    public function addToCartGroup(){

        $productId = $this->request->getPost('both_product[]');

        foreach ($productId as $product_id) {
            $name = get_data_by_id('name', 'cc_products', 'product_id', $product_id);
            $price = get_data_by_id('price', 'cc_products', 'product_id', $product_id);
            $specialprice = get_data_by_id('special_price', 'cc_product_special', 'product_id', $product_id);
            if (!empty($specialprice)) {
                $price = $specialprice;
            }
            $data = array(
                'id' => $product_id,
                'name' => strval($name),
                'qty' => 1,
                'price' => $price
            );
            $this->cart->insert($data);
        }
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
