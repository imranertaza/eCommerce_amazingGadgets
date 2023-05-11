<?php namespace App\Controllers;

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

            $data['page_title'] = 'Sign In';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Login/login');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');

        }else{
            return redirect()->to(site_url('dashboard'));
        }

    }

    public function login_action(){
        $this->validation->setRule('email', 'Email', 'required|valid_email|trim');
        $this->validation->setRule('password', 'Password', 'required|max_length[32]');

        if($this->validation->withRequest($this->request)->run() == FALSE){

            $this->session->setFlashdata('message', '<div class="alert alert-danger py-2 px-3 border-0 text-white fs-5 text-capitalize"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.75 7.91625L7.91625 6.75L17.25 16.083L16.083 17.25L6.75 7.91625Z" fill="white"/><path d="M12.0002 1.5002C10.6189 1.49164 9.2497 1.75738 7.97191 2.28202C6.69413 2.80666 5.53321 3.57976 4.55649 4.55649C3.57976 5.53321 2.80666 6.69413 2.28202 7.97191C1.75738 9.2497 1.49164 10.6189 1.5002 12.0002C1.49164 13.3815 1.75738 14.7507 2.28202 16.0285C2.80666 17.3063 3.57976 18.4672 4.55649 19.4439C5.53321 20.4206 6.69413 21.1937 7.97191 21.7184C9.2497 22.243 10.6189 22.5088 12.0002 22.5002C13.3815 22.5088 14.7507 22.243 16.0285 21.7184C17.3063 21.1937 18.4672 20.4206 19.4439 19.4439C20.4206 18.4672 21.1937 17.3063 21.7184 16.0285C22.243 14.7507 22.5088 13.3815 22.5002 12.0002C22.5088 10.6189 22.243 9.2497 21.7184 7.97191C21.1937 6.69413 20.4206 5.53321 19.4439 4.55649C18.4672 3.57976 17.3063 2.80666 16.0285 2.28202C14.7507 1.75738 13.3815 1.49164 12.0002 1.5002ZM12.0002 21.0002C10.2202 21.0002 8.48011 20.4724 7.00007 19.4834C5.52003 18.4945 4.36647 17.0889 3.68528 15.4444C3.0041 13.7998 2.82587 11.9902 3.17313 10.2444C3.5204 8.49856 4.37757 6.89491 5.63624 5.63624C6.89491 4.37757 8.49856 3.5204 10.2444 3.17313C11.9902 2.82587 13.7998 3.0041 15.4444 3.68528C17.0889 4.36647 18.4945 5.52003 19.4834 7.00007C20.4724 8.48011 21.0002 10.2202 21.0002 12.0002C20.9933 14.385 20.0428 16.6702 18.3565 18.3565C16.6702 20.0428 14.385 20.9933 12.0002 21.0002Z" fill="white"/></svg> Sorry something wrong </div>');
            return redirect()->to(site_url('login'));
        }else{

            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $result = $this->loginMe($email, $password);

            if(!empty($result)){

                // Remember me (Remembering the user email and password) Start
                if (!empty($this->request->getPost("remember"))) {
                    setcookie('login_email_web',$email,time()+ (86400 * 30), "/");
                    setcookie('login_password_web',$password,time() + (86400 * 30), "/");
                }else{
                    if (isset($_COOKIE['login_email_web'])) {
                        setcookie('login_email_web','', 0, "/");
                    }
                    if (isset($_COOKIE['login_password_web'])) {
                        setcookie('login_password_web','', 0, "/");
                    }
                }
                // Remember me (Remembering the user email and password) End



                $sessionArray = array('cusUserId' => $result->customer_id,
                    'cusAll' => $result,
                    'isLoggedInCustomer' => TRUE
                );
                $this->session->set($sessionArray);

                return redirect()->to(site_url('dashboard'));


            }else{
                $this->session->setFlashdata('message', '<div class="alert alert-danger alert-dismissible" role="alert">Your login detail not match <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                return redirect()->to(site_url());
            }

        }
    }

    private function loginMe($email,$password){
        $table = DB()->table('cc_customer');
        $user = $table->where('email',$email)->get()->getRow();

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

    public function register(){
        $isLoggedInCustomer = $this->session->isLoggedInCustomer;
        if (!isset($isLoggedInCustomer) || $isLoggedInCustomer != TRUE) {

            $data['page_title'] = 'Sign up';
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Login/register');
            echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');

        }else{
            return redirect()->to(site_url('dashboard'));
        }
    }

    public function register_action(){
        $this->validation->setRule('firstname', 'First Name', 'required|max_length[12]|trim');
        $this->validation->setRule('lastname', 'Last Name', 'required|max_length[12]|trim');
        $this->validation->setRule('email', 'Email', 'required|valid_email|trim');
        $this->validation->setRule('phone', 'Phone', 'required|min_length[10]|max_length[12]|trim');
        $this->validation->setRule('password', 'Password', 'required|max_length[32]');
        $this->validation->setRule('confirm_password', 'Confirm Password', 'required|matches[password]|max_length[32]');

        if($this->validation->withRequest($this->request)->run() == FALSE){
            $this->session->setFlashdata('message', '<div class="alert alert-danger py-2 px-3 border-0 text-white fs-5 text-capitalize"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.75 7.91625L7.91625 6.75L17.25 16.083L16.083 17.25L6.75 7.91625Z" fill="white"/><path d="M12.0002 1.5002C10.6189 1.49164 9.2497 1.75738 7.97191 2.28202C6.69413 2.80666 5.53321 3.57976 4.55649 4.55649C3.57976 5.53321 2.80666 6.69413 2.28202 7.97191C1.75738 9.2497 1.49164 10.6189 1.5002 12.0002C1.49164 13.3815 1.75738 14.7507 2.28202 16.0285C2.80666 17.3063 3.57976 18.4672 4.55649 19.4439C5.53321 20.4206 6.69413 21.1937 7.97191 21.7184C9.2497 22.243 10.6189 22.5088 12.0002 22.5002C13.3815 22.5088 14.7507 22.243 16.0285 21.7184C17.3063 21.1937 18.4672 20.4206 19.4439 19.4439C20.4206 18.4672 21.1937 17.3063 21.7184 16.0285C22.243 14.7507 22.5088 13.3815 22.5002 12.0002C22.5088 10.6189 22.243 9.2497 21.7184 7.97191C21.1937 6.69413 20.4206 5.53321 19.4439 4.55649C18.4672 3.57976 17.3063 2.80666 16.0285 2.28202C14.7507 1.75738 13.3815 1.49164 12.0002 1.5002ZM12.0002 21.0002C10.2202 21.0002 8.48011 20.4724 7.00007 19.4834C5.52003 18.4945 4.36647 17.0889 3.68528 15.4444C3.0041 13.7998 2.82587 11.9902 3.17313 10.2444C3.5204 8.49856 4.37757 6.89491 5.63624 5.63624C6.89491 4.37757 8.49856 3.5204 10.2444 3.17313C11.9902 2.82587 13.7998 3.0041 15.4444 3.68528C17.0889 4.36647 18.4945 5.52003 19.4834 7.00007C20.4724 8.48011 21.0002 10.2202 21.0002 12.0002C20.9933 14.385 20.0428 16.6702 18.3565 18.3565C16.6702 20.0428 14.385 20.9933 12.0002 21.0002Z" fill="white"/></svg> ' . $this->validation->listErrors() . ' </div>');
            return redirect()->to(site_url('register'));
        }else{

            $data['email'] = $this->request->getPost('email');
            $data['phone'] = $this->request->getPost('phone');
            $data['firstname'] = $this->request->getPost('firstname');
            $data['lastname'] = $this->request->getPost('lastname');
            $data['password'] = SHA1($this->request->getPost('password'));

            $email_check = is_exists('cc_customer','email',$data['email']);
            $phone_check = is_exists('cc_customer','phone',$data['phone']);
            if (($email_check == true) && ($phone_check == true)){
                $table = DB()->table('cc_customer');
                $table->insert($data);

                $title = 'Your registration is completed!';
                $message = 'Thank you. Your registration has been successfully completed. 
                Login details  Email: '.$data['email'].' Password: '.$this->request->getPost('password');
                $url = base_url('login');
                $temp = success_email_template($title,$message,$url);

                email_send($data['email'],$title,$temp);

                $this->session->setFlashdata('message', '<div class="alert-success py-2 px-3 border-0 text-white fs-5 text-capitalize">Register successfully</div>');
                return redirect()->to(site_url('login'));
            }else{
                $this->session->setFlashdata('message', '<div class="alert alert-danger py-2 px-3 border-0 text-white fs-5 text-capitalize"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.75 7.91625L7.91625 6.75L17.25 16.083L16.083 17.25L6.75 7.91625Z" fill="white"/><path d="M12.0002 1.5002C10.6189 1.49164 9.2497 1.75738 7.97191 2.28202C6.69413 2.80666 5.53321 3.57976 4.55649 4.55649C3.57976 5.53321 2.80666 6.69413 2.28202 7.97191C1.75738 9.2497 1.49164 10.6189 1.5002 12.0002C1.49164 13.3815 1.75738 14.7507 2.28202 16.0285C2.80666 17.3063 3.57976 18.4672 4.55649 19.4439C5.53321 20.4206 6.69413 21.1937 7.97191 21.7184C9.2497 22.243 10.6189 22.5088 12.0002 22.5002C13.3815 22.5088 14.7507 22.243 16.0285 21.7184C17.3063 21.1937 18.4672 20.4206 19.4439 19.4439C20.4206 18.4672 21.1937 17.3063 21.7184 16.0285C22.243 14.7507 22.5088 13.3815 22.5002 12.0002C22.5088 10.6189 22.243 9.2497 21.7184 7.97191C21.1937 6.69413 20.4206 5.53321 19.4439 4.55649C18.4672 3.57976 17.3063 2.80666 16.0285 2.28202C14.7507 1.75738 13.3815 1.49164 12.0002 1.5002ZM12.0002 21.0002C10.2202 21.0002 8.48011 20.4724 7.00007 19.4834C5.52003 18.4945 4.36647 17.0889 3.68528 15.4444C3.0041 13.7998 2.82587 11.9902 3.17313 10.2444C3.5204 8.49856 4.37757 6.89491 5.63624 5.63624C6.89491 4.37757 8.49856 3.5204 10.2444 3.17313C11.9902 2.82587 13.7998 3.0041 15.4444 3.68528C17.0889 4.36647 18.4945 5.52003 19.4834 7.00007C20.4724 8.48011 21.0002 10.2202 21.0002 12.0002C20.9933 14.385 20.0428 16.6702 18.3565 18.3565C16.6702 20.0428 14.385 20.9933 12.0002 21.0002Z" fill="white"/></svg>  Email or Phone already in used </div>');
                return redirect()->to(site_url('register'));
            }

        }
    }

    public function logout()
    {

        unset($_SESSION['cusUserId']);
        unset($_SESSION['cusName']);
        unset($_SESSION['cusAll']);
        unset($_SESSION['isLoggedInCustomer']);

        return redirect()->to('/login');
    }

    public function forgotPassword(){
        $data['page_title'] = 'Forgot Password';
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/header',$data);
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/Login/forgotPassword');
        echo view('Theme/'.get_lebel_by_value_in_settings('Theme').'/footer');
    }

    public function password_action(){
        $email = $this->request->getPost('email');
        $check = is_exists('cc_customer','email',$email);
        if ($check == false){
            $otp = rand(1000,9999);

            $sessionArray = array(
                'forgot_email' => $email,
                'otp' => $otp,
                'forgetPassword' => TRUE
            );
            $this->session->set($sessionArray);

            //email send
            $title = 'Password reset Otp';
            $message = 'Your otp is '.$otp;
            $url = base_url('otp_submit');
            $tem = success_email_template($title,$message,$url);

            $to = $email;
            email_send($to,$title,$tem);

            return redirect()->to(site_url('otp_submit'));

        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger py-2 px-3 border-0 text-white fs-5 text-capitalize"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.75 7.91625L7.91625 6.75L17.25 16.083L16.083 17.25L6.75 7.91625Z" fill="white"/><path d="M12.0002 1.5002C10.6189 1.49164 9.2497 1.75738 7.97191 2.28202C6.69413 2.80666 5.53321 3.57976 4.55649 4.55649C3.57976 5.53321 2.80666 6.69413 2.28202 7.97191C1.75738 9.2497 1.49164 10.6189 1.5002 12.0002C1.49164 13.3815 1.75738 14.7507 2.28202 16.0285C2.80666 17.3063 3.57976 18.4672 4.55649 19.4439C5.53321 20.4206 6.69413 21.1937 7.97191 21.7184C9.2497 22.243 10.6189 22.5088 12.0002 22.5002C13.3815 22.5088 14.7507 22.243 16.0285 21.7184C17.3063 21.1937 18.4672 20.4206 19.4439 19.4439C20.4206 18.4672 21.1937 17.3063 21.7184 16.0285C22.243 14.7507 22.5088 13.3815 22.5002 12.0002C22.5088 10.6189 22.243 9.2497 21.7184 7.97191C21.1937 6.69413 20.4206 5.53321 19.4439 4.55649C18.4672 3.57976 17.3063 2.80666 16.0285 2.28202C14.7507 1.75738 13.3815 1.49164 12.0002 1.5002ZM12.0002 21.0002C10.2202 21.0002 8.48011 20.4724 7.00007 19.4834C5.52003 18.4945 4.36647 17.0889 3.68528 15.4444C3.0041 13.7998 2.82587 11.9902 3.17313 10.2444C3.5204 8.49856 4.37757 6.89491 5.63624 5.63624C6.89491 4.37757 8.49856 3.5204 10.2444 3.17313C11.9902 2.82587 13.7998 3.0041 15.4444 3.68528C17.0889 4.36647 18.4945 5.52003 19.4834 7.00007C20.4724 8.48011 21.0002 10.2202 21.0002 12.0002C20.9933 14.385 20.0428 16.6702 18.3565 18.3565C16.6702 20.0428 14.385 20.9933 12.0002 21.0002Z" fill="white"/></svg> Email is not available</div>');
            return redirect()->to(site_url('forgotpassword'));
        }

    }

    public function otp_submit(){
        if ($this->session->forgetPassword == true) {
            $data['page_title'] = 'Otp Submit';
            echo view('Theme/' . get_lebel_by_value_in_settings('Theme') . '/header', $data);
            echo view('Theme/' . get_lebel_by_value_in_settings('Theme') . '/Login/otp_submit');
            echo view('Theme/' . get_lebel_by_value_in_settings('Theme') . '/footer');
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger py-2 px-3 border-0 text-white fs-5 text-capitalize"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.75 7.91625L7.91625 6.75L17.25 16.083L16.083 17.25L6.75 7.91625Z" fill="white"/><path d="M12.0002 1.5002C10.6189 1.49164 9.2497 1.75738 7.97191 2.28202C6.69413 2.80666 5.53321 3.57976 4.55649 4.55649C3.57976 5.53321 2.80666 6.69413 2.28202 7.97191C1.75738 9.2497 1.49164 10.6189 1.5002 12.0002C1.49164 13.3815 1.75738 14.7507 2.28202 16.0285C2.80666 17.3063 3.57976 18.4672 4.55649 19.4439C5.53321 20.4206 6.69413 21.1937 7.97191 21.7184C9.2497 22.243 10.6189 22.5088 12.0002 22.5002C13.3815 22.5088 14.7507 22.243 16.0285 21.7184C17.3063 21.1937 18.4672 20.4206 19.4439 19.4439C20.4206 18.4672 21.1937 17.3063 21.7184 16.0285C22.243 14.7507 22.5088 13.3815 22.5002 12.0002C22.5088 10.6189 22.243 9.2497 21.7184 7.97191C21.1937 6.69413 20.4206 5.53321 19.4439 4.55649C18.4672 3.57976 17.3063 2.80666 16.0285 2.28202C14.7507 1.75738 13.3815 1.49164 12.0002 1.5002ZM12.0002 21.0002C10.2202 21.0002 8.48011 20.4724 7.00007 19.4834C5.52003 18.4945 4.36647 17.0889 3.68528 15.4444C3.0041 13.7998 2.82587 11.9902 3.17313 10.2444C3.5204 8.49856 4.37757 6.89491 5.63624 5.63624C6.89491 4.37757 8.49856 3.5204 10.2444 3.17313C11.9902 2.82587 13.7998 3.0041 15.4444 3.68528C17.0889 4.36647 18.4945 5.52003 19.4834 7.00007C20.4724 8.48011 21.0002 10.2202 21.0002 12.0002C20.9933 14.385 20.0428 16.6702 18.3565 18.3565C16.6702 20.0428 14.385 20.9933 12.0002 21.0002Z" fill="white"/></svg> Email is not available</div>');
            return redirect()->to(site_url('forgotpassword'));
        }
    }

    public function otp_action(){
        $otp = $this->request->getPost('otp');
        $sesOtp = $this->session->otp;
        if ($otp == $sesOtp){
            return redirect()->to(site_url('password_reset'));
        }else{
            $this->session->setFlashdata('message', '<div class="alert alert-danger py-2 px-3 border-0 text-white fs-5 text-capitalize"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.75 7.91625L7.91625 6.75L17.25 16.083L16.083 17.25L6.75 7.91625Z" fill="white"/><path d="M12.0002 1.5002C10.6189 1.49164 9.2497 1.75738 7.97191 2.28202C6.69413 2.80666 5.53321 3.57976 4.55649 4.55649C3.57976 5.53321 2.80666 6.69413 2.28202 7.97191C1.75738 9.2497 1.49164 10.6189 1.5002 12.0002C1.49164 13.3815 1.75738 14.7507 2.28202 16.0285C2.80666 17.3063 3.57976 18.4672 4.55649 19.4439C5.53321 20.4206 6.69413 21.1937 7.97191 21.7184C9.2497 22.243 10.6189 22.5088 12.0002 22.5002C13.3815 22.5088 14.7507 22.243 16.0285 21.7184C17.3063 21.1937 18.4672 20.4206 19.4439 19.4439C20.4206 18.4672 21.1937 17.3063 21.7184 16.0285C22.243 14.7507 22.5088 13.3815 22.5002 12.0002C22.5088 10.6189 22.243 9.2497 21.7184 7.97191C21.1937 6.69413 20.4206 5.53321 19.4439 4.55649C18.4672 3.57976 17.3063 2.80666 16.0285 2.28202C14.7507 1.75738 13.3815 1.49164 12.0002 1.5002ZM12.0002 21.0002C10.2202 21.0002 8.48011 20.4724 7.00007 19.4834C5.52003 18.4945 4.36647 17.0889 3.68528 15.4444C3.0041 13.7998 2.82587 11.9902 3.17313 10.2444C3.5204 8.49856 4.37757 6.89491 5.63624 5.63624C6.89491 4.37757 8.49856 3.5204 10.2444 3.17313C11.9902 2.82587 13.7998 3.0041 15.4444 3.68528C17.0889 4.36647 18.4945 5.52003 19.4834 7.00007C20.4724 8.48011 21.0002 10.2202 21.0002 12.0002C20.9933 14.385 20.0428 16.6702 18.3565 18.3565C16.6702 20.0428 14.385 20.9933 12.0002 21.0002Z" fill="white"/></svg> Invalid otp code </div>');
        }
    }

    public function password_reset(){

        $data['page_title'] = 'Reset password';
        echo view('Theme/' . get_lebel_by_value_in_settings('Theme') . '/header', $data);
        echo view('Theme/' . get_lebel_by_value_in_settings('Theme') . '/Login/reset_password');
        echo view('Theme/' . get_lebel_by_value_in_settings('Theme') . '/footer');
    }

    public function reset_action(){
        $this->validation->setRule('password', 'Password', 'required|max_length[32]');
        $this->validation->setRule('confirm_password', 'Confirm Password', 'required|matches[password]|max_length[32]');

        if($this->validation->withRequest($this->request)->run() == FALSE){
            $this->session->setFlashdata('message', '<div class="alert alert-danger py-2 px-3 border-0 text-white fs-5 text-capitalize"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.75 7.91625L7.91625 6.75L17.25 16.083L16.083 17.25L6.75 7.91625Z" fill="white"/><path d="M12.0002 1.5002C10.6189 1.49164 9.2497 1.75738 7.97191 2.28202C6.69413 2.80666 5.53321 3.57976 4.55649 4.55649C3.57976 5.53321 2.80666 6.69413 2.28202 7.97191C1.75738 9.2497 1.49164 10.6189 1.5002 12.0002C1.49164 13.3815 1.75738 14.7507 2.28202 16.0285C2.80666 17.3063 3.57976 18.4672 4.55649 19.4439C5.53321 20.4206 6.69413 21.1937 7.97191 21.7184C9.2497 22.243 10.6189 22.5088 12.0002 22.5002C13.3815 22.5088 14.7507 22.243 16.0285 21.7184C17.3063 21.1937 18.4672 20.4206 19.4439 19.4439C20.4206 18.4672 21.1937 17.3063 21.7184 16.0285C22.243 14.7507 22.5088 13.3815 22.5002 12.0002C22.5088 10.6189 22.243 9.2497 21.7184 7.97191C21.1937 6.69413 20.4206 5.53321 19.4439 4.55649C18.4672 3.57976 17.3063 2.80666 16.0285 2.28202C14.7507 1.75738 13.3815 1.49164 12.0002 1.5002ZM12.0002 21.0002C10.2202 21.0002 8.48011 20.4724 7.00007 19.4834C5.52003 18.4945 4.36647 17.0889 3.68528 15.4444C3.0041 13.7998 2.82587 11.9902 3.17313 10.2444C3.5204 8.49856 4.37757 6.89491 5.63624 5.63624C6.89491 4.37757 8.49856 3.5204 10.2444 3.17313C11.9902 2.82587 13.7998 3.0041 15.4444 3.68528C17.0889 4.36647 18.4945 5.52003 19.4834 7.00007C20.4724 8.48011 21.0002 10.2202 21.0002 12.0002C20.9933 14.385 20.0428 16.6702 18.3565 18.3565C16.6702 20.0428 14.385 20.9933 12.0002 21.0002Z" fill="white"/></svg> ' . $this->validation->listErrors() . ' </div>');
            return redirect()->to(site_url('password_reset'));
        }else{
            $email = $this->session->forgot_email;
            $data['password'] = SHA1($this->request->getPost('password'));

            $table = DB()->table('cc_customer');
            $table->where('email',$email)->update($data);

            //email send
            $title = 'Your password reset is completed!';
            $message = 'Thank you. Your new login details  Email: '.$email.' Password: '.$this->request->getPost('password');
            $url = base_url('login');
            $temp = success_email_template($title,$message,$url);
            email_send($email,$title,$temp);

            unset($_SESSION['forgot_email']);
            unset($_SESSION['otp']);
            unset($_SESSION['forgetPassword']);

            $this->session->setFlashdata('message', '<div class="alert-success py-2 px-3 border-0 text-white fs-5 text-capitalize">Password reset successfully</div>');
            return redirect()->to(site_url('login'));
        }

    }


}
