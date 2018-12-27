<?php

class Admin_Models_Advertise {

    public $advertiseID;
    public $advertiseName;
    public $description;
    public $image;
    public $classify;
    public $source;
    //Khai báo đối tượng  CSDl        
    private $con = null;

    //Xây dựng hàm khởi tạo của đối tượng "customer"

    public function __construct($db) {
        $this->con = $db;
    }

    public function getAllAdvertise() {
        $query = "SELECT * FROM advertises ";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function searchAdvertise($name) {

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

    public function deleteAdvertise() {
        $query = "DELETE FROM advertises WHERE advertiseID=:advertiseID";
        $stmt = $this->con->prepare($query);
        // Lam sach du lieu
        $this->advertiseID = htmlspecialchars(strip_tags($this->advertiseID));

        //tien hanh bind cac gia tri cho truy van
        $stmt->bindParam(":advertiseID", $this->advertiseID);

        if ($stmt->execute()) {
            return true;
        } else {
            return FALSE;
        }
    }
    public function addAdvertise() {
        $query = "INSERT INTO advertises SET advertiseName=:advertiseName, source=:source, classify=:classify, description=:description, image=:image";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu 
        $this->advertiseName = htmlspecialchars(strip_tags($this->advertiseName));
        $this->source = htmlspecialchars(strip_tags($this->source));
        $this->classify = htmlspecialchars(strip_tags($this->classify));    
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->description = htmlspecialchars(strip_tags($this->description));

        //Tiến hành bind các giá trị cho truy vấn 
        $stmt->bindParam(":advertiseName", $this->advertiseName);
        $stmt->bindParam(":source", $this->source);   
        $stmt->bindParam(":classify", $this->classify);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function updateAdvertise() {
        $query = "UPDATE advertises SET advertiseName=:advertiseName, source=:source, classify=:classify, description=:description WHERE advertiseID=:advertiseID";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu 
        $this->advertiseName = htmlspecialchars(strip_tags($this->advertiseName));
        $this->source = htmlspecialchars(strip_tags($this->source));
        $this->classify = htmlspecialchars(strip_tags($this->classify));    
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->advertiseID = htmlspecialchars(strip_tags($this->advertiseID));

        //Tiến hành bind các giá trị cho truy vấn 
        $stmt->bindParam(":advertiseName", $this->advertiseName);
        $stmt->bindParam(":source", $this->source);   
        $stmt->bindParam(":classify", $this->classify);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":advertiseID", $this->advertiseID);
        


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getDetailAdvertiseByID($id){
        $query ="SELECT * FROM advertises WHERE advertiseID = '$id'";
        $stmt = $this->con->prepare($query);
        if ($stmt->execute()) {
            return $stmt;
        } else {
            return false;
        }
    }

}
