<?php

class Login extends Controller{
    public function __construct(){
        $this->loginModel = $this->model('User');
    }
    public function index(){
        if (isset($_SESSION['user'])){
            header("Location: ".URLROOT);
        }
        $this->view('login/index');
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            //Sanitize the post

            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),

                'email_err'=>'',
                'password_err'=>'',
                'user_not_exists_err'=>'',

            ];
            //set login attempt if not set
            if(!isset($_SESSION['attempt'])){
                $_SESSION['attempt'] = 0;
            }

            //check if there are 3 attempts already
            if($_SESSION['attempt'] == 3){
                $_SESSION['error'] = 'Attempt limit reach';
            }


            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email.';
            }
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password.';
            }




            if (empty($data['email_err']) &&
                empty($data['password_err'])){
                if (!empty($this->loginModel->checkUserExist($data)[0]->email) &&
                    $this->loginModel->checkUserExist($data)[0]->email == $data['email']){
                    if (password_verify($data['password'],$this->loginModel->checkUserExist($data)[0]->password)){
                        $_SESSION['user'] = $data['email'];
                        unset($_SESSION['attempt']);
                        header("Location: ".URLROOT);
                        die();
                    } else{
                        $data['password_err'] = 'Please enter password correctly';
                        $_SESSION['attempt'] += 1;
                        //set the time to allow login if third attempt is reach
                        if($_SESSION['attempt'] == 3) {
                            $_SESSION['attempt_again'] = time() + (30);
                            //note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
                        }
                    }
                }else{
                    $data['user_not_exists_err'] = "User doesn't exist";

                }



            }else{
                //Return to add post page with data and error information
                $this->view('login/index', $data);
            }


//           'You are registered'
            $this->view('login/index',$data);


        }
//        $this->view('login/login');
    }
}