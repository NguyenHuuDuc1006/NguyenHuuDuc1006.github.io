<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Danh sách tài khoản khách hàng</h2>
    <div class="row">
        <div class="col col-sm-8">
            <form  action="<?php echo URL_BASE; ?>admin/index/search" method="get">   
                <div class="col col-sm-9">
                    <input class="" type="text" name="adminSearch"  placeholder="Nhập mã, email hoặc tên khách hàng"  >
                </div>
                <div class="col col-sm-3">
                    <select name="classify" style="display:none;"><option value="customer"></option></select>
                    <input class="" type="submit" id="btnAdminSearch"value="Tìm kiếm" >
                </div>
            </form> 
        </div>
    </div>
    <hr>
    <table class="table table-responsive table-bordered table-hover">
        <thead>
        <th>Mã khách hàng</th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Địa chỉ</th>
        <th>Số điện thoại</th>
        <th>Chức năng</th>            
        </thead>
        <?php
        if ($this->cusData == null) {
            echo "Không có khách hàng.";
        } else {
            echo "$this->value(<span style='color:red;'>" . $this->cusData->rowCount() . "</span> khách hàng)";
            while ($row = $this->cusData->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                ?>
                <tr>
                    <td><?php echo $customerID; ?></td>
                    <td><?php echo $fullName ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $address; ?></td>
                    <td><?php echo $phone; ?></td>
                    <td>
                        <a href="<?php echo URL_BASE; ?>admin/customer/detail?id=<?php echo $customerID; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Xem Chi Tiết</a> &nbsp;
                        <a href="#" onclick="delete_customer(<?php echo $customerID; ?>);" class="btn btn-danger"><i class="fa fa-trash w3-xxlarge"></i> Xóa</a> &nbsp;
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

