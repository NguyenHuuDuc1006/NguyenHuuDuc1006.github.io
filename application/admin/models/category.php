<?php

class Admin_Models_Category {

    //Khai bao cac thuoc tinh cua bang category\
    public $categoryID;
    public $subCategoryID;
    public $categoryName;
    public $description;
    public $created;
    //Khai bao doi tuong csdl
    private $con = null;

    //Xay dung ham khoi tao cua doi tuong 'category'
    public function __construct($db) {
        $this->con = $db;
    }

    public function addCategory() {
        $query = " INSERT INTO categories SET subCategoryID=:subCategoryID, categoryName=:categoryName, description=:description, created=:created";
        $stmt = $this->con->prepare($query);
        // Lam sach du lieu

        $this->subCategoryID = htmlspecialchars(strip_tags($this->subCategoryID));
        $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->created = date('Y-m-d H:i:s');

        //tien hanh bind cac gia tri cho truy van
        $stmt->bindParam(":subCategoryID", $this->subCategoryID);
        $stmt->bindParam(":categoryName", $this->categoryName);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":created", $this->created);

        if ($stmt->execute()) {
            return true;
        } else {
            return FALSE;
        }
    }
    public function getCategoryByID() {
        $query = "SELECT * FROM categories WHERE categoryID = ? LIMIT 0,1";
        $stmt = $this->con->prepare($query);
        //lam sach du lieu
        $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));
        $stmt->bindParam(1, $this->categoryID);
        $stmt->execute();
        // khi execute ra 1 object nen can chuyen vao mang
        $row = $stmt->rowCount();
        if($row>0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
        }
        else{
            return null;
        }
    }

    public function updateCategory() {
        $query = "UPDATE categories SET subCategoryID=:subCategoryID, categoryName=:categoryName, description=:description WHERE categoryID=:categoryID";
        $stmt = $this->con->prepare($query);
        // Lam sach du lieu
        $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));
        $this->subCategoryID = htmlspecialchars(strip_tags($this->subCategoryID));
        $this->categoryName = htmlspecialchars(strip_tags($this->categoryName));
        $this->description = htmlspecialchars(strip_tags($this->description));

        //tien hanh bind cac gia tri cho truy van

        $stmt->bindParam(":subCategoryID", $this->subCategoryID);
        $stmt->bindParam(":categoryName", $this->categoryName);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":categoryID", $this->categoryID);

        if ($stmt->execute()) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function deleteCategory() {
        $query = "DELETE FROM categories WHERE categoryID=:categoryID";
        $stmt = $this->con->prepare($query);
        // Lam sach du lieu
        $this->categoryID = htmlspecialchars(strip_tags($this->categoryID));

        //tien hanh bind cac gia tri cho truy van
        $stmt->bindParam(":categoryID", $this->categoryID);

        if ($stmt->execute()) {
            return true;
        } else {
            return FALSE;
        }
    }

    public function getAllCategory() {
        $query = "SELECT * FROM categories ";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function searchCategory($name) {

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

?>