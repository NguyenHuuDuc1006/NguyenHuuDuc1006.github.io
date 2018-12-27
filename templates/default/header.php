<?php
$database = new Libs_Model();
$db = $database->getConnection();
$category = new Default_Models_Category($db);
$catObj = $category->getAllParentCategory();

$customer = new Default_Models_Customer($db);
$customer->email = $_SESSION['email'];
$infoCustomer = $customer->getInforCustomer();
?>
<div class="container-fluid w3-yellow" id="topheader">
    <div class="container">
        <div class="row ">
            <div class="col-sm-6 list-left">
                <a href="#">
                    <span class="fa fa-bell-o"></span>Thông báo |</a>
                <a href="<?php echo URL_BASE . 'care/index' ?>">
                    <span class="fa fa-question-circle"></span>Trợ giúp</a>
            </div>
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                ?>                
            <div class="col-sm-2 col-sm-offset-4 dropdown">
<!--                    <a href="#">Xin chào : <span class="glyphicon glyphicon-user"></span><?php echo $infoCustomer['fullName'] . " | "; ?></a>                
                    <a href="<?php echo URL_BASE . 'customer/logoutProcess' ?>"><span class="glyphicon glyphicon-log-out"></span>Đăng xuất</a>-->
                    
                <button  style="background: white;"class="btn dropdown-toggle" type="button" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo $infoCustomer['fullName']; ?>
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu list-right">
                            <li><a href="<?php echo URL_BASE;?>user">Quản lý tài khoản</a></li>
                            <li><a href="<?php echo URL_BASE . 'customer/logoutProcess' ?>"><span class="glyphicon glyphicon-log-out"></span>Đăng xuất</a></li>
                        </ul>
                    
                </div>
                <?php
            } else {
                ?>
                <div class="col-sm-6 list-right">
                    <a href="<?php echo URL_BASE . 'customer/register' ?>">Đăng ký|</a>
                    <a href="<?php echo URL_BASE . 'customer/login' ?>">Đăng nhập</a>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<div class="container-fluid" id="header">
    <div class="container">
        <div class="row">
            <div class="col-xs-3 col-sm-3" id="logo">
                <a href="<?php echo URL_BASE; ?>">
                    <img src="<?php echo URL_BASE ?>/templates/default/image/logo.jpg" alt="logo" width="110px" height="60px">
                </a>
            </div>
            <div class="col-xs-6  col-sm-6">
                <div class="container-fluid">
                    <div class="row" id="search">
                        <form action="<?php echo URL_BASE; ?>index/search" method ="get" id="search1">

                            <div class="col-sm-9" style="padding-right: 1px;">
                                <input type="search" name="txtSearch" id="txtSearch" placeholder="Bạn cần tìm gì?">
                            </div>

                            <div class="col-sm-3" style="padding: 0px;">
                                <button type="submit" id="btnSearch">
                                    <span class="glyphicon glyphicon-search" ></span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-3  col-sm-3" id="cart">
                <a href="<?php echo URL_BASE ?>cart">
                    <button type="button" class="btn btn-default">
                        <i class="fa fa-cart-arrow-down" style="font-size: 24px;"></i>
                        <span class="badge" id="messageCart">0</span>
                    </button>
                </a>
            </div>                    
        </div>
    </div>
</div>
<nav class="navbar navbar-inverse" role="navigation" id="myHeader" >
    <div class="container-fluid" style="background: #1b6d85;">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL_BASE; ?>">
                    <span class="glyphicon glyphicon-home" style="color:#ffffff"></span>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <?php
                    while ($rowCat = $catObj->fetch(PDO::FETCH_ASSOC)) {
                        if ($category->CountCategory($rowCat['categoryID']) > 0) {
                            ?>

                            <li class="dropdown" id="menuheader">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $rowCat['categoryName']; ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php
                                    $category1 = new Default_Models_Category($db);
                                    $subCategoryId = $rowCat['categoryID'];

                                    $catObj1 = $category1->getSubCategoryIdByParent($subCategoryId);



                                    while ($rowCat1 = $catObj1->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <li>
                                            <a href="<?php echo URL_BASE; ?>getPageCategory?id=<?php echo $rowCat1['categoryID']; ?>"><?php echo $rowCat1['categoryName'] ?></a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </li>
                        <?php } else { ?>

                            <li id="menuheader">
                                <a href="<?php echo URL_BASE; ?>getPageCategory?id=<?php echo $rowCat['categoryID']; ?>">
                                    <?php echo $rowCat['categoryName'] ?>
                                </a>
                            </li>
                            <?php
                        }
                    }
                    ?>
                    <li id="menuheader">
                        <a href="<?php echo URL_BASE ?>index/introduce">Giới thiệu</a>
                    </li>
                    <li id="menuheader">
                        <a href="<?php echo URL_BASE ?>index/contact">Liên hệ</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
