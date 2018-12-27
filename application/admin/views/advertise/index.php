<div style="margin-left:0;padding-left: 0;">
        <?php
//        if (!isset($_SESSION['email'])) {
//            header("location:admin/user/login");
//        } else {
//            $this->empData->email = $_SESSION['email'];
//            $emp = $this->empData->getEmployeeByInfo();
//            echo "<div class='alert alert-success' style='text-align:right'>Xin chào: " . $emp['name'] . "</div>";
//            ?>
            <h2 class="page-header">Danh sách tin tức và quảng cáo</h2>
            <div class="row">
                <div class="col col-sm-4">
                    <a href="<?php echo URL_BASE ?>admin/advertise/add" class="btn " style="background: #77b300;">Thêm mới tin tức, khuyến mãi</a>
                    <hr>
                </div>
                <div class="col col-sm-8">
                    <form  action="<?php echo URL_BASE;?>admin/index/search" method="get">   
                        <div class="col col-sm-9">
                            <input class="" type="text" name="adminSearch"  placeholder="Nhập tên hoặc loại tin tức"  >
                        </div>
                        <div class="col col-sm-3">
                            <select name="classify" style="display:none;"><option value="advertise"></option></select>
                            <input class="" type="submit" id="btnAdminSearch"value="Tìm kiếm" >
                        </div>
                    </form> 
                </div>
            </div>
            <?php
//            $action = isset($_GET['action']) ? $_GET['action'] : "";
//            if ($action == "deleted") {
//                echo "<div class='alert alert-success'>Xóa Sản phẩm thành công</div>";
//            }
            ?>

            <table class="table table-responsive table-bordered table-hover">
                <thead>
                
                <th>Tên </th>
                <th>Mô tả</th>
                <th>Phân loại</th>             
                <th>Chức năng</th>           
                </thead>
                <?php
                if($this->advData == null){
                    echo "<div class='alert alert-danger'>Không tìm thấy gì cả!!!</div>";
                }else{
                    echo "$this->value(<span style='color:red;'>".$this->advData->rowCount()."</span> tin tức)";
                while ($row = $this->advData->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    ?>
                    <tr>
                        <td><?php echo $advertiseName; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $classify; ?></td>
                        
     
                        <td>
                            <a href="<?php echo URL_BASE; ?>admin/advertise/detail?id=<?php echo $advertiseID; ?>" class="btn btn-info" ><i class="fa fa-eye"></i> Xem</a> &nbsp;
                            <a href="<?php echo URL_BASE; ?>admin/advertise/update?id=<?php echo $advertiseID; ?>" class="btn btn-success"><i class="fa fa-pencil"></i> Sửa</a> &nbsp;
                            <a href="#" onclick="delete_advertise(<?php echo $advertiseID; ?>);" class="btn btn-danger"><i class="fa fa-trash w3-xxlarge"></i> Xóa</a> &nbsp;
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
        function delete_advertise(id) {
            var response = confirm("Bạn có muốn xóa không?");
            if (response) {
                window.location = "<?php echo URL_BASE; ?>admin/advertise/deleteAdvertise?id=" + id;
            }
        }
    </script>