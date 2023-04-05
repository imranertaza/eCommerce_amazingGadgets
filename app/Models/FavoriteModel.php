<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class FavoriteModel extends Model {

    protected $table = 'customer_wishlist';
    protected $primaryKey = 'product_id';

    // your function to paginate
    public function query() {
        return $this->select()->join('products', 'products.product_id = customer_wishlist.product_id');
    }

}