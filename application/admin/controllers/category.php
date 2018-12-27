<?php
class Admin_Controllers_Category extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }
    public function index(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'category'
        $category = new Admin_Models_Category($db);
        $this->view->catData = $category->getAllCategory();
 
        $this->view->render('category/index');
    }
    public function detail() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $category = new Admin_Models_Category($db);
        //Lấy giá trị id trên URL
        $category->categoryID = isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->catDetail = $category->getCategoryByID();
        $this->view->render('category/detail');
    }

    public function add() {

        if ($_POST['btnSave']) {
            $subCategoryID = $_POST['txtSubCat'];
            $categoryName = $_POST['txtName'];

            $description = $_POST['txtDes'];
            //tạo kết nối với database
            $database = new Libs_Model();
            $db = $database->getConnection();
            $addCat = new Admin_Models_Category($db);

            // gán giá trị cho các đối tượng 


            $addCat->categoryName = $categoryName;

            $addCat->subCategoryID = $subCategoryID;
            $addCat->description = $description;



            if ($addCat->addCategory()) {
                echo "<script>window.location.href='" . URL_BASE . "admin/category'; alert('Bạn đã thêm danh mục sản phẩm thành công!!!');</script>";
            } else {
                echo "<script>window.location.href='" . URL_BASE . "admin/category'; alert('Bạn đã thêm danh mục sản phẩm thất bại!!!');</script>";
            }
        }

        $this->view->render("category/add");
    }

    public function update() {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $database = new Libs_Model();
        $db = $database->getConnection();
        $category = new Admin_Models_Category($db);


        if ($_POST) {
            $category->subCategoryID = $_POST['txtSubCat'];
            $category->categoryName = $_POST['txtName'];
            $category->description = $_POST['txtDes'];
            $category->categoryID = $id;
         
            if ($category->updateCategory()) {
                echo "<script>window.location.href='" . URL_BASE . "admin/category'; alert('Cập nhật danh mục sản phẩm thành công!!!');</script>";
            } else {
                echo "<script>window.location.href='" . URL_BASE . "admin/category'; alert('Cập nhật danh mục sản phẩm thất bại!!!');</script>";
            }
        }
        $category->categoryID = $id;
        $this->view->catDetail = $category->getCategoryByID();
        $this->view->render("category/update");
    }
    public function deleteCategory(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $category = new Admin_Models_Category($db);
               
        $category->categoryID = isset($_GET['id']) ? $_GET['id'] : "";
        $category->deleteCategory();
        echo "<script>window.location.href='" . URL_BASE . "admin/category'; alert('Bạn đã xóa thành công danh mục!!!');</script>";
    }
}

