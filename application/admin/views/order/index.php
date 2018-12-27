<div style="margin-left:0;padding-left: 0;">

    <h2 class="page-header">Danh sách đơn hàng </h2>
    <div class="row">

        <div class="">
            <form  action="<?php echo URL_BASE; ?>admin/index/search" method="get">   
                <div class="col col-sm-9">
                    <input class="" type="text" name="adminSearch"  placeholder="Nhập mã đơn hàng hoặc email"  >
                </div>
                <div class="col col-sm-3">
                    <select name="classify" style="display:none;"><option value="order"></option></select>
                    <input class="" type="submit" id="btnAdminSearch"value="Tìm kiếm" >
                </div>
            </form> 
        </div>
    </div>
    <hr>
    <table class="table table-responsive table-bordered table-hover">
        <thead>
        <th>Mã đơn hàng</th>
        <th>Tên tài khoản</th>
        <th>Thời gian đặt hàng</th>
        <th>Thời gian giao hàng</th>
        <th>Chức năng</th>            
        </thead>
        <?php
        if ($this->orderData == null) {
            echo "<div class='alert alert-danger'>Không tìm thấy đơn hàng!!!</div>";
        } else {
            echo "$this->value(<span style='color:red;'>" . $this->orderData->rowCount() . "</span> đơn hàng)";
            while ($row = $this->orderData->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <tr>
                    <td><?php echo $orderID; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $orderDate; ?></td>
                    <td><?php echo $shipperDate; ?></td>
                    <td>
                        <a href="<?php echo URL_BASE; ?>admin/order/detail?id=<?php echo $orderID; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Xem chi tiết</a>
                        <a href="#" onclick="delete_order(<?php echo $orderID; ?>);" class="btn btn-danger"><i class="fa fa-trash w3-xxlarge"></i> Xóa</a> &nbsp;
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

