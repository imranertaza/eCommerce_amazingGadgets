<?php

namespace App\Controllers;

class Compare extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index(){
        $arrayCom = $this->session->compare_session;
        $proArray = array();
        if (isset($arrayCom)) {
            foreach ($arrayCom as $key=>$val) {
                $table = DB()->table('cc_products');
                $prodata = $table->where('product_id', $val)->get()->getRow();
                $proArray[$key] = $prodata;
            }
        }
        $data['products'] = $proArray;

        $data['page_title'] = 'Compare list';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Compare/index',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }

    public function addtoCompare(){
        $product_id = $this->request->getPost('product_id');
        (empty($this->session->compare_session))?$compareArray = array():$compareArray = $this->session->compare_session;
        array_push($compareArray,$product_id);

        if(empty($this->session->compare_session)){
            $this->session->set('compare_session',$compareArray);
            print 'Successfully add to compare';
        }else{
            foreach ($this->session->compare_session as $stored_product) {
                $ids[] = $stored_product;
            }
            if(!in_array($product_id, $ids)){
                $this->session->set('compare_session',$compareArray);
                print 'Successfully add to compare';
            }else{
                print 'Already exists in compare';
            }
        }
//        unset($_SESSION['compare_session']);
    }

    public function removeToCompare(){
        $key_id = $this->request->getPost('key_id');
        if(isset($this->session->compare_session)){
            unset($_SESSION['compare_session'][$key_id]);
            print 'Successfully remove to compare';
        }
    }

}
