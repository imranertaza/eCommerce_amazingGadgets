<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Libraries\Permission;
use App\Models\FavoriteModel;

class Favorite extends BaseController
{

    protected $validation;
    protected $session;
    protected $favoriteModel;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->favoriteModel = new FavoriteModel();
    }

    public function index()
    {
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;
        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) {
            return redirect()->to(site_url('Login'));
        } else {

            $data['allProd'] = $this->favoriteModel->where('cc_customer_wishlist.customer_id',$this->session->cusUserId)->query()->paginate(10);
            $data['pager'] = $this->favoriteModel->pager;
            $data['links'] = $data['pager']->links('default','custome_link');

            $data['menu_active'] = 'favorite';
            $data['page_title'] = 'Favorite';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/menu');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Customer/favorite',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
        }
    }

}
