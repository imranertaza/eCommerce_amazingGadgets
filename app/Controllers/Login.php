<?php

namespace App\Controllers;

class Login extends BaseController {

    protected $validation;
    protected $session;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;
        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) {

            $data['menu_view'] = true;
            echo view('Web/header',$data);
            echo view('Web/login');
            echo view('Web/footer');

        }else{
            return redirect()->to(site_url('Web/Dashboard'));
        }

    }


    public function login_action(){
        $this->validation->setRule('mobile', 'Phone', 'required|min_length[10]|max_length[12]|trim');
        $this->validation->setRule('password', 'Password', 'required|max_length[32]');

        if($this->validation->withRequest($this->request)->run() == FALSE){

            $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">All field is required <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            return redirect()->to(site_url());
        }else{

            $mobile = $this->request->getPost('mobile');
            $password = $this->request->getPost('password');

            $result = $this->loginMe($mobile, $password);

            if(!empty($result)){

                // Remember me (Remembering the user email and password) Start
                if (!empty($this->request->getPost("remember"))) {
                    setcookie('login_mobile',$mobile,time()+ (86400 * 30), "/");
                    setcookie('login_password',$password,time() + (86400 * 30), "/");
                }else{
                    if (isset($_COOKIE['login_email'])) {
                        setcookie('login_mobile','', 0, "/");
                    }
                    if (isset($_COOKIE['login_password'])) {
                        setcookie('login_password','', 0, "/");
                    }
                }
                // Remember me (Remembering the user email and password) End



                $sessionArray = array('cusUserId' => $result->customer_id,
                    'cusName' => $result->customer_name,
                    'cusAll' => $result,
                    'isLoggedInCustomer' => TRUE
                );
                $this->session->set($sessionArray);

                return redirect()->to(site_url('Web/Dashboard'));


            }else{
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Your login detail not match <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to(site_url());
            }

        }
    }

    private function loginMe($mobile,$password){
        $table = DB()->table('customers');
        $user = $table->where('mobile',$mobile)->get()->getRow();

        if(!empty($user)){
            if(SHA1($password) == $user->password){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    public function logout()
    {

        unset($_SESSION['cusUserId']);
        unset($_SESSION['cusName']);
        unset($_SESSION['cusAll']);
        unset($_SESSION['isLoggedInCustomer']);

        return redirect()->to('/Login');
    }
}
