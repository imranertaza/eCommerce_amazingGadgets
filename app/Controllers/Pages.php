<?php

namespace App\Controllers;

class Pages extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

//    public function index()
//    {
//        $data['home_menu'] = true;
//        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
//        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Page/index');
//        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
//    }
    public function about()
    {
        $data['page_title'] = 'About Us';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Page/about_us');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }
    public function contact()
    {
        $data['page_title'] = 'About Us';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Page/contact');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }
}
