<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Page_settings extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Page_settings';

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
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_pages');
            $data['pages'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Page_settings/index', $data);
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

            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['create']) and $data['create'] == 1) {
                echo view('Admin/Page_settings/create');
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function create_action()
    {
        $data['page_title'] = $this->request->getPost('page_title');
        $data['slug'] = $this->request->getPost('slug');
        $data['temp'] = !empty($this->request->getPost('temp'))?$this->request->getPost('temp'):null;
        $data['short_des'] = !empty($this->request->getPost('short_des'))?$this->request->getPost('short_des'):null;
        $data['page_description'] = !empty($this->request->getPost('page_description'))?$this->request->getPost('page_description'):null;

        $this->validation->setRules([
            'page_title' => ['label' => 'Page Title', 'rules' => 'required'],
            'slug' => ['label' => 'Slug', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('page_create');
        } else {
//            if (!empty($_FILES['f_image']['name'])) {
//                $target_dir = FCPATH . '/uploads/page/';
//                if (!file_exists($target_dir)) {
//                    mkdir($target_dir, 0777);
//                }
//
//                //new image uplode
//                $pic = $this->request->getFile('f_image');
//                $namePic = $pic->getRandomName();
//                $pic->move($target_dir, $namePic);
//                $news_img = 'page_' . $pic->getName();
//                $this->crop->withFile($target_dir . '' . $namePic)->fit(250, 150, 'center')->save($target_dir . '' . $news_img);
//                unlink($target_dir . '' . $namePic);
//                $data['f_image'] = $news_img;
//            }

            $table = DB()->table('cc_pages');
            $table->insert($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Create Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('page_create');
        }
    }

    public function update($page_id)
    {
        $isLoggedInEcAdmin = $this->session->isLoggedInEcAdmin;
        $adRoleId = $this->session->adRoleId;
        if (!isset($isLoggedInEcAdmin) || $isLoggedInEcAdmin != TRUE) {
            return redirect()->to(site_url('admin'));
        } else {

            $table = DB()->table('cc_pages');
            $data['page'] = $table->where('page_id', $page_id)->get()->getRow();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['update']) and $data['update'] == 1) {
                echo view('Admin/Page_settings/update', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function update_action()
    {
        $page_id = $this->request->getPost('page_id');
        $data['page_title'] = $this->request->getPost('page_title');
        $data['slug'] = $this->request->getPost('slug');
        $data['temp'] = !empty($this->request->getPost('temp'))?$this->request->getPost('temp'):null;
        $data['short_des'] = !empty($this->request->getPost('short_des'))?$this->request->getPost('short_des'):null;
        $data['page_description'] = !empty($this->request->getPost('page_description'))?$this->request->getPost('page_description'):null;

        $this->validation->setRules([
            'page_title' => ['label' => 'Page Title', 'rules' => 'required'],
            'slug' => ['label' => 'Slug', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('page_update/' . $page_id);
        } else {

            $table = DB()->table('cc_pages');
            $table->where('page_id', $page_id)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('page_update/' . $page_id);

        }
    }

    public function delete($page_id){

        $table = DB()->table('cc_pages');
        $table->where('page_id', $page_id)->delete();

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Delete Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('page_list');
    }

}
