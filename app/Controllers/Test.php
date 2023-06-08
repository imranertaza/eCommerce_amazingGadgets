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
        $builder = DB()->table('cc_product_to_category');
        $rows = $builder->get()->getResult();

        $output = '';
        foreach ($rows as $row){
            $output .= '[<br/>';
            $output .= "'product_to_cat_id' => ".$row->product_to_cat_id.',<br/>';
            $output .= "'product_id' => ".$row->product_id.',<br/>';
            $output .= "'category_id' => ".$row->category_id.',<br/>';
//            $output .= "'image' => '".str_replace("'", "\'", $row->image)."',<br/>";
//            $output .= "'start_date' => '".$row->start_date."',<br/>";
//            $output .= "'end_date' => '".$row->end_date."',<br/>";
//            $output .= "'createdDtm' => '".$row->createdDtm."',<br/>";
//            $output .= "'createdBy' => '".$row->createdBy."',<br/>";
//            $output .= "'updatedBy' => '".$row->updatedBy."',<br/>";
//            $output .= "'updatedDtm' => '".$row->updatedDtm."',<br/>";
            $output .= '],<br/>';
        }
        print $output;
    }


}
