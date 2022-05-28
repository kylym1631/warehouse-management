<?php
  class Pages extends Controller {
    public function __construct(){
        $this->pageModel = $this->model('Page');
    }
    
    public function index(){
        if (!isset($_SESSION['user'])){
            header("Location: ".URLROOT.'/login');
        }
        $tools =  $this->pageModel->getTools();
//        echo "<pre>";
//        print_r($tools);
//        echo "</pre>";

//        die();
        $data = [
        'tools'=>$tools,
      ];



      require_once '../app/views/pages/index.php';
    }


    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }
    public function logout(){
        unset($_SESSION['user']);
        header("Location: ".URLROOT.'/login');
    }
    public function quantity()
    {

       $a =  $this->pageModel->getTools();

        $q = $_GET["q"];
        $id = $_GET["id"];
//        die(print_r($_GET));

        $hint = "";

// lookup all hints from array if $q is different from ""
        if ($q !== "" && $id !== "") {
            $q = strtolower($q);
            $id = strtolower($id);
            foreach ($a as $tool) {
                if($id == $tool->id){
                    $data['id'] = $tool->id;
                    $data['quantity'] = $q;
                    $this->pageModel->changeQuantity($data);
                }
            }
//            foreach ($a as $name) {
//                if (stristr($q, substr($name, 0, $len))) {
//                    if ($hint === "") {
//                        $hint = $name;
//                    } else {
//                        $hint .= ", $name";
//                    }
//                }
//            }
        }

// Output "no suggestion" if no hint was found or output correct values
//        echo $hint === "" ? "no suggestion" : $hint;
//        $this->view('pages/quantity');
    }


  }