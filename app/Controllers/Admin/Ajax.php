<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Ajax extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Dashboard';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
        $this->permission = new Permission();
    }


    public function get_state(){
        $country_id = $this->request->getPost('country_id');

        $table = DB()->table('zone');
        $data = $table->where('country_id',$country_id)->get()->getResult();
        $options = '';
        foreach ($data as $value) {
            $options .= '<option value="' . $value->zone_id . '" ';
            $options .= '>' . $value->name. '</option>';
        }
        print $options;
    }

    public function module_update(){
        $id = $this->request->getPost('id');

        $table = DB()->table('modules');
        $row = $table->where('module_id',$id)->get()->getRow();

        if($row->status == '1' ) {
            $table->where('module_id', $id)->update( ['status' => '0'] );
        } else {
            $table->where('module_id', $id)->update( ['status' => '1'] );
        }
    }

}
