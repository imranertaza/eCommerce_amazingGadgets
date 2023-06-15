<?php

namespace App\Controllers;

use App\Libraries\Mycart;
use App\Libraries\Zone_shipping;
use App\Libraries\Flat_shipping;
use App\Models\ProductsModel;



class Checkout extends BaseController {

    protected $validation;
    protected $session;
    protected $productsModel;
    protected $zone_shipping;
    protected $flat_shipping;
    protected $cart;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->productsModel = new ProductsModel();
        $this->zone_shipping = new Zone_shipping();
        $this->flat_shipping = new Flat_shipping();
        $this->cart = new Mycart();
    }

    public function index(){
        $table = DB()->table('cc_customer');
        $data['customer'] = $table->where('customer_id',$this->session->cusUserId)->get()->getRow();

        $data['page_title'] = 'Checkout';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Checkout/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }

    public function coupon_action(){
        $coupon_code = $this->request->getPost('coupon');

        $table = DB()->table('cc_coupon');
        $query = $table->where('code',$coupon_code)->where('status','Active')->where('total_useable >','total_used')->where('date_start <', date('Y-m-d'))->where('date_end >', date('Y-m-d'))->get()->getRow();

        if (!empty($query)){
            if ($query->for_registered_user == '1'){
                $isLoggedInCustomer = $this->session->isLoggedInCustomer;
                if (isset($isLoggedInCustomer) || $isLoggedInCustomer == TRUE) {
                    $couponArray = array(
                        'coupon_discount' => $query->discount
                    );
                    $this->session->set($couponArray);
                    $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Coupon code applied successfully </div>');
                    return redirect()->to('cart');
                }else{
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Coupon code not working </div>');
                    return redirect()->to('cart');
                }
            }

            if ($query->for_subscribed_user == '1'){
                $isLoggedInCustomer = $this->session->isLoggedInCustomer;
                if (isset($isLoggedInCustomer) || $isLoggedInCustomer == TRUE) {
                    $checkSub = is_exists('cc_newsletter','customer_id',$this->session->cusUserId);
                    if ($checkSub == false) {
                        $couponArray = array(
                            'coupon_discount' => $query->discount
                        );
                        $this->session->set($couponArray);
                        $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Coupon code applied successfully </div>');
                        return redirect()->to('cart');
                    }else{
                        $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Coupon code not working </div>');
                        return redirect()->to('cart');
                    }
                }else{
                    $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Coupon code not working </div>');
                    return redirect()->to('cart');
                }
            }

            if (($query->for_registered_user == '0') && ($query->for_subscribed_user == '0')){
                $couponArray = array(
                    'coupon_discount' => $query->discount
                );
                $this->session->set($couponArray);
                $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Coupon code applied successfully </div>');
                return redirect()->to('cart');
            }

        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Coupon code not working </div>');
            return redirect()->to('cart');
        }


    }

    public function country_zoon(){
        $country_id = $this->request->getPost('country_id');

        $table = DB()->table('cc_zone');
        $data = $table->where('country_id',$country_id)->get()->getResult();
        $options = '';
        foreach ($data as $value) {
            $options .= '<option value="' . $value->zone_id . '" ';
            $options .= '>' . $value->name. '</option>';
        }
        print $options;
    }

    public function checkout_action(){
        $data['payment_firstname'] = $this->request->getPost('payment_firstname');
        $data['payment_lastname'] = $this->request->getPost('payment_lastname');
        $data['payment_phone'] = $this->request->getPost('payment_phone');
        $data['payment_email'] = $this->request->getPost('payment_email');
        $data['payment_country_id'] = $this->request->getPost('payment_country_id');
        $data['payment_city'] = $this->request->getPost('payment_city');
        $data['payment_postcode'] = $this->request->getPost('payment_postcode');
        $data['payment_address_1'] = $this->request->getPost('payment_address_1');
        $data['payment_address_2'] = $this->request->getPost('payment_address_2');

        $data['shipping_method'] = $this->request->getPost('shipping_method');
        $data['shipping_charge'] = $this->request->getPost('shipping_charge');
        $data['payment_method'] = $this->request->getPost('payment_method');

        $data['store_id'] = get_data_by_id('store_id','cc_stores','is_default','1');

        $new_acc_create = $this->request->getPost('new_acc_create');

        $shipping_else = $this->request->getPost('shipping_else');

        $this->validation->setRules([
            'payment_firstname' => ['label' => 'First name', 'rules' => 'required'],
            'payment_lastname' => ['label' => 'Last name', 'rules' => 'required'],
            'payment_phone' => ['label' => 'Phone', 'rules' => 'required'],
            'payment_email' => ['label' => 'Email', 'rules' => 'required'],
            'payment_country_id' => ['label' => 'Country', 'rules' => 'required'],
            'payment_city' => ['label' => 'City', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' </div>');
            return redirect()->to('checkout');
        }else{
            DB()->transStart();
            if ($shipping_else == 'on'){
                $data['shipping_firstname'] = $this->request->getPost('shipping_firstname');
                $data['shipping_lastname'] = $this->request->getPost('shipping_lastname');
                $data['shipping_phone'] = $this->request->getPost('shipping_phone');
                $data['shipping_country_id'] = $this->request->getPost('shipping_country_id');
                $data['shipping_city'] = $this->request->getPost('shipping_city');
                $data['shipping_postcode'] = $this->request->getPost('shipping_postcode');
                $data['shipping_address_1'] = $this->request->getPost('shipping_address_1');
                $data['shipping_address_2'] = $this->request->getPost('shipping_address_2');
            }else{
                $data['shipping_firstname'] = $data['payment_firstname'];
                $data['shipping_lastname'] = $data['payment_lastname'];
                $data['shipping_phone'] = $data['payment_phone'];
                $data['shipping_country_id'] = $data['payment_country_id'];
                $data['shipping_city'] = $data['payment_city'];
                $data['shipping_postcode'] = $this->request->getPost('payment_postcode');
                $data['shipping_address_1'] = $data['payment_address_1'];
                $data['shipping_address_2'] = $data['payment_address_2'];
            }

            if (isset($this->session->cusUserId)){
                $data['customer_id'] = $this->session->cusUserId;
            }
            $disc = null;
            if (isset($this->session->coupon_discount)) {
                $disc = round(($this->cart->total() * $this->session->coupon_discount) / 100);
            }
            $finalAmo = $this->cart->total() - $disc;
            if (!empty($data['shipping_charge'])){
                $finalAmo = ($this->cart->total() + $data['shipping_charge']) - $disc;
            }

            $data['total'] = $this->cart->total();
            $data['discount'] = $disc;
            $data['final_amount'] = $finalAmo;


            $table = DB()->table('cc_order');
            $table->insert($data);
            $order_id = DB()->insertID();



            //order cc_order_history
            $order_status_id = get_data_by_id('order_status_id','cc_order_status','name','Pending');
            $dataOrderHistory['order_id'] = $order_id;
            $dataOrderHistory['order_status_id'] = $order_status_id;
            $tabHistOr = DB()->table('cc_order_history');
            $tabHistOr->insert($dataOrderHistory);




            foreach ($this->cart->contents() as $val) {
                $oldQty = get_data_by_id('quantity','cc_products','product_id',$val['id']);
                $dataOrder['order_id'] = $order_id;
                $dataOrder['product_id'] = $val['id'];
                $dataOrder['price'] = $val['price'];
                $dataOrder['quantity'] = $val['qty'];
                $dataOrder['total_price'] = $val['subtotal'];
                $dataOrder['final_price'] = $val['subtotal'];
                $tableOrder = DB()->table('cc_order_item');
                $tableOrder->insert($dataOrder);
                $order_item_id = DB()->insertID();

                $newqty['quantity'] = $oldQty - $val['qty'];
                $tablePro = DB()->table('cc_products');
                $tablePro->where('product_id',$val['id'])->update($newqty);

                foreach(get_all_data_array('cc_option') as $vl) {
                    $data[strtolower($vl->name)] = $val[strtolower($vl->name)];

                    $table = DB()->table('cc_product_option');
                    $option = $table->where('option_value_id',$data[strtolower($vl->name)])->where('product_id',$val['id'])->get()->getRow();

                    if (!empty($option)) {
                        $dataOptino['order_id'] = $order_id;
                        $dataOptino['order_item_id'] = $order_item_id;
                        $dataOptino['product_id'] = $option->product_id;
                        $dataOptino['option_id'] = $option->option_id;
                        $dataOptino['option_value_id'] = $option->option_value_id;
                        $dataOptino['name'] = strtolower($vl->name);
                        $dataOptino['value'] = get_data_by_id('name','cc_option_value','option_value_id',$option->option_value_id);
                        $tableOption = DB()->table('cc_order_option');
                        $tableOption->insert($dataOptino);
                    }
                }


            }


            DB()->transComplete();

            //email send customer
            $temMes = order_email_template($order_id);
            $subject = 'Product order';
            $message = $temMes;
            email_send($data['payment_email'],$subject,$message);


            //email send admin
            $email = get_lebel_by_value_in_settings('email');
            $subjectAd = 'Product order';
            $messageAd = $temMes;
            email_send($email,$subjectAd,$messageAd);

            unset($_SESSION['coupon_discount']);
            $this->cart->destroy();

            $this->session->setFlashdata('message', '<div class="alert-success-m alert-success alert-dismissible" role="alert">Your order has been successfully placed </div>');
            return redirect()->to('checkout_success');

        }
    }



    public function shipping_rate(){

        $city_id = $this->request->getPost('city_id');
        $shipCityId = $this->request->getPost('shipCityId');
        $paymethod = $this->request->getPost('paymethod');
        if (!empty($shipCityId)){
            $city_id = $shipCityId;
        }

        if ($paymethod == 'flat') {
            $data['charge'] = $this->flat_shipping->getSettings()->calculateShipping();
        }
        if ($paymethod == 'zone') {
            $data['charge'] = $this->zone_shipping->getSettings()->calculateShipping($city_id);
        }

        return $this->response->setJSON($data);
    }

    public function success(){
        $data['page_title'] = 'Checkout Success';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Checkout/success',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');

    }

    public function failed(){
        $data['page_title'] = 'Checkout Failed';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Checkout/failed',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');

    }

    public function canceled(){
        $data['page_title'] = 'Checkout Canceled';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Checkout/canceled',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');

    }


//    public function templete(){
////        print order_email_template(1);
//
//        $title = 'Your registration is completed!';
//        $message = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
//        $url = base_url();
//        print success_email_template($title,$message,$url);
//    }

}
