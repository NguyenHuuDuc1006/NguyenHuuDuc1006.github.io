<?php

class Admin_Models_Customer {

    public $customerID;
    public $email;
    public $password;
    public $fullName;
    public $phone;
    public $address;
    public $status;
    public $gender;
    public $birthDate;
    public $avatar;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllCustomer() {
        $query = "SELECT * FROM customers";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $count = $stmt->rowCount();

        if ($count > 0) {
            return $stmt;
        } else {
            return NULL;
        }
    }

    public function getDetailCustomer() {
        $query = "SELECT * FROM customers WHERE customerID=?";
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

    public function deleteCustomer() {
        $query = " DELETE FROM customers WHERE customerID=:customerID";

        $stmt = $this->con->prepare($query);

        $stmt->bindParam(":customerID", $this->customerID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function searchCustomer($name) {

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

}
