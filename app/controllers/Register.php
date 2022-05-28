<?php
//use App\Utility;
class Register extends Controller{
    public function __construct(){
        $this->registerModel = $this->model('User');
    }
    public function index(){
        if (isset($_SESSION['user'])){
            header("Location: ".URLROOT);
        }
        $this->view('register/index');
    }
    public function register() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize the post

            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $data = [
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'password_repeat' => trim($_POST['password_repeat']),

                'name_err'=>'',
                'surname_err'=>'',
                'email_err'=>'',
                'password_err'=>'',
                'password_repeat_err'=>'',
                'user_exists_err'=>'',


            ];
            if ($data['password'] != $data['password_repeat'] || empty($data['password_repeat']))
            {
                $data['password_repeat_err'] = 'Repeat password correctly';
            }

            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name.';
            }
            if (empty($data['surname'])) {
                $data['surname_err'] = 'Please enter surname.';
            }
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email.';
            }
//            echo "<pre>";
//            print_r($this->registerModel->checkUserExist($data));
//            $outputDb = $this->registerModel->checkUserExist($data);
//            echo $outputDb[0]->email;
//            echo "</pre>";
//
//            die();
            if (!empty($this->registerModel->checkUserExist($data)[0]->email) &&  $this->registerModel->checkUserExist($data)[0]->email == $data['email']){
//                die("user exists");
                $data['user_exists_err'] = 'User already exists in the database!';
            }
            $data['password']=password_hash($data['password'],
                PASSWORD_DEFAULT);

            if (empty($data['name_err']) &&
                empty($data['surname_err']) &&
                empty($data['email_err']) &&
                empty($data['user_exists_err']) &&
                empty($data['password_repeat_err'])){
                if ($this->registerModel->createUser($data)) {
                    $_SESSION['user'] = $data['email'];
                    header("Location: ".URLROOT);
                    die();
                }

            }else{
                //Return to add post page with data and error information
                $this->view('register/index', $data);
            }


//           'You are registered'

        }
//        $this->view('register/register',$data);
    }
}