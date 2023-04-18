<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Permission;

class Theme_settings extends BaseController
{

    protected $validation;
    protected $session;
    protected $crop;
    protected $permission;
    private $module_name = 'Theme_settings';

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

            $table = DB()->table('cc_theme_settings');
            $data['theme_settings'] = $table->get()->getResult();


            //$perm = array('create','read','update','delete','mod_access');
            $perm = $this->permission->module_permission_list($adRoleId, $this->module_name);
            foreach ($perm as $key => $val) {
                $data[$key] = $this->permission->have_access($adRoleId, $this->module_name, $key);
            }
            echo view('Admin/header');
            echo view('Admin/sidebar');
            if (isset($data['mod_access']) and $data['mod_access'] == 1) {
                echo view('Admin/Theme_settings/index', $data);
            } else {
                echo view('Admin/no_permission');
            }
            echo view('Admin/footer');
        }
    }

    public function slider_update()
    {
        $nameslider = $this->request->getPost('nameslider');

        if (!empty($_FILES['slider']['name'])) {
            $target_dir = FCPATH . '/uploads/slider/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic = $this->request->getFile('slider');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'slider_' . $pic->getName();
            $this->crop->withFile($target_dir . '' . $namePic)->fit(837, 394, 'center')->save($target_dir . '' . $news_img);
            unlink($target_dir . '' . $namePic);
            $data['value'] = $news_img;

            $table = DB()->table('cc_theme_settings');
            $table->where('label',$nameslider)->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('theme_settings');
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Image required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('theme_settings');
        }


    }

    public function logo_update()
    {

        if (!empty($_FILES['side_logo']['name'])) {
            $target_dir = FCPATH . '/uploads/logo/';
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777);
            }

            //new image uplode
            $pic = $this->request->getFile('side_logo');
            $namePic = $pic->getRandomName();
            $pic->move($target_dir, $namePic);
            $news_img = 'logo_' . $pic->getName();
            $this->crop->withFile($target_dir . '' . $namePic)->fit(150, 90, 'center')->save($target_dir . '' . $news_img);
            unlink($target_dir . '' . $namePic);
            $data['value'] = $news_img;

            $table = DB()->table('cc_theme_settings');
            $table->where('label','side_logo')->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('theme_settings');
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Logo required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('theme_settings');
        }


    }

    public function home_category()
    {

        $data['value'] = $this->request->getPost('home_category');

        $this->validation->setRules([
            'value' => ['label' => 'Category', 'rules' => 'required'],
        ]);

        if ($this->validation->run($data) == FALSE) {
            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">' . $this->validation->listErrors() . ' <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('theme_settings');
        } else {


            $table = DB()->table('cc_theme_settings');
            $table->where('label','home_category')->update($data);

            $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to('theme_settings');
        }


    }

    public function settings_update()
    {

        $data['value'] = $this->request->getPost('value');
        $label = $this->request->getPost('label');

        $table = DB()->table('cc_theme_settings');
        $table->where('label',$label)->update($data);

        $this->session->setFlashdata('message', '<div class="alert alert-success alert-dismissible" role="alert">Update Record Success <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        return redirect()->to('theme_settings');



    }


}
