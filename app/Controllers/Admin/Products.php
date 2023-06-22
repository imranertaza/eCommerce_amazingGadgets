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
            return redirect()->to(site_url('admin'));
        } else {
            $table = DB()->table('cc_products');
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
            return redirect()->to(site_url('admin'));
        } else {

            $protable = DB()->table('cc_products');
            $data['products'] = $protable->get()->getResult();

            $table = DB()->table('cc_product_category');
            $data['prodCat'] = $table->get()->getResult();

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Products/create',$data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create_action() {

        $adUserId = $this->session->adUserId;

        $data['pro_name'] = $this->request->getPost('pro_name');
        $data['model'] = $this->request->getPost('model');
        $data['categorys'] = $this->request->getPost('categorys[]');
        $data['price'] = $this->request->getPost('price');
        $data['quantity'] = $this->request->getPost('quantity');

        $this->validation->setRules([
            'pro_name' => ['label' => 'Name', 'rules' => 'required'],
            'model' => ['label' => 'Model', 'rules' => 'required'],
            'categorys' => ['label' => 'Category', 'rules' => 'required'],
            'price' => ['label' => 'Price', 'rules' => 'required'],
            'quantity' => ['label' => 'Quantity', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('product_create');
        } else {
            DB()->transStart();

            //product table data insert(start)
            $storeId = get_data_by_id('store_id','cc_stores','is_default','1');
            $proData['store_id'] = $storeId;
            $proData['name'] = $data['pro_name'];
            $proData['model'] = $data['model'];
            $proData['brand_id'] = !empty($this->request->getPost('brand_id'))?$this->request->getPost('brand_id'):null;
            $proData['price'] = $data['price'];
            $proData['weight'] = $this->request->getPost('weight');
            $proData['length'] = $this->request->getPost('length');
            $proData['width'] = $this->request->getPost('width');
            $proData['height'] = $this->request->getPost('height');
            $proData['sort_order'] = $this->request->getPost('sort_order');
            $proData['status'] = $this->request->getPost('status');
            $proData['quantity'] = $this->request->getPost('quantity');
            $proData['createdBy'] = $adUserId;

            $product_featured = $this->request->getPost('product_featured');
            if ($product_featured == 'on'){
                $proData['featured'] = '1';
            }

            $proTable = DB()->table('cc_products');
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

                $proUpTable = DB()->table('cc_products');
                $proUpTable->where('product_id',$productId)->update($dataImg);
            }
            //product table data insert(end)


            //multi image upload(start)
            if($this->request->getFileMultiple('multiImage')){

                $target_dir = FCPATH . '/uploads/products/'.$productId.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                $files = $this->request->getFileMultiple('multiImage');
                foreach ($files as $file) {

                    if ($file->isValid() && ! $file->hasMoved())
                    {
                        $dataMultiImg['product_id'] = $productId;
                        $proImgTable = DB()->table('cc_product_image');
                        $proImgTable->insert($dataMultiImg);
                        $proImgId = DB()->insertID();

                        $target_dir2 = FCPATH . '/uploads/products/'.$productId.'/'.$proImgId.'/';
                        if (!file_exists($target_dir2)) {
                            mkdir($target_dir2, 0777);
                        }

                        $nameMulPic = $file->getRandomName();
                        $file->move($target_dir2, $nameMulPic);
                        $news_img2 = 'pro_' . $file->getName();
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(191, 191, 'center')->save($target_dir2 . '191_'.$news_img2);
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(198, 198, 'center')->save($target_dir2 . '198_'.$news_img2);
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(100, 100, 'center')->save($target_dir2 . '100_'.$news_img2);
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(437, 400, 'center')->save($target_dir2 . '437_'.$news_img2);


                        $dataMultiImg2['image'] = $news_img2;

                        $proImgUpTable = DB()->table('cc_product_image');
                        $proImgUpTable->where('product_image_id',$proImgId)->update($dataMultiImg2);
                    }

                }

            }
            //multi image upload(start)





            //product category insert(start)
            foreach ($data['categorys'] as $cat){
                $catData['product_id'] = $productId;
                $catData['category_id'] = $cat;

                $catTable = DB()->table('cc_product_to_category');
                $catTable->insert($catData);
            }
            //product category insert(end)





            //product_free_delivery data insert(start)
            $free_delivery = $this->request->getPost('product_free_delivery');
            if ($free_delivery == 'on'){
                $proFreeData['product_id'] = $productId;
                $proFreetable = DB()->table('cc_product_free_delivery');
                $proFreetable->insert($proFreeData);
            }
            //product_free_delivery data insert(end)



            //product description table data insert(start)
            $proDescData['product_id'] = $productId;
            $proDescData['description'] = !empty($this->request->getPost('description'))?$this->request->getPost('description'):null;
            $proDescData['tag'] = !empty($this->request->getPost('tag'))?$this->request->getPost('tag'):null;
            $proDescData['meta_title'] = !empty($this->request->getPost('meta_title'))?$this->request->getPost('meta_title'):null;
            $proDescData['meta_description'] = !empty($this->request->getPost('meta_description'))?$this->request->getPost('meta_description'):null;
            $proDescData['meta_keyword'] = !empty($this->request->getPost('meta_keyword'))?$this->request->getPost('meta_keyword'):null;
            $proDescData['video'] = !empty($this->request->getPost('video'))?$this->request->getPost('video'):null;
            $proDescData['createdBy'] = $adUserId;



            if (!empty($_FILES['description_image']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$productId.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //new image upload
                $despic = $this->request->getFile('description_image');
                $namePic = 'des_' .$despic->getRandomName();
                $despic->move($target_dir, $namePic);

                $proDescData['description_image'] = $namePic;
            }

            if (!empty($_FILES['documentation_pdf']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$productId.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //new image upload
                $docPdf = $this->request->getFile('documentation_pdf');
                $nameDoc = 'doc_' .$docPdf->getRandomName();
                $docPdf->move($target_dir, $nameDoc);

                $proDescData['documentation_pdf'] = $nameDoc;
            }

            if (!empty($_FILES['safety_pdf']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$productId.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //new image upload
                $safPdf = $this->request->getFile('safety_pdf');
                $nameDoc = 'saf_' .$safPdf->getRandomName();
                $safPdf->move($target_dir, $nameDoc);

                $proDescData['safety_pdf'] = $nameDoc;
            }

            if (!empty($_FILES['instructions_pdf']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$productId.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //new image upload
                $insPdf = $this->request->getFile('instructions_pdf');
                $nameDoc = 'ins_' .$insPdf->getRandomName();
                $insPdf->move($target_dir, $nameDoc);

                $proDescData['instructions_pdf'] = $nameDoc;
            }

            $proDescTable = DB()->table('cc_product_description');
            $proDescTable->insert($proDescData);
            //product description table data insert(end)



            //product options table data insert(start)
//            $color = $this->request->getPost('color[]');
//            $size = $this->request->getPost('size[]');
//            $qty = $this->request->getPost('qty[]');
//            if (!empty($qty)){
//                foreach ($qty as $key => $val){
//                    $optionData['product_id'] = $productId;
//                    $optionData['color_family_id'] = $color[$key];
//                    $optionData['size'] = $size[$key];
//                    $optionData['quantity'] = $qty[$key];
//
//                    $optionTable = DB()->table('cc_product_options');
//                    $optionTable->insert($optionData);
//                }
//            }

            $option = $this->request->getPost('option[]');
            $opValue = $this->request->getPost('opValue[]');
            $qty = $this->request->getPost('qty[]');
            $subtract = $this->request->getPost('subtract[]');
            $price_op = $this->request->getPost('price_op[]');
            if (!empty($qty)){
                foreach ($qty as $key => $val){
                    $optionData['product_id'] = $productId;
                    $optionData['option_id'] = $option[$key];
                    $optionData['option_value_id'] = $opValue[$key];
                    $optionData['quantity'] = $qty[$key];
                    $optionData['subtract'] = ($subtract[$key] == 'plus')?null:1;
                    $optionData['price'] = $price_op[$key];

                    $optionTable = DB()->table('cc_product_option');
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

                    $attributeTable = DB()->table('cc_product_attribute');
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

                $specialTable = DB()->table('cc_product_special');
                $specialTable->insert($specialData);
            }
            //product product_special table data insert(end)



            //product_related table data insert(start)
            $product_related = $this->request->getPost('product_related[]');
            if (!empty($product_related)){
                foreach ($product_related as $relp) {
                    $proRelData['product_id'] = $productId;
                    $proRelData['related_id'] = $relp;
                    $proReltable = DB()->table('cc_product_related');
                    $proReltable->insert($proRelData);
                }
            }
            //product_related table data insert(end)




            // product_bought_together table data insert(start)
            $bought_together = $this->request->getPost('bought_together[]');
            if (!empty($bought_together)){
                foreach ($bought_together as $bothp) {
                    $proBothData['product_id'] = $productId;
                    $proBothData['related_id'] = $bothp;
                    $proBothtable = DB()->table('cc_product_bought_together');
                    $proBothtable->insert($proBothData);
                }
            }
            //product_bought_together table data insert(end)



            DB()->transComplete();
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('product_create');
        }
    }

    public function update($product_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_products');
            $table->join('cc_product_description', 'cc_product_description.product_id = cc_products.product_id ');
            $data['prod'] = $table->where('cc_products.product_id', $product_id)->get()->getRow();

            $table = DB()->table('cc_product_category');
            $data['prodCat'] = $table->get()->getResult();

            $tablecat = DB()->table('cc_product_to_category');
            $data['prodCatSel'] = $tablecat->where('product_id', $product_id)->get()->getResult();

            $tablefreeDel = DB()->table('cc_product_free_delivery');
            $data['free_delivery'] = $tablefreeDel->where('product_id', $product_id)->countAllResults();

            $tableOpti = DB()->table('cc_product_option');
            $data['prodOption'] = $tableOpti->where('product_id', $product_id)->groupBy('option_id')->get()->getResult();

            $tableAttr = DB()->table('cc_product_attribute');
            $data['prodattribute'] = $tableAttr->where('product_id', $product_id)->get()->getResult();

            $tableSpec = DB()->table('cc_product_special');
            $data['prodspecial'] = $tableSpec->where('product_id', $product_id)->get()->getRow();

            $tableimg = DB()->table('cc_product_image');
            $data['prodimage'] = $tableimg->where('product_id', $product_id)->get()->getResult();

            $tableRel = DB()->table('cc_product_related');
            $data['prodrelated'] = $tableRel->where('product_id', $product_id)->get()->getResult();

            $tableBoth = DB()->table('cc_product_bought_together');
            $data['prodBothTog'] = $tableBoth->where('product_id', $product_id)->get()->getResult();


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

    public function update_action(){

        $adUserId = $this->session->adUserId;

        $product_id = $this->request->getPost('product_id');

        $data['pro_name'] = $this->request->getPost('pro_name');
        $data['model'] = $this->request->getPost('model');
        $data['categorys'] = $this->request->getPost('categorys[]');
        $data['price'] = $this->request->getPost('price');
        $data['quantity'] = $this->request->getPost('quantity');

        $this->validation->setRules([
            'pro_name' => ['label' => 'Name', 'rules' => 'required'],
            'model' => ['label' => 'Model', 'rules' => 'required'],
            'categorys' => ['label' => 'Category', 'rules' => 'required'],
            'price' => ['label' => 'Price', 'rules' => 'required'],
            'quantity' => ['label' => 'Quantity', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('product_update/'.$product_id);
        } else {
            DB()->transStart();

            //product table data insert(start)
            $proData['name'] = $data['pro_name'];
            $proData['model'] = $data['model'];
            $proData['brand_id'] = !empty($this->request->getPost('brand_id'))?$this->request->getPost('brand_id'):null;
            $proData['price'] = $data['price'];
            $proData['weight'] = $this->request->getPost('weight');
            $proData['length'] = $this->request->getPost('length');
            $proData['width'] = $this->request->getPost('width');
            $proData['height'] = $this->request->getPost('height');
            $proData['sort_order'] = $this->request->getPost('sort_order');
            $proData['status'] = $this->request->getPost('status');
            $proData['quantity'] = $this->request->getPost('quantity');

            $product_featured = $this->request->getPost('product_featured');
            if ($product_featured == 'on'){
                $proData['featured'] = '1';
            }

            $proTable = DB()->table('cc_products');
            $proTable->where('product_id',$product_id)->update($proData);




            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$product_id.'/';

                //un link
                $oldImg = get_data_by_id('image','cc_products','product_id',$product_id);
                if ((!empty($oldImg)) && (file_exists($target_dir))) {
                    $mainImg = str_replace('pro_', '', $oldImg);
                    if (file_exists($target_dir . '/' . $mainImg)) {
                        unlink($target_dir . '' . $mainImg);
                    }
                    if (file_exists($target_dir . '/191_' . $oldImg)) {
                        unlink($target_dir . '191_' . $oldImg);
                    }
                    if (file_exists($target_dir . '/198_' . $oldImg)) {
                        unlink($target_dir . '198_' . $oldImg);
                    }
                    if (file_exists($target_dir . '/100_' . $oldImg)) {
                        unlink($target_dir . '100_' . $oldImg);
                    }
                    if (file_exists($target_dir . '/437_' . $oldImg)) {
                        unlink($target_dir . '437_' . $oldImg);
                    }
                }


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

                $proUpTable = DB()->table('cc_products');
                $proUpTable->where('product_id',$product_id)->update($dataImg);
            }
            //product table data insert(end)


            //multi image upload(start)
            if($this->request->getFileMultiple('multiImage')){

                $target_dir = FCPATH . '/uploads/products/'.$product_id.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                $files = $this->request->getFileMultiple('multiImage');
                foreach ($files as $file) {

                    if ($file->isValid() && ! $file->hasMoved())
                    {
                        $dataMultiImg['product_id'] = $product_id;
                        $proImgTable = DB()->table('cc_product_image');
                        $proImgTable->insert($dataMultiImg);
                        $proImgId = DB()->insertID();

                        $target_dir2 = FCPATH . '/uploads/products/'.$product_id.'/'.$proImgId.'/';
                        if (!file_exists($target_dir2)) {
                            mkdir($target_dir2, 0777);
                        }

                        $nameMulPic = $file->getRandomName();
                        $file->move($target_dir2, $nameMulPic);
                        $news_img2 = 'pro_' . $file->getName();
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(191, 191, 'center')->save($target_dir2 . '191_'.$news_img2);
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(198, 198, 'center')->save($target_dir2 . '198_'.$news_img2);
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(100, 100, 'center')->save($target_dir2 . '100_'.$news_img2);
                        $this->crop->withFile($target_dir2 . '' . $nameMulPic)->fit(437, 400, 'center')->save($target_dir2 . '437_'.$news_img2);


                        $dataMultiImg2['image'] = $news_img2;

                        $proImgUpTable = DB()->table('cc_product_image');
                        $proImgUpTable->where('product_image_id',$proImgId)->update($dataMultiImg2);
                    }

                }

            }
            //multi image upload(start)





            //product category insert(start)
            $catTableDel = DB()->table('cc_product_to_category');
            $catTableDel->where('product_id',$product_id)->delete();

            foreach ($data['categorys'] as $cat){
                $catData['product_id'] = $product_id;
                $catData['category_id'] = $cat;

                $catTable = DB()->table('cc_product_to_category');
                $catTable->insert($catData);
            }
            //product category insert(end)





            //product_free_delivery data insert(start)
            $free_delivery = $this->request->getPost('product_free_delivery');
            if ($free_delivery == 'on'){
                if (is_exists('cc_product_free_delivery','product_id',$product_id) == true) {
                    $proFreeData['product_id'] = $product_id;
                    $proFreetable = DB()->table('cc_product_free_delivery');
                    $proFreetable->insert($proFreeData);
                }
            }else{
                if (is_exists('cc_product_free_delivery','product_id',$product_id) == false) {
                    $proFreetable = DB()->table('cc_product_free_delivery');
                    $proFreetable->where('product_id', $product_id)->delete();
                }
            }
            //product_free_delivery data insert(end)



            //product description table data insert(start)
            $proDescData['product_id'] = $product_id;
            $proDescData['description'] = !empty($this->request->getPost('description'))?$this->request->getPost('description'):null;
            $proDescData['tag'] = !empty($this->request->getPost('tag'))?$this->request->getPost('tag'):null;
            $proDescData['meta_title'] = !empty($this->request->getPost('meta_title'))?$this->request->getPost('meta_title'):null;
            $proDescData['meta_description'] = !empty($this->request->getPost('meta_description'))?$this->request->getPost('meta_description'):null;
            $proDescData['meta_keyword'] = !empty($this->request->getPost('meta_keyword'))?$this->request->getPost('meta_keyword'):null;
            $proDescData['video'] = !empty($this->request->getPost('video'))?$this->request->getPost('video'):null;


            if (!empty($_FILES['description_image']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$product_id.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //unlink
                $oldImg = get_data_by_id('description_image','cc_product_description','product_id',$product_id);
                if ((!empty($oldImg)) && (file_exists($target_dir))) {
                    if (file_exists($target_dir . '/' . $oldImg)) {
                        unlink($target_dir . '' . $oldImg);
                    }
                }


                //new image upload
                $despic = $this->request->getFile('description_image');
                $namePic = 'des_' .$despic->getRandomName();
                $despic->move($target_dir, $namePic);

                $proDescData['description_image'] = $namePic;
            }

            if (!empty($_FILES['documentation_pdf']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$product_id.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //unlink
                $oldImg = get_data_by_id('documentation_pdf','cc_product_description','product_id',$product_id);
                if ((!empty($oldImg)) && (file_exists($target_dir))) {
                    if (file_exists($target_dir . '/' . $oldImg)) {
                        unlink($target_dir . '' . $oldImg);
                    }
                }

                //new image upload
                $docPdf = $this->request->getFile('documentation_pdf');
                $nameDoc = 'doc_' .$docPdf->getRandomName();
                $docPdf->move($target_dir, $nameDoc);

                $proDescData['documentation_pdf'] = $nameDoc;
            }

            if (!empty($_FILES['safety_pdf']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$product_id.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //unlink
                $oldImg = get_data_by_id('safety_pdf','cc_product_description','product_id',$product_id);
                if ((!empty($oldImg)) && (file_exists($target_dir))) {
                    if (file_exists($target_dir . '/' . $oldImg)) {
                        unlink($target_dir . '' . $oldImg);
                    }
                }

                //new image upload
                $safPdf = $this->request->getFile('safety_pdf');
                $nameDoc = 'saf_' .$safPdf->getRandomName();
                $safPdf->move($target_dir, $nameDoc);

                $proDescData['safety_pdf'] = $nameDoc;
            }

            if (!empty($_FILES['instructions_pdf']['name'])) {
                $target_dir = FCPATH . '/uploads/products/'.$product_id.'/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //unlink
                $oldImg = get_data_by_id('instructions_pdf','cc_product_description','product_id',$product_id);
                if ((!empty($oldImg)) && (file_exists($target_dir))) {
                    if (file_exists($target_dir . '/' . $oldImg)) {
                        unlink($target_dir . '' . $oldImg);
                    }
                }

                //new image upload
                $insPdf = $this->request->getFile('instructions_pdf');
                $nameDoc = 'ins_' .$insPdf->getRandomName();
                $insPdf->move($target_dir, $nameDoc);

                $proDescData['instructions_pdf'] = $nameDoc;
            }

            $proDescTable = DB()->table('cc_product_description');
            $proDescTable->where('product_id',$product_id)->update($proDescData);
            //product description table data insert(end)





            $option = $this->request->getPost('option[]');
            $opValue = $this->request->getPost('opValue[]');
            $qty = $this->request->getPost('qty[]');
            $subtract = $this->request->getPost('subtract[]');
            $price_op = $this->request->getPost('price_op[]');

            $optionTableDel = DB()->table('cc_product_option');
            $optionTableDel->where('product_id',$product_id)->delete();

            if (!empty($qty)){

                foreach ($qty as $key => $val){
                    $optionData['product_id'] = $product_id;
                    $optionData['option_id'] = $option[$key];
                    $optionData['option_value_id'] = $opValue[$key];
                    $optionData['quantity'] = $qty[$key];
                    $optionData['subtract'] = ($subtract[$key] == 'plus')?null:1;
                    $optionData['price'] = $price_op[$key];

                    $optionTable = DB()->table('cc_product_option');
                    $optionTable->insert($optionData);
                }
            }
            //product options table data insert(end)



            //product Attribute table data insert(start)
            $attribute_group_id = $this->request->getPost('attribute_group_id[]');
            $name = $this->request->getPost('name[]');
            $details = $this->request->getPost('details[]');

            if (!empty($attribute_group_id)){
                $attributeTableDel = DB()->table('cc_product_attribute');
                $attributeTableDel->where('product_id',$product_id)->delete();

                foreach ($attribute_group_id as $key => $val){
                    $attributeData['product_id'] = $product_id;
                    $attributeData['attribute_group_id'] = $attribute_group_id[$key];
                    $attributeData['name'] = $name[$key];
                    $attributeData['details'] = $details[$key];

                    $attributeTable = DB()->table('cc_product_attribute');
                    $attributeTable->insert($attributeData);
                }
            }

            //product Attribute table data insert(end)


            //product product_special table data insert(start)
            $special_price = $this->request->getPost('special_price');
            $start_date = $this->request->getPost('start_date');
            $end_date = $this->request->getPost('end_date');

            if (!empty($special_price)){
                $specialData['product_id'] = $product_id;
                $specialData['special_price'] = $special_price;
                $specialData['start_date'] = $start_date;
                $specialData['end_date'] = $end_date;

                $specialTable = DB()->table('cc_product_special');
                $checkSpec = $specialTable->where('product_id',$product_id)->countAllResults();
                if (empty($checkSpec)) {
                    $specialTable->insert($specialData);
                }else{
                    $specialTable->where('product_id',$product_id)->update($specialData);
                }

            }
            //product product_special table data insert(end)



            //product_related table data insert(start)
            $product_related = $this->request->getPost('product_related[]');
            if (!empty($product_related)){
                $proReltableDel = DB()->table('cc_product_related');
                $proReltableDel->where('product_id',$product_id)->delete();

                foreach ($product_related as $relp) {
                    $proRelData['product_id'] = $product_id;
                    $proRelData['related_id'] = $relp;
                    $proReltable = DB()->table('cc_product_related');
                    $proReltable->insert($proRelData);
                }
            }
            //product_related table data insert(end)


            // product_bought_together table data insert(start)
            $bought_together = $this->request->getPost('bought_together[]');
            if (!empty($bought_together)){
                $boughtTogetherDel = DB()->table('cc_product_bought_together');
                $boughtTogetherDel->where('product_id',$product_id)->delete();

                foreach ($bought_together as $bothp) {
                    $proBothData['product_id'] = $product_id;
                    $proBothData['related_id'] = $bothp;
                    $proBothtable = DB()->table('cc_product_bought_together');
                    $proBothtable->insert($proBothData);
                }
            }
            //product_bought_together table data insert(end)



            DB()->transComplete();
            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('product_update/'.$product_id);

        }
    }

    public function delete($product_id){

        helper('filesystem');

        DB()->transStart();

        $target_dir = FCPATH . '/uploads/products/'.$product_id;
        if (file_exists($target_dir)) {
            delete_files($target_dir, TRUE);
            rmdir($target_dir);
        }

        $proTable = DB()->table('cc_products');
        $proTable->where('product_id',$product_id)->delete();

        $proImgTable = DB()->table('cc_product_image');
        $proImgTable->where('product_id',$product_id)->delete();

        $catTableDel = DB()->table('cc_product_to_category');
        $catTableDel->where('product_id',$product_id)->delete();

        $proFreetable = DB()->table('cc_product_free_delivery');
        $proFreetable->where('product_id', $product_id)->delete();

        $proDescTable = DB()->table('cc_product_description');
        $proDescTable->where('product_id',$product_id)->delete();

        $optionTableDel = DB()->table('cc_product_option');
        $optionTableDel->where('product_id',$product_id)->delete();

        $attributeTableDel = DB()->table('cc_product_attribute');
        $attributeTableDel->where('product_id',$product_id)->delete();

        $specialTable = DB()->table('cc_product_special');
        $specialTable->where('product_id',$product_id)->delete();

        $proReltableDel = DB()->table('cc_product_related');
        $proReltableDel->where('product_id',$product_id)->delete();

        DB()->transComplete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('products');
    }

    public function get_subCategory(){
        $categoryID = $this->request->getPost('cat_id');
        $table = DB()->table('cc_product_category');
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

    public function related_product(){
        $product = [];
        $keyword = $this->request->getGet('q');
        $table = DB()->table('cc_products');
        $product = $table->like('name', $keyword)->get()->getResult();

        return $this->response->setJSON($product);
    }

    public function image_delete(){
        helper('filesystem');

        $product_image_id = $this->request->getPost('product_image_id');
        $table = DB()->table('cc_product_image');
        $data = $table->where('product_image_id', $product_image_id)->get()->getRow();

        $target_dir = FCPATH . '/uploads/products/'.$data->product_id.'/'.$product_image_id;
        if (file_exists($target_dir)) {
            delete_files($target_dir, TRUE);
            rmdir($target_dir);
        }

        $table->where('product_image_id', $product_image_id)->delete();
        print '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

    public function product_option_search(){
        $keyword = $this->request->getPost('key');
        $table = DB()->table('cc_option');
        $option = $table->like('name', $keyword)->get()->getResult();

        $view = '<ul class="list-unstyled list-op-aj" >';
        foreach ($option as $op){
            $optionname = "'$op->name'";
            $view .= '<li><a href="#" onclick="optionViewPro('.$op->option_id.','.$optionname.')" >'.$op->name.'</a></li>';
        }
        $view .= '</ul>';

        print $view;
    }

    public function product_option_value_search(){
        $option_id = $this->request->getPost('option_id');
        $table = DB()->table('cc_option_value');
        $data = $table->where('option_id',$option_id)->get()->getResult();
        $view = '';
        foreach ($data as $item) {
            $view .= '<option value="'.$item->option_value_id.'">'.$item->name.'</option>';
        }
//        print_r($data);
        print $view;
    }

}
