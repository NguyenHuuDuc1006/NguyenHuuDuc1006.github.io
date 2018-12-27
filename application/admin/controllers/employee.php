<?php
class Admin_Controllers_Employee extends Libs_Controller {
    public function __contruct() {
        parent::__contruct();
    }
    public function login(){
        $this->view->render('user/login');
    }

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function loginProccess() {
        $email = $this->test_input($_POST['email']);
        $password = $this->test_input($_POST['password']);

        $database = new Libs_Model;
        $db = $database->getConnection();
        $user = new Admin_Models_Employee($db);
        $user->email = $email;
        $user->password = $password;

        if ($user->checkEmployee() == true) {
            //Caaps session
            $_SESSION['logged_admin'] = true;
            $_SESSION['email'] = $email;

            //Dieu huong
            echo "<script>window.location.href='" . URL_BASE . "admin'; alert('Bạn đã đăng nhập thành công!!!');</script>";
        }
         else {
//            //redirect ve login
            echo "<script>window.location.href='" . URL_BASE . "admin';alert('Bạn đăng nhập thất bại');</script>";
        }
    }
    public function logoutProcess() {
        session_unset();
        echo "<script>window.location.href='" . URL_BASE . "';</script>";
    }

}