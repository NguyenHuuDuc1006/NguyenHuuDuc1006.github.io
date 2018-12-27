<?php

class Default_Controllers_Cart extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function index() {
        $database = new Libs_Model;
        $db = $database->getConnection();
        $product = new Default_Models_Product($db);
        $product->productID = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $product->productCode = $productByCode["productCode"];
        $this->view->ProductCart = $product->getDetailProductByCode();
        //lấy sản phẩm mới nhất 
        $this->view->newData = $product->getNewProduct();
        $this->view->render('cart/index');
    }

    public function addToCartFromIndex() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        $database = new Libs_Model;
        $db = $database->getConnection();
        $product = new Default_Models_Product($db);
        $product->productID = $id;
        $productByCode = $product->getDetailProductByID();
        $product->productCode = $productByCode["productCode"];
        $productCart = $product->getDetailProductByCode();
        $Cart[] = $productCart;

        if ($id != "") {
            $itemArray = array($Cart[0]["productCode"] => array(
                    'id' => $Cart[0]["productID"],
                    'productCode' => $Cart[0]["productCode"],
                    'image' => $Cart[0]["image"],
                    'name' => $Cart[0]["productName"],
                    'price' => ($Cart[0]["unitPrice"] * (100 - $Cart[0]["discount"]) / 100),
                    'quantityMax' => $Cart[0]["quantity"],
                    'quantity' => 1
            ));
            if (!empty($_SESSION["cart_item"])) {
                if (in_array($Cart[0]["productCode"], array_keys($_SESSION["cart_item"]))) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($Cart[0]["productCode"] == $k) {
                            if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                $_SESSION["cart_item"][$k]["quantity"] = 1;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += 1;
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
            echo count($_SESSION["cart_item"]);


            //B1: Kiểm tra sự tồn tại của $_SESSION['cart']
            //Nếu đã tồn tại sản phẩm cần thêm trong SESSION, thì 
            //B2: tăng thêm số lượng của sản phẩm đó trong SESSION và không hiển thị thêm số lượng trong id='cart'
            //ngược lại
            //B2': Xuống model Product --> lấy sản phẩm theo id 
            //B3:	 Thêm sản phẩm đó vào $_SESSION['cart'] và hiển thị số lượng lên id='cart'
        } else {
            echo "0";
        }
    }

    public function addToCartFromDetail() {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $database = new Libs_Model;
        $db = $database->getConnection();
        $product = new Default_Models_Product($db);
        $product->productID = $id;
        $productByCode = $product->getDetailProductByID();
        $product->productCode = $productByCode["productCode"];
        $productCart = $product->getDetailProductByCode();
        $Cart[] = $productCart;

        if ($id != "") {
            $itemArray = array($Cart[0]["productCode"] => array(
                    'id' => $Cart[0]["productID"],
                    'productCode' => $Cart[0]["productCode"],
                    'image' => $Cart[0]["image"],
                    'name' => $Cart[0]["productName"],
                    'price' => ($Cart[0]["unitPrice"] * (100 - $Cart[0]["discount"]) / 100),
                    'totalPrice' => 0,
                    'quantityMax' => $Cart[0]["quantity"],
                    'quantity' => $_POST["quantity"]
            ));
            if (!empty($_SESSION["cart_item"])) {
                if (in_array($Cart[0]["productCode"], array_keys($_SESSION["cart_item"]))) {
                    foreach ($_SESSION["cart_item"] as $k => $v) {
                        if ($Cart[0]["productCode"] == $k) {
                            if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                $_SESSION["cart_item"][$k]["quantity"] = 0;
                            }
                            $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
            echo "<script>window.location.href='" . URL_BASE . "detail?id=" . $productByCode['productID'] . "';</script>";



            //B1: Kiểm tra sự tồn tại của $_SESSION['cart']
            //Nếu đã tồn tại sản phẩm cần thêm trong SESSION, thì 
            //B2: tăng thêm số lượng của sản phẩm đó trong SESSION và không hiển thị thêm số lượng trong id='cart'
            //ngược lại
            //B2': Xuống model Product --> lấy sản phẩm theo id 
            //B3:	 Thêm sản phẩm đó vào $_SESSION['cart'] và hiển thị số lượng lên id='cart'
        } else {
            echo "0";
        }
    }

    public function editQuantity() {
        foreach ($_SESSION['cart_item'] as $k => $v) {
             
            if ($_POST["code"] == $k) {
                if ($_POST["quantity"] == '0') {
                    unset($_SESSION["cart_item"][$k]);
                } else {
                    $_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
                }
            }
             $total_price += $_SESSION['cart_item'][$k]["price"] * $_SESSION['cart_item'][$k]["quantity"];
            
        }
        $_SESSION['cart_item'][$k]["totalPrice"] = $total_price;
        $total_price = $_SESSION['cart_item'][$k]["totalPrice"];
        if ($total_price != 0 && is_numeric($total_price)) {
            print number_format($total_price) . "đ";
            exit;
        }
    }

    public function deleteCart() {
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        if ($id != "") {
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($id == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
        }
        echo "<script>window.location.href='" . URL_BASE . "cart';</script>";
    }

    public function deleteAllCart() {
        unset($_SESSION["cart_item"]);
        echo "<script>window.location.href='" . URL_BASE . "cart';</script>";
    }

}