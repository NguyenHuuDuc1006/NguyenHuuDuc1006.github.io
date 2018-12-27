<?php
class Admin_Controllers_Advertise extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }
    public function index(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'category'
        $advertise = new Admin_Models_Advertise($db);
        $this->view->advData = $advertise->getAllAdvertise();
 
        $this->view->render('advertise/index');
    }
    public function deleteAdvertise(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $advertise = new Admin_Models_Advertise($db);
               
        $advertise->advertiseID = isset($_GET['id']) ? $_GET['id'] : "";
        $advertise->deleteAdvertise();
        echo "<script>window.location.href='" . URL_BASE . "admin/advertise'; alert('Bạn đã xóa thành công!!');</script>";
    }
    public function add() {

        if ($_POST['btnSave']) {
            $advertiseName = $_POST['txtAdvertiseName'];
            $source = $_POST['txtAdvertiseSource'];
            $classify = $_POST['txtAdvertiseClassify'];
            $description = $_POST['txtAdvertiseDesc'];         
            $countfiles = count($_FILES['file']['name']);

            // Looping all files
            for ($i = 0; $i < $countfiles; $i++) {
                $filename = $_FILES['file']['name'][$i];

                // Upload file
                move_uploaded_file($_FILES['file']['tmp_name'][$i], "templates/default/image/" . $filename);
            }
            //Hiển thị chuỗi tên file
            $image = implode(";", $_FILES['file']['name']);



            //tạo kết nối với database
            $database = new Libs_Model();
            $db = $database->getConnection();
            $addAdv = new Admin_Models_Advertise($db);

            // gán giá trị cho các đối tượng 

            $addAdv->advertiseName = $advertiseName;
            $addAdv->source = $source;
            $addAdv->classify = $classify;
            $addAdv->description = $description;
            $addAdv->image = $image;


            if ($addAdv->addAdvertise()) {
                echo "<script>window.location.href='" . URL_BASE . "admin/advertise'; alert('Bạn đã thêm sản phẩm thành công!!!');</script>";
            } else {
                echo "<script>window.location.href='" . URL_BASE . "admin/advertise'; alert('Bạn đã thêm sản phẩm thất bại!!!');</script>";
            }
        }
        
        $this->view->render("advertise/add");
    }
    public function update() {
        $id= isset($_GET['id']) ? $_GET['id'] : "";
        $database = new Libs_Model();
        $db = $database->getConnection();
        $addAdv = new Admin_Models_Advertise($db);
        
        
        
        
        if ($_POST['btnSave']) {
            $advertiseName = $_POST['txtAdvertiseName'];
            $source = $_POST['txtAdvertiseSource'];
            $classify = $_POST['txtAdvertiseClassify'];
            $description = $_POST['txtAdvertiseDesc'];
            $advertiseID = $_POST['txtID'];          
        
            $addAdv->advertiseName = $advertiseName;
            $addAdv->source = $source;
            $addAdv->classify = $classify;
            $addAdv->description = $description;
            $addAdv->advertiseID = $advertiseID;

            ;
            if ($addAdv->updateAdvertise()) {
                echo "<script>window.location.href='" . URL_BASE . "admin/advertise'; alert('Bạn đã sửa thành công!!!');</script>";
            } else {
                echo "<script>window.location.href='" . URL_BASE . "admin/advertise'; alert('Bạn đã sửa thất bại!!!');</script>";
            }
        }
        $advertise = new Admin_Models_Advertise($db);
        $this->view->advDetail = $advertise->getDetailAdvertiseByID($id);
        $this->view->render("advertise/update");
    }
    public function detail() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $advertise = new Admin_Models_Advertise($db);
        //Lấy giá trị id trên URL
        $id= isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->advDetail = $advertise->getDetailAdvertiseByID($id);

        
        $this->view->render('advertise/detail');
    }
}