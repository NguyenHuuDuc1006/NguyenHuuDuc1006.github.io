<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Chi tiết đơn hàng</h2>

    <?php
    ?>
    <table class="table table-responsive table-bordered table-hover">
        <tr>
            <th>Mã đơn hàng </th>
            <td colspan="2"><?php echo $this->orderDetail['orderID']; ?></td>
        </tr>
        <tr>
            <th>Tên tài khoản</th>
            <td colspan="2"><?php echo $this->orderDetail['email']; ?></td>
        </tr>
        <tr>
            <th>Tên người nhận</th>
            <td colspan="2"><?php echo $this->orderDetail['receiver']; ?></td>
        </tr>
        <tr>
            <th>Địa chỉ</th>
            <td colspan="2"><?php echo $this->orderDetail['addressReceiver']; ?></td>
        </tr>
        <tr>
            <th>Sản phẩm mua</th>
            <th>Số lượng</th>
            <th>Giá</th>            
        </tr>
        <?php
        $total = 0;
        while ($row = $this->objOrderDetail->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            ?>
            <tr>
                <td>                           
                    <h3> <?php echo $productName; ?></h3>
                    <img src="<?php echo URL_BASE; ?>templates/default/image/<?php echo $image; ?>" alt="" /></td>
                <td><?php echo $quantity; ?></td>
                <td><?php echo number_format($price); ?>đ</td>


            </tr>
            <?php
            $total += $price;
        }
        ?>
        <tr>
            <th>Tổng tiền thanh toán</th>
            <td colspan="2"><h3><?php echo number_format($total); ?>đ</h3></td>
        </tr>
        <tr>
            <th> Ngày mua</th>
            <td colspan="2"><?php echo $this->orderDetail['orderDate']; ?></td>
        </tr>
        <tr>
            <th>Ngày giao hàng</th>
            <td colspan="2"><?php echo $this->orderDetail['shipperDate'] ?></td>
        </tr>
        <tr>
            <th>Hình thức thanh toán</th>
            <td colspan="2"><?php echo $this->orderDetail['payment']; ?></td>
        </tr>
        <tr>
            <th>Trạng thái đơn hàng</th>
            <?php
                if($status== 0){
                         echo "<td style='color:#e65c00;' colspan='2'>Đang giao hàng</td>";
                }
                if($status== 1){
                        echo "<td style='color:green;' colspan='2'>Đã thanh toán</td>";
                }
            ?>
        </tr>
        <tr>
            <td></td>                
            <td colspan="2"><a href="<?php echo URL_BASE; ?>admin/order" class="btn btn-info">Quay về trang danh sách</a></td>
        </tr>

    </table>
</div>
