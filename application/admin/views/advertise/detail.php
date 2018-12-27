<div style="margin-left:0;padding-left: 0;">
    <h2 class="page-header">Chi tiết tin tức, quảng cáo</h2>

    <?php
        if($this->advDetail == null){
            echo "<div class='alert alert-danger'>Tin tức, quảng cáo trống</div>";
        }else{
            $row = $this->advDetail->fetch(PDO::FETCH_ASSOC);
           
    ?>
    <table class="table table-responsive table-bordered table-hover">
         <tr>
            <th>Id </th>
            <td><?php echo $row['advertiseID']; ?></td>
        </tr>
        <tr>
            <th>Tên </th>
            <td><?php echo $row['advertiseName']; ?></td>
        </tr>
        
        <tr>
            <th>Phân loại</th>
            <td><?php echo $row['classify']; ?></td>
        </tr>

        <tr>
            <th>Hình ảnh</th>
            <td>
                <?php
                $imgArr = explode(";", $row['image']);

                for ($i = 0; $i < count($imgArr); $i++) {
                    ?>
                    <img src="<?php echo URL_BASE;?>templates/default/image/<?php echo $imgArr[$i]; ?> " alt="chưa có ảnh" width='100%' height='100%'>
                    <?php
                }
                ?>
            </td>
        </tr>
        <tr>
            <th>Mô tả</th>
            <td><?php echo $row['description']; ?></td>
        </tr>
        <tr>
            <th>Nguồn</th>
            <td><?php echo $row['source']; ?></td>
        </tr>
        <tr>
            <td></td>                
            <td><a href="<?php echo URL_BASE; ?>admin/advertise" class="btn btn-info">Quay về trang danh sách</a></td>
        </tr>

    </table>
    <?php
        }
    ?>
</div>