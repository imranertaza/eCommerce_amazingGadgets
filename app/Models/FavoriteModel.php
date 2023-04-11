<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class FavoriteModel extends Model {

    protected $table = 'cc_customer_wishlist';
    protected $primaryKey = 'product_id';

    // your function to paginate
    public function query() {
        return $this->select()->join('cc_products', 'cc_products.product_id = cc_customer_wishlist.product_id');
    }

}