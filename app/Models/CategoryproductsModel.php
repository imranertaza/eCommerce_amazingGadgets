<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class CategoryproductsModel extends Model {

    protected $table = 'cc_product_to_category';
    protected $primaryKey = 'product_id';
    protected $returnType = 'object';

    // your function to paginate
    public function query() {
        return $this->select('cc_product_to_category.category_id,cc_products.*')->join('cc_products', 'cc_products.product_id = cc_product_to_category.product_id')->where('cc_products.status','Active')->groupBy('product_id');
    }

    public function all_join(){
        return $this->select('cc_product_to_category.category_id,cc_products.*,cc_product_option.option_value_id ')->join('cc_products', 'cc_products.product_id = cc_product_to_category.product_id')->join('cc_product_option','cc_product_option.product_id = cc_product_to_category.product_id')->where('cc_products.status','Active')->groupBy('product_id');
    }


}