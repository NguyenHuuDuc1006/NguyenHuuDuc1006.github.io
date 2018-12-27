<?php

class Admin_Models_Product {
    
    //Khai báo các thuộc tính của bảng Product
    public $productID;
    public $productName;
    public $supplierID;
    public $categoryID;
    public $quantity;
    public $color;
    public $unitPrice;
    public $discount;
    public $status;
    public $description;
    public $image;
    public $created;
    //Khai báo đối tượng  CSDl        
    private $con = null;

    //Xây dựng hàm khởi tạo của đối tượng "products"

    public function __construct($db) {
        $this->con = $db;
    }
    
    public function addProduct() {
        $query = "INSERT INTO products SET size=:size,productCode=:productCode, productName=:productName, unitPrice=:unitPrice, discount=:discount,categoryID=:categoryID, color=:color, description=:description,quantity=:quantity, image=:image, created=:created";
        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu 
        $this->productCode = htmlspecialchars(strip_tags($this->productCode));
        $this->productName = htmlspecialchars(strip_tags($this->productName));
        $this->unitPrice = htmlspecialchars(strip_tags($this->unitPrice));
        $this->discount = htmlspecialchars(strip_tags($this->discount));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));
        $this->size = htmlspecialchars(strip_tags($this->size));
        $created = date('Y-m-d H:i:s');

        //Tiến hành bind các giá trị cho truy vấn 
        $stmt->bindParam(":productCode", $this->productCode);
        $stmt->bindParam(":productName", $this->productName);
        $stmt->bindParam(":unitPrice", $this->unitPrice);
        $stmt->bindParam(":discount", $this->discount);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":created", $created);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":categoryID", $this->categoryID);
        $stmt->bindParam(":size", $this->size);



        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    public function updateProduct() {
        $query = "UPDATE products SET size=:size,productCode=:productCode, quantity=:quantity, productName=:productName, unitPrice=:unitPrice, discount=:discount, color=:color, description=:description WHERE productID=:productID";

        $stmt = $this->con->prepare($query);
        //Làm sạch dữ liệu 
        $this->productCode = htmlspecialchars(strip_tags($this->productCode));
        $this->productName = htmlspecialchars(strip_tags($this->productName));
        $this->unitPrice = htmlspecialchars(strip_tags($this->unitPrice));
        $this->discount = htmlspecialchars(strip_tags($this->discount));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->quantity = htmlspecialchars(strip_tags($this->quantity));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->productID = htmlspecialchars(strip_tags($this->productID));
        $this->size = htmlspecialchars(strip_tags($this->size));


        //Tiến hành bind các giá trị cho truy vấn

        $stmt->bindParam(":productName", $this->productName);
        $stmt->bindParam(":unitPrice", $this->unitPrice);
        $stmt->bindParam(":discount", $this->discount);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":quantity", $this->quantity);
        $stmt->bindParam(":productCode", $this->productCode);
        $stmt->bindParam(":productID", $this->productID);
        $stmt->bindParam(":size", $this->size);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
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
    
    public function deleteProduct() {
        $query = " DELETE FROM products WHERE productID=:productID";

        $stmt = $this->con->prepare($query);

        $stmt->bindParam(":productID", $this->productID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
     
}
