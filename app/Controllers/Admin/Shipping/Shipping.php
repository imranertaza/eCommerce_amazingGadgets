<?php

namespace App\Controllers\Admin\Shipping;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Shipping extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Shipping';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
        $this->permission = new Permission();
    }

    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_shipping_method');
            $data['shipping'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Shipping/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function shipping_settings($shipping_method_id) {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_shipping_settings');
            $data['shipping'] = $table->where('shipping_method_id',$shipping_method_id)->get()->getResult();

            $data['shipping_method_id'] = $shipping_method_id;
            $data['shipping_status'] = get_data_by_id('status','cc_shipping_method','shipping_method_id',$shipping_method_id);

            $tableWeight = DB()->table('cc_weight_shipping_settings');
            $data['extra_settingd'] = $tableWeight->where('shipping_method_id',$shipping_method_id)->get()->getResult();


            $code = get_data_by_id('code','cc_shipping_method','shipping_method_id',$shipping_method_id);

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['update']) and $data['update'] == 1) {
                if ($code == 'flat') {
                    echo view('Admin/Shipping/flat_rate', $data);
                }
                if ($code == 'zone') {
                    echo view('Admin/Shipping/zone', $data);
                }
                if ($code == 'weight') {
                    echo view('Admin/Shipping/weight', $data);
                }
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {
        $shipping_method_id = $this->request->getPost('shipping_method_id');

        $label = $this->request->getPost('label[]');
        $id = $this->request->getPost('id[]');

        if (!empty($label)) {
            foreach ($label as $key => $val) {
                $table = DB()->table('cc_shipping_settings');
                $table->set('value', $val)->where('settings_id', $id[$key])->update();
            }
        }

        //Shipping status update
        $data['status'] = $this->request->getPost('status');
        $tableShipping = DB()->table('cc_shipping_method');
        $tableShipping->where('shipping_method_id', $shipping_method_id)->update($data);


        //weight settings
        $weight_label = $this->request->getPost('weight_label[]');
        $weight_value = $this->request->getPost('weight_value[]');
        $weight_id = $this->request->getPost('weight_id[]');
        if (!empty($weight_label)){
            foreach ($weight_label as $key => $val) {
//                $check = is_exists('cc_weight_shipping_settings','settings_id',$weight_id[$key]);
                if (empty($weight_id[$key]) ){
                    $dataWeight['shipping_method_id'] = $shipping_method_id;
                    $dataWeight['label'] = $val;
                    $dataWeight['value'] = $weight_value[$key];
                    $table = DB()->table('cc_weight_shipping_settings');
                    $table->insert($dataWeight);
                }else {
                    $table = DB()->table('cc_weight_shipping_settings');
                    $table->set('label', $val)->set('value', $weight_value[$key])->where('settings_id', $weight_id[$key])->update();
                }

            }
        }


        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('shipping_settings/'.$shipping_method_id);


    }

    public function update_status(){
        $shipping_method_id = $this->request->getPost('id');
        $oldStatus = get_data_by_id('status','cc_shipping_method','shipping_method_id',$shipping_method_id);
        if ($oldStatus == '1'){
            $data['status'] = '0';
        }else{
            $data['status'] = '1';
        }
        $table = DB()->table('cc_shipping_method');
        $table->where('shipping_method_id', $shipping_method_id)->update($data);

        print '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

    public function remove_settings_weight(){
        $settings_id = $this->request->getPost('settings_id');
        $table = DB()->table('cc_weight_shipping_settings');
        $table->where('settings_id', $settings_id)->delete();

        print '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

}
