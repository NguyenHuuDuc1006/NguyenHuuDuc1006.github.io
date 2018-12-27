<?php

class Admin_Controllers_Order extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }
    public function index(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $order = new Admin_Models_Order($db);
        
        $this->view->orderData = $order->getAllOrder();
        $this->view->render('order/index');
    }
    public function detail(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $order = new Admin_Models_Order($db);
        $orderDetail = new Admin_Models_OrderDetail($db);
        //Lấy giá trị id trên URL
        $order->orderID = isset($_GET['id']) ? $_GET['id'] : "";
        $orderDetail->orderID = isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->orderDetail = $order->getDetailOrder();
        $this->view->objOrderDetail = $orderDetail->getAllDetailFromProductToOrder();
        $this->view->render('order/detail');
    }
    public function deleteOrder(){
         $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $order = new Admin_Models_Order($db);
        $orderDetail = new Admin_Models_OrderDetail($db);
                $order->orderID = isset($_GET['id']) ? $_GET['id'] : "";
        $orderDetail->orderID = isset($_GET['id']) ? $_GET['id'] : "";
        $order->deleteOrder();
        $orderDetail->deleteOrderDetail();
         echo "<script>window.location.href='" . URL_BASE . "admin/order'; alert('Bạn đã xóa thành công đơn hàng!!!');</script>";
    }
    
   

}

?>