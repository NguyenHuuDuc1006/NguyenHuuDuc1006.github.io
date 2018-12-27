<?php

class Admin_Controllers_Index extends Libs_Controller {

    public function __contruct() {
        parent::__contruct();
    }

    public function index() {

        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        $this->view->proData = $product->getAllProduct();


        //Khởi tạo model 'Employee'
        $emp = new Admin_Models_Employee($db);
        $this->view->empData = $emp->getEmployeeByInfo();


        $this->view->render('index/index');
       
       
    }

    public function detail() {
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $product = new Default_Models_Product($db);
        //Lấy giá trị id trên URL
        $product->productID = isset($_GET['id']) ? $_GET['id'] : "";
        $this->view->proDetail = $product->getDetailProductByID();

        $dataID = $product->getDetailProductByID();


        $category = new Default_Models_Category($db);
        $category->categoryID = $dataID['categoryID'];
        $this->view->catDetail = $category->getCategoryByID();
        $this->view->catParent = $category->getParentCategoryByID();
        $this->view->render('product/detail');
    }
    public function add() {

        if ($_POST['btnSave']) {
            $productCode = $_POST['txtCode'];
            $productName = $_POST['txtName'];

            $quantity = $_POST['txtQuantity'];
            $color = $_POST['txtColor'];
            $unitPrice = $_POST['txtPrice'];
            $discount = $_POST['txtDiscount'];
            $description = $_POST['txtDesc'];
            $categoryID =$_POST['txtCategory2'];
            $size =$_POST['txtSize'];

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
            $addPro = new Admin_Models_Product($db);

            // gán giá trị cho các đối tượng 

            $addPro->productCode = $productCode;
            $addPro->productName = $productName;

            $addPro->categoryID = $categoryID;
            $addPro->quantity = $quantity;
            $addPro->unitPrice = $unitPrice;
            $addPro->discount = $discount;
            $addPro->description = $description;
            $addPro->image = $image;
            $addPro->color = $color;
            $addPro->size = $size;


            if ($addPro->addProduct()) {
                echo "<script>window.location.href='" . URL_BASE . "admin'; alert('Bạn đã thêm sản phẩm thành công!!!');</script>";
            } else {
                echo "<script>window.location.href='" . URL_BASE . "admin'; alert('Bạn đã thêm sản phẩm thất bại!!!');</script>";
            }
        }
        $database = new Libs_Model();
        $db = $database->getConnection();
        $addCate = new Default_Models_Category($db);
        $this->view->addCate1 = $addCate->getAllParentCategory();
        $this->view->render("product/add");
    }
    //Lấy tất cả danh mục theo subcategoryID
    //Ham xu ly lay ra cat ca sp co categoryid
    public function getCategoryBySubID() {
//        $categoryId = $_POST['categoryId'];
//        $category = new Default_Models_Category($db);
//        $category->subCategoryID = $categoryId;
//        $cat = $category->getCategoryBySubID();
//
//        while ($row = $cat->fetch(PDO::FETCH_ASSOC)) {
//
//            echo "<option value='" . $row['subCategoryID'] . "'>" . $row['categoryName'] . "</option>";
//        }
        echo "hello";
    }
    public function search() {
        
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        $category = new Admin_Models_Category($db);
        $customer = new Admin_Models_Customer($db);
        $order = new Admin_Models_Order($db);
        $advertise = new Admin_Models_Advertise($db);

        $value = isset($_REQUEST['adminSearch'])? $_REQUEST ['adminSearch']:"";
        $classify = isset($_REQUEST['classify'])? $_REQUEST ['classify']:"";
         
        if($classify == "product"){
            $sql =" SELECT * FROM products WHERE productName LIKE '$value%' OR productCode= '$value'" ;
            $this->view->proData = $product->searchProduct($sql);
            $this->view->value = "Kết quả tìm kiếm của   <b style='font-size:24px;'>'$value' </b> ";
            $this->view->render('index/index');
            
        }
        if($classify == "category"){
            $sql =" SELECT * FROM categories WHERE categoryName LIKE '$value%' OR categoryID= '$value'" ;
            $this->view->catData = $category->searchCategory($sql);
            $this->view->value = "Kết quả tìm kiếm của   <b style='font-size:24px;'>'$value' </b> ";
            $this->view->render('category/index');
        }
        if($classify == "order"){
            if($value == ''){
                $order = new Admin_Models_Order($db);
        
                $this->view->orderData = $order->getAllOrder();
                $this->view->render('order/index');
            }else{
            $sql =" SELECT orders.*, customers.fullName FROM orders, customers WHERE orders.customerID = customers.customerID AND orders.orderID = '$value' OR customers.email LIKE '$value' " ;
            $this->view->orderData = $order->searchOrder($sql);
            $this->view->value = "Kết quả tìm kiếm của   <b style='font-size:24px;'>'$value' </b> ";
            $this->view->render('order/index');
            }
        }
        if($classify == "customer"){
            $sql =" SELECT * FROM customers WHERE customerID LIKE '$value%' OR email LIKE '$value%' OR fullName LIKE '$value%'" ;
            $this->view->cusData = $customer->searchCustomer($sql);
            $this->view->value = "Kết quả tìm kiếm của   <b style='font-size:24px;'>'$value' </b> ";
            $this->view->render('customer/index');
        }
        if($classify == "advertise"){
            $sql =" SELECT * FROM advertises WHERE advertiseName LIKE '$value%' OR classify = '$value%'" ;
            $this->view->advData = $advertise->searchAdvertise($sql);
            $this->view->value = "Kết quả tìm kiếm của   <b style='font-size:24px;'>'$value' </b> ";
            $this->view->render('advertise/index');
        }
        if($classify == ""){
            $this->view->thongbao = "Vui lòng chọn tiêu chí khi tìm kiếm";
            $this->view->render('index/index');
        }
        
        

      /*
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        
        $this->view->proData = $product->searchProduct($sql);
        


        //$product->productName= $name;*/
        $this->view->render('index/index');
        
    }
     public function deleteProduct(){
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model product
        $product = new Admin_Models_Product($db);
               
        $product->productID = isset($_GET['id']) ? $_GET['id'] : "";
        $product->deleteProduct();
        echo "<script>window.location.href='" . URL_BASE . "admin'; alert('Bạn đã xóa thành công sản phẩm!!!');</script>";
    }
    public function getbycategory() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";
        if ($id != "") {
            $database = new Libs_Model();
            $db = $database->getConnection();

            //Khoi tao doi tuong Product
            $category = new Default_Models_Category($db);
            $data = $category->getSubCategoryIdByParent($id);

            //Bieu dien du lieu duoc lay tu Model
            
            
            if($data == null){
               
                echo "<select style='display:none;' name='txtCategory2'><option value='" .$id . "'></option></select>";
            }else{
            echo "<th>Danh mục con</th>";
            echo"<td>";
            echo "<select name='txtCategory2' id='cbCategory' class='form-control'>";
            
            while ($rowSubCat = $data->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . $rowSubCat['categoryID'] . "'>" . $rowSubCat['categoryName'] . "</option>";
            }
            echo "</select>";
            echo "</td>";
            
            }
        }
    }
    public function update() {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        $database = new Libs_Model();
        $db = $database->getConnection();
        $product = new Admin_Models_Product($db);


        if ($_POST) {
            $product->productCode = $_POST['txtCode'];
            $product->productName = $_POST['txtName'];
            $product->unitPrice = $_POST['txtPrice'];
            $product->discount = $_POST['txtDiscount'];
            $product->color = $_POST['txtColor'];
            $product->quantity = $_POST['txtQuantity'];
            $product->description = $_POST['txtDesc'];
            $product->productID = $_POST['txtID'];
            $product->size = $_POST['txtSize'];
            if ($product->updateProduct()) {
                echo "<script>window.location.href='" . URL_BASE . "admin'; alert('Cập nhật sản phẩm thành công!!!');</script>";
            } else {
                echo "<script>window.location.href='" . URL_BASE . "admin'; alert('Cập nhật sản phẩm thất bại!!!');</script>";
            }
        }
        $product->productID = $id;
        $this->view->proDetail = $product->getDetailProductByID();
        $this->view->render("product/update");
    }

}

?>