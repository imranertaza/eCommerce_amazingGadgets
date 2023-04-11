<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Checkout extends BaseController {

    protected $validation;
    protected $session;
    protected $productsModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->productsModel = new ProductsModel();
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


        print 'Ok';
    }


}
