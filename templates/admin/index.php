<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="<?php echo URL_BASE . 'templates/admin'; ?>/css/layout.css" rel="stylesheet" type="text/css"/>
        <script src="<?php echo URL_BASE . 'templates/admin'; ?>/js/js.js" type="text/javascript"></script>
        <script src="<?php echo URL_BASE . 'templates/admin'; ?>/ckeditor/ckeditor.js" type="text/javascript"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="icon" href="<?php echo URL_BASE; ?>templates/default/logo.jpg">

        <title>DashBoard</title>
        <script>
            function delete_order(id) {
                var response = confirm("Bạn có muốn xóa đơn hàng không?");
                if (response) {
                    window.location = "<?php echo URL_BASE ?>admin/order/deleteOrder?id=" + id;
                }
            }
            function delete_customer(id) {
                var response = confirm("Bạn có muốn xóa khách hàng này không?");
                if (response) {
                    window.location = "<?php echo URL_BASE ?>admin/customer/deleteCustomer?id=" + id;
                }function delete_order(id) {
                var response = confirm("Bạn có muốn xóa đơn hàng không?");
                if (response) {
                    window.location = "<?php echo URL_BASE ?>admin/order/deleteOrder?id=" + id;
                    }
                }
            }
             function delete_customer(id) {
                var response = confirm("Bạn có muốn xóa khách hàng này không?");
                if (response) {
                    window.location = "<?php echo URL_BASE ?>admin/customer/deleteCustomer?id=" + id;
                }
            }
            function getbycategory(catid) {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("result").innerHTML = this.responseText;
                    }
                };

                xmlhttp.open("GET", "<?php echo URL_BASE; ?>admin/getbycategory?id=" + catid, true);
                xmlhttp.send();
            
            }

        </script>
    </head>
    <body>
        <?php
        if (isset($_SESSION['logged_admin']) == TRUE) {
            require 'templates/admin/header.php';
        }
        ?>


        <div class="content">
            <div class="row">
                <?php if (isset($_SESSION['logged_admin']) == TRUE) {
                    ?>
                    <div class="col-sm-3 menu">
                        <ul>
                            <li><a href="<?php echo URL_BASE; ?>admin">Quản lý sản phẩm</a></li>
                            <li><a href="<?php echo URL_BASE; ?>admin/category">Quản lý danh mục sản phẩm</a></li>
                            <li><a href="<?php echo URL_BASE; ?>admin/order">Quản lý đơn hàng</a></li>
                            <li><a href="<?php echo URL_BASE; ?>admin/customer">Quản lý người dùng</a></li>
                            <li><a href="<?php echo URL_BASE; ?>admin/advertise">Quản lý tin tức, quảng cáo</a></li>
                        </ul>
                    </div>
                   
                    <?php
                }
                ?>
                <div class="col-sm-9 right-content">
                
                <?php
                require TEMPLATE;
                ?>
                </div>
            </div>
        </div>
    <?php
    if (isset($_SESSION['logged_admin']) == TRUE) {
        require 'templates/admin/footer.php';
    }
    ?>


</body>
</html>