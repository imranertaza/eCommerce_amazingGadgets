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
        return $this->select()->join('cc_products', 'cc_products.product_id = cc_product_to_category.product_id');
    }

}