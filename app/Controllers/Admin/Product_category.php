<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Product_category extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Product_category';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->crop = \Config\Services::image();
        $this->permission = new Permission();
    }

    public function index()
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('Admin/Login'));
        } else {

            $table = DB()->table('product_category');
            $data['category'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Product_category/index',$data);
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
                echo view('Admin/Product_category/create');
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {
        $data['product_category'] = $this->request->getPost('product_category');
        $data['createdBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'product_category' => ['label' => 'Product Category Name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Product_category/create');
        } else {
            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/category/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //new image uplode
                $pic = $this->request->getFile('image');
                $namePic = $pic->getRandomName();
                $pic->move($target_dir, $namePic);
                $news_img = 'category_' . $pic->getName();
                $this->crop->withFile($target_dir . '' . $namePic)->fit(250, 150, 'center')->save($target_dir . '' . $news_img);
                unlink($target_dir . '' . $namePic);
                $data['image'] = $news_img;
            }

            $table = DB()->table('product_category');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Product_category/create');
        }
    }

    public function update($prod_cat_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('Admin/Login'));
        } else {

            $table = DB()->table('product_category');
            $data['category'] = $table->where('prod_cat_id', $prod_cat_id)->get()->getRow();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Product_category/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {
        $prod_cat_id = $this->request->getPost('prod_cat_id');
        $data['product_category'] = $this->request->getPost('product_category');
        $data['updatedBy'] = $this->session->adUserId;

        $this->validation->setRules([
            'product_category' => ['label' => 'Product Category Name', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Product_category/update/' . $prod_cat_id);
        } else {
            if (!empty($_FILES['image']['name'])) {
                $target_dir = FCPATH . '/uploads/category/';
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777);
                }

                //old image unlink
                $old_img = get_data_by_id('image', 'product_category', 'prod_cat_id', $prod_cat_id);
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
                $news_img = 'category_' . $pic->getName();
                $this->crop->withFile($target_dir . '' . $namePic)->fit(250, 150, 'center')->save($target_dir . '' . $news_img);
                unlink($target_dir . '' . $namePic);
                $data['image'] = $news_img;
            }

            $table = DB()->table('product_category');
            $table->where('prod_cat_id', $prod_cat_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('/Admin/Product_category/update/' . $prod_cat_id);

        }
    }

    public function delete($prod_cat_id){

        $target_dir = FCPATH . '/uploads/category/';
        //old image unlink
        $old_img = get_data_by_id('image', 'product_category', 'prod_cat_id', $prod_cat_id);
        if (!empty($old_img)) {
            $imgPath = $target_dir . '' . $old_img;
            if (file_exists($imgPath)) {
                unlink($target_dir . '' . $old_img);
            }
        }


        $table = DB()->table('product_category');
        $table->where('prod_cat_id', $prod_cat_id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('/Admin/Product_category');
    }

}
