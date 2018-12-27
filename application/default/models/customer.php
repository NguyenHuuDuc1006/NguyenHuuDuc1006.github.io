<?php

class Default_Models_Customer {

    public $id;
    public $gender;
    public $password;
    public $email;
    public $phone;
    public $address;
    public $status;
    public $fullName;
    public $birthDate;
    public $avatar;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function addUser() {
        $query = "INSERT INTO `customers` ( `email`, `password`, `phone`, `address`,  `fullName`, `birthDate`, `gender`) "
                . "VALUES  ( :email, :password, :phone, :address, :fullName, :birthDate, :gender);";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':fullName', $this->fullName);
        $stmt->bindParam(':birthDate', $this->birthDate);
        $stmt->bindParam(':gender', $this->gender);
        $stmt->execute();
    }

    public function getInforCustomer() {
        $query = "SELECT * FROM customers WHERE email=? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return NULL;
        }
    }

    public function checkEmail() {
        $query = "SELECT * FROM customers WHERE email = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function checkUser() {
        $query = "SELECT * FROM customers WHERE email = ? AND password = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, $this->email);
        $stmt->bindParam(2, $this->password);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function showProfile($email) {
        $query = "SELECT * FROM customers WHERE email='$email'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;

        } else {
            return null;
        }
    }
    
    public function updateInfo($email){
        try{
            
            $query="UPDATE customers SET fullname=:fullName, phone=:phone, address=:address,gender=:gender,birthDate=:birthDate WHERE email ='$email'";
            $stmt = $this->con->prepare($query);
            //kiem tra cac gia tri nhan duoc tu form
            $this->fullName = htmlspecialchars(strip_tags($this->fullName));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->address = htmlspecialchars(strip_tags($this->address));
            $this->gender = htmlspecialchars(strip_tags($this->gender));
            $this->birthDate = htmlspecialchars(strip_tags($this->birthDate));
            // truyen cac tham so cho gia tri trong cau truy van
            $stmt->bindParam(':fullName', $this->fullName);
            $stmt->bindParam(':phone', $this->phone);
            $stmt->bindParam(':address', $this->address);
            $stmt->bindParam(':gender', $this->gender);
            $stmt->bindParam(':birthDate', $this->birthDate);
            // thuc hien cau truy van
            
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
            


        }catch(PDOException $exception){
            die('LỖI: ' . $exception->getMessage());
        }
    }
    public function updatePass($email){
        try{
            $query="UPDATE customers SET password=:password WHERE email='$email'";
            $stmt = $this->con->prepare($query);
            //kiem tra cac gia tri nhan duoc tu form
            $this->password = htmlspecialchars(strip_tags($this->password));
            
            // truyen cac tham so cho gia tri trong cau truy van
            $stmt->bindParam(':password', $this->password);
            
            // thuc hien cau truy van
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
            


        }catch(PDOException $exception){
            die('LỖI: ' . $exception->getMessage());
        }
    }
    public function getPassByEmail($email){
            $query="SELECT password FROM customers WHERE email='$email'";
            $stmt = $this->con->prepare($query);
            //kiem tra cac gia tri nhan duoc tu form
            
            
            // thuc hien cau truy van
            if($stmt->execute()){
                return $stmt;
            }else{
                return false;
            }
        
    }

}
