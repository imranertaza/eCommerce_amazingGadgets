<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ProductsSearchModel extends Model {

    protected $table = 'cc_products';
    protected $primaryKey = 'product_id';
    protected $returnType = 'object';

    // your function to paginate
    public function query() {
        return $this->select('*')->where('cc_products.status','Active');
    }

    public function all_join(){
        return $this->select('cc_products.*,cc_product_option.option_value_id ')->join('cc_product_option','cc_product_option.product_id = cc_products.product_id')->where('cc_products.status','Active')->groupBy('product_id');
    }


}