<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Products extends BaseController
{

    protected $validation;
    protected $session;
    protected $permission;
    protected $crop;
    private $module_name = 'Products';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->permission = new Permission();
        $this->crop = \Config\Services::image();
    }

    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('Admin/Login'));
        } else {
            $table = DB()->table('products');
            $data['product'] = $table->get()->getResult();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Products/index',$data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create(){
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('Admin/Login'));
        } else {

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Products/create');
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {
        $adUserId = $this->session->adUserId;

        $data['pro_name'] = $this->request->getPost('pro_name');
        $data['model'] = $this->request->getPost('model');
        $data['parent_id'] = $this->request->getPost('parent_id');
        $data['price'] = $this->request->getPost('price');
        $data['quantity'] = $this->request->getPost('quantity');

        $this->validation->setRules([
            'pro_name' => ['label' => 'Name', 'rules' => 'required'],
            'model' => ['label' => 'Model', 'rules' => 'required'],
            'parent_id' => ['label' => 'Category', 'rules' => 'required'],
            'price' => ['label' => 'Price', 'rules' => 'required'],
            'quantity' => ['label' => 'Quantity', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Products/create');
        } else {
            DB()->transStart();
            //product table data insert(start)
            $storeId = get_data_by_id('store_id','stores','is_default','1');
            $proData['store_id'] = $storeId;
            $proData['model'] = $data['model'];
            $proData['brand_id'] = !empty($this->request->getPost('brand_id'))?$this->request->getPost('brand_id'):null;
            $proData['price'] = $data['price'];

            if (!empty($this->request->getPost('sub_category'))) {
                $proData['product_category_id'] = $this->request->getPost('sub_category');
            }else{
                $proData['product_category_id'] = $data['parent_id'];
            }
            $proData['weight'] = $this->request->getPost('weight');
            $proData['length'] = $this->request->getPost('length');
            $proData['width'] = $this->request->getPost('width');
            $proData['height'] = $this->request->getPost('height');
            $proData['sort_order'] = $this->request->getPost('sort_order');
            $proData['status'] = $this->request->getPost('status');
            $proData['quantity'] = $this->request->getPost('quantity');
            $proData['createdBy'] = $adUserId;

            $proTable = DB()->table('products');
            $proTable->insert($proData);
            $productId = DB()->insertID();



            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$productId.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //new image upload
                $pic = $this->request->getFile('image');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir, $namePic);
                $news_img = 'pro_' . $pic->getName();
                $this->crop->withFile($target_dir . '' . $namePic)->fit(191, 191, 'center')->save($target_dir . '191_'.$news_img);
                $this->crop->withFile($target_dir . '' . $namePic)->fit(198, 198, 'center')->save($target_dir . '198_'.$news_img);
                $this->crop->withFile($target_dir . '' . $namePic)->fit(100, 100, 'center')->save($target_dir . '100_'.$news_img);
                $this->crop->withFile($target_dir . '' . $namePic)->fit(437, 400, 'center')->save($target_dir . '437_'.$news_img);

                $dataImg['image'] = $news_img;

                $proUpTable = DB()->table('products');
                $proUpTable->where('product_id',$productId)->update($dataImg);
            }

            //product table data insert(end)



            //product description table data insert(start)
            $proDescData['product_id'] = $productId;
            $proDescData['name'] = $data['pro_name'];
            $proDescData['description'] = !empty($this->request->getPost('description'))?$this->request->getPost('description'):null;
            $proDescData['tag'] = !empty($this->request->getPost('tag'))?$this->request->getPost('tag'):null;
            $proDescData['meta_title'] = !empty($this->request->getPost('meta_title'))?$this->request->getPost('meta_title'):null;
            $proDescData['meta_description'] = !empty($this->request->getPost('meta_description'))?$this->request->getPost('meta_description'):null;
            $proDescData['meta_keyword'] = !empty($this->request->getPost('meta_keyword'))?$this->request->getPost('meta_keyword'):null;
            $proDescData['createdBy'] = $adUserId;

            $proDescTable = DB()->table('product_description');
            $proDescTable->insert($proDescData);
            //product description table data insert(end)



            //product options table data insert(start)
            $color = $this->request->getPost('color[]');
            $size = $this->request->getPost('size[]');
            $qty = $this->request->getPost('qty[]');
            if (!empty($qty)){
                foreach ($qty as $key => $val){
                    $optionData['product_id'] = $productId;
                    $optionData['color_family_id'] = $color[$key];
                    $optionData['size'] = $size[$key];
                    $optionData['quantity'] = $qty[$key];

                    $optionTable = DB()->table('product_options');
                    $optionTable->insert($optionData);
                }
            }

            //product options table data insert(end)



            //product Attribute table data insert(start)
            $attribute_group_id = $this->request->getPost('attribute_group_id[]');
            $name = $this->request->getPost('name[]');
            $details = $this->request->getPost('details[]');

            if (!empty($attribute_group_id)){
                foreach ($attribute_group_id as $key => $val){
                    $attributeData['product_id'] = $productId;
                    $attributeData['attribute_group_id'] = $attribute_group_id[$key];
                    $attributeData['name'] = $name[$key];
                    $attributeData['details'] = $details[$key];

                    $attributeTable = DB()->table('product_attribute');
                    $attributeTable->insert($attributeData);
                }
            }

            //product Attribute table data insert(end)


            //product product_special table data insert(start)
            $special_price = $this->request->getPost('special_price');
            $start_date = $this->request->getPost('start_date');
            $end_date = $this->request->getPost('end_date');

            if (!empty($special_price)){
                $specialData['product_id'] = $productId;
                $specialData['special_price'] = $special_price;
                $specialData['start_date'] = $start_date;
                $specialData['end_date'] = $end_date;

                $specialTable = DB()->table('product_special');
                $specialTable->insert($specialData);
            }
            //product product_special table data insert(end)









//            $pic = $this->request->getFile('proimg[]');

//            print_r($pic);
//            print_r($_FILES['multiImg[]']['name']);

//            if (!empty($_FILES['image']['name'])) {
//                $target_dir = FCPATH . '/uploads/brand/';
//                if (!file_exists($target_dir)) {
//                    mkdir($target_dir, 0777);
//                }
//
//                //new image uplode
//                $pic = $this->request->getFile('image');
//                $namePic = $pic->getRandomName();
//                $pic->move($target_dir, $namePic);
//                $news_img = 'brand_' . $pic->getName();
//                $this->crop->withFile($target_dir . '' . $namePic)->fit(250, 150, 'center')->save($target_dir . '' . $news_img);
//                unlink($target_dir . '' . $namePic);
//                $data['image'] = $news_img;
//            }

            DB()->transComplete();
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Products/create');
        }
    }

    public function update($product_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('Admin/Login'));
        } else {

            $table = DB()->table('products');
            $table->join('product_description', 'product_description.product_id = products.product_id ');
            $table->join('product_special', 'product_special.product_id = products.product_id ');
            $data['prod'] = $table->where('products.product_id', $product_id)->get()->getRow();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Products/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {
        $brand_id = $this->request->getPost('brand_id');
        $data['name'] = $this->request->getPost('name');
        $data['sort_order'] = $this->request->getPost('sort_order');
        $data['updatedBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'name' => ['label' => 'Name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Brand/update/' . $brand_id);
        } else {
            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/brand/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //old image unlink
                $old_img = get_data_by_id('image', 'brand', 'brand_id', $brand_id);
                if (!empty($old_img)) {
                    $imgPath = $target_dir . '' . $old_img;
                    if (file_exists($imgPath)) {
                        unlink($target_dir . '' . $old_img);
                    }
                }

                //new image uplode
                $pic = $this->request->getFile('image');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir, $namePic);
                $news_img = 'brand_' . $pic->getName();
                $this->crop->withFile($target_dir . '' . $namePic)->fit(250, 150, 'center')->save($target_dir . '' . $news_img);
                unlink($target_dir . '' . $namePic);
                $data['image'] = $news_img;
            }

            $table = DB()->table('brand');
            $table->where('brand_id', $brand_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Brand/update/' . $brand_id);

        }
    }

    public function delete($brand_id){

        $target_dir = FCPATH . '/uploads/brand/';
        //old image unlink
        $old_img = get_data_by_id('image', 'brand', 'brand_id', $brand_id);
        if (!empty($old_img)) {
            $imgPath = $target_dir . '' . $old_img;
            if (file_exists($imgPath)) {
                unlink($target_dir . '' . $old_img);
            }
        }


        $table = DB()->table('brand');
        $table->where('brand_id', $brand_id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Brand');
    }

    public function get_subCategory(){
        $categoryID = $this->request->getPost('cat_id');
        $table = DB()->table('product_category');
        $data = $table->where('parent_id',$categoryID)->get()->getResult();
        $view ='';
        if (!empty($data)) {
            $view .= '<label>Sub Category</label><select name="sub_category" class="form-control" ><option value="">Please select</option>';
            foreach ($data as $val) {
                $view .= '<option value="' . $val->prod_cat_id . '" >' . $val->category_name . '</option>';
            }
            $view .= '</select>';
        }

        print $view;
    }

}
