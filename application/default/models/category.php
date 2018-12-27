<?php

class Default_Models_Category {

    public $categoryID;
    public $subCategoryID;
    public $categoryName;
    public $description;
    private $con = NULL;

    public function __construct($db) {
        $this->con = $db;
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
    public function getParentCategoryByID() {
        $query = "SELECT * FROM categories WHERE categoryID = (SELECT subCategoryID FROM categories WHERE categoryID = ?) LIMIT 0,1";
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
    //Lấy tất cả danh mục theo subcategoryID
    public function getCategoryBySubID() {
        $query = "SELECT * FROM categories WHERE subCategoryID = ?";
        $stmt = $this->con->prepare($query);
        //lam sach du lieu
        $this->subCategoryID = htmlspecialchars(strip_tags($this->subCategoryID));
        $stmt->bindParam(1, $this->subCategoryID);
        $stmt->execute();
        // khi execute ra 1 object nen can chuyen vao mang
        $row = $stmt->rowCount();
        if($row>0){
            return $stmt;
        }
        else{
            return null;
        }
    }

    public function getParentNoSubCategory() {
        $query = "SELECT categoryID, categoryName FROM categories WHERE subCategoryID='' AND categoryID!=(SELECT DISTINCT subCategoryID FROM categories WHERE subCategoryID!='')";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function getSubCategoryIdByParent($id) {
        //$id = 
        $query = "SELECT categoryID, categoryName FROM categories WHERE subCategoryID='$id'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {

            return $stmt;
        } else {
            return null;
        }
    }

    public function getAllParentCategory() {
        $query = "SELECT categoryID, categoryName FROM categories WHERE subCategoryID=''";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            return $stmt;
        } else {
            return null;
        }
    }

    public function CountCategory($CatParentId) {
        $query = "SELECT * FROM categories WHERE subCategoryID='$CatParentId'";
        $stmt = $this->con->prepare($query);
        $stmt->execute();
        return $stmt->rowCount();
    }

}
