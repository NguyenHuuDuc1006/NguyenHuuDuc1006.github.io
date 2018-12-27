<?php

class Default_Controllers_Order extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function number_unformat($number) {
        $x = preg_replace('/,/', "", $number);
        return rtrim($x, "đ");
    }

    public function index() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        $customer = new Default_Models_Customer($db);
        $customer->email = $_SESSION['email'];

        $this->view->infoCustomer = $customer->getInforCustomer();

        $this->view->render('order/index');
    }

    public function formOrder() {
        $database = new Libs_Model();
        $db = $database->getConnection();
        $order = new Default_Models_Order($db);

        //Lấy customerID từ bảng customer để thêm vào bảng order
        $customer = new Default_Models_Customer($db);
        $customer->email = $_SESSION['email'];

        $objCus = $customer->getInforCustomer();
        $order->customerID = $objCus['customerID'];
        $order->receiver = $_POST['txtReceiver'];
        $order->addressReceiver = $_POST['txtAddr'];
        $order->phone = $_POST['txtPhone'];
        $order->payment = $_POST['thanhtoan'];

        $order->shipperDate = date('Y-m-d', strtotime(date_format(date_create($order->orderDate), "Y-m-d") . " +3 days"));
        $payment = $_POST['thanhtoan'];

        $orderDetail = new Default_Models_OrderDetail($db);

        $product = new Default_Models_Product($db);

        if ($payment != "") {
            $tempOrder = $order->addOrder();
            foreach ($_SESSION["cart_item"] as $item) {
                $orderDetail->orderID = $tempOrder['orderID'];

                //lấy giá trị quantity từ bảng orderDetails cập nhật tới quantity Bảng products
                $objOrderDetail = $orderDetail->getAllOrderDetailByOrderID();
                $quantityOrderDetail = $objOrderDetail['quantity'];
                $productID = $objOrderDetail['productID'];
                $product->productID = $productID;
                $x = $product->getDetailProductByID();
                $quantityProOld = $x['quantity'];
                $product->quantity = $quantityProOld - $quantityOrderDetail;
                $product->productID = $productID;
                $product->updateQuantity();

                $orderDetail->productID = $item['id'];
                $orderDetail->quantity = $item["quantity"];
                $orderDetail->price = $item["price"] * $item["quantity"];
                $orderDetail->addOrderDetail();

                //PHPMailer
                $database = new Libs_Model();
                $db = $database->getConnection();
                $mail = new Default_Models_PHPMailer($db);
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = "ssl";
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 465;
                $mail->Username = "d3tmobilebk@gmail.com";
                $mail->Password = "d3t123456789";

                $mail->SetFrom("d3tmobilebk@gmail.com", "d3tMobile.vn");
                $mail->AddAddress($_SESSION['email'], "Forgot Password");
                $mail->AddReplyTo("d3tmobilebk@gmail.com", "d3TMobile.vn");

                $mail->Subject = "Xác nhận thông tin để nhận được những chủ đề mới có từ ";
                $mail->CharSet = "utf-8";
                //$body = "<h3>Chào mừng bạn đến với PHPMailer</h3>";
                //$mail->Body = $body;
                $mail->msgHTML("<h3>Bạn đã mua hàng của chúng tôi D3TMobile!!!</h3>");
                
            }
            $mail->Send();
            unset($_SESSION["cart_item"]);
            echo "<script>window.location.href='" . URL_BASE . "order';alert('Bạn đã mua hàng thành công');</script>";
        } else {
            echo "<script>window.location.href='" . URL_BASE . "order';alert('Bạn chưa nhập hình thức thanh toán');</script>";
        }
    }
}

?>