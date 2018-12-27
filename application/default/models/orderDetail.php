<?php

class Default_Models_OrderDetail {
    public $orderDetailID;
    public $orderID;
    public $productID;
    public $quantity;
    public $price;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function addOrderDetail() {

       $query = "INSERT INTO orderdetails SET orderID=:orderID, productID=:productID, quantity=:quantity, price=:price";
        $stmt = $this->con->prepare($query);
        $this->orderID = htmlspecialchars(strip_tags($this->orderID));
        $this->productID = htmlspecialchars(strip_tags($this->productID));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->price = htmlspecialchars(strip_tags($this->price));

        $stmt->bindParam(':orderID', $this->orderID);
        $stmt->bindParam(':productID', $this->productID);
        $stmt->bindParam(':quantity', $this->quantity);
        $stmt->bindParam(':price', $this->price);
        $stmt->execute();
    }
    public function getAllOrderDetailByOrderID(){
        $query = "SELECT * FROM orderDetails WHERE orderID = ?";
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
    public function getOrderdetailByOrderID($orderID){
        $query = "SELECT * FROM orderdetails WHERE orderID = '$orderID'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount>0) {  
             
            return $stmt;
        }else{
            return null;
        }
    }

}