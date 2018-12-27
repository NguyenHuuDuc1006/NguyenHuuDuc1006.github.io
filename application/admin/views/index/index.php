<?php
if (!isset($_SESSION['logged_admin'])) {
    echo "<script>window.location.href='" . URL_BASE . "admin/employee/login';</script>";
} else {
//            $this->empData->email = $_SESSION['email'];
//            $emp = $this->empData->getEmployeeByInfo();
//            echo "<div class='alert alert-success' style='text-align:right'>Xin chào: " . $emp['name'] . "</div>";
//            
    ?>
    <div style="margin-left:0;padding-left: 0;">
        <h2 class="page-header">Danh sách sản phẩm</h2>
        <div class="row">
            <div class="col col-sm-4">
                <a href="<?php echo URL_BASE ?>admin/index/add" class="btn " style="background: #77b300;">Thêm mới sản phẩm</a>
                <hr>
            </div>
            <div class="col col-sm-8">
                <form  action="<?php echo URL_BASE; ?>admin/index/search" method="get">   
                    <div class="col col-sm-9">
                        <input class="" type="text" name="adminSearch"  placeholder="Nhập mã hoặc tên sản phẩm"  >
                    </div>
                    <div class="col col-sm-3">
                        <select name="classify" style="display:none;"><option value="product"></option></select>
                        <input class="" type="submit" id="btnAdminSearch"value="Tìm kiếm" >
                    </div>
                </form> 
            </div>
        </div>

        <table class="table table-responsive table-bordered table-hover">
            <thead>
            <th>Mã sản phẩm</th>
            <th>Tên</th>
            <th>Giá gốc</th>
            <th>Số lượng</th>
            <th>Chức năng</th>            
            </thead>
            <?php
            if ($this->proData == null) {
                echo "<div class='alert alert-danger'>Không tìm thấy sản phẩm!!!</div>";
            } else {
                echo "$this->value(<span style='color:red;'>" . $this->proData->rowCount() . "</span> sản phẩm)";
                while ($row = $this->proData->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <tr>
                        <td><?php echo $productCode; ?></td>
                        <td><?php echo $productName; ?></td>
                        <td><?php echo number_format($unitPrice); ?>đ</td>
                        <td><?php echo $quantity; ?></td>
                        <td>
                            <a href="<?php echo URL_BASE; ?>admin/index/detail?id=<?php echo $productID; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Xem</a> &nbsp;
                            <a href="<?php echo URL_BASE; ?>admin/index/update?id=<?php echo $productID; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Sửa</a> &nbsp;
                            <a href="#" onclick="delete_product(<?php echo $productID; ?>);" class="btn btn-danger"><i class="fa fa-trash w3-xxlarge"></i> Xóa</a> &nbsp;
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>

        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        ?>

    </div>
    <script>
        function delete_product(id) {
            var response = confirm("Bạn có muốn xóa sản phẩm không?");
            if (response) {
                window.location = "<?php echo URL_BASE; ?>admin/index/deleteProduct?id=" + id;
            }
        }
    </script>
    <?php
}
?>