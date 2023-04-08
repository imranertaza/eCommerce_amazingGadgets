<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class CategoryproductsModel extends Model {

    protected $table = 'product_to_category';
    protected $primaryKey = 'product_id';
    protected $returnType = 'object';

    // your function to paginate
    public function query() {
        return $this->select()->join('products', 'products.product_id = product_to_category.product_id');
    }

}