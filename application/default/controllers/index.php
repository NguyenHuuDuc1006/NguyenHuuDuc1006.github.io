<?php

class Default_Controllers_Index extends Libs_Controller {

    public function __construct() {
        parent::__construct();
        //Đã có thuộc tính view của cha
    }

    public function index() {
        $database = new Libs_Model();
        $db = $database->getConnection();
        $sqlcolor = " SELECT DISTINCT color FROM products";
        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        $this->view->proData = $product->getAllProduct();
        $this->view->newData = $product->getNewProduct();

        $advertise = new Default_Models_Advertise($db);

        $this->view->slide = $advertise->getAllSlide();
        $this->view->video1 = $advertise->getAllVideo1();
        $this->view->image1 = $advertise->getAllImage1();
        $this->view->image2 = $advertise->getAllImage2();
        $this->view->dataColor = $product->searchProduct($sqlcolor);
       


        $this->view->render('index/index');
    }

    public function search() {

        $productName = isset($_REQUEST['txtSearch']) ? $_REQUEST ['txtSearch'] : "";

        $sql = " SELECT * FROM products WHERE productName LIKE '$productName%'";
        $sqlcolor = " SELECT DISTINCT color FROM products WHERE productName LIKE '$productName%'";



        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);

        $this->view->proData = $product->searchProduct($sql);
        $this->view->dataColor = $product->searchProduct($sqlcolor);
        //$product->productName= $name;
        $this->view->render('index/search');
    }

    public function detail() {
        $database = new Libs_Model;
        $db = $database->getConnection();
        $product = new Default_Models_Product($db);
        $product->productID = isset($_GET['id']) ? $_GET['id'] : "";
        $objProduct = $product->getDetailProductByID();
        $this->view->detailProduct = $objProduct;

        $category = new Default_Models_Category($db);
        $category->categoryID = $objProduct["categoryID"];
        $this->view->objCategory = $category->getCategoryByID();

        $this->view->newData = $product->getNewProduct();
        $this->view->render('index/detail');
    }

    public function category() {
        $this->view->render('index/category');
    }

    public function getPageCategory() {
        $id = isset($_GET['id']) ? $_GET['id'] : "";
        if ($id != "") {
            $database = new Libs_Model;
            $db = $database->getConnection();
            $product = new Default_Models_Product($db);
            $product->categoryID = $id;
            $sqlcolor = " SELECT DISTINCT color FROM products WHERE categoryID = '$id'";
            $this->view->dataColor = $product->searchProduct($sqlcolor);

            $category = new Default_Models_Category($db);
            $category->categoryID = $id;
            
            $this->view->nameCategory = $category->getCategoryByID();
            $this->view->categoryGroup = $product->getAllProductByCategoryID();
            $this->view->render('index/categoryPage');
            
        }
    }
    public function introduce(){
        $this->view->render('index/introduce');
    }
    public function contact(){
         $this->view->render('index/contact');
    }
    public function filter() {
        

        $productName = isset($_REQUEST['txtSearch'])? $_REQUEST ['txtSearch']:"";
        $color = isset($_REQUEST['color'])? $_REQUEST ['color']:"";
        $price = isset($_REQUEST['price'])? $_REQUEST ['price']:"";
        $filter = array ();
        if($productName !=null){
            $filter[] = " productName LIKE '$productName%'";
        }
        if($color != null){
            $filter[] = "color = '$color'";
        }
        
        if($price !=null){
            switch($price){
                case 1 : $filter[] = "unitPrice < 5000000";break;
                case 2 : $filter[] = "unitPrice > 5000000 AND unitPrice < 10000000";break;
                case 3 : $filter[] = "unitPrice > 10000000 AND unitPrice < 20000000";break;
                case 4 : $filter[] = "unitPrice > 20000000";break;
            }
            
        }
       
        $sql = 'SELECT * FROM products';
        if ($filter){
            $sql .= ' WHERE '.implode(' AND ', $filter);
        }
        
        //$sql =" SELECT * FROM products WHERE productName LIKE '{$filter['name']}%' AND color = '{$filter['color']}'" ;
        

      
        $database = new Libs_Model();
        $db = $database->getConnection();

        //Khởi tạo model 'product'
        $product = new Default_Models_Product($db);
        
        $proData = $product->searchProduct($sql);
        //var_dump($proData);exit();
        if($proData == null){
            echo "<div class='alert alert-danger'>Không tìm thấy sản phẩm phù hợp!!!</div>";
        }else{
        while ($row = $proData->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?>
           <div class="col-sm-3 item-product">
                                <div class="grid" class="item-img">
                                    <figure class="effect-zoe">
                                        <a href="<?php echo URL_BASE . 'detail?id=' . $productID; ?>">
                                        <?php
                                            $imgArr = explode(";", $image);
                                            ?>
                                            <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $imgArr[0]; ?> " alt=""/>
                                        </a>
                                        <figcaption>
                                            <p>
                                                <span><a href="#" onclick="livesale1(<?php echo $productID; ?>)">Thêm vào giỏ hàng <br><i class="fa fa-cart-arrow-down" style="font-size: 24px;"></i></a></span>
                                            </p>
                                        </figcaption>
                                    </figure>
                                </div>
                                <div class="item-name">
                                    <a href="<?php echo URL_BASE . 'detail?id=' . $productID ?>"><?php echo $productName; ?></a>
                                </div>
                                <div class="item-price">
                                    <span class="new-price"><?php echo number_format($unitPrice * (100 - $discount) / 100) . " đ"; ?></span>
                                    <span class="old-price"><?php echo number_format($unitPrice) . " đ"; ?></span>
                                    <div  class="muangay btn"><a href="<?php echo URL_BASE; ?>cart" onclick="livesale1(<?php echo $productID; ?>)">Mua ngay</a></div>
                                </div>



            </div>
        <?php
        }
        }
    }

}

// abc
?>
