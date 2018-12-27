<?php

class Default_Models_Product {

    public $productID;
    public $productCode;
    public $productName;
    public $supplierID;
    public $categoryID;
    public $quantity;
    public $unitPrice;
    public $discount;
    public $status;
    public $description;
    public $image;
    public $created;
    private $con = null;

    public function __construct($db) {
        $this->con = $db;
    }
    //search product
    public function searchProduct($name){
        
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
    
    public function getAllProduct() {
        $query = "SELECT productID, productCode, productName, unitPrice, discount, quantity, image, description FROM products ORDER BY productID DESC";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function PageDivition(){
        $query = "SELECT productID, productCode, productName, unitPrice, discount, quantity, image, description FROM products ORDER BY productID DESC LIMIT :from_record_num, :records_per_page";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(":from_record_num", $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(":records_per_page", $records_per_page, PDO::PARAM_INT);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function countRecord(){
        $query = "SELECT productID FROM products";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getDetailProductByID() {
        $query = "SELECT * FROM products WHERE productID=? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->productID)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }

    public function getAllProductByCategoryID() {
        $query = "SELECT * FROM products WHERE categoryID = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->categoryID)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function getNewProduct() {
        $query = "SELECT productID, image FROM products ORDER BY created DESC LIMIT 0, 10";
        $stmt = $this->con->prepare($query);
        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }
    public function getDetailProductByCode() {
        $query = "SELECT * FROM products WHERE productCode = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        $stmt->bindParam(1, htmlspecialchars(strip_tags($this->productCode)));
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
        public function updateQuantity(){
        $query="UPDATE products SET quantity=:quantity WHERE productID=:productID";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu 
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->productID = htmlspecialchars(strip_tags($this->productID));


        //Tiến hành bind các giá trị cho truy vấn
       
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":productID", $this->productID);


        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function getDetailProductInOrder($productID) {
        $query = "SELECT productName FROM products WHERE productID='$productID' ";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $row = $stmt->rowCount();
        if ($row > 0) {
            return $stmt;
        } else {
            return null;
        }
    }


}
?>

