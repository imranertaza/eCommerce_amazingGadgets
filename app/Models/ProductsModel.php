<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ProductsModel extends Model {

    protected $table = 'cc_products';
    protected $primaryKey = 'product_id';
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['store_id','name', 'model','product_code','image','brand_id','price','quantity','product_category_id','featured','date_available','weight','length','width','height','sort_order','status','createdBy', 'createdDtm', 'updatedby', 'updatedDtm'];
    protected $useTimestamps = false;
    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = true;



}