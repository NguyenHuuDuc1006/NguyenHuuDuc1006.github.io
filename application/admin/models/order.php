<?php

class Admin_Models_Order {

    //Khai báo các thuộc tính của bảng Order
    public $orderID;
    public $customerID;
    public $orderDate;
    public $payment;
    public $shipperID;
    public $shipperDate;
    public $status;
    //Khai báo đối tượng  CSDl        
    private $con = null;

    //Xây dựng hàm khởi tạo của đối tượng "products"

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllOrder() {
        $query = "SELECT orderID, fullName, email, orderDate, shipperDate FROM orders, customers WHERE orders.customerID = customers.customerID";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function getDetailOrder() {
        $query = "SELECT orders.* , customers.email, products.* FROM orders, customers, products "
                . "WHERE orders.customerID = customers.customerID AND orderID=? ";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->orderID)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function getAllDetailFromProductToOrder() {
        $query = "SELECT products.productName, orderDetails.* FROM orderDetails, products WHERE orderDetails.productID = products.productID AND orderID=?";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function searchOrder($name) {

        $query = "$name";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function deleteOrder() {
        $query = "DELETE FROM orders WHERE orderID=:orderID";

        $stmt = $this->con->prepare($query);

        $stmt->bindParam(":orderID", $this->orderID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
