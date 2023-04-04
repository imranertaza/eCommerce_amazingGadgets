<?php

namespace App\Controllers\Pages;

use App\Controllers\BaseController;

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

    public function page($slug){
        $table = DB()->table('pages');
        $page = $table->where('slug',$slug)->get()->getRow();

        $data['page_title'] = $page->page_title;
        $data['pageData'] = $page;

        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        if (!empty($page->temp)){
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Page/'.$page->temp);
        }else{
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Page/default',$data);
        }


        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }
}
