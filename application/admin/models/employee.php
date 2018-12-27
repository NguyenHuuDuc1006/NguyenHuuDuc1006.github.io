<?php

class Admin_Models_Employee {

    public $employeeID;
    public $employeeName;
    public $address;
    public $email;
    public $password;
    public $phone;
    public $birthDate;
    public $avarta;
    public $roll;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }

    public function addEmployee(){
        $query = "INSERT INTO employees SET employeeName=:employeeName, email=:email, password=:password";
        $stmt = $this->con->prepare($query);
        
        //Làm sạch dữ liệu
        $this->employeeName = htmlspecialchars(strip_tags($this->employeeName));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        
        $stmt->bindParam(":employeeName",$this->employeeName);
        $stmt->bindParam(":email",$this->email);
        $stmt->bindParam(":password", $this->password);
        
        if($stmt->execute()){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    
//    return TRUE|FALSE
    public function checkEmployee() {
        $query = "SELECT * FROM employees WHERE email =:email AND password=:password";
        $stmt = $this->con->prepare($query);
        
        $this->password = htmlspecialchars(strip_tags($this->password));
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", $this->password);

        $stmt->execute();
        $numRow = $stmt->rowCount();

        if ($numRow >= 1) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getEmployeeByInfo() {
        $query = "SELECT * FROM employees WHERE email=:email LIMIT 0,1"; //Lấy 1 bản ghi từ vị trí 1 tính từ câu truy vấn 1;
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(":email", $this->email);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
}
?>