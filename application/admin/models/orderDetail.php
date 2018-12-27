<?php

class Admin_Models_OrderDetail {

    //Khai báo các thuộc tính của bảng OrderDetail
    public $orderDetailID;
    public $orderID;
    public $productID;
    public $quantity;
    public $price;
    //Khai báo đối tượng  CSDl        
    private $con = null;

    //Xây dựng hàm khởi tạo của đối tượng "orderDetails"

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllDetailFromProductToOrder(){
        $query = "SELECT products.productName, products.image, orderDetails.* FROM orderDetails, products WHERE orderDetails.productID = products.productID AND orderID=?";
        
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->orderID)));
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }
     public function deleteOrderDetail(){
        $query = "DELETE FROM orderDetails WHERE orderID=:orderID";

        $stmt = $this->con->prepare($query);

        $stmt->bindParam(":orderID", $this->orderID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
     }

}
