<?php

class Admin_Controllers_Customer extends Libs_Controller {

    public function __contruct() {
        parent::__contruct();
    }

    public function index() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        $customer = new Admin_Models_Customer($db);
        $this->view->cusData = $customer->getAllCustomer();
        $this->view->render("customer/index");
    }
    public function detail(){
        $id= isset($_GET['id'])?$_GET['id']:"";
        $database = new Libs_Model();
        $db = $database->getConnection();
        $customer = new Admin_Models_Customer($db);
        $customer->customerID = $id;
        $this->view->cusDetail= $customer->getDetailCustomer();
        $this->view->render("customer/detail");
    }
    public function deleteCustomer(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $customer = new Admin_Models_Customer($db);
       
        $customer->customerID = isset($_GET['id']) ? $_GET['id'] : "";
        $customer->deleteCustomer();
         echo "<script>window.location.href='" . URL_BASE . "admin/customer';alert('Bạn đã xóa thành công!');</script>";
    }

}
