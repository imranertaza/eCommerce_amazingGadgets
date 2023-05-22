<?php

namespace App\Controllers;

class Test extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index(){
        $builder = DB()->table('cc_theme_settings');
        $rows = $builder->get()->getResult();

        $output = '';
        foreach ($rows as $row){
            $output .= '[<br/>';
            $output .= "'settings_id' => ".$row->settings_id.',<br/>';
            $output .= "'label' => '".str_replace("'", "\'", $row->label)."',<br/>";
            $output .= "'title' => '".str_replace("'", "\'", $row->title)."',<br/>";
            $output .= "'value' => '".str_replace("'", "\'", $row->value)."',<br/>";
            $output .= '],<br/>';
        }
        print $output;
    }


}
