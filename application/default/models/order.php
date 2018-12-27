<?php

class Default_Models_Order {

    public $orderID;
    public $customerID;
    public $receiver;
    public $addressReceiver;
    public $phone;
    public $orderDate;
    public $payment;
    public $shipperID;
    public $shipperDate;
    public $status;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getInforOrderByCustomerID() {
        $query = "SELECT * FROM orders WHERE customerID = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->customerID)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function addOrder() {
        $query = "INSERT INTO orders SET customerID=:customerID, receiver=:receiver, addressReceiver=:addressReceiver, phone=:phone, payment=:payment, shipperDate=:shipperDate";
        $stmt = $this->con->prepare($query);

        $this->customerID = htmlspecialchars(strip_tags($this->customerID));        
        $this->receiver = htmlspecialchars(strip_tags($this->receiver));
        $this->addressReceiver = htmlspecialchars(strip_tags($this->addressReceiver));
        $this->phone = htmlspecialchars(strip_tags($this->phone));
        $this->payment = htmlspecialchars(strip_tags($this->payment));
        $this->shipperDate = htmlspecialchars(strip_tags($this->shipperDate));
        
        $stmt->bindParam(':customerID', $this->customerID);
        $stmt->bindParam(':receiver', $this->receiver);
        $stmt->bindParam(':addressReceiver', $this->addressReceiver);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':payment', $this->payment);
        $stmt->bindParam(':shipperDate', $this->shipperDate);
        $stmt->execute();
        return $this->con->lastInsertId();
    }
    public function getOrderByUsername($email){
        $query = "SELECT orders.* FROM orders,customers WHERE orders.customerID=customers.customerID AND  email = '$email'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount>0) {    
            return $stmt;
        }else{
            return null;
        }
    }
    public function getOrderByOrderID($id){
        $query = "SELECT * FROM orders WHERE orderID = $id";
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